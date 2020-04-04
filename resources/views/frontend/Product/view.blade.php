@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

hr {
    margin-top: 23px;
    margin-bottom: 23px;
    border: 0;
    border-top: 1px solid #f0f0f0;
}

.description {

    padding-top: 50px;
    margin: auto;

}

.prt {
    font-size: 20px;

}

/* styles unrelated to zoom */
* {
    border: 0;
    margin: 0;
    padding: 0;
}

/* these styles are for the demo, but are not required for the plugin */
.zoom {
    display: inline-block;
    position: relative;
}

/* magnifying glass icon */
.zoom:after {
    content: '';
    display: block;
    width: 100px;
    height: 100px;
    position: absolute;
    top: 0;
    right: 0;
}

.zoom img {
    display: block;
}

.zoom img::selection {
    background-color: transparent;
}

.like {
    animation: like-gif steps(28) 1s infinite both;
}

@keyframes like-gif {
    0% {
        background-position: 0%;
    }

    100% {
        background-position: 100%;
    }
}

.swap-on-hover {
    position: relative;
    margin: 0 auto;
    max-width: 400px;
}

.swap-on-hover img {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    width: 400px;
    height: 400px;
}

.swap-on-hover .swap-on-hover__front-image {
    z-index: 1;
    transition: opacity .5s linear;
    cursor: pointer;
    position: relative;
}

.swap-on-hover:hover>.swap-on-hover__front-image {
    opacity: 0;
}

#box-amount {
    zoom: 1;
    margin-bottom: 0px;
    overflow: hidden;
    padding: 8px 15px;
    border-width: 1px 1px 1px 1px;
    border-style: solid;
    border-color: #f0f0f0;
}

.name-amount {
    /* float: left; */
    font-size: 15px;
    display: inline-block;
    vertical-align: middle;
    padding-top: 6px;
}

.txt-input {
    width: 40px;
    height: 35px;
    line-height: 35px;
    padding-right: 12px;
    text-align: right;
    border: 1px solid #ccc;
    border-radius: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.ctrl {
    position: absolute;
    top: 0;
    right: 0;
    width: 20px;
}

.arrow {
    display: block;
    height: 16px;
    box-sizing: content-box;
    line-height: 17px;
    font-size: 0;
    text-align: center;
    border: 1px solid #ccc;
    border-left: none;
}

.up {
    top: 0;
    left: 0;
    border-bottom: none;
}

dt {
    width: 210px;
    word-break: break-all;
    margin-right: 4px;
}

.price {
    width: 170px;
    margin-right: 8px;
    color: #000;
    /* font-size: 14px; */
    font-weight: bold;
    text-align: right;
    padding-top: 6px;
}

.delete {
    width: 12px;
    height: 13px;
    background: url(//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_opt_del_bg.gif) no-repeat 0 0;
    border: 0;
    text-indent: -9999px;
    display: block;
    margin-top: 10px;
}

.ctrl {
    position: absolute;
    top: 0;
    right: 0;
    width: 20px;
}

.prd-info .prd-total {
    overflow: hidden;
    border-top: 1px solid #f0f0f0;
    padding-top: 25px;
    text-align: right;
}

.prd-info .prd-total .abs-price {
    display: inline-block;
    font-size: 25px;
    color: #e51a92;
    padding-left: 12px;
    font-weight: bold;
}

.prd-info .prd-total .total-text {
    display: inline-block;
    font-size: 14px;
}

.abs-price {
    display: inline-block;
    font-size: 20px;
    color: #e51a92;
    padding-left: 12px;
    font-weight: bold;
}

#shadowbox {
    position: fixed;
    z-index: 998;
    height: 100%;
    width: 100%;
}

#banner {
    position: fixed;
    z-index: 999;
    top: 100px;
    left: 50px;
    height: 300px;
    width: 342px;
    background: #0d0d0d;
}

#close {
    position: absolute;
    top: 0px;
    right: 0px;
    font-family: Arial, Helvetica;
    font-size: 14px;
    color: #f4524d;
    cursor: pointer;
    font-weight: bold;
}

.rating {
    display: inline-block;
    position: relative;
    height: 15px;
    line-height: 50px;
    font-size: 25px;
}

.rating label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    cursor: pointer;
}

.rating label:last-child {
    position: static;
}

.rating label:nth-child(1) {
    z-index: 5;
}

.rating label:nth-child(2) {
    z-index: 4;
}

