@extends('layouts.template.frontend')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<style type="text/css">
    /* BASIC css start */
    #passimg h1 { margin:0 0 35px !important; }
    #passimg h1 a { background-color: #525c6a !important; }
    #passimg h1 a img { vertical-align:top; }
    .pagination>li>a.first i ,
    .pagination>li>a.end i { font-size:11px; }
    #bbsData .table>tbody>tr>td a { color:#333; }
    .btn-group .cart { display:block !important; }
    /* BASIC css end */
    #quick_view #quickWrapper div,#quick_view2 #quickWrapper div{height:auto !important;}
    .bbs-hd .link {text-align: center;font-size: 12px;line-height: normal;}
    .bbs-hd{display:none}

    /* Order Sheet Page */
    #order .width150 { width: 150px!important; }
    #order .order-table{ width: 100%!important; }
    .sub_nav { height: unset!important; }
    #contentWrap { position: relative; width: 1152px!important; margin: 0 auto!important; padding: 50px 6px!important; }
    /* a:hover { color: #e51a92; text-decoration: underline; } */
    .box1 { border: transparent!important;  background-color: transparent!important; }
    .prd_price{ width: 45px!important;}
    input[type="text"], input[type="password"] {
        box-sizing: content-box;
        font-size: 14px;
    }
    p {
        margin: 0 0 11.5px!important;
    }
    @media screen and (max-width: 1024px) {
        #contentWrap {
            position: relative;
            width: 900px !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }
    }
    #content { position: relative; overflow: hidden; width: auto; float: none; }
    .MS_input_txt {
        padding: 2px 0 0 2px!important;
        height: 18px!important;
        line-height: 17px!important;
        border: 1px solid #dcdcdc!important;
    }
    .tb_style input, .tb_style textarea {
        border: 1px solid #dcdcdc!important;
        padding-left: 10px!important;
    }





