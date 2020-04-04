var vm = new Vue({
  el: '#cart',
  data: {
    products: [],
    cartTotal: 0
  },
  created: function created() {
    var _this = this;

    var urlForm = $base_url + '/carts/me';
    axios.get(urlForm).then(function (res) {
      if (res.data.status) {
        _this.products = res.data.products;
      }
    })["catch"](function (error) {
      console.log(error);
    });
  },
  methods: {
    onRemove: function onRemove(index) {
      var _this2 = this;

      swal({
        title: 'ยืนยันการลบข้อมูล?',
        text: name,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#5c6bc0',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then(function (result) {
        if (result.value) {
          axios["delete"]($base_url + '/carts/' + _this2.products[index].id).then(function (response) {
            _this2.products.splice(index, 1);

            $('.badge-cart').text(response.data.sum_quantity);
          });
        }
      })["catch"](swal.noop);
    },
    onKey: function onKey(index) {
      var _this3 = this;

      var data = {
        product_id: this.products[index].id,
        quantity: this.products[index].cart_qty,
        page: 'cart'
      };
      var oldQty = JSON.parse(JSON.stringify(this.products[index].cart_qty));
      $('.preloader').show();
      axios.post($base_url + '/carts/verify_quantity', data).then(function (response) {
        if (response.data.status) {
          axios.put($base_url + '/carts', data).then(function (res) {
            $('.preloader').hide();
            $('.badge-cart').text(res.data.sum_quantity);
          });
        } else {
          Swal({
            type: 'error',
            title: 'แก้ไขสินค้าไม่ได้',
            html: 'สินค้าไม่เพียงพอ สินค้ามีเพียง ' + response.data.quantity + '<br/>โปรดระบุสินค้าจำนวนใหม่อีกครั้ง'
          });
          _this3.products[index].cart_qty = '';
          $('.preloader').hide();
          return false;
        }
      })["catch"](function (error) {
        $('.preloader').hide();
        showFormErrors(error.response, form);
      });
    },
    onNext: function onNext() {
      window.location.href = $base_url + '/orders';
    }
  },
  computed: {
    total: function total() {
      var result = 0;

      if (this.products.length > 0) {
        result = this.products.reduce(function (prev, cur) {
          return prev + cur.cart_qty * cur.sell_price;
        }, 0);
      }

      return result;
    }
  }
});