.rating label:nth-child(3) {
    z-index: 3;
}

.rating label:nth-child(4) {
    z-index: 2;
}

.rating label:nth-child(5) {
    z-index: 1;
}

.rating label input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.rating label .icon {
    float: left;
    color: transparent;
}

.rating label:last-child .icon {
    color: #000;
}

.rating:not(:hover) label input:checked~.icon,
.rating:hover label:hover input~.icon {
    color: #e51a92;
}

.rating label input:focus:not(:checked)~.icon:last-child {
    color: #000;
    text-shadow: 0 0 5px #09f;
}

.txt-qty {
    width: 40px;
    height: 35px;
    line-height: 35px;
    padding-right: 12px;
    text-align: right;
    border: 1px solid #ccc;
    border-radius: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px;
    }
    .distance {
        padding-bottom: 6px;
    }
}
</style>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM Product </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
@php
$locale = session()->get('locale');
@endphp
@section('content')
<!-- pop-up -->
<!-- <div id="banner" style="z-index: 1562207196; position: absolute; top: 0px; left: 0px; width: 300px; height: 321px; background-color: white;">
        <img src="https://jsmbeauty.img18.kr/global_jsm/img/pop_up_01.jpg">
        <div id="close"><img border="0" src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Layout/img/btn_popup_close.gif" style="margin: 0px 6px -2px 2px;"></div>
    </div> -->
<!-- pop-up -->

<div id="ju-container">
    <!-- contents -->
    <div id="ju-content" class="container">
        @if($category_pic!="")
        <div class="col-md-12" style="margin-top: 9.5%; padding:0;margin-bottom: 3%;" hidden>
            <img src="/public/category/{{$category_pic}}" />
        </div>
        @endif
        <div class="ju-page-title"></div>
        <h2 class="product-category-title text-gotham">
            {{$category_name}}

        </h2>
        <!-- main -->
        <h1 class="product-title detail-gotham ">
            {{$product_name}}

        </h1>


        <input type="hidden" name="val_option" id="val_option" value="">
        <input type="hidden" name="pic" id="pic" value="{{$img_product}}">

        <main class="shopdetail">
            <section class="shopdetailInfo">
                <div class="row">

                    <div class="col-md-6">
                        <div class="shopdetailInfoTop">
                            <div class="row">
                                <div class="col-12">

                                    <figure class="swap-on-hover" onmouseover="offHover();">
                                        <img id='menuImg' src='{{ url('/public/product/'.$img_product) }}'
                                            class="swap-on-hover__front-image" />
                                        <img class="swap-on-hover__back-image"
                                            src='{{ url('/public/product/'.$img_product_zoom) }}' />
                                    </figure>
                                    <br>
                                </div>

                                @if($display_type == 'Y' )
                                <div class="col-12">
                                    @foreach(array_chunk($product, 10) as $row)
                                    <div class="row" style="padding:0px 10px;">
                                        <div style="display: flex; justify-content: center;">

                                            @foreach($row as $products)
                                            @if($products['img_color']!="")
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock"
                                                style="padding:0px 5px;">
                                                <img src="/public/color/{{$products['img_color']}}"
                                                    onmouseover="onHover({{ $products['id'] }});" />
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        <br>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="description">
                            <div class="prd-info">
                                <div class="prd-prd-price">
                                    <div class="row distance" style="margin-bottom: 5%; ">
                                        <div class="col-md-12 col-xs-12 col-sm-12">
                                            <form class="rating">
                                                <label>
                                                    <input type="radio" name="stars" value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="stars" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </form>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" style="margin-bottom: 5%;">
                                        <div class="test">

                                            <div class="col-md-3 col-xs-6 prt"><strong>Sales Price:</strong></div>
                                            <div class="col-md-6 col-xs-6 prt">
                                                <strong>{{ number_format($product_price, 2) }} Baht</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                    <div class="row" hidden>
                                        <div class="col-md-3 col-xs-6">Mileage:</div>
                                        <div class="col-md-3 col-xs-6">1.67 Baht</div>
                                    </div>
                                    <div class="row" margin-top: 5%>
                                        @if (isset($product))
                                        <div class="col-md-3 col-xs-6">OPTION :</div>
                                        <div class="col-md-6 col-xs-6">
                                            <select id="option_product" name="fruit" class='basic_option'
                                                style="width: 180px" onchange="changeFunc(value);">
                                                <option selected="true" disabled="disabled">Select Option</option>
                                                @foreach($product as $products)
                                                <option value="{{$products['id']}}">
                                                    {{$products['name_en']}}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @else
                                        <div class="col-md-3 col-xs-6">OPTION :</div>
                                        <div class="col-md-3 col-xs-6">
                                        </div>
                                        @endif
                                    </div>
                                    <!--
                                        <div class="row" margin-top: 5%>
                                            @if (isset($product))
                                        <div class="col-md-3 col-xs-6">OPTION :</div>
                                        <div class="col-md-6 col-xs-6">
                                            <select id="option_product" name="fruit" class='basic_option' style="width: 180px" onchange="changeFunc(value);">
                                                <option selected="true" disabled="disabled">Select Option</option>
