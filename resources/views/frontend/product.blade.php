@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.fot {
    font-size: 16px;
}

.text_product {
    color: #FF33A5;
}

/*-------- pagination --------*/
.pagination>li>a,
.pagination>li>span {
    color: #333 !important;
}

.pagination>.active>a,
.pagination>.active>a:focus,
.pagination>.active>a:hover,
.pagination>.active>span,
.pagination>.active>span:focus,
.pagination>.active>span:hover {
    z-index: 3;
    color: #fff !important;
    cursor: default;
    background-color: #333 !important;
    border-color: #333 !important;
}

.pagination>li:first-child>a,
.pagination>li:first-child>span {
    border-top-left-radius: 0px !important;
    border-bottom-left-radius: 0px !important;
}

.pagination>li:last-child>a,
.pagination>li:last-child>span {
    border-top-right-radius: 0px !important;
    border-bottom-right-radius: 0px !important;
}

/*-------- pagination --------*/

/* Vertical IPad */
@media screen and (max-width: 768px) {
    .media-m {
        height: 100%;
    }
}
/* Horizontal IPhone X */
@media  screen and (max-width: 812px) {
    .media-m {
        height: 100%;
    }
}

/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    .media-m {
        height: 45%;
    }
    #ju-container .ju-page-title {
        margin-top: 10px!important;
        text-align: center;
        margin-bottom: 40px;
    }
}

/* Vertical IPhone X/ XS/ 6/7/8  */
@media only screen and (max-width: 375px) {
    .media-m {
        height: 50%;
    }
}
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
@php
$locale = session()->get('locale');
@endphp
@section('content')

<div id="ju-container">
    <div id="ju-content" class="container">
        @if($img_banner!="")
        <div class="col-md-12" style="margin-top: 9.5%; padding:0; margin-bottom: 3%;" hidden>
            <img src="/public/category/{{$img_banner}}" />
        </div>
        @endif
        <div class="ju-page-title" id="demo">
            @if($locale==='th')
            <h1 class="entry-title text-thai text-center">{{$subject->subject_th}}</h1>
            <!-- <div class="text-center text-gotham">{{$subject->summary_th}}</div> -->
            @else
            <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
            <!-- <div class="text-center text-gotham">{{$subject->summary_en}}</div> -->
            @endif
        </div>
        <div class="woocommerce_categoy_result clearfix">
            <div class="form-control-static pull-left">
                TOTAL
            </div>
            <div class="form-control-static pull-left text_product">
                {{$Total}}
            </div>
            <div class="form-control-static pull-left">
                PRODUCTS
            </div>

            <div class="pull-right">
                <form class="woocommerce-ordering" method="get">
                    <input type="hidden" name="product_type" id="product_type" value="{{$id}}" />
                    <input type="hidden" name="orderby" id="orderby" value="{{$forma}}" />
                    <label class="">
                        <select name="forma" onchange="location = this.value;">
                            <option value="/Product/Category/list/cid/soft/{{$id}}/1/"
                                {{ ($forma == '1') ? "selected" : "" }}>Lowest Price</option>
                            <option value="/Product/Category/list/cid/soft/{{$id}}/2/"
                                {{ ($forma == '2') ? "selected" : "" }}>Highest Price</option>
                            <option value="/Product/Category/list/cid/soft/{{$id}}/3/"
                                {{ ($forma == '3') ? "selected" : "" }}>Product Name</option>
                            <option value="/Product/Category/list/cid/soft/{{$id}}/0/"
                                {{ ($forma == '0') ? "selected" : "" }}>New Item</option>
                        </select>
                    </label>
                </form>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="{{ ($id == 0) ? 'active' : '' }}"><a href="/Product/Category/list/cid/0">ALL PRODUCTS</a></li>
            <li class="{{ ($id == 150) ? 'active' : '' }}"><a href="/Product/Category/list/cid/150">BEST SELLER</a></li>

            @foreach($Category as $categorys)
            <li class="{{ ($categorys->id == $id) ? 'active' : '' }}"><a
                    href="/Product/Category/list/cid/{{$categorys->id}}">{{$categorys->name}}</a></li>
            @endforeach
        </ul>

        <div class="tab-content">
            <div id="product" class="tab-pane fade in active">
                <div id="all" class="product">
                    @foreach ($products as $chunk)
                    <div class="row">
                        @foreach ($chunk as $Products)
                        <div class="col-lg-3 col-md-3 col-6 col-xs-6 media-m">
                            <a class="product_link_wrap" href="/product/detail/view/{{$Products->id}}">
                                <img src="{{ url('/public/product/'.$Products->cover_img) }}" alt="product"
                                    style="width:100%;">
                            </a>
                            <div class="text-center prd-info">

                                <div class="preview-box clear bold">
                                    <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i
                                                class="fa fa-shopping-cart"></i></span></span>
                                </div>
                                <div class="fot" style="cursor:hand">
                                    @if($locale==='th')
                                    {{$Products->name_en}}
                                    @else
                                    {{$Products->name_en}}
                                    @endif
                                </div>
                                <p class="subname"></p>
                                <div class="fot">
                                    <b> {{ number_format($Products->price, 2) }}Thai Baht</b>
                                </div>
                                <span class="amount">

                                    <span>
                                    </span></span>
                                </strong>
                            </div>
                            <hr class="clear">
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
                <ul class="pagination">
                    {!! $Product_type->render() !!}
                </ul>
            </div>
        </div>

    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->
<!-- //content -->

@endsection