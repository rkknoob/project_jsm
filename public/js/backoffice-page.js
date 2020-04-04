$(document).ready(function () {
  var searchData = {}; // save data

  $('body').on('click', '.btn-save', function () {
    if ($(this).hasClass('disabled')) return;
    loadingButton();

    var callback = function callback() {
      window.location.href = $backoffice_url + '/pages';
    };

    saveForm($('#pageForm'), callback);
  }); // tables

  var table = $('#page').DataTable({
    language: {
      url: $base_url + '/js/datatables-th.lang'
    },
    pageLength: 10,
    serverSide: true,
    processing: true,
    paging: false,
    order: [[1, 'asc']],
    ajax: {
      url: $backoffice_url + '/pages/datatables',
      data: function data(d) {
        return $.extend(d, searchData);
      }
    },
    columns: [{
      data: 'topic'
    }, {
      data: 'id',
      name: 'id'
    }],
    columnDefs: [{
      targets: 1,
      orderable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        var btnEdit = '<a role="button" href="' + $backoffice_url + '/pages/' + data + '/edit' + '" class="btn btn-outline-dark btn-sm"><i class="fa fa-edit"></i> แก้ไข</a> ';
        return btnEdit;
      }
    }]
  }); // init note

  if ($('.note-custom').length) $('.note-custom').summernote({
    height: 400
  });
});