</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM Store </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')

    <div id="contentWrapper" style="margin-top: 105px;">
        <div id="contentWrap">
            <div id="content">
                <div id="order">
                    <dl class="loc-navi">
                        <dt class="blind">Current Page</dt>
                        <dd>
                            <a href="/" style="display: contents;">home</a> &gt; Write Purchase Order
                        </dd>
                    </dl>
                    <div class="page_tit sub_nav">
                        <h2 class="tit">ORDER SHEET</h2>
                        <span class="msg">After you fill in the user information, please press the
						<em>Order</em> button below.
					</span>
                    </div>
                    <div class="page-body">
                        <!--<div class="page_stit"><h3 class="tit">ITEMS TO BE ORDERED</h3></div>-->
                        <div class="table-cart table-order-prd" style="border-bottom:none;">
                            <table summary="Name of item, Quantity, Price, Mileage" class="order-table tb_style tb_type01" id="order-product" style="width:100%;">
                                <!-- <caption>Items to be Ordered</caption> -->
                                <colgroup>
                                    <col width="70">
                                    <col width="*">
                                    <col width="75">
                                    <col width="70">
                                    <col width="50">
                                    <col width="90">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th scope="col" colspan="4" style="text-align: inherit;"><div>Product information</div></th>
                                    <th scope="col"><div>QTY</div></th>
                                    <th scope="col"><div>Subtotal</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="padding:10px 0 10px 0;" colspan="4">
                                        <div class="product-img">
                                            <img src="https://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/35/T/product.396.156695889314815.1203.5C.120.120.jpg" width="40">
                                        </div>
                                        <div class="tb-left product-info">
                                            <a href="">
                                                <font style="font-weight: bold;">Essential Mool Micro Fitting Mist 55ml Duo Set</font>
                                            </a>
                                            <br>
                                            option : FittingMist55mlDuoSet / 37.45 USD
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tb-center" id="83422_qty">1</div>
                                    </td>
                                    <td>
                                        <div class="tb-center tb-bold">37.45 USD</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="payment-info" style="width:100%;">
                                <tbody>
                                <tr>
                                    <td colspan="6">
                                        <div class="tb-right">
                                            Total Weight : <font class="total_val"><span id="total_weight">0.66</span> Kg</font>
                                            | Total Mileage : <font class="total_val">0.75  USD</font>
                                        </div>
                                        <ul class="tb-right box1" >
                                            <li>
                                                <span class="prd_txt">Subtotal : </span>
                                                <span class="prd_price"> 37.45 </span>
                                                <span class="prd_curr"> USD</span>
                                            </li>
                                            <li>
                                                <span class="prd_txt"> Shipping : </span>
                                                <span class="prd_price" id="delivery_fee">32.63</span>
                                                <span class="prd_curr"> USD</span>
                                            </li>
                                            <li style="margin-top:10px;">
                                                <span class="prd_txt" style="font-weight:bold;font-size:15px"> All Total : </span>
                                                <span class="prd_price price" id="total_all_price" style="color:red;font-size:15px;font-weight:bold;width:50px!important;">70.08</span>
                                                <span class="prd_curr" style="color:red;font-size:15px;font-weight:bold;"> USD</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody
                                ></table>
                        </div>
                        <!-- .table-order-prd -->
                        <form name="accfrm" id="oform" method="post" action="/Payment/Secure/pgresult">
                            <script type="text/javascript">
                                $(function () {
                                    makeshop.mileage = {
                                        available_cmoney : '0.00'
                                        ,available_smoney : '0.00'
                                        ,min_usable_smoney : '30'
                                        ,max_usable_smoney : '50'
                                    };
                                    //	makeshop.set_exchange({"standard_currency":"USD","base_currency":"KRW","system_currency":"KRW","money_unit":{"system":"\uffe6","base":"\uffe6","stand":"\uff04","refer":null,"per_base_currency":"1","pre_stand":null,"pre_refer":null,"post_stand":" USD","post_refer":" "},"money_unit_cnt":{"base":0,"stand":2,"refer":2},"rate_code":{"base":"KRW2KRW","stand":"USD2KRW","refer":"USD2"},"exchange":{"rate":{"stand":"1089.40","refer":0},"margin":{"stand":0}}});
                                    //  makeshop.set_delivery_info ({"uid":"jsmbeautyEN","tid":24900,"total_pdt_price":37.45,"total_weight":0.662,"total_qty":1,"weight_unit":"Kg"});
                                    makeshop.init({
                                        uid : 'jsmbeautyEN'
                                        ,tid : '24900'
                                        ,total_pdt_price : '37.45'
                                        ,total_weight : '0.662'
                                        ,total_qty : '1'
                                        ,weight_unit : 'Kg'
                                        ,exchange : {"standard_currency":"USD","base_currency":"KRW","system_currency":"KRW","money_unit":{"system":"\uffe6","base":"\uffe6","stand":"\uff04","refer":null,"per_base_currency":"1","pre_stand":null,"pre_refer":null,"post_stand":" USD","post_refer":" "},"money_unit_cnt":{"base":0,"stand":2,"refer":2},"rate_code":{"base":"KRW2KRW","stand":"USD2KRW","refer":"USD2"},"exchange":{"rate":{"stand":"1089.40","refer":0},"margin":{"stand":0}}}
                                    });
                                });
                            </script>


                            <fieldset>
                                <legend>주문 폼</legend>
                                <div class="page_stit"><h3 class="tit">USER INFORMATION</h3></div>
                                <div class="table-order-info table-user">
                                    <table summary="Name, E-mail address, phone number" class="order-table tb_style tb_type04">
                                        <!-- <caption>User Information</caption> -->
                                        <colgroup>
                                            <col width="140">
                                            <col width="240">
                                            <col width="140">
                                            <col width="*">
                                        </colgroup>
                                        <tbody>
                                        <tr class="nbg">
                                            <th scope="row"><div class="tb-right">First name</div></th>
                                            <td>
                                                <div class="tb-left">
                                                    <input type="text" value="Sujittra" name="buyer_name_1" class="MS_input_txt txt-input2 width150" maxlength="16">
                                                </div>
                                            </td>
                                            <th scope="row"><div class="tb-right">Last name</div></th>
                                            <td>
                                                <div class="tb-left">
                                                    <input type="text" value="Wauwai" name="buyer_name_2" class="MS_input_txt txt-input2 width150" maxlength="16">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">E-mail address</div></th>
                                            <td colspan="3">
                                                <div class="tb-left" style="float:left;padding-right:15px">
                                                    <input type="text" value="sujittra.adev@gmail.com" name="email" class="MS_input_txt txt-input2 width150" maxlength="65">

                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page_stit">
                                    <h3 class="tit">DELIVERY ADDRESS INFO</h3>
                                    <ul class="ad_choice" style="list-style-type: none;">
                                        <li><input type="radio" name="input_addr" value="default" checked="checked">Default address</li>
                                        <li><input type="radio" name="input_addr" value="last">Recent address</li>
                                        <li><input type="radio" name="input_addr" value="new">New address</li>
                                    </ul>
                                    <a href="javascript:;" onclick="makeshop.commPopupOpen('/Popup/address','',750,540);" class="ad_pop">Address</a>
                                </div>
                                <div class="table-order-info">
                                    <table summary="Name, Phone Number, Mobile Phone Number, Address, Order Message" class="order-table tb_style tb_type04">
                                        <caption>배송지 정보</caption>
                                        <colgroup>
                                            <col width="140">
                                            <col width="240">
                                            <col width="140">
                                            <col width="*">
                                        </colgroup>
                                        <tbody>
                                        <tr class="nbg">
                                            <th scope="row"><div class="tb-right">First name</div></th>
                                            <td>
                                                <div class="tb-left">
                                                    <input type="text" value="Sujittra" name="r_name_1" class="MS_input_txt" maxlength="16">
                                                </div>
                                            </td>
                                            <th scope="row"><div class="tb-right">Last name</div></th>
                                            <td>
                                                <div class="tb-left">
                                                    <input type="text" value="Wauwai" name="r_name_2" class="MS_input_txt" maxlength="16">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">Street address</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <input type="text" value="" name="r_addr1" style="width: 270px;" class="MS_input_txt" maxlength="80">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">City</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <input type="text" value="" name="r_addr2" style="width: 130px;" class="MS_input_txt" maxlength="80">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">State / Province</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <input type="text" value="" name="r_addr3" style="width: 130px;" class="MS_input_txt" maxlength="80">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">Zip code</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <input type="text" size="10" value="" name="r_key" class="MS_input_txt" maxlength="10">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row"><div class="tb-right">Country</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <select name="r_country_select" style="width:150px;float:left;padding: 0px 5px; height: 19px;" class="MS_select">
                                                        <option value="AF|+93" countrycode="1"> Afghanistan +93 </option>
                                                        <option value="AL|+355" countrycode="2"> Albania +355 </option>
                                                        <option value="DZ|+213" countrycode="3"> Algeria +213 </option>
                                                        <option value="AS|+1684" countrycode="4"> American Samoa +1684 </option>
                                                    </select>
                                                    <input class="MS_input_txt" maxlength="14" size="16" value="" id="r_tel" name="r_tel" style="margin-left: 5px;">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">Mobile Phone Number</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <select id="r_mobile_country" name="r_mobile_country" style="width:150px;float:left;margin:1px 5px 0 0; padding: 0px 5px; height: 19px;" class="MS_select">
                                                        <option value="AF|+93" countrycode="1" selected="selected">Afghanistan +93</option>
                                                        <option value="AL|+355" countrycode="2"> Albania +355 </option>
                                                        <option value="DZ|+213" countrycode="3"> Algeria +213 </option>
                                                        <option value="AS|+1684" countrycode="4"> American Samoa +1684 </option>
                                                        <option value="AD|+376" countrycode="5"> Andorra +376 </option>
                                                    </select>
                                                    <input class="MS_input_txt" maxlength="14" size="16" value="" id="r_mobile" name="r_mobile">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">E-mail address</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <input type="text" value="" name="r_email" class="MS_input_txt" style="width: 270px;" maxlength="65">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="tb-right">
                                                    Order Message
                                                    <em class="d-block">(Within 100 characters)</em>
                                                </div>
                                            </th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <textarea class="MS_textarea" maxlength="250" name="delivery_msg" rows="5" cols="90%"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="bordernone default_save">
                                                <label class="msg"><input type="checkbox" name="set_default_address" value="Y" checked="checked"> Set as default address.</label>
                                                <input type="hidden" name="addr_idx" value="">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <script>
                                    var address_count = 0;
                                    $(function(){
                                        $('input[name=set_default_address]').on('click', function(){
                                            if ($(this).is(':checked'))
                                            {
                                                if (address_count > 19 && $('input[name=addr_idx]').val().trim() == '')
                                                {
                                                    alert(LANG.NO_MORE_ADD);
                                                    $("input[name=set_default_address]").prop("checked", false);
                                                    return false;
                                                }
                                            }
                                        });
                                    });
                                    $('input[name=r_key]').bind('change',function(){
                                        makeshop.changedelivery();
                                    });
                                    $('input[name=r_key2]').bind('change',function(){
                                        makeshop.changedelivery();
                                    });
                                    function changedelivery(){
                                        makeshop.changedelivery();
                                    }
                                </script>

                                <input type="radio" name="delivery_company" value="MAKESHOP" checked="" style="display:none;">
                                <style type="text/css">
                                    #agree_div p font {font-size:12px;}
                                </style>
                                <div class="page_stit"><h3 class="tit">Payment Method</h3></div>
                                <div class="table-order-info" id="payment_method_box"><table class="order-table paymethod tb_style tb_type04">
                                        <!-- <caption>method of payment</caption> -->
                                        <colgroup>
                                            <col width="140">
                                            <col width="">
                                        </colgroup>
                                        <tbody>
                                        <tr style="border-top: none;">
                                            <th scope="row">
                                                <div class="tb-left">
                                                    <label><input type="radio" name="payment_method" class="payment_method" value="EXIMBAY"> EXIMBAY </label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="tb-left">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/visa.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/mastercard.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/jcb.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/american_express.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/unionpay.png">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="tb-left">
                                                    <label><input type="radio" name="payment_method" class="payment_method" value="PAYPAL" checked=""> PAYPAL </label>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="tb-left">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/visa.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/mastercard.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/discover.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/american_express.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/paypal.png">
                                                    <img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Payment/Order/jcb.png">
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="order_summary">
                                    <!--/비회원 분기처리/-->
                                    <div class="page_stit"><h3 class="tit">Order Summary</h3></div>
                                    <div class="order_summary_con">

                                        <div class="table-order-info summary_info" style="padding: 14px 0px;">
                                            <!--/if_link_coupon/-->
                                            <table summary="Name, E-mail address, phone number" class="order-table tb_style tb_type04">
                                                <!-- <caption>User Information</caption> -->
                                                <colgroup>
                                                    <col width="140">
                                                    <col width="*">
                                                </colgroup>
                                                <tbody>
                                                <!--/비회원 분기처리/-->
                                                <tr>
                                                    <th scope="row"><div class="tb-right">Coupon Use</div></th>
                                                    <td>
                                                        <div class="tb-left">
                                                            <p class="coupon_text">
                                                                If you use your coupons, certain benefits related to discounts or mileage cannot be provided.
                                                            </p>
                                                            <p class="coupon_select">
                                                                (Available coupons : 1)
                                                                <input type="hidden" name="coupon_number" class="MS_input_txt" readonly="">
                                                                <a href="javascript:;" onclick="makeshop.popup_coupon('/Event/Coupon/apply/tid/24900', 'apply', 830, 600);" class="btn_style s_smin type08">Coupon Selection</a>
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><div class="tb-right">Mileage Use</div></th>
                                                    <td>
                                                        <div class="tb-left">
                                                            <input type="text" size="10" name="s_mileage" class="MS_input_txt" onkeyup="makeshop.num_check_number(this);makeshop.set_all_price_field();">  USD
                                                            <p>(Current Mileage : 0.00  USD) </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><div class="tb-right">Deposit Use</div></th>
                                                    <td>
                                                        <div class="tb-left">
                                                            <input type="text" size="10" name="c_mileage" class="MS_input_txt" onkeyup="makeshop.num_check_number(this);makeshop.set_all_price_field();">  USD
                                                            <p>(Current Deposit : 0.00  USD) </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--/비회원 분기처리/-->
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="total_info">
                                            <div style="zoom: 1; overflow: hidden;">
                                                <div class="box">
										<span id="btn_payment">
											<a href="javascript:;" onclick="makeshop.call_pg_module(document.accfrm);" class="btn_style s_mid type01 hover">Place Order</a>
                                            <!-- <a href="/"><img src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_h36_order_cancel.gif" alt="Order Cancellation" title="Order Cancellation" /></a> -->
										</span>
                                                    <span id="btn_refresh" style="display:none;">
											<a href="javascript:;" onclick="window.location.reload();" class="btn_style s_mid type01 hover">Refresh</a>
										</span>
                                                    <iframe id="HIDDEN_PROCESS" name="HIDDEN_PROCESS" style="display:none"></iframe>
                                                </div>
                                            </div>
                                            <dl>
                                                <dt><strong>All Total : </strong></dt>
                                                <dd>
                                                    <strong>
                                                        <span id="price_view">70.08</span>  USD
                                                    </strong>
                                                    <div id="price_view_ex" style="color:red;display:none;">
                                                        (As a payment, KRW  <span id="total_all_price_ex">84,769</span> ￦)
                                                    </div>
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>Subtotal : </dt>
                                                <dd>
                                                    <span class="total_pdt_price">37.45</span>  USD
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>Shipping : </dt>
                                                <dd>
                                                    <span class="delivery_fee">32.63</span>  USD
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>Coupon Discounts :</dt>
                                                <dd>
                                                    - <span class="dc_money">0</span>  USD
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>Mileage : </dt>
                                                <dd>
                                                    - <span class="smoney">0.00</span>  USD
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt>Deposit : </dt>
                                                <dd>
                                                    - <span class="cmoney">0.00</span>  USD
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div><!-- .page-body -->
                    <div id="bindBankModal" class="layer-pop" style="width: 600px; background-color: #ffffff;z-index: 10;display:none;">
                        <form name="frm" method="post" action="" onsubmit="return false" style="margin: 0 0 0 0; padding: 0 0 0 0;">
                            <div class="lhd">
                                <h3>Methods of Payment</h3>
                                <a href="JavaScript:;" class="bindCloseBank"><button type="button" class="lclose">x</button></a>
                            </div>
                            <div class="lcont">
                                <div class="prd-w">
                                    <div class="pinfo">
                                        <p class="pname">After selecting a method of payment, then press the pay button below.</p>
                                    </div>
                                </div>
                                <div class="sect">
                                    <p class="pti" style="text-align:left">wire transfer</p>
                                    <p class="pti" style="text-align:right">Total <span id="layer_price_view">70.08</span>  USD</p>
                                    <dl>
                                        <dt>Deposit account :  </dt>
                                        <dd>
                                            <select name="bank_name" size="1" style="font-size:9pt;width:410px;">
                                                <option value="">Select a deposit  account (Must be deposited from the purchaser's name)</option>
                                            </select>
                                        </dd>
                                    </dl>
                                    <div class="pinfo">
                                        <p class="pname" style="margin-top:10px;">※ Please select a deposit account., then click the [Pay] button below, and deposit through visiting bank or internet banking.</p>
                                    </div>
                                </div>
                                <div class="prd-btn">
                                    <a href="JavaScript:;" class="bindCheckBank"><button type="button" class="btn_style s_min type01 hover">PAY</button></a>
                                    <a href="JavaScript:;" class="bindCloseBank"><button type="button" class="btn_style s_min type03 hover">CANCEL</button></a>
                                </div>
                            </div>
                        </form>
                    </div><!-- #bindBankModal -->
                    <div id="bindBOAModal" class="layer-pop" style="width: 600px; background-color: #ffffff;z-index: 10;display:none;">
                        <form name="frm_boa" method="post" action="" onsubmit="return false" style="margin: 0 0 0 0; padding: 0 0 0 0;">
                            <div class="lhd">
                                <h3>Methods of Payment</h3>
                                <a href="JavaScript:;" class="bindCloseBOA"><button type="button" class="lclose">x</button></a>
                            </div>
                            <div class="lcont">
                                <div class="prd-w">
                                </div>
                                <div class="sect">
                                    <p class="pti" style="text-align:right">Total <span id="layer_price_view">70.08</span>  USD</p>
                                    <table summary="Name, E-mail address, phone number">
                                        <caption>Billing Information</caption>
                                        <colgroup>
                                            <col width="180">
                                            <col width="300">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <th scope="row"><div class="tb-right">Card number</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <input type="text" value="" name="cardnum" class="MS_input_txt" onkeydown="makeshop.isNum();">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div class="tb-right">Expire Date</div></th>
                                            <td colspan="3">
                                                <div class="tb-left">
                                                    <select name="exp_m" class="MS_select">
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                    /
                                                    <select name="exp_y" class="MS_select">
                                                        <option value="19">2019</option>
                                                        <option value="20">2020</option>
                                                        <option value="21">2021</option>
                                                        <option value="22">2022</option>
                                                        <option value="23">2023</option>
                                                        <option value="24">2024</option>
                                                        <option value="25">2025</option>
                                                        <option value="26">2026</option>
                                                        <option value="27">2027</option>
                                                        <option value="28">2028</option>
                                                        <option value="29">2029</option>
                                                        <option value="30">2030</option>
                                                        <option value="31">2031</option>
                                                        <option value="32">2032</option>
                                                        <option value="33">2033</option>
                                                        <option value="34">2034</option>
                                                        <option value="35">2035</option>
                                                        <option value="36">2036</option>
                                                        <option value="37">2037</option>
                                                        <option value="38">2038</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="prd-btn">
                                    <a href="JavaScript:;" class="bindCheckBOA"><button type="button" class="btn_style s_min type01 hover">PAY</button></a>
                                    <a href="JavaScript:;" class="bindCloseBOA"><button type="button" class="btn_style s_min type03 hover">CANCEL</button></a>
                                </div>
                            </div>
                        </form>
                    </div><!-- #bindBOAModal -->
                </div><!-- #order -->
            </div><!-- #content -->
        </div><!-- #contentWrap -->
    </div>

@endsection