$(document).ready(function () {
  var table = $('#categorie').DataTable({
    language: {
      url: $base_url + '/js/datatables-th.lang'
    },
    pageLength: 10,
    serverSide: true,
    processing: true,
    paging: false,
    filter: false,
    ajax: {
      url: $backoffice_url + '/categories/datatables'
    },
    columns: [{
      data: 'name',
      name: 'name'
    }, {
      data: 'id',
      name: 'id'
    }],
    columnDefs: [{
      targets: 1,
      orderable: false,
      render: function render(data, type, row) {
        var dataName = row.name;
        var btnEdit = '<a href="#" role="button" data-href="' + $backoffice_url + '/categories/' + data + '/edit' + '" data-modal-name="normalModal" class="btn btn-outline-dark btn-sm btn-modal"><i class="fa fa-edit"></i> แก้ไข</a> ';
        var btnDelete = '<a href="#" data-href="' + $backoffice_url + '/categories/' + data + '" data-name="' + dataName + '" role="button" class="btn btn-outline-danger btn-sm btn-delete"><i class="fa fa-trash"></i> ลบ</a>';
        return btnEdit + btnDelete;
      }
    }]
  });
  $('body').on('click', '.btn-save', function () {
    var callback = function callback() {
      $('.modal-form').modal('hide');
      table.ajax.reload();
    };

    saveForm($('#categorieForm'), callback);
  });
  $('body').on('click', '.btn-delete', function (e) {
    e.preventDefault();

    var callback = function callback() {
      table.ajax.reload();
    };

    var url = $(this).attr('data-href');
    var name = $(this).attr('data-name');
    deleteConf(url, name, callback);
  });
});