@foreach($product as $products)
                                            <option value="{{$products['id']}}">
                                                                {{$products['name_en']}}
                                                </option>
@endforeach
                                            </select>

                                        </div>
@else
                                        <div class="col-md-3 col-xs-6">OPTION :</div>
                                        <div class="col-md-3 col-xs-6">
                                        </div>
@endif
                                        </div>
                                        -->
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" id="total" class="form-control" value="0">
                            <input type="hidden" id="item_price" class="form-control" value="{{$product_price}}">


                            <div class="row" margin-top: 5%>
                                <div class="col-md-8 col-xs-6" style="line-height: 2.8;">
                                    <p class="total-text text-right">Total Purchase Amount:</p>

                                </div>
                                <div class="col-md-4 col-xs-6 abs-price">

                                    <div style="float:left;">
                                        <p id="totalall">0</p>
                                    </div>
                                    <div><span>&nbsp;&nbsp;Baht</span></div>


                                </div>

                            </div>






                            <!-- <div class="prd-total">
                                        <div class="col-md-3 col-sm-12">

                                        </div>
                                        <div class="col-md-5 col-sm-6 col-6" >
                                            <p class="total-text text-right">Total Purchase Amount:</p>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-6 abs-price">
                                            <div style="float:left;">
                                                <p id="totalall">0</p>
                                            </div>
                                            <div><span>&nbsp;&nbsp;Baht</span></div>
                                        </div>
                                    </div> -->
                        </div>

                    </div>

                    <hr>

                    <div class="opt-res" id="add-opt-res2"></div>
                    <div class="shopdetailInfoBottom">
                        <!-- <hr> -->
                        <div class="shopdetailButton">
                            <div class="shopdetailButtonTop">
                                <div class="row" hidden>
                                    <div class="col-xs-6">
                                        <p>ราคาขาย:</strong> <strong class="h3 text-danger"
                                                style="padding-left:15px;">0<span id="price_text">
                                                    &#3647;</span></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="shopdetailInfoBottom">
                        <input type="hidden" name="brandcode" value="003005000031" />

                        <div class="shopdetailInfoValue"> </div>
                        <!-- <hr> -->
                        <div id="ju-container">
                            <!-- contents -->
                            <div id="ju-content" class="container">
                                <div class="shopdetailButton">
                                    <div class="shopdetailButtonTop">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <form action="#">
                                                    <input type="hidden" name="id" id="product_id" value="{{$id}}">
                                                    <input type="hidden" name="name" value="{{$product_name}}">
                                                    <input type="hidden" name="price" id="price" value="{{$product_price}}">
                                                    <input type="hidden" name="image" value="{{$img_product}}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-lg btn-block"
                                                        value="Add to Cart" style="margin-top:20px;">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Comming Soon Shopping
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row " hidden>
                            <div class="prd-pg">
                                <img src='//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Product/Detail/visa.png'
                                    class='pg-img'><img
                                    src='//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Product/Detail/mastercard.png'
                                    class='pg-img'>
                            </div>
                        </div>
                    </div>

                </div>
    </div>
    <!-- <div class="col-md-12"> -->
    <!-- @if($id == 52)
                        <div class="row">
@php
                            $variables =
                            ['001.png','002.png','003.png','004.png','005.png','006.png','007.png','008.png','009.png'];
                        @endphp
                            <div class="col-lg-6" text-center>
@foreach($variables as $i => $variable)
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock"
                                 onmouseover="onHover({{ ++$i }});" onmouseout="offHover();">
                                                <img src="http://47.74.244.86:168/jsmbeauty/src/product/lip/52/{{$variable}}" />
                                            </div>
                                        @endforeach
                            </div>
                        </div>
                        <hr>
