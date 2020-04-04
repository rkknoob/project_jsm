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

@section('content')
@php $locale = session()->get('locale');
echo $locale;
@endphp

<div id="ju-container">
    <!-- contents -->
    <div id="ju-content" class="container">
        <div class="ju-page-title">
        </div>
        <h2 class="product-category-title text-gotham">{{$product_name}}</h2>
        <h1 class="product-title text-gotham"></h1>
        <!-- main -->
        <main class="shopdetail">
            <section class="shopdetailInfo">
                <div class="row">
                    <div class="col-md-6">
                        <div class="shopdetailInfoTop">
                            <figure>
                                <div class="thumb clear" id="example">
                                    <div class="enlarge nomulti"> <span class="zoom" id='ex1'>
                                            <div id="menu">
                                                <a href="#" id="home">
                                                    <img id='menuImg' src='{{$img_product}}' width='555' height='600'
                                                        alt="logo" />
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <figcaption class="displaynone">JUNGSAEMMOOL Pre-tect Sun Waterfull</figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="description">
                            <div class="prd-info">
                                <div class="prd-prd-price">
                                    <div class="row">
                                        <div class="test">
                                            <div class="col-md-3 col-xs-6 prt"><strong>Sales Price:</strong></div>
                                            <div class="col-md-6 col-xs-6 prt">
                                                <strong>{{ number_format($product_price, 2) }} Thai Baht</strong></div>
                                        </div>
                                    </div>
                                    <div class="row" hidden>
                                        <div class="col-md-3 col-xs-6">Mileage:</div>
                                        <div class="col-md-3 col-xs-6">1.67 Bath</div>

                                    </div>
                                    <div class="row" margin-top: 5%>
                                        @if (isset($product_color))
                                        <div class="col-md-3 col-xs-6">OPTION :</div>
                                        <div class="col-md-6 col-xs-6">
                                            <select name="select_option[]" class='basic_option' style="width: 180px">
                                                @foreach($product_color as $product_colors)
                                                <option value="{{$product_colors['id']}}">
                                                    {{$product_colors['color_name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                        <div class="col-md-3 col-xs-6">OPTION :</div>
                                        <div class="col-md-3 col-xs-6">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <hr>
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
                                <div class="shopdetailInfoValue">

                                </div>
                                <!-- <hr> -->
                                <div class="shopdetailButton">
                                    <div class="shopdetailButtonTop">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <form action="#">
                                                    <input type="hidden" name="id" id="product_id" value="{{$id}}">
                                                    <input type="hidden" name="name" value="{{$product_name}}">
                                                    <input type="hidden" name="price" value="{{$product_price}}">
                                                    <input type="hidden" name="image" value="{{$img_product}}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger btn-lg btn-block"
                                                        value="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Comming Soon Shopping
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" hidden>
                                    <div class="prd-pg">
                                        <img src='//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Product/Detail/visa.png'
                                            class='pg-img'><img
                                            src='//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Product/Detail/mastercard.png'
                                            class='pg-img'>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if($id == 52)
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
                @endif
            </section>

            <!-- Product Recommend -->
            <div class="tab-content" style="margin-top:3%;">
                <div id="best" class="tab-pane fade in active">
                    <div class="woocommerce columns-4">
                        <div class="row row-products">
                            <div>
                                <h3 text-left style="margin-bottom: 5%;">
                                    Product Recommend
                                    </h2>
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

            <div class="woocommerce-tabs wc-tabs-wrapper">
                <div id="tab-description"></div>
                <ul class="tabs wc-tabs nav nav-tabs">
                    <li class="description_tab active">
                        <a href="#tab-description" class="text-center">
                            <i class="fa fa-gift fa-2x"></i><br>
                            <span class="letters">DETAIL</span>
                        </a>
                    </li>

                    <li class="qna_tab">
                        <a href="#" class="text-center">
                            <i class="fa fa-comments fa-2x"></i><br>
                            <span class="letters">Contact</span>
                        </a>
                    </li>
                </ul>
                <div class="shopdetailItem">
                    <div class="shopdetailImage">
                        <div id="videotalk_area"></div>
                        <!-- [OPENEDITOR] -->
                        <div class="wpb_single_image wpb_content_element vc_align_center">



                            @if ($product_details)
                            @foreach($product_details as $product_picture)
                            <div id="likes" class="like"><img src="{{URL::to('/'.$product_picture['img_url'])}}"></div>
                            @endforeach

                            @else
                            <div><img src="{{URL::to('/jsmbeauty/src/product/no_photo.jpg')}}"></div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <hr class="clear">
        </main>
    </div>
</div>
</div>
<!-- noon -->

<!-- //main -->
</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script src='{{asset('jsmbeauty/js/jquery.zoom.min.js')}}'></script>



<script>
var id = $('#product_id').val();


function onHover(id) {

    if (id == 1) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/01_nudea_pricot.jpg');
    } else if (id == 2) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/02_damask_rose.jpg');
    } else if (id == 3) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/03_extreme_red.jpg');
    } else if (id == 4) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/04_carmen_red.jpg');
    } else if (id == 5) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/05_brick_moment.jpg');
    } else if (id == 6) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/06_youth_rose.jpg');
    } else if (id == 7) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/07_rose_cosset.jpg');
    } else if (id == 8) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/08_muted_pink.jpg');
    } else if (id == 9) {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/09_french_pink.jpg');
    } else {
        $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/01_nudea_pricot.jpg');
    }

}

function offHover() {
    $("#menuImg").attr('src', 'http://47.74.244.86:168/jsmbeauty/src/product/lip/52/01_nudea_pricot.jpg');
}

if (id == 52) {

} else {
    $(document).ready(function() {
        $('#ex1').zoom();
    });
}
</script>
@endsection