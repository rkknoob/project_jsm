$(document).ready(function () {
  var searchData = {}; // tables

  var table = $('#order').DataTable({
    language: {
      url: $base_url + '/js/datatables-th.lang'
    },
    pageLength: 10,
    serverSide: true,
    processing: true,
    paging: false,
    order: [[1, 'desc']],
    ajax: {
      url: $backoffice_url + '/orders/datatables',
      data: function data(d) {
        return $.extend(d, searchData);
      }
    },
    columns: [{
      data: 'order_no'
    }, {
      data: 'order_date'
    }, {
      data: 'name'
    }, {
      data: 'total_payment'
    }, {
      data: 'order_status'
    }, {
      data: 'id'
    }],
    columnDefs: [{
      targets: 0,
      render: function render(data, type, row) {
        return '<a href="#" data-href="' + $backoffice_url + '/orders/' + row.id + '/edit" data-modal-name="largeModal" class="btn-modal">' + data + '</a>';
      }
    }, {
      targets: 1,
      render: function render(data, type, row) {
        return moment(data).format('DD/MM/YYYY');
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
        var total = '<strong>จำนวนเงิน</strong> <span class="text-info">' + row.total + '</span>';
        var totalPayment = '<br/><strong>ชำระแล้ว</strong> <span class="text-success">' + data + '</span>';
        var balance = '<br/><strong>คงเหลือ</strong> <span class="text-danger">' + row.balance + '</span>';
        return total + totalPayment + balance;
      }
    }, {
      targets: 4,
      orderable: false,
      searchable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        return '<span class="badge badge-' + row.status_badge + ' badge-pill m-b-5">' + data + '</span>';
      }
    }, {
      targets: 5,
      orderable: false,
      className: 'text-center',
      render: function render(data, type, row) {
        var dataName = row.order_no;
        var btnStatus = '<div class="btn-group">' + '<button class="btn dropdown-toggle btn-sm btn-outline-primary" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> สถานะ <i class="fa fa-angle-down"></i></button>' + '<ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">' + '<li>' + '<a class="dropdown-item btn-status" data-id="' + data + '" data-status="1" href="#">รอดำเนินการ</a>' + '</li>' + '<li>' + '<a class="dropdown-item btn-status" data-id="' + data + '" data-status="2" href="#">ชำระเงินแล้ว</a>' + '</li>' + '<li>' + '<a class="dropdown-item btn-status" data-id="' + data + '" data-status="3" href="#">กำลังส่งสินค้า</a>' + '</li>' + '<li>' + '<a class="dropdown-item btn-status" data-id="' + data + '" data-status="4" href="#">ได้รับสินค้าแล้ว</a>' + '</li>' + '<li>' + '<a class="dropdown-item btn-status" data-id="' + data + '" data-status="5" href="#">ขอคืนเงิน</a>' + '</li>' + '<li>' + '<a class="dropdown-item btn-status" data-id="' + data + '" data-status="6" href="#">ยกเลิก</a>' + '</li>' + '</ul>' + '</div> ';
        var btnGroup = '<div class="btn-group">' + '<button class="btn dropdown-toggle btn-sm btn-outline-dark" data-toggle="dropdown" aria-expanded="false"> ดำเนินการ <i class="fa fa-angle-down"></i></button>' + '<ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">' + '<li>' + '<a data-href="' + $backoffice_url + '/payments/' + data + '/edit" data-modal-name="largeModal" class="dropdown-item btn-modal" href="#">การชำระเงิน</a>' + '</li>' + '<li>' + '<a data-href="' + $backoffice_url + '/orders/' + data + '/edit" data-modal-name="largeModal" class="dropdown-item btn-modal" href="#">รายละเอียด</a>' + '</li>' + '<li>' + '<a data-href="' + $backoffice_url + '/orders/' + data + '" data-name="' + dataName + '" class="dropdown-item btn-delete" href="#">ลบ</a>' + '</li>' + '</ul>' + '</div> ';
        return btnStatus + btnGroup;
      }
    }]
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
  $('body').on('click', '.btn-payment-save', function (e) {
    e.preventDefault();

    var callback = function callback() {
      $('.modal-form').modal('hide');
    };

    saveForm($('#paymentForm'), callback);
  });
  $('body').on('click', '.btn-status', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    swal({
      title: 'ยืนยันการเปลี่ยนสถานะ?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่',
      cancelButtonText: 'ยกเลิก'
    }).then(function (result) {
      if (result.value) {
        axios.put($backoffice_url + '/orders/status/' + id + '?val=' + status).then(function (response) {
          if (!response.data.status) {
            Swal({
              type: 'error',
              title: response.data.title,
              text: response.data.message != '' ? response.data.message : 'มีบางอย่างผิดพลาด กรุณาแจ้งผู้ดูแลระบบ'
            });
            return false;
          }

          table.ajax.reload();
        });
      }
    })["catch"](swal.noop);
  });
});
