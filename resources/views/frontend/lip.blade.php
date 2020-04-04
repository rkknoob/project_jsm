@extends('layouts.template.frontend')

<style type="text/css">
    #ju-container .ju-page-title {
        margin-top: 179px;
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

@section('content')
    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title">
                <h1 class="entry-title text-gotham text-center">LIP</h1>
                <div class="text-center">Test</div>
            </div>
            <div class="woocommerce_categoy_result clearfix">
                <p class="form-control-static pull-left">
                    TOTAL <strong class="text-danger">122</strong>PRODUCTS
                </p>
                <div class="pull-right">
                    <form class="woocommerce-ordering" method="get">
                        <label class="">
                            <select id="selArray" name="selArray" class="orderby form-control">
                                <option value="">Lowest Price</option>
                                <option value="">Highest Price</option>
                                <option value="">Product Name</option>
                                <option value="" selected="selected">New Item</option>
                            </select>
                        </label>
                    </form>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="/product" class="letters">Product</a></li>
                <li><a href="/best" class="letters">BEST SELLER</a></li>
                <li><a href="/base" class="letters">BASE</a></li>
                <li><a href="/lip" class="letters">LIP</a></li>
                <li><a href="/eye" class="letters">EYE</a></li>
                <li><a href="/skincare" class="letters">SKINCARE</a></li>
                <li><a href="/tool" class="letters">TOOL</a></li>
            </ul>
            <div id="productClass">
                <div class="page-body">
                    <div class="row row-products">
                        <div class="prd-list">
                            <!--/if_product/-->
                            <table summary="Product Image, Product Detail, Price">
                                <caption>Product List</caption>
                                <colgroup>
                                    <col width="25%" />
                                    <col width="25%" />
                                    <col width="25%" />
                                    <col width="25%" />
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.384.156315831719837.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="LIP-PRESSION">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1167" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            LIP-PRESSION
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												33.05  USD
																	</span>
																															</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/10/O/product.246.155202064811537.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="High Tinted Lip Lacquer Hyper Matt">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="737" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            High Tinted Lip Lacquer Hyper Matt
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												25.34  USD
																	</span>
																															</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/23/O/product.213.155954983650873.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="High Tinted Lip Lacquer ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="638" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            High Tinted Lip Lacquer
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												25.34  USD
																	</span>
																															</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2017/37/O/product.199.150544104625698.jpeg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="High Glow Lipstick">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="596" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            High Glow Lipstick
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												29.74  USD
																	</span>
																															</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/02/O/product.26.154684760487005.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="High Color Lipstick ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="77" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            High Color Lipstick
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												29.74  USD
																	</span>
																															</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2018/46/O/product.20.154226584972287.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Tinted Lip Glow">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="59" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Tinted Lip Glow
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												19.83  USD
																	</span>
																															</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <ol class="paging">

                                <li class="now"><a href="">1</a></li>

                            </ol>
                            <!--/end_if/-->
                        </div>
                    </div>
                </div><!-- .page-body -->
            </div><!-- #productClass -->
        </div><!--#ju-content-->
    </div><!--#ju-container-->
    <!-- //content -->


@endsection