@endif -->
    <!-- </div> -->
</div>




</section>

<!-- Product Recommend -->
<div class="tab-content" hidden>
    <div id="best" class="tab-pane fade in active">
        <div class="woocommerce columns-4">
            <div class="row row-products">
                <div>
                    <h3 text-left style="margin-bottom: 5%;">
                        Product Related
                    </h3>
                </div>
                <div
                    class="col-lg-3 col-md-3 col-sm-4 col-xs-12 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock">
                    <a href=""></a>
                    <a class="product_link_wrap" href="/product/detail/view/5">
                        <img width="600" height="600" src="/jsmbeauty/src/product/skincare/5/G.5.jpg"
                            class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image"
                            alt="JUNGSAEMMOOL Pre-tect Sun Waterfull">
                        <div class="cate-hover">
                            <h3>JUNGSAEMMOOL Essential Mool Cream</h3>
                            <strong class="price">
                                <span class="amount">0 ฿ </span>
                            </strong>
                            <div class="small post_excerpt">JUNGSAEMMOOL Essential Mool Cream</div>
                        </div>
                    </a>
                    <hr class="clear">
                </div>

                <div
                    class="col-lg-3 col-md-3 col-sm-4 col-xs-12 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock">
                    <a href=""></a>
                    <a class="product_link_wrap" href="/product/detail/view/23">
                        <img width="600" height="600" src="/jsmbeauty/src/product/base/23/G.23.jpg"
                            class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image"
                            alt="JUNGSAEMMOOL Pre-tect Sun Waterfull">
                        <div class="cate-hover">
                            <h3>JUNGSAEMMOOLSkin Setting Tone Manner Base</h3>
                            <strong class="price">
                                <span class="amount">0 ฿ </span>
                            </strong>
                            <div class="small post_excerpt">JUNGSAEMMOOLSkin Setting Tone Manner Base</div>
                        </div>
                    </a>
                    <hr class="clear">
                </div>

                <div
                    class="col-lg-3 col-md-3 col-sm-4 col-xs-12 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock">
                    <a href=""></a>
                    <a class="product_link_wrap" href="/product/detail/view/29">
                        <img width="600" height="600" src="/jsmbeauty/src/product/base/29/G.29.jpg"
                            class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image"
                            alt="JUNGSAEMMOOL Pre-tect Sun Waterfull">
                        <div class="cate-hover">
                            <h3>JUNGSAEMMOOL Cushion-cealer</h3>
                            <strong class="price">
                                <span class="amount">0 ฿ </span>
                            </strong>
                            <div class="small post_excerpt">JUNGSAEMMOOL Cushion-cealer</div>
                        </div>
                    </a>
                    <hr class="clear">
                </div>

                <div
                    class="col-lg-3 col-md-3 col-sm-4 col-xs-12 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock">
                    <a href=""></a>
                    <a class="product_link_wrap" href="/product/detail/view/53">
                        <img width="600" height="600" src="/jsmbeauty/src/product/lip/53/G.53.jpg"
                            class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image"
                            alt="JUNGSAEMMOOL Pre-tect Sun Waterfull">
                        <div class="cate-hover">
                            <h3>JUNGSAEMMOOL Lip-pression</h3>
                            <strong class="price">
                                <span class="amount">0 ฿ </span>
                            </strong>
                            <div class="small post_excerpt">JUNGSAEMMOOL Lip-pression</div>
                        </div>
                    </a>
                    <hr class="clear">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Recommend -->

<div id="ju-container">
    <!-- contents -->
    <div id="ju-content" class="container">
