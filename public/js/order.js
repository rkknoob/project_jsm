$(document).ready(function () {
  var form = $('#orderForm');
  form.on('submit', function (e) {
    e.preventDefault();
    var data = form.serialize();
    axios.post($base_url + '/orders', data).then(function (response) {
      if (!response.data.status) {
        Swal({
          type: 'error',
          title: response.data.title,
          text: response.data.message ? response.data.message : 'มีบางอย่างผิดพลาด กรุณาแจ้งผู้ดูแลระบบ'
        });
        return false;
      }

      window.location.href = $base_url + '/orders/history';
    })["catch"](function (error) {
      showFormErrors(error.response, form);
    });
  }); // event province

  $('select[name=province_id]').on('change', function () {
    $('select[name=district_id]').html('<option value="">เลือกอำเภอ</option>');
    $('select[name=subdistrict_id]').html('<option value="">เลือกตำบล</option>');
    $('input[name=postcode]').val('');
    axios.get($base_url + '/provinces/' + $(this).val() + '/districts').then(function (response) {
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
    axios.get($base_url + '/districts/' + $(this).val() + '/subdistricts').then(function (response) {
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
