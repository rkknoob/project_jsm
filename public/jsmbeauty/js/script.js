
// A $( document ).ready() block.
jQuery( document ).ready(function($) {
    $('select#pa_gift').parents('.form-inline').addClass('hold');
    var i = $('select#pa_gift option[selected="selected"]').text();
    $('select#pa_gift').parents('.form-inline').prepend('<p class="form-control-static"><span class="text-danger">*</span> '+i+'</p>');
});

jQuery('[data-toggle="popover"]').popover(); // 클릭 툴팁
jQuery('[data-toggle="tooltip"]').tooltip(); // 마우스 오버 툴팁



//검색창 포커스
jQuery('#juSearch').on('shown.bs.modal', function (e) {
    jQuery('#juSearch input[name="s"]').focus();
});

// 비쥬얼 컴포저 아코디언 제거
jQuery('.woocommerce-page .vc_toggle .vc_toggle_title,.woocommerce-page .vc_toggle .vc_toggle_title h4').click(function(){
    return false;
});

// 이미지 체크박스 처리
jQuery('body').on('click','.img-checkbox', function () {
    var input = jQuery(this).attr('data-input');
    var val = jQuery(this).attr('data-value');
    jQuery('input.'+input).val(val);

});
jQuery('body').on('click','.img-checkbox.active', function () {
    var input = jQuery(this).attr('data-input');
    var val = jQuery(this).attr('data-value');
    jQuery('input.'+input).val('');

});


//모바일 메뉴
jQuery('body').on('click','.btn-header-menu-mobile',function(){
    jQuery('#wrap').addClass('menu_view');
    jQuery('body').css('overflow','hidden');
});

jQuery('body').on('click','.btn-menu-close',function(){
    jQuery('#wrap').removeClass('menu_view');
    jQuery('body').css('overflow','auto');
});



// 수량 (장바구니)
jQuery('.cart-well .num_up').click(function(){
    var i = jQuery(this).parent().find('input').val();
    i++;
    jQuery(this).parent().find('input').val(i);
    //select_Total(i);
});
jQuery('.cart-well .num_down').click(function(){
    var i = jQuery(this).parent().find('input').val();
    if(i > 1){
        i--;
        jQuery(this).parent().find('input').val(i);
        //select_Total(i);
    }
});


// 수량 (제품 상세)
jQuery('.entry-summary.none .num_up').click(function(){
    var i = jQuery(this).parent().find('input').val();
    i++;
    jQuery(this).parent().find('input').val(i);
    select_Total(i);
});
jQuery('.entry-summary.none .num_down').click(function(){
    var i = jQuery(this).parent().find('input').val();
    if(i > 1){
        i--;
        jQuery(this).parent().find('input').val(i);
        select_Total(i);
    }
});

// 수량 (세일가)
jQuery('.entry-summary.sale .num_up').click(function(){
    var i = jQuery(this).parent().find('input').val();
    i++;
    jQuery(this).parent().find('input').val(i);
    select_Total_sale(i);
});
jQuery('.entry-summary.sale .num_down').click(function(){
    var i = jQuery(this).parent().find('input').val();
    if(i > 1){
        i--;
        jQuery(this).parent().find('input').val(i);
        select_Total_sale(i);
    }
});

// 사용자 평점
jQuery('.star-rating-selector label').click(function(){
    jQuery('.star-rating-selector label').removeClass('active');
    jQuery(this).addClass('active');
});

// 댓글 링크 무조건 새창으로
jQuery('.comment-list .media-body a').attr('target','_blank');


//제품 총합계
function select_Total(count){
    var re = /[ \{\}\[\]\/?.,;:|\)*~`!^\-_+┼<>@\#$₩%&\'\"\\(\=]/gi;
    var price = jQuery('.single_variation .price .amount').text();
    price = price.replace(re, "");
    //comma(count*price);
    jQuery('.select_total').text('₩'+comma(count*price));

}

//제품 총합계(세일)
function select_Total_sale(count){
    var re = /[ \{\}\[\]\/?.,;:|\)*~`!^\-_+┼<>@\#$₩%&\'\"\\(\=]/gi;
    var price = jQuery('.single_variation .price ins .amount').text();
    price = price.replace(re, "");
    //comma(count*price);
    jQuery('.select_total').text('₩'+comma(count*price));

}

//제품 총합계 천단위 컴마 찍기
function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

function onopen(i){ // 사업자등록번호 조회
    var url = "http://www.ftc.go.kr/info/bizinfo/communicationViewPopup.jsp?wrkr_no="+i;
    window.open(url, "communicationViewPopup", "width=750, height=700;");
}