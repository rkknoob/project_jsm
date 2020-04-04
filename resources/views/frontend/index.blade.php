@extends('layouts.template.frontend')


<style type="text/css">
.carousel-indicators li {
    display: inline-block !important;
    box-sizing: content-box !important;
    width: 8px !important;
    height: 8px !important;
    background: black !important;
    border: solid 3px white !important;
    border-color: rgba(255, 255, 255, 0.44) !important;
    margin: 4px !important;
    border-radius: 15px !important;
}

.carousel-indicators .active {
    display: inline-block !important;
    box-sizing: content-box !important;
    width: 8px !important;
    height: 8px !important;
    background: white !important;
    border: solid 3px white !important;
    border-color: rgba(0, 0, 0, 0.44) !important;
    margin: 4px !important;
    border-radius: 15px !important;
}

li.active {
    color: red;
}

.home-product-tab .wpb_tabs .wpb_tabs_nav li.active a {
    color: #000;
    border: 4px solid #fff;
    padding: 10px 35px;
}

.home-product-tab .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
.home-product-tab .wpb_content_element .wpb_tabs_nav .active {
    background-color: #fff;
}

.home-product-tab .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
.home-product-tab .wpb_content_element .wpb_tabs_nav li a .active {
    color: black !important;
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

#shadowbox {
    position: fixed;
    z-index: 998;
    height: 100%;
    width: 100%;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')

<!-- pop-up -->
@if($popup->is_active=="Y")
<div id="banner"
    style="z-index: 1562207196; position: absolute; top: 0px; left: 0px; width: auto; background-color: white;">
    <img src="/public/popup/{{$popup->img_en}}">
    <div id="close" onclick="yourfunction()"><img border="0"
            src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/Layout/img/btn_popup_close.gif"
            style="margin: 5px 6px -2px 2px;"></div>
</div>
@endif
<!-- pop-up -->



<div id="mobile-video" class="visible-xs-block" style="background-size: cover; background-position: center center;">
    <div class="item-content">
        <div class="item-cell">
            <!-- <h1>Beauty Inspiration</h1> -->
        </div>
    </div>
</div>



<div class="base-height"></div>

<!-- content -->
<div id="ju-container">
    <div id="ju-content">
        <div
            class="vc_row wpb_row vc_row-fluid vc_custom_1464829003762 vc_row-has-fill vc_row-o-full-height vc_row-o-columns-bottom vc_row-flex">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner vc_custom_1446006821477" style="margin-top: 0!important;">
                    <div class="wpb_wrapper" style="margin-top: -35px;">
                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill">
                                <div id="video_bg" style="background-color: black;" loop>
                                    <iframe
                                        src="{{$video->link_video}}?controls=0&playlist=01VPFV2cm64&autoplay=1&loop=1&rel=0&background=1"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill">
                                <div id="f2s-rolling-container1" class="f2s-swiper">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach($banner as $i => $banners )
                                            <li data-target="#carousel-example-generic" data-slide-to="{{$banners->id}}"
                                                class="@if($banners->id=='1') active @endif"></li>
                                            @endforeach
                                        </ol>


                                        <div class="carousel-inner" role="listbox">
                                            @foreach($banner as $i => $banners )
                                            <div class="item @if($banners->id=='1') active @endif" style="width: 100%;">
                                                <a href="{{ url('/product/detail/view', ['id' => $banners->id_product]) }}"
                                                    style="cursor:hand">
                                                    <img src="/public/banner/{{$banners->img_en}}">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>

                                        <a class="left carousel-control" href="#carousel-example-generic" role="button"
                                            data-slide="prev" style="padding-top: 25%;margin-left: -4%;">
                                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"
                                                style="font-size:30;"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" role="button"
                                            data-slide="next" style="padding-top: 25%;margin-right: -4%;">
                                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"
                                                style="font-size:30;"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--EVENT -->
                        <h1 style="font-size: 50px;color: #ffffff;line-height: 60px;text-align: center; padding-top: 40px !important;"
                            class="vc_custom_heading vc_custom_1467341574385">
                            <a href="">@lang('lang.event')</a>
                        </h1>

                        <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1467342034471 vc_row-has-fill">
                            <!-- <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <a href="/event/details_01" target="_self"
                                                       class="vc_single_image-wrapper vc_box_border_grey">
                                                       @foreach($event as $events)
                                                        @if($events->id=="6")
                                                        <img width="385" height="452"
                                                             src="/public/event/{{$events->banner1}}"
                                                             class="vc_single_image-img attachment-full" alt="event">
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            @foreach($event as $events)
                            <div class="col-6 col-xs-6 col-md-3 col-lg-3">
                                <div class="wpb_wrapper">
                                    <div class="wpb_single_image wpb_content_element vc_align_center">
                                        <figure class="wpb_wrapper vc_figure">


                                            <a href="{{ url('/event/details', ['id' => $events->id]) }}" target="_self"
                                                class="vc_single_image-wrapper vc_box_border_grey">

                                                <img width="385" height="452" src="/public/event/{{$events->banner1}}"
                                                    class="vc_single_image-img attachment-full" alt="event">

                                            </a>


                                        </figure>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                          


                            <!-- <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_center">
                                                <figure class="wpb_wrapper vc_figure">
                                                    @foreach($event as $events)
                                                    @if($events->id=="1")
                                                    <a href="{{ url('/event/details', ['id' => $events->id]) }}" target="_self"
                                                       class="vc_single_image-wrapper vc_box_border_grey">

                                                        <img width="384" height="452"
                                                             src="/public/event/{{$events->banner1}}"
                                                             class="vc_single_image-img attachment-full" alt="event_03">

                                                    </a>
                                                    @endif
                                                    @endforeach
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_single_image wpb_content_element vc_align_center">
                                            <figure class="wpb_wrapper vc_figure">
                                                @foreach($event as $events)
                                                @if($events->id=="5")
                                                <a href="{{ url('/event/details', ['id' => $events->id]) }}" target="_self"
                                                   class="vc_single_image-wrapper vc_box_border_grey">

                                                    <img width="385" height="452"
                                                         src="/public/event/{{$events->banner1}}"
                                                         class="vc_single_image-img attachment-full" alt="event">

                                                </a>
                                                @endif
                                                @endforeach
                                            </figure>
                                        </div>
                                    </div>
                                </div> -->
                        </div>

                    </div>

                    <!-- .vc_row wpb_row vc_inner vc_row-fluid vc_custom_1467342034471 vc_row-has-fill-->

                </div>
            </div>
            <!--.vc_column-inner vc_custom_1446006821477-->
        </div>
        <!--.wpb_column vc_column_container vc_col-sm-12-->
    </div>
    <!--.vc_row wpb_row vc_row-fluid vc_custom_1464829003762 vc_row-has-fill vc_row-o-full-height vc_row-o-columns-bottom vc_row-flex-->




    <div class="vc_row wpb_row vc_row-fluid home-product-tab vc_custom_1467341696348 vc_row-has-fill">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <h1 style="font-size: 50px;color: #ffffff;text-align: center"
                        class="vc_custom_heading vc_custom_1467342620922">
                        <a href="#">@lang('lang.product')</a>
                    </h1>
                    <div class="wpb_tabs wpb_content_element" data-interval="0">
                        <div
                            class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix ui-widget ui-widget-content ui-corner-all">
                            <ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                                role="tablist">
                                <li class="ui-state-default ui-corner-top navMenus active" role="tab" tabindex="0"
                                    aria-controls="tab-1b1d9d2f-6ba7-0" aria-labelledby="ui-id-1" aria-selected="true"
                                    aria-expanded="true">
                                    <a data-toggle="tab" href="#best" class="ui-tabs-anchor" role="presentation"
                                        tabindex="-1" id="ui-id-1"> BEST PRODUCTS </a>
                                </li>
                                @foreach($Category as $Categorys)

                                <li class="ui-state-default ui-corner-top navMenus" role="tab" tabindex="-1"
                                    aria-controls="tab-a2934e91-9508-3" aria-labelledby="ui-id-2" aria-selected="false"
                                    aria-expanded="false">
                                    <a data-toggle="tab" href="#base" onclick="products({{$Categorys->id}});">
                                        {{$Categorys->name}} </a>
                                </li>

                                @endforeach

                            </ul>
                            <div class="tab-content">
                                <div id="best" class="tab-pane fade in active" style="padding: 3rem;">
                                    <div class="woocommerce columns-4">
                                        <div class="row row-products">
                                            @if(! $Product->isEmpty())
                                            @foreach($Product as $Products)

                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock"
                                                style="padding:0px 2.5px;">
                                                <a href=""></a>
                                                <a class="product_link_wrap"
                                                    href="{{ url('product/detail/view/'.$Products->id) }}">
                                                    <img width="600" height="600"
                                                        src="{{ url('/public/product/'.$Products->cover_img) }}"
                                                        class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        alt="JUNGSAEMMOOL Pre-tect Sun Waterfull">
                                                    <div class="cate-hover">
                                                        <h3>{{$Products->name_en}}</h3>
                                                        <strong class="price">
                                                            <span
                                                                class="amount">{{ number_format($Products->price, 2) }}
                                                                ฿ </span>
                                                        </strong>
                                                        <div class="small post_excerpt">{{$Products->name_en}}
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr class="clear">
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div id="base" class="tab-pane fade" style="padding: 3rem;">
                                    <div class="woocommerce columns-4">
                                        <div class="row row-products">
                                            <div id="product_base">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .wpb_wrapper -->
                    </div><!-- .vc_column-inner -->
                </div><!-- .wpb_column vc_column_container vc_col-sm-12 -->
            </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid vc_custom_1464829672746 vc_row-has-fill">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner vc_custom_1446006821477">
                    <div class="wpb_wrapper">
                        <div class="wpb_single_image wpb_content_element vc_align_center">
                            <figure class="wpb_wrapper vc_figure">
                                <a href="/artisttip" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
                                    <img width="1602" height="836" src="{!!asset('jsmbeauty/src/FINDYOURBEAUTY.jpg')!!}"
                                        class="vc_single_image-img attachment-full" alt="FINDYOURBEAUTY" /></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!---->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src='{{asset('jsmbeauty/js/jquery.zoom.min.js')}}'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script>
// pop-up//


//Your Function
function yourfunction() {
    $('#banner').hide();
}
$('#click').click(function() {
    $('#shadowbox, #banner').show();
});

$('#test').click(function() {
    alert('Button was clicked');
})
// pop-up //

function products(id) {



    $.ajax({
        dataType: 'json',
        type: 'get',
        data: {
            id: id
        },
        url: '/product/list/' + id,
        success: function(data) {

            var html = '';
            $.each(data.datas, function(index, itemdata) {
                html +=
                    '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 post-18124 product type-product status-publish has-post-thumbnail product_cat-tools product_cat-227 shipping-taxable purchasable product-type-simple product-cat-tools instock" style="padding:0px 2.5px;">';
                html += '<a class="product_link_wrap" href="/product/detail/view/' + itemdata.id +
                    '">';
                html += '<img src="/public/product/' + itemdata.cover_img + '"/>';
                html += '<div class="cate-hover">';
                html += '<h3>' + itemdata.name_en + '</h3>';
                html += '<strong class="price"><span class="amount">' + itemdata.price +
                    ' ฿ </span></strong>';
                html += '<div class="small post_excerpt">' + itemdata.name_en + '</div>';
                html += '</div>';
                html += '</div>';
            });
            $('#product_base').html(html);

        }
    })


}
</script>