<div class="woocommerce-tabs wc-tabs-wrapper col-12">
    <div id="tab-description"></div>
    <ul class="tabs wc-tabs nav nav-tabs">
        <li class="description_tab active">
            <a href="#tab-description" class="text-center">
                <i class="fa fa-gift fa-2x"></i>
                <span class="letters">DETAIL</span>
            </a>
        </li>

        <li class="qna_tab">
            <a href="#" class="text-center">
                <i class="fa fa-comments fa-2x"></i>
                <span class="letters">Contact</span>
            </a>
        </li>
    </ul>
    <div class="shopdetailItem">
        <div class="shopdetailImage">
            <div id="videotalk_area"></div>
            <!-- [OPENEDITOR] -->
            <div class="wpb_single_image wpb_content_element vc_align_center">

                @if($locale==='th')

                {!! $detail !!}
                @else
                @foreach($product_details as $product_picture)
                <div id="likes" class="like">
                    <img src="{{ url('/public/product/'.$product_picture['img_en']) }}">
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="woocommerce-tabs wc-tabs-wrapper">
        <div id="tab-description"></div>
        <ul class="tabs wc-tabs nav nav-tabs">
            <li class="description_tab active">
                <a href="#tab-description" class="text-center">
                    <i class="fa fa-gift fa-2x"></i>
                    <span class="letters">DETAIL</span>
                </a>
            </li>

            <li class="qna_tab">
                <a href="#" class="text-center">
                    <i class="fa fa-comments fa-2x"></i>
                    <span class="letters">Q&A</span>
                </a>
            </li>
        </ul>
        <div class="shopdetailItem">
            <div class="shopdetailImage">
                <div id="videotalk_area"></div>
                <!-- [OPENEDITOR] -->
                <div class="wpb_single_image wpb_content_element vc_align_center">
                    <div class="bbs-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Content</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(!empty($topic))
                                @foreach($topic as $topics)
                                <tr>
                                    <td> <a
                                            href="/qa/board/view/category/{{$topics['user_id']}}/{{$topics['id']}}">{{$topics['title']}}</a>
                                    </td>
                                    <td>{{$topics['name']}}</td>
                                    <td>{{$topics['created_at']}}</td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="woocommerce-tabs wc-tabs-wrapper">
        <div id="tab-description"></div>
        <ul class="tabs wc-tabs nav nav-tabs">
            <li class="description_tab">
                <a href="#tab-description" class="text-center">
                    <i class="fa fa-gift fa-2x"></i>
                    <span class="letters">DETAIL</span>
                </a>
            </li>
            <li class="qna_tab">
                <a href="#" class="text-center">
                    <i class="fa fa-comments fa-2x"></i>
                    <span class="letters">Q&A</span>
                </a>
            </li>
            <li class="description_tab active">
                <a href="#tab-description" class="text-center">
                    <i class="fa fa-gift fa-2x"></i>
                    <span class="letters">REVIEW</span>
                </a>
            </li>
        </ul>
        @php
        $checkauth = true;
        @endphp
        @if (Auth::check())
        @foreach ($review as $reviews)
        @if($reviews['user_id'] === Auth::user()->id)
        @php
        $checkauth = false;
        @endphp
        @break
        @endif
        @endforeach
        @if ($checkauth == true)
        <div class="col-12" style="float:right; padding: 5px 15px;">
            <button class="btn btn-dark" style="padding: 3px 10px;">
                <a class="btn btn-dark" href="/review/add/{{$id}}">Write A Review</a>
            </button>
        </div>
        @endif
        @else
        <button hidden><a href="{{url('review/add')}}">Write A Review</a></button>
        @endif


        <div class="shopdetailItem">
            <div class="shopdetailImage">
                <div id="videotalk_area"></div>
                <div class="wpb_single_image wpb_content_element vc_align_center">
                    <div class="bbs-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th style="width:750px">Contents</th>
                                    <th>Score</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($review))
                                @foreach($review as $reviews)

                                <tr>
                                    <td>{{$reviews['username']}}</td>
                                    <td> <a
                                            href="/review/board/view/category/{{$reviews['id']}}/{{$reviews['product_id']}}">{{$reviews['title']}}</a>
                                    </td>
                                    <td>
                                        @if($reviews['score'] == 5)
                                        <span class="icon">★★★★★</span>
                                        @endif
                                        @if($reviews['score'] == 4)
                                        <span class="icon">★★★★</span>
                                        @endif
                                        @if($reviews['score'] == 3)
                                        <span class="icon">★★★</span>
                                        @endif
                                        @if($reviews['score'] == 2)
                                        <span class="icon">★★</span>
                                        @endif
                                        @if($reviews['score'] == 1)
                                        <span class="icon">★</span>
                                        @endif

                                    </td>
                                    <td>{{$reviews['created_at']}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="clear">
</div>
</main>
</div>
</div>
</div>




<!-- noon -->

<!-- //main -->
</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src='{{asset('jsmbeauty/js/jquery.zoom.min.js')}}'></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<!--
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>


<script>
function showadd() {
    alert('sdas');
}

function calculate(qty, price, total, type) {

    var arr = document.getElementsByName('qty');
    var tot = 0;
    for (var i = 0; i < arr.length; i++) {
        if (parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('totalall').value = tot;

}

function calculateSum() {
    var price = $('input[name="totalitem[]"]').map(function() {
        return parseInt(this.value);
    }).get();
    console.log(fruits);

    var sum = document.getElementById("totalall").innerHTML = price.reduce(function(total, num) {
        return (Number(total) + Number(num));
    }, 0);
    $("#total").val(sum);

}

function updateProduct(id, stock2, e) {


    var qty = document.getElementById('qty' + id).value;
    var stock = document.getElementById('stock' + id).value;
    var price = $('#price').val();
    var test = parseInt(qty);
    var z = test + 0;
    var check = checkproduct(z, stock);
    if (check == 1) {
        var sum = price * test;

        document.getElementById('price' + id).innerHTML = +sum + ".00" + " Baht";
        document.getElementById('qty' + id).value = z;
        document.getElementById('totalitem' + id).value = sum + ".00" + " Baht";
        document.getElementById("totalall").innerHTML = sum + ".00" + " Baht";
        calculateSum();
    } else {
        swal("สินค้าเหลือไม่เพียงพอ", 'เหลือจำนวน ' + stock + ' ชิ้น', "error");
        document.getElementById('qty' + id).value = 1;
    }


}



function checkproduct(id, stock) {
    var stocks = parseInt(stock);

    if (id > stock) {

        return 0;

    } else {

        return 1;
    }

}

function updateTotal(id) {

    var qty = document.getElementById('qty' + id).value;
    var stock = document.getElementById('stock' + id).value;
    var price = $('#price').val();
    var test = parseInt(qty);
    var z = test + 1;
    var check = checkproduct(z, stock);
    if (check == 1) {
        var sum = price * z;
        console.log(sum);
        document.getElementById('price' + id).innerHTML = +sum + ".00" + " Baht";
        document.getElementById('qty' + id).value = z;
        document.getElementById('totalitem' + id).value = sum + ".00" + " Baht";
        document.getElementById("totalall").innerHTML = sum + ".00" + " Baht";
        calculateSum();
    } else {
        swal("สินค้าเหลือไม่เพียงพอ", 'เหลือจำนวน ' + stock + ' ชิ้น', "error");
    }
}

function updateDown(id) {
    var qty = document.getElementById('qty' + id).value;
    var price = $('#price').val();
    var test = parseInt(qty);
    var sum = price * test;
    if (test <= 2) {
        var test = parseInt(1);
        var sum = price * test;
        document.getElementById('qty' + id).value = 1;
        document.getElementById('price' + id).innerHTML = +sum + ".00" + " Baht";
        document.getElementById('totalitem' + id).value = sum + ".00" + " Baht";
        calculateSum();
    } else {
        var sumsty = test - 1;
        var sum = price * sumsty;
        console.log(sumsty);
        document.getElementById('qty' + id).value = sumsty;
        document.getElementById('price' + id).innerHTML = +sum + ".00" + " Baht";
        document.getElementById('totalitem' + id).value = sum + ".00" + " Baht";
        calculateSum();
    }

}
var fruits = [];

function changeFunc($i) {

    if (fruits == null || fruits == "") {
        var data = fruits.push($i);
        add_option($i);
    } else {
        console.log("เข้า else");

        for (i = 0; i < fruits.length; i++) {
            console.log(fruits[i]);
            if ($i == fruits[i]) {
                return swal("เกิดข้อผิดพลาด!", "เนื่องจากคุณได้เลือกรายการนี้ไปแล้ว!", "error");
            }
        }

        var data = fruits.push($i);
        add_option($i);
        var selValue = $("#option_product").val();

        localStorage.setItem('items', JSON.stringify(selValue))
        var data = JSON.parse(localStorage.getItem('items'))

        $("#add-opt-res").show();

    }

    $("#val_option").val(fruits);

}

function add_option(data) {

    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: '/Product/choose',
        data: {
            selValue: data
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            console.log(data);

            var html = '';
            $.each(data, function(index, itemdata) {
                html += '<div id="row' + itemdata.id + '">';
                html += '<div id="box-amount" style=" display: flex;">';
                html += '<dt class="name-amount">' + itemdata.product_name + '</dt>';
                html += '<dd class="amount" style="position: relative;padding-right: 20px;">';
                html += '<input type="hidden"  id="id' + itemdata.id +
                    '" name="id[]" class="txt-input" key="basic_k9830"  value="' + itemdata.id +
                    '">';
                html += '<input type="text"  id="qty' + itemdata.id +
                    '" name="qty[]" class="txt-qty" key="basic_k9830" value="1" onkeyup="updateProduct(\'' +
                    itemdata.id + '\',\'' + itemdata.stock +
                    '\',this)" min="1" maxlength="2" disabled>';
                html += '<input type="hidden" id="totalitem' + itemdata.id +
                    '" name="totalitem[]" class="txt-input" key="basic_k9830" value="' + itemdata
                    .price + '">';
                html += '<input type="hidden" id="stock' + itemdata.id +
                    '" name="stock[]" class="txt-input" key="basic_k9830" value="' + itemdata
                    .stock + '" disabled>';
                html += '<div class="ctrl">';
                html += '<span onclick="updateTotal(\'' + itemdata.id +
                    '\')"><i class="fa fa-angle-up arrow up" aria-hidden="true" style="width: 19px;"></i></span>';
                html += '<span onclick="updateDown(\'' + itemdata.id +
                    '\')"><i class="fa fa-angle-down arrow" aria-hidden="true" style="width: 19px;"></i></span>';
                html += '</div>';
                html += '</dd>';
                html += '<div class="price" key="basic_k9824" id="price' + itemdata.id +
                    '" name="res-total[]">' + itemdata.price + '</div>';
                html +=
                    '<dd class="delopt"><button type="button" class="delete" key="basic_k9824" id="' +
                    itemdata.id + '">Delete</button>';
                html += '</dd>';
                html += '</div>';
                html += '</div>';
            });

            $('#add-opt-res2').append(html);


            var price = Number(document.querySelector("#price").value);
            var total = Number(document.querySelector("#total").value);
            var qty = 1;
            var type = 1;
            var item_price = Number(document.querySelector("#item_price").value);

            var sum = item_price + total;
            $("#total").val(sum);
            document.getElementById("totalall").innerHTML = sum + ".00";

        },
        error: function(qXHR, textStatus, errorThrown) {

        }
    });
}

function onHover(id) {
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: '/datadetails',
        data: {
            id: id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            console.log(data);
            var $link = "<?php echo url('/public/colorproduct/'); ?>";

            $.each(data, function(index, itemdata) {
                $('#menuImg').attr("src", $link + '/' + itemdata.img_product);
            });

        },
        error: function(qXHR, textStatus, errorThrown) {

        }
    });

}

