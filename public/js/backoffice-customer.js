$(document).ready(function () {
  var searchData = {}; // save data

  $('body').on('click', '.btn-save', function () {
    var callback = function callback() {
      $('.modal-form').modal('hide');
      table.ajax.reload();
    };

    saveForm($('#customerForm'), callback);
  }); // tables

  var table = $('#customer').DataTable({
    language: {
      url: $base_url + '/js/datatables-th.lang'
    },
    pageLength: 10,
    serverSide: true,
    processing: true,
    paging: false,
    order: [[1, 'asc']],
    ajax: {
      url: $backoffice_url + '/customers/datatables',
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
      data: 'tel'
    }, {
      data: 'address'
    }, {
      data: 'active'
    }, {
      data: 'id'
    }],
    columnDefs: [{
      targets: 0,
      orderable: false,
      searchable: false,
      render: function render(data, type, row) {
        var result = data ? '<img src="' + data + '" alt="' + row.name + '" class="img-fluid rounded mx-auto">' : '';
        return result;
      }
    }, {
      targets: 2,
      orderable: false,
      render: function render(data, type, row) {
        var tel = '<strong>Tel:</strong> <span class="text-primary">' + data + '</span>';
        var email = '<br/><strong>Email:</strong> <span class="text-muted">' + row.email + '</span>';
        var line = row.line ? '<br/><strong>Line ID:</strong> <span class="text-muted">' + row.line + '</span>' : '';
        return tel + email + line;
      }
    }, {
      targets: 3,
      orderable: false,
      render: function render(data, type, row) {
        var address = '<span class="text-second">' + data + '</span>';
        var subdistrict = row.subdistrict_id ? '<br/><span class="text-second">ต.' + row.subdistrict_name + '</span> ' : '';
        var district = '<span class="text-second">อ.' + row.district_name + '</span> ';
        var province = '<br/><span class="text-second">จ.' + row.province_name + '</span> ';
        var postcode = '<span class="text-second">' + row.postcode + '</span> ';
        var country = '<span class="text-second">' + row.country + '</span>';
        return address + subdistrict + district + province + postcode + country;
      }
    }, {
      targets: 4,
      orderable: false,
      searchable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        var result = data ? '<span class="badge badge-primary badge-pill m-b-5">Active</span>' : '<span class="badge badge-danger badge-pill m-b-5">Inactive</span>';
        return result;
      }
    }, {
      targets: 5,
      orderable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        var dataName = row.name;
        var btnEdit = '<a href="#" role="button" data-href="' + $backoffice_url + '/customers/' + data + '/edit' + '" data-modal-name="largeModal" class="btn btn-outline-dark btn-sm btn-modal"><i class="fa fa-edit"></i> แก้ไข</a> ';
        var btnDelete = '<a href="#" data-href="' + $backoffice_url + '/customers/' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
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
  }); // upload main Image    

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
        url: $backoffice_url + '/customers/uploadimage',
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
          showFormErrors(xhr, $('#customerForm'));
          console.log(errorThrown);
        }
      });
    }
  }); // event on shown modal

  $('.modal-form').on('shown.bs.modal', function (e) {
    // event province
    $('select[name=province_id]').on('change', function () {
      $('select[name=district_id]').html('<option value="">เลือกอำเภอ</option>');
      $('select[name=subdistrict_id]').html('<option value="">เลือกตำบล</option>');
      $('input[name=postcode]').val('');
      axios.get($backoffice_url + '/provinces/' + $(this).val() + '/districts').then(function (response) {
        response.data.forEach(function (data) {
          $('select[name=district_id]').append($('<option></option>').attr('value', data.id).text(data.name_th));
        });
      })["catch"](function (error) {
        console.log(error);
      });
    }); // event district

    $('select[name=district_id]').on('change', function () {
      $('select[name=subdistrict_id]').html('<option value="">เลือกตำบล</option>');
      $('input[name=postcode]').val('');
      axios.get($backoffice_url + '/districts/' + $(this).val() + '/subdistricts').then(function (response) {
        response.data.forEach(function (data) {
          $('select[name=subdistrict_id]').append($('<option></option>').attr('value', data.id).attr('data-postcode', data.postcode).text(data.name_th));
        });
      })["catch"](function (error) {
        console.log(error);
      });
    }); //event subdistrict

    $('select[name=subdistrict_id]').on('change', function () {
      var optionSelected = $('option:selected', this);
      $('input[name=postcode]').val(optionSelected.attr('data-postcode'));
    });
  });
});
