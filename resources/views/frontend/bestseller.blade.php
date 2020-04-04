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
                <h1 class="entry-title text-gotham text-center">BEST SELLERS</h1>
                <div class="text-center text-gotham">Test</div>
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/23/O/product.389.155953879686354.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="[SUMMER SET]Pre-tect Sun Waterfull X2 SET">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            [SUMMER SET]Pre-tect Sun Waterfull X2 SET
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												83.72  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.386.156315928324208.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Skin Nuder Cushion (refill included)+Tone Balancing Base SET">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1173" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Skin Nuder Cushion (refill included)+Tone Balancing Base SET
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												81.51  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.385.156316514278619.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Pro-lasting Finish Powder">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1170" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Pro-lasting Finish Powder
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												39.65  USD
																	</span>
																												<span style="color:red;"> (sold out)</span>			</span>
                                                    </strong>

                                                </div>

                                                <hr class="clear">

                                            </div>
                                        </div>
                                    </td>

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
                                </tr>

                                <tr>
                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/32/O/product.382.156531445391447.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Skin setting base SET">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1161" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Skin setting base SET
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												70.50  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/27/O/product.379.156196060091393.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt=" Minifying Skin Care Set">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1152" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Minifying Skin Care Set
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												82.61  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.376.156316549621502.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Skin Nuder Cushion PINK PERFECTION SET">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1143" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Skin Nuder Cushion PINK PERFECTION SET
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												57.28  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/10/O/product.373.155174945941330.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Mool Cream 50ml Duo set">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1134" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Mool Cream 50ml Duo set
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												99.25  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/28/O/product.372.156283119136006.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Skin Nuder Cushion (refill included) Duo Set">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1131" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Skin Nuder Cushion (refill included) Duo Set
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												78.64  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/23/O/product.366.155954505051470.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Mool Cream 50ml set">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1113" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Mool Cream 50ml set
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												58.38  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.364.156315947234794.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Skin Nuder Cushion (refill included)+mool cream50ml+Pink Cushion Puff+sun waterfull 5ml set ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1107" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Skin Nuder Cushion (refill included)+mool cream50ml+Pink Cushion Puff+sun waterfull 5ml set
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												104.64  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2018/46/O/product.353.154200247346770.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Refining Eyeshadow SET">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1074" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Refining Eyeshadow SET
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												77.11  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.329.156335014797251.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Cushion-cealer (refill included)  ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="1002" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Cushion-cealer (refill included)
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												57.28  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/16/O/product.288.155531713191429.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Only $10 JSM Skincare Trial SET ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="863" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Only $10 JSM Skincare Trial SET
                                                        </a></h5>

                                                    <p class="subname">(maximum 3 per customer)</p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												10.00  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/20/O/product.261.155789846666424.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Mool Cream 50ml ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="782" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Mool Cream 50ml
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												58.38  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2017/44/O/product.252.150935363816670.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Artist Brush Powder &amp; Blush">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="755" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Artist Brush Powder & Blush
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

                                <tr>
                                    <td>
                                        <div class="tb-center"><div class="product">

                                                <a class="product_link_wrap" href="">
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/29/O/product.229.156315717161297.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Skin Nuder Long Wear Cushion (refill included) +refill set">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="686" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Skin Nuder Long Wear Cushion (refill included) +refill set
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												46.26  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2018/40/O/product.59.153846075019769.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Artist Eyeshadow Palette">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="176" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Artist Eyeshadow Palette
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												57.28  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/23/O/product.28.155954991523436.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Star-cealer Foundation">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="83" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Star-cealer Foundation
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												46.26  USD
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
                                                    <img src="http://www.jsmbeauty.us/storage/jsmbeautyEN/www/prefix/product/2019/28/O/product.27.156282952396054.jpg" class="MS_prod_img_l attachment-shop_catalog size-shop_catalog wp-post-image" alt="Essential Skin Nuder Cushion (refill included) ">
                                                </a>

                                                <div class="text-center prd-info">

                                                    <div class="preview-box clear bold">
                                                        <span class="right"><span class="quick_basket" rel="80" style="cursor:pointer"><i class="fa fa-shopping-cart"></i></span></span>
                                                    </div>

                                                    <h5><a href="">
                                                            Essential Skin Nuder Cushion (refill included)
                                                        </a></h5>

                                                    <p class="subname"></p>

                                                    <strong class="price">
			<span class="amount">
														<span>
												46.26  USD
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

                                <li class="now"><a href="/Product/Category/list/cid/89/page/1/pnum/10">1</a></li>

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


