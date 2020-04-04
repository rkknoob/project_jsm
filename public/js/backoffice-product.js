$(document).ready(function () {
  var searchData = {}; // save data

  $('body').on('click', '.btn-save', function () {
    if ($(this).hasClass('disabled')) return;
    loadingButton();

    var callback = function callback() {
      window.location.href = $backoffice_url + '/products';
    };

    saveForm($('#productForm'), callback);
  }); // tables

  var table = $('#product').DataTable({
    language: {
      url: $base_url + '/js/datatables-th.lang'
    },
    pageLength: 10,
    serverSide: true,
    processing: true,
    paging: false,
    order: [[1, 'asc']],
    ajax: {
      url: $backoffice_url + '/products/datatables',
      data: function data(d) {
        searchData.categorie_id = $('select[name=categorie_id_filter]').val();
        searchData.active = $('select[name=active]').val();
        return $.extend(d, searchData);
      }
    },
    columns: [{
      data: 'image_file'
    }, {
      data: 'name'
    }, {
      data: 'categorie_name',
      name: 'categories.name'
    }, {
      data: 'buy_price'
    }, {
      data: 'sell_price'
    }, {
      data: 'quantity'
    }, {
      data: 'active'
    }, {
      data: 'id'
    }, {
      data: 'sku'
    }, {
      data: 'barcode'
    }],
    columnDefs: [{
      targets: [8, 9],
      visible: false
    }, {
      targets: [3, 4, 5],
      orderable: false,
      searchable: false
    }, {
      targets: 0,
      orderable: false,
      searchable: false,
      render: function render(data, type, row) {
        var result = data ? '<img src="' + data + '" alt="' + row.name + '" class="img-fluid rounded mx-auto">' : '';
        return result;
      }
    }, {
      targets: 1,
      render: function render(data, type, row) {
        var productName = '<span class="text-primary">' + data + '</span>';
        var sku = '<br/><strong>SKU:</strong> <span class="text-muted">' + row.sku + '</span>';
        var barcode = '<br/><strong>Barcode:</strong> <span class="text-muted">' + row.barcode + '</span>';
        return productName + sku + barcode;
      }
    }, {
      targets: 6,
      orderable: false,
      searchable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        var result = data ? '<span class="badge badge-primary badge-pill m-b-5">Active</span>' : '<span class="badge badge-danger badge-pill m-b-5">Inactive</span>';
        return result;
      }
    }, {
      targets: 7,
      orderable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        var dataName = row.name;
        var btnEdit = '<a role="button" href="' + $backoffice_url + '/products/' + data + '/edit' + '" class="btn btn-outline-dark btn-sm"><i class="fa fa-edit"></i> แก้ไข</a> ';
        var btnDelete = '<a href="#" data-href="' + $backoffice_url + '/products/' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
        return btnEdit + btnDelete;
      }
    }]
  }); // trigger search event

  $('body').on('changed.bs.select', 'select[name=categorie_id_filter]', function (e, clickedIndex, isSelected, previousValue) {
    searchData.categorie_id = $('select[name=categorie_id_filter]').val();
    table.ajax.reload();
  });
  $('body').on('changed.bs.select', 'select[name=active]', function (e, clickedIndex, isSelected, previousValue) {
    searchData.active = $('select[name=active]').val();
    table.ajax.reload();
  }); // delete

  $('body').on('click', '.btn-delete', function (e) {
    e.preventDefault();

    var callback = function callback() {
      table.ajax.reload();
    };

    var url = $(this).attr('data-href');
    var name = $(this).attr('data-name');
    deleteConf(url, name, callback);
  }); // upload main image    

  $('body').on('change', 'input[name= "file_upload"]', function () {
    if ($('input[name ="file_upload"]').val() != '') {
      var file_data = $('input[name= "file_upload"]').prop('files')[0];
      var form_data = new FormData();
      form_data.append('file_upload', file_data);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: $backoffice_url + '/products/uploadimage',
        dataType: 'json',
        type: 'POST',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function success(resp) {
          $('input[name=image]').val(resp.data);
          $('#showImage').attr("src", $link + resp.data);
          var labelError = $('.filestyle').nextAll().eq(1);

          if (labelError.length > 0) {
            labelError.hide();
          }
        },
        error: function error(xhr, textStatus, errorThrown) {
          showFormErrors(xhr, $('#productForm'));
          console.log(errorThrown);
        }
      });
    }
  }); // dropzone

  if ($('#productForm').length) {
    var arrImage = [];
    var deleteFileId = [];
    var deleteFileName = [];
    var myDropzone = new Dropzone("div#uploadDropzone", {
      paramName: 'file_upload',
      url: $backoffice_url + '/products/uploadimage',
      acceptedFiles: '.jpeg,.jpg,.png,.gif',
      maxFiles: 10,
      maxFilesize: 5048,
      addRemoveLinks: true,
      dictRemoveFile: 'ลบรูปภาพ',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      init: function init() {
        this.on('success', function (file) {
          var filename = JSON.parse(file.xhr.response);
          arrImage.push(filename.data);
          $('input[name=multifile]').val(arrImage);
          file.dataURL = filename.data;
        });
        this.on('removedfile', function (file) {
          // assign delete value               
          deleteFileName.push(file.dataURL);

          if (!file.processing) {
            deleteFileId.push(file.name);
            $('input[name=deletefile_id]').val(deleteFileId);
          }

          $('input[name=deletefile_name]').val(deleteFileName); // pop array on multifile

          var index = arrImage.indexOf(file.dataURL);

          if (index > -1) {
            arrImage.splice(index, 1);
            $('input[name=multifile]').val(arrImage);
          } // var url = $backoffice_url+'/products/images/'+file.name;
          // axios.delete(url).then((response) => {
          //     if (!response.data.status) {
          //         Swal({
          //             type: 'error',
          //             title: response.data.title,
          //             text: (response.data.message != '') ? response.data.message : 'มีบางอย่างผิดพลาด กรุณาแจ้งผู้ดูแลระบบ'
          //         });
          //         return false;
          //     }                        
          // });

        });
      }
    }); // exist image file dropzone

    if ($('input[name=id]').val()) {
      axios.get($backoffice_url + '/products/' + $('input[name=id]').val() + '/images').then(function (response) {
        response.data.forEach(function (data) {
          var thumbFile = {
            name: data.id,
            size: 0,
            dataURL: $link + data.name
          };
          myDropzone.emit('addedfile', thumbFile);
          myDropzone.createThumbnailFromUrl(thumbFile, myDropzone.options.thumbnailWidth, myDropzone.options.thumbnailHeight, myDropzone.options.thumbnailMethod, true, function (thumbnail) {
            myDropzone.emit('thumbnail', thumbFile, thumbnail);
          });
          myDropzone.emit('complete', thumbFile);
        });
      })["catch"](function (error) {
        console.log(error);
      });
    }
  }
});
