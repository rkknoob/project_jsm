@extends('layouts.template.frontend')

<style type="text/css">
    @font-face {
        font-family:'Gotham';
        src: url({!! asset("fonts/Gotham/Gotham-Book.ttf") !!}) ;

    }
    #ju-container .ju-page-title {
        margin-top: 179px;
    }

    .order-wrap .frm {margin-top: 15px;}
    .order-wrap .tbl th,
    .order-wrap .tbl td {border-top: 1px solid #ccc;}
    .order-wrap .tbl th {padding: 8px 0 6px;background-color: #f4f4f4;color: #666;font-weight: normal;}
    .order-wrap .tbl td {padding: 15px 0;}
    .order-wrap .tbl td button {border: 0;text-indent: -9999px;display:inline-block;}
    .order-wrap .tbl td .close {width: 17px;height: 17px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h17_delete.gif) no-repeat 0 0;}
    .order-wrap .tbl td .del {width: 29px;height: 14px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h14_delete.gif) no-repeat 0 0;}
    .order-wrap .tbl td .mod {width: 29px;height: 14px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h14_mod.gif) no-repeat 0 0;}
    .order-wrap .tbl td .change {width: 49px;height: 14px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h14_change.gif) no-repeat 0 0;margin-top: 5px;}
    .order-wrap .pay-wrap {zoom: 1;position: relative;margin-top: 15px;}
    .order-wrap .pay-wrap:after {display: block;content: "";clear: both;}
    .order-wrap .pay-wrap .reg {width: 703px;margin-right: 10px;}
    .order-wrap .pay-wrap .reg button {border: 0;text-indent: -9999px;}
    .order-wrap .pay-wrap .reg .sect {zoom: 1;overflow: hidden;}
    .order-wrap .pay-wrap .reg .sect .deliv-info,
    .order-wrap .pay-wrap .reg .sect .pay-method {float: left;}
    .order-wrap .pay-wrap .reg .sect .deliv-info button.mod-deliv {position: absolute;top: 12px;left: 85px;width: 78px;height: 23px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h23_mod_deliv.gif) no-repeat 0 0;}
    .order-wrap .pay-wrap .reg .sect .deliv-info {position: relative;width: 465px;margin-right: 10px;}
    .order-wrap .pay-wrap .reg .sect .deliv-info .tbl2 {padding: 15px 0;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .sect .deliv-info .tbl2 em {color: #ff0000;}
    .order-wrap .pay-wrap .reg .sect .deliv-info .tbl2 th,
    .order-wrap .pay-wrap .reg .sect .deliv-info .tbl2 td {padding-top: 4px;letter-spacing: -1px;}
    .order-wrap .pay-wrap .reg .sect .deliv-info dl {zoom: 1;overflow: hidden;padding: 15px 0;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .sect .deliv-info dt,
    .order-wrap .pay-wrap .reg .sect .deliv-info dd {float: left;padding-top: 4px;}
    .order-wrap .pay-wrap .reg .sect .deliv-info dt {width: 100px;padding-left: 20px;font-weight: bold;}
    .order-wrap .pay-wrap .reg .sect .deliv-info dd {width: 345px;}
    .order-wrap .pay-wrap .reg .sect .deliv-info dd em {color: #ff0000;}
    .order-wrap .pay-wrap .reg .sect .pay-method {width: 228px;}
    .order-wrap .pay-wrap .reg .sect .pay-method ul {height: 154px;padding: 15px 0 15px 10px;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .sect .pay-method li {padding-top: 4px;font-weight: bold;}
    .order-wrap .pay-wrap .reg .orderer {position: relative;margin: 12px 15px 0 15px;}
    .order-wrap .pay-wrap .reg .orderer .name,
    .order-wrap .pay-wrap .reg .orderer button {display: inline-block;}
    .order-wrap .pay-wrap .reg .orderer .name {padding-left: 15px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/ico_user_h12.gif) no-repeat 0 45%;line-height: 23px;}
    .order-wrap .pay-wrap .reg .orderer button.input-request {width: 128px;height: 23px;margin-left: 5px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h23_input_request.gif) no-repeat 0 0;}
    .order-wrap .pay-wrap .reg .orderer .txt-area {margin-top: 8px;padding: 12px 0 12px 20px;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;background-color: #f4f4f4;}
    .order-wrap .pay-wrap .reg .orderer .txt-area textarea {width: 630px;height: 85px;}
    .order-wrap .pay-wrap .reg .orderer .cnt {display: block;margin: 5px 0 0 15px;}
    .order-wrap .pay-wrap .reg .deliv-select {margin-top: 25px;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc {zoom: 1;overflow: hidden;padding: 15px 0 15px 20px;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .sel,
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .dsc {float: left;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .sel {width: 462px;margin-top: 10px;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .sel dt {margin-top: 5px;font-weight: bold;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .sel dd {padding-left: 18px;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .dsc {width: 205px;padding: 5px 0 5px 15px;border-left: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .dsc dd {padding-left: 10px;}
    .order-wrap .pay-wrap .reg .deliv-select .sel-dsc .dsc dd.txt {margin-top: 5px;padding-left: 0;color: #666;font-size: 11px;line-height: 1.25;}
    .order-wrap .pay-wrap .reg .sect .request,
    .order-wrap .pay-wrap .reg .sect .company {float: left;margin-top: 25px;}
    .order-wrap .pay-wrap .reg .sect .request {width: 465px;margin-right: 10px;}
    .order-wrap .pay-wrap .reg .sect .request p {padding: 12px 0 12px 20px;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .sect .company {width: 228px;}
    .order-wrap .pay-wrap .reg .sect .company p {padding: 12px 0 12px 20px;border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .buy-benefit {margin-top: 15px;}
    .order-wrap .pay-wrap .reg .buy-benefit .price {zoom: 1;overflow: hidden;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li {float: left;position: relative;margin-right: -1px;width: 150px;padding: 12px 0 12px 20px;border: 1px solid #ccc;line-height: 1.75;letter-spacing: -1px;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li .num {font-size: 14px;font-weight: bold;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li.first {border-left: 0;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li.last {width: 171px;border-right: 0;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li .plus,
    .order-wrap .pay-wrap .reg .buy-benefit .price li .minus {z-index: 2;display: block;position: absolute;top: 18px;right: -16px;width: 32px;height: 32px;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li .plus {background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/ico_plus_h32.gif) no-repeat 0 0;}
    .order-wrap .pay-wrap .reg .buy-benefit .price li .minus {background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/ico_minus_h32.gif) no-repeat 0 0;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct {padding: 20px 0 20px 20px;background-color: #f4f4f4;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 {margin: 15px 0px;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 th,
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 td {padding-bottom: 8px;color: #666;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 th .txt-l {padding-left: 15px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/bul_sqr_h2.gif) no-repeat 5px 8px;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 th .txt-none {background: 0;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 td .txt {font-size: 11px;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 td strong {color: #000;}
    .order-wrap .pay-wrap .reg .buy-benefit .deduct .tbl2 td .txt-input {width: 142px;height: 19px;line-height: 19px;padding-left: 2px;margin-right: 5px;}
    .order-wrap .pay-wrap .res {position: absolute;top: 0;right: 0;width: 193px;padding: 0 20px 55px;border: 2px solid #000;text-align: center;background-color: #fff;}
    .order-wrap .pay-wrap .res h3 {padding: 14px 0;border-bottom: 1px solid #ccc;}
    .order-wrap .pay-wrap .res .total {margin-top: 35px;color: #000;font-size: 18px;font-weight: bold;}
    .order-wrap .pay-wrap .res .total em {color: #ff0000;font-family: Tahoma;font-size: 20px;}
    .order-wrap .pay-wrap .res .btn-c {margin-top: 30px;}
    .order-wrap .pay-ment {margin-top: 100px;text-align: center;}
    .order-wrap .pay-ment .text {padding-left: 80px;}
    .order-wrap .pay-ment .btns {margin-top: 40px;}

    #contentWrap .tbl .prd-amount {height: 40px; margin: 0 auto; }
    #contentWrap .tbl .prd-amount button.mod { margin-top: 5px; }
    #contentWrap .tbl .prd-amount .txt-input { width: 40px; padding-right: 2px; text-align: right; }

    .txt-r { text-align: right; }
    .txt-c { text-align: center; }
    .txt-l { text-align: left; }

    /* basket */
    #basket {position: relative;}
    #basket .hd h2 {padding-top: 8px;}
    #basket h3 {padding: 30px 0 0 20px;}
    #basket .btns {position: relative;margin-top: 65px;font-size: 0;line-height: 0;text-align: center;}
    #basket .btns img {margin-right: 6px;}
    #basket .tbl th,
    #basket .tbl td {border: 1px solid #d5d5d5;}
    #basket .tbl th {background-color: #f4f4f4;}
    #basket .tbl td {vertical-align: top;}
    #basket .tbl .mt-15 {margin-top: 15px;}
    #basket .tbl .prd-both {zoom: 1;overflow: hidden;padding-left: 15px;}
    #basket .tbl .prd-thumb,
    #basket .tbl .prd-info {float: left;}
    #basket .tbl .prd-info {width:410px}
    #basket .tbl .prd-thumb {margin-right: 15px;}
    #basket .tbl .prd-thumb img {width: 60px;height:60px;border: 1px solid #ccc;}
    #basket .tbl .prd-thumb label {display: inline-block;width: 20px;*width: 16px;}
    /*#basket .tbl .prd-info {width: 310px;*width: 300px;}*/
    #basket .tbl .opt-lst li {margin-top: 10px;padding-left: 8px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/bul_sqr_h2.gif) no-repeat 0 8px;}
    #basket .tbl .add-prd {margin-top: 15px;padding: 15px 0 0 20px;border-top: 1px solid #d5d5d5;}
    #basket .tbl .add-prd .opt-lst {margin-top: 4px;}
    #basket .tbl .add-prd .opt-lst li {margin-top: 2px;}
    #basket .layer-pop {z-index: 2;background-color: #fff;border: 1px solid #000;}
    #basket .layer-pop .lhd {position: relative;height: 44px;padding-left: 20px;background-color: #000;cursor:move}
    #basket .layer-pop .lhd h3 {padding: 0;color: #fff;font-family: Tahoma;font-size: 24px;line-height: 44px;}
    #basket .layer-pop .lhd .lclose {position: absolute;top: 10px;right: 20px;width: 22px;height: 22px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h22_close.gif) no-repeat 0 0;border: 0;text-indent: -9999px;}
    #basket .layer-pop .lcont {padding: 12px 18px 0;}
    #basket .layer-pop .lcont .prd-w {zoom: 1;overflow: hidden;}
    #basket .layer-pop .lcont .prd-w .thumb,
    #basket .layer-pop .lcont .prd-w .pinfo {float: left;}
    #basket .layer-pop .lcont .prd-w .thumb {width: 47px;margin-right: 14px;}
    #basket .layer-pop .lcont .prd-w .thumb img {width: 45px;height: 45px;border: 1px solid #ccc;}
    #basket .layer-pop .lcont .prd-w .pinfo {width: 360px;padding-top: 5px;}
    #basket .layer-pop .lcont .prd-w .pinfo .pname,
    #basket .layer-pop .lcont .prd-w .pinfo .price {font-weight: bold;}
    #basket .layer-pop .lcont .prd-w .pinfo .pname {width: 100%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
    #basket .layer-pop .lcont .prd-w .pinfo .price {color: #ed0000;}
    #basket .layer-pop .lcont .opt-sel {zoom: 1;position: relative;overflow-y: scroll;margin-top: 12px;padding: 4px 4px 0;background-color: #f4f4f4;}
    #basket .layer-pop .lcont .sect {margin-bottom: 4px;padding: 8px 10px;background-color: #fff;border: 1px solid #e1e1e1;}
    #basket .layer-pop .lcont .sect dl {zoom: 1;overflow: hidden;margin-top: 2px;padding: 14px 0 8px;background-color: #f4f4f4;}
    .lcont .sect dt,
    .lcont .sect dd {display: inline-block; *display:inline; *zoom:1; margin-bottom: 7px;}
    #basket .layer-pop .lcont .sect dt {width: 106px;padding-right: 8px;text-align: right;}
    #basket .layer-pop .lcont .sect .pti {color: #777;font-weight: bold;}
    #basket .layer-pop .lcont .sect .txt-input {width: 232px;height: 17px;line-height: 17px;padding-left: 4px;border: 1px solid #aaa;color: #888;}
    #basket .layer-pop .lcont .add-sel {margin-top: 12px;padding: 4px;background-color: #f4f4f4;}
    #basket .layer-pop .lcont .add-sel .sect {zoom: 1;position: relative;height: 94px;overflow-y: scroll;}
    #basket .layer-pop .lcont .add-sel .num {zoom: 1;overflow: hidden;padding: 10px 0 10px 10px;}
    #basket .layer-pop .lcont .add-sel .num dt,
    #basket .layer-pop .lcont .add-sel .num dd {float: left;}
    #basket .layer-pop .lcont .add-sel .num dt {width: 105px;color: #777;font-weight: bold;}
    #basket .layer-pop .lcont .add-sel .num dd {position: relative;width: 45px;}
    #basket .layer-pop .lcont .add-sel .num dd .txt-input {width: 32px;}
    #basket .layer-pop .lcont .opt-res {zoom: 1;position: relative;height: 86px;overflow-y: scroll;margin-top: 5px;padding: 8px;border: 1px solid #ddd;}

    #basket .layer-pop .lcont .prd-total {position: relative;height: 36px;line-height: 36px;margin-top: 15px;/*text-align: center;*/font-weight: bold;}
    #basket .layer-pop .lcont .prd-total .abs-price {position: absolute;top: 0;right: 0;color: #ff0000;font-size: 24px;font-weight: bold;}
    #basket .layer-pop .lcont .prd-btn {margin-top: 20px;text-align: center;}
    #basket .layer-pop .lcont .prd-btn button {width: 135px;height: 60px;padding-left: 25px;border: 0;color: #fff;font-family: Gulim;font-size: 24px;font-weight: bold;letter-spacing: -1px;}
    #basket .layer-pop .lcont .prd-btn .h60_change {background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/bg_btn_h60.gif) no-repeat 0 0;margin-right: 5px;}
    #basket .layer-pop .lcont .prd-btn .h60_cancel {background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/bg_btn_h60_right.jpg) no-repeat -116px 0px;line-height: 60px;padding-left:0;text-align:left;width:160px;}
    #basket .layer-pop .lcont .prd-btn .h60_cancel img{ float:left;}
    #basket #layer1 { position: absolute;top: 0;left:150px;width: 457px;padding-bottom: 30px; }
    #basket .tbl .prd-name { font-weight: bold;}
    #basket #layer1 div.sect input.basic_option {width: 230px;}
    /*#basket #layer2 { position: absolute;top: 0;left: 500px;width: 457px;padding-bottom: 30px; }*/
    .opt-res .amount {width:40px;}
    .opt-res .amount .txt-input{width: 19px;line-height: 19px;height: 19px;text-align: right;}
    .opt-res .amount .ctrl {position: relative;margin-left:3px;margin-top: 5px;width: 7px;height: 12px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_opt_cnt_bg.gif) no-repeat 0 0;}
    .opt-res .amount .ctrl a {position: absolute;width: 7px;height: 6px;text-indent: -9999px;cursor:pointer;}
    .opt-res .amount .ctrl .up {top: 0;left: 0;}
    .opt-res .amount .ctrl .dw {bottom: 0;left: 0;}

    .add-sel .amount {width:40px;}
    .add-sel .amount .txt-input{width: 19px;line-height: 19px;height: 19px;text-align: right;}
    .add-sel .amount .ctrl {position: relative;margin-left:40px;margin-top: -19px;width: 7px;height: 12px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_opt_cnt_bg.gif) no-repeat 0 0;}
    .add-sel .amount .ctrl a {position: absolute;width: 7px;height: 6px;text-indent: -9999px;cursor:pointer;}
    .add-sel .amount .ctrl .up {top: 0;left: 0;}
    .add-sel .amount .ctrl .dw {bottom: 0;left: 0;}

    .opt-res .price { text-align:right;width: 120px;margin-right: 8px;color: #000;font-size: 14px;font-weight: bold;text-align: right;line-height:23px;}
    .opt-res .delopt {width:15px;}
    .opt-res .delopt .delete {float:right;width: 12px;height: 13px;background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_opt_del_bg.gif) no-repeat 0 0;border: 0;text-indent: -9999px;}

    input.basic_option{line-height:18px;height:18px;}

    strike {text-decoration: line-through;}
    /*합계부분*/
    .table-calc { margin-top: 10px; }
    .table-calc tbody td { padding: 10px 0; font-weight: bold; }
    .table-calc .box1 {padding: 20px 10px;margin-top: 10px;border: 1px solid #d7dce0;background-color: #f0f4f7;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;}
    .table-calc .box1 li {margin: 10px 0;}
    .table-calc .prd_price {width: 150px;display: inline-block;}
    .table-calc .prd_txt {width: 400px;font-weight: normal;display: inline-block;}
    .table-calc .total-sub-tit {width: 150px;font-weight: normal;display: inline-block;}
    .table-calc .total-sub-val {width: 80px;display: inline-block;}

    .table { border-top: 1px!important; }
    .fa { color: #777; }
    .right { padding-bottom: 1%; }
    .table-calc { margin-top: 10px; width: 100%; }
    .tb-right { text-align: right; padding: 0 10px; }
    .table-calc .box1 {
        padding: 20px 10px;
        margin-top: 10px;
        border: 1px solid #d7dce0;
        background-color: #f0f4f7;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
    }
    #link1 { color:#333; }
    #link1:hover { color: #e51a92; }



</style>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM PRODUCT </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')
    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title"></div>
            <div id="content">
                <div id="cartWrap">
                    <dl class="loc-navi">
                        <dt class="blind">Current Page</dt>
                        <dd>
                            Home > Shopping Cart
                        </dd>
                    </dl>
                    <h2 class="tit-page">
                        <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/cart_page_tit.gif" alt="shopping cart" title="shopping cart" />
                    </h2>
                    <div id="basket" class="page-body order-wrap">
                        <h3 class="tit-cart">
                            <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/cart_fill_tit.gif" alt="Items in Your Shopping Cart" title="Items in Your Shopping Cart" />
                        </h3>
                        <div class="frm">
                            <form name="cart_form" action="">
                                <fieldset>
                                    <legend style="margin: 0px;border-bottom: none;">Shopping Cart Form</legend>
                                    <div class="table-Stat table-fill-prd tbl" style="border-bottom:0px;">
                                        <table class="table">
                                            <caption></caption>
                                            <colgroup>
                                                <col width="30">
                                                <col width="*">
                                                <col width="70">
                                                <col width="80">
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th><div class="txt-c"><input type="checkbox" checked onclick="makeshop.checkAllItem($(this));"></div></th>
                                                <th><div class="txt-c">Product information</div></th>
                                                <th><div class="txt-c">QTY</div></th>
                                                <th><div class="txt-c">Subtotal</div></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($cart))
                                                @foreach($cart as $item)
                                                  @if($item->options)
                                                      @foreach($item->options as $image)


                                                    <tr>
                                                        <td>
                                                            <div class="txt-c">
                                                                <input type="checkbox" class="chk-rdo" name="item_cart[]" checked value="83421">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="txt-l">
                                                                <div class="prd-both">
                                                                    <div class="prd-thumb">
                                                                        <a target="_blank" href="/Product/Detail/view/pid/1149/cid/85"><img src="{{$image}}" alt="Product Thumbnail" title="Product Thumbnail" /></a>
                                                                    </div>
                                                                    <div class="prd-info">
                                                                        <p class="prd-name" style="color:#000;">
                                                                            <a id="link1" target="_blank" href="/Product/Detail/view/pid/1149/cid/85" >{{$item->name}}</a></p>
                                                                        <!--<a href="javascript:;" onclick="makeshop.openModifyWindow(1149,76846);"><img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h23_order_add.gif" alt="Order Add/change"></a>-->
                                                                        <ul class="opt-lst" style="list-style-type: none;padding-left: 0px">
                                                                            <li>
                                                                                <strong>option:</strong>
                                                                                {{$item->qty}} ea
                                                                                /  <span style="">{{$item->price}} Bath</span>
                                                                                <!--  /  <span style="">46.26  USD</span>-->
                                                                                &nbsp;&nbsp;<button type="button" class="close" onclick="makeshop.delItem('item',83421);">delete</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td style="position:relative;border:0;border-bottom:1px solid #ccc;">
                                                            <div class="txt-c">
                                                                <div class="prd-amount">
                                                                    <input type="text" class="txt-input" id="qulity" value="{{$item->qty}}" readonly="" style="width: 46px;height: 22px;padding-right: 2px;text-align: right;">
                                                                    <button type="button" class="change" >Change</button>
                                                                </div>
                                                            </div>
                                                            <button type="button" style="position:absolute;bottom:24px;left:20px;" class="del" >Delete</button>
                                                        </td>
                                                        <td>
                                                            <div class="txt-c">
                                                                <span style="font-weight:bold;display:block;">{{$item->price}} Bath </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                      @endforeach
                                                  @endif
                                                @endforeach
                                            @else
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <table class="table-calc">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="tb-right">
                                                        <span class="total-sub-tit">Total Weight :</span>
                                                        <span class="total-sub-val"> xxx Kg </span>
                                                    </div>
                                                    <div class="tb-right">
                                                        <span class="total-sub-tit">Total Mileage :</span>
                                                        <span class="total-sub-val"> xxx  Bath </span>
                                                    </div>
                                                    <ul class="tb-right box1" style="list-style-type: none;">
                                                        <li>
                                                            <span class="prd_txt">Subtotal : </span>
                                                            <span class="prd_price"> {{$item->subtotal}} Bath</span>
                                                        </li>
                                                        <li>
                                                            <span class="prd_txt" style="font-weight:bold;font-size:15px"> All Total : </span>
                                                            <span class="prd_price" style="color:red;font-size:15px"> 32.00  Bath</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- 장바구니 알림 레이어 시작 -->
                                    <style>

                                        .cart_sale {width:auto; height:30px; border: 1px solid #d7dce0;   border-radius: 5px; -webkit-border-radius: 5px;  position:relative; top:0; left:0; margin:10px 0 10px 0;}
                                        .cart_sale ul {margin-right:30px; overflow:hidden;}
                                        .cart_sale ul .sale_text {float:left; width:30%; background-color:#000; height:30px; line-height:30px; color:#fff; text-align:center; font-size:12px;}
                                        .cart_sale ul .sale_text i {vertical-align:top; margin: 0 5px 0px 0;}
                                        .cart_sale ul .bar {float:right; width:70%; display:block;}
                                        .cart_sale ul .bar .gauge {background-color:#FFC000; width:135.11333333333%; height:30px;} /* 무료배송기준 */
                                        .cart_sale .sale_close {position:absolute; top:9px; right:11px; margin:0; font-weight:bold; cursor:pointer; font-family:Dotum, AppleGothic, Helvetica, sans-serif; font-size:11px; color:#000;}
                                        .cart_sale ul .bar .gauge span {position:absolute; top:7px; right:43px; color:#000; font-weight:bold; font-size:12px; }
                                        .cart_sale .sale_close img {vertical-align:top;}
                                        .cart_sale .fas {font: normal normal normal 12px/1 FontAwesome;}
                                    </style>

                                    <script>
                                        $(function(){
                                            $(".cart_sale ul .bar .gauge strong:contains('-')").text("0");
                                        });

                                        function cartsale_close(){
                                            $(".cart_sale").css("display","none");
                                        }
                                    </script>

                                    <div class="cart_sale">

                                        <ul style="padding-left: 0px;">
                                            <li class="sale_text">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>
														FREE SHIPPING
													</span>
                                            </li>
                                            <li class="bar">
                                                <div class="gauge">
										    			<span>
												    		left to $ <strong>-52.67</strong>  →
											    		</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="sale_close" onclick="cartsale_close();">X</div>
                                    </div>

                                    <div style='border:white solid 1px;padding:8px;'>
                                        <a id="link1" href="javascript:;" onclick="makeshop.batchDelete();" >Delete selected products</a>
                                    </div>

                                    <div class="title" id="demo">
                                        <h3 class="entry-title text-center">Customers also Loved</h3>
                                    </div>

                                    <div class="col-md-3">
                                        <a class="product_link_wrap" href="/product/detail/view/16">
                                            <img src="{!!asset('jsmbeauty/src/product/skincare/16/product.378.156316651385672.jpg')!!}" alt="product" style="width:100%;">
                                        </a>
                                        <div class="text-center prd-info">
                                            <div class="preview-box clear bold">
                                                <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                            </div>
                                            <h5>
                                                <a href="">
                                                    Artist Brush Hair Line
                                                </a>
                                            </h5>
                                            <p class="subname"></p>
                                            <strong class="price">
                                                    <span class="amount">
														<span>
												            42.00  USD
														</span>
                                                    </span>
                                            </strong>
                                        </div>
                                        <hr class="clear">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="product_link_wrap" href="/product/detail/view/16">
                                            <img src="{!!asset('jsmbeauty/src/product/skincare/16/product.378.156316651385672.jpg')!!}" alt="product" style="width:100%;">
                                        </a>
                                        <div class="text-center prd-info">
                                            <div class="preview-box clear bold">
                                                <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                            </div>
                                            <h5>
                                                <a href="">
                                                    Artist Brush Hair Line
                                                </a>
                                            </h5>
                                            <p class="subname"></p>
                                            <strong class="price">
                                                    <span class="amount">
														<span>
                                                            42.00  USD
                                                        </span>
                                                    </span>
                                            </strong>
                                        </div>
                                        <hr class="clear">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="product_link_wrap" href="/product/detail/view/16">
                                            <img src="{!!asset('jsmbeauty/src/product/skincare/16/product.378.156316651385672.jpg')!!}" alt="product" style="width:100%;">
                                        </a>
                                        <div class="text-center prd-info">
                                            <div class="preview-box clear bold">
                                                <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                            </div>
                                            <h5>
                                                <a href="">
                                                    Artist Brush Hair Line
                                                </a>
                                            </h5>
                                            <p class="subname"></p>
                                            <strong class="price">
                                                    <span class="amount">
														<span>
                                                            42.00  USD
                                                        </span>
                                                    </span>
                                            </strong>
                                        </div>
                                        <hr class="clear">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="product_link_wrap" href="/product/detail/view/16">
                                            <img src="{!!asset('jsmbeauty/src/product/skincare/16/product.378.156316651385672.jpg')!!}" alt="product" style="width:100%;">
                                        </a>
                                        <div class="text-center prd-info">
                                            <div class="preview-box clear bold">
                                                <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                            </div>
                                            <h5>
                                                <a href="">
                                                    Artist Brush Hair Line
                                                </a>
                                            </h5>
                                            <p class="subname"></p>
                                            <strong class="price">
                                                    <span class="amount">
                                                        <span>
                                                            42.00  USD
                                                        </span>
                                                    </span>
                                            </strong>
                                        </div>
                                        <hr class="clear">
                                    </div>
                                    <div class="col-md-3">
                                        <a class="product_link_wrap" href="/product/detail/view/16">
                                            <img src="{!!asset('jsmbeauty/src/product/skincare/16/product.378.156316651385672.jpg')!!}" alt="product" style="width:100%;">
                                        </a>
                                        <div class="text-center prd-info">
                                            <div class="preview-box clear bold">
                                                <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                            </div>
                                            <h5>
                                                <a href="">
                                                    Artist Brush Hair Line
                                                </a>
                                            </h5>
                                            <p class="subname"></p>
                                            <strong class="price">
                                                    <span class="amount">
														<span>
                                                            42.00  USD
                                                        </span>
                                                    </span>
                                            </strong>
                                        </div>
                                        <hr class="clear">
                                    </div>
                                    <script>
                                        $(function(){
                                            $(".cart_sale ul .bar .gauge strong:contains('-')").text("0");
                                        });
                                        function cartsale_close(){
                                            $(".cart_sale").css("display","none");
                                        }
                                    </script>

                                </fieldset>
                            </form>
                            <div class="row">
                                <div class="btns">
                                    <a href="Payment/Order/pgform" onclick="makeshop.buyItem($('form').has(this));"><img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h60_order.gif" alt="Order"></a>
                                    <a href="/"><img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/h60_continue_shopping.gif" alt="Continue Shopping"></a>
                                </div>
                                <div class="tb-left box  p-10">
                                    <ul class=opt-lst style="color: red; margin-top: 20px;"></ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- .page-body -->
                </div><!-- #cartWrap -->
            </div><!-- #content -->
        </div><!-- #contentWrap -->
    </div><!-- #contentWrapper-->

    <!-- //content -->

@endsection
