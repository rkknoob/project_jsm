var vm = new Vue({
  el: '#cartModal',
  data: {
    carts: []
  }
});
$(document).ready(function () {
  var resetCartBtn = function resetCartBtn() {
    $('.btn-loading').html('เพิ่มลงรถเข็น');
    $('.btn-loading').removeClass('disabled');
  };

  $('.btn-cart').on('click', function (e) {
    e.preventDefault();
    loadingButton();
    var form = $('#cartForm');
    var data = form.serialize();
    var urlForm = form.attr('action');
    var urlVerify = $base_url + '/carts/verify_quantity';
    axios.post(urlVerify, data).then(function (response) {
      resetCartBtn();

      if (response.data.status) {
        axios.post(urlForm, data).then(function (res) {
          if (res.data.status) {
            vm.carts = res.data;
            $('.badge-cart').text(res.data.sum_quantity);
            $('#cartModal').modal('show');
            resetCartBtn();
          }
        })["catch"](function (error) {
          showFormErrors(error.response, form);
          resetCartBtn();
        });
      } else {
        Swal({
          type: 'error',
          title: 'เพิ่มสินค้าไม่ได้',
          html: 'สินค้าไม่เพียงพอ สินค้ามีเพียง ' + response.data.quantity + '<br/>โปรดระบุสินค้าจำนวนใหม่อีกครั้ง'
        });
        return false;
      }
    })["catch"](function (error) {
      showFormErrors(error.response, form);
    });
  });
});
