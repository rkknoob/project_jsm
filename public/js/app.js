function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

// save command
function btnUnSubmit(form) {
  var button = form.find('.btn-submit');
  button.removeClass('btn-loading');
}

function saveForm(form) {
  var callback = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var id = form.find('input[name=id]').val();
  var urlForm = form.attr('action'); // btnSubmit(form);

  var data = form.serialize();

  if (!id) {
    axios.post(urlForm, data).then(function (response) {
      if (!response.data.status) {
        Swal({
          type: 'error',
          title: response.data.title,
          text: response.data.message ? response.data.message : 'มีบางอย่างผิดพลาด กรุณาแจ้งผู้ดูแลระบบ'
        });
        return false;
      }

      callback();
    })["catch"](function (error) {
      btnUnSubmit(form);
      showFormErrors(error.response, form);
    });
  } else {
    axios.put(urlForm + '/' + id, data).then(function (response) {
      if (!response.data.status) {
        Swal({
          type: 'error',
          title: response.data.title,
          text: response.data.message != '' ? response.data.message : 'มีบางอย่างผิดพลาด กรุณาแจ้งผู้ดูแลระบบ'
        });
        return false;
      }

      callback();
    })["catch"](function (error) {
      btnUnSubmit(form);
      showFormErrors(error.response, form);
    });
  }
} // delete confirm box


function deleteConf(url, name) {
  var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  swal({
    title: 'คุณต้องการลบข้อมูลหรือไม่?',
    text: name,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ใช่',
    cancelButtonText: 'ยกเลิก'
  }).then(function (result) {
    if (result.value) {
      axios["delete"](url).then(function (response) {
        if (!response.data.status) {
          Swal({
            type: 'error',
            title: response.data.title,
            text: response.data.message != '' ? response.data.message : 'มีบางอย่างผิดพลาด กรุณาแจ้งผู้ดูแลระบบ'
          });
          return false;
        }

        callback();
      });
    }
  })["catch"](swal.noop);
} // error form show text


function showFormErrors(errors, form) {
  var tabActive = false;
  form.find('.form-group').removeClass('has-error');
  form.find('.help-block').remove();
  resetButton();

  if (errors !== undefined) {
    var errors = errors.data ? errors.data : errors.responseJSON;
    $.each(errors['errors'], function (key, value) {
      var formGroup = form.find('#' + key).parents('.form-group');
      if (!formGroup.length) formGroup = form.find('[name=' + key + ']').parents('.form-group');
      formGroup.addClass('has-error');

      if (formGroup.closest('.tab-pane').length > 0) {
        if (!tabActive) {
          $('.tabs-line a[href="#' + formGroup.closest('.tab-pane').attr('id') + '"]').tab('show');
          tabActive = true;
        }
      }

      var jQueryValidationElm = formGroup.find('.error-help-block');

      if (jQueryValidationElm.length) {
        jQueryValidationElm.text(value[0]);
      } else {
        formGroup.append('<label class="help-block error-help-block text-left">' + value[0] + '</label>');
        formGroup.find('.error-help-block').text(value[0]);
        formGroup.find('.help-block').show();
      }
    });
  }
} // button


function loadingButton() {
  $('.btn-loading').addClass('disabled');
  $('.btn-loading').html('<i class="fa fa-spinner fa-spin"></i> กำลังโหลด...');
}

function resetButton() {
  $('.btn-loading').html('บันทึก');
  $('.btn-loading').removeClass('disabled');
} // set global dropzone


if ((typeof Dropzone === "undefined" ? "undefined" : _typeof(Dropzone)) !== undefined) {
  Dropzone.autoDiscover = false;
}

$(document).ready(function () {
  // side menu
  var url = window.location;
  var suburl = url.href.replace(/\/(creat(\S+)|\d\/edi(\S+))/g, '');
  $('ul.side-menu a').filter(function () {
    return this.href == suburl;
  }).parent().addClass('active'); // auto hide alert message

  $('.alert-message').fadeIn(1000).delay(2000).fadeOut(2000); // Modal process

  $('.modal-form').on('hidden.bs.modal', function (e) {
    $('.modal-content').empty();
    $(this).removeData('bs.modal');
  });

  var modalShow = function modalShow(e, link, modalName) {
    e.preventDefault();
    $.get(link, function (data) {
      $('#' + modalName).find('.modal-content').html(data);
      $('#' + modalName).modal('show');
    });
  };

  $('body').on('click', '.btn-modal', function (e) {
    link = $(this).data('href');
    modalName = $(this).data('modal-name');
    modalShow(e, link, modalName);
  }); // plugin init

  var initPlugin = function initPlugin() {
    if ($('.filestyle').length) $('.filestyle').filestyle();
    if ($('.select2').length) $('.select2').select2();
    if ($('.selectpicker').length) $('.selectpicker').selectpicker();

    if ($('.select2-hide').length) {
      $('.select2-hide').select2({
        minimumResultsForSearch: -1
      });
    }

    if ($('.note').length) $('.note').summernote({
      height: 200
    });
    $('.selectpicker').on('loaded.bs.select	', function (e) {
      if ($('.bootstrap-select').length) {
        $('.bootstrap-select').find('.bs-caret').remove();
        $('.bootstrap-select').find('.dropdown-toggle').append('<span class="bs-caret"><span class="caret"></span></span>');
      }
    });
    $('.input-group.date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
      todayHighlight: true
    });
  };

  initPlugin(); // open modal plugin init

  $('.modal-form').on('shown.bs.modal', function (e) {
    initPlugin();
  });
  $(document).on('show.bs.modal', '.modal', function (event) {
    var zIndex = 1040 + 10 * $('.modal:visible').length;
    $(this).css('z-index', zIndex);
    setTimeout(function () {
      $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
  });
});