function offHover() {
    var pic = $("#pic").val();
    var $link = "<?php echo url('/public/product/'); ?>";
    $('#menuImg').attr("src", $link + '/' + pic);
    //     $("#menuImg").attr('src', 'http://project_jsm.test/jsmbeauty/src/product/lip/52/01_nudea_pricot.jpg');
}


$(document).on('click', '.delete', function() {
    /*---------------ลบ push */
    var number_option = $('#val_option').val();
    var button_id = $(this).attr('id');


    $("#row" + button_id + "").remove();

    var index = fruits.indexOf(button_id);
    if (index !== -1) fruits.splice(index, 1);
    calculateSum();
    /*---------------------------*/

    /*
    var price_qty = Number(document.querySelector("#price").value);
    var total = Number(document.querySelector("#total").value);
    var sum = total - price_qty;
    $("#total").val(sum);
    document.getElementById("totalall").innerHTML = sum + ".00"+"Baht";

     */
    /*
                var id = $("#qty"+button_id+"").val();
                alert(id);
    /*
                var price = $('input[name="totalitem[]"]').map(function(){
                    return parseInt(this.value);
                }).get();
                var productlist = {};
                for(var i = 0 ; i < serial.length ; i++){
                    productdetails[i] = {'id':serial[i],'name':name[i],'quantity':num[i],'product_id':product_id[i],'is_serial_number':is_serial_number[i],'sercode':sercode[i]};
                };
    */

});




var id = $('#product_id').val();


if (id == 52) {

} else {
    $(document).ready(function() {

    });
}

// pop-up//
$('#close').click(function() {
    $(this).parent().hide();
    $('#shadowbox').hide();
    //Function after window is closed
    yourfunction();

});

//Your Function
function yourfunction() {
    alert('window has been closed');
}


$('#click').click(function() {
    $('#shadowbox, #banner').show();
});

$('#test').click(function() {
    alert('Button was clicked');
})
// pop-up //

$(document).ready(function() {
    // Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function() {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
});
</script>
@endsection
