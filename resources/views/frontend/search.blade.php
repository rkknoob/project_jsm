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

@php $locale = session()->get('locale'); 
echo $locale;
@endphp
<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title" id="demo">
                <div class="panel panel-default">
                        <div class="panel-body">
                                <form action="{{ action('Frontend\SearchController@index') }}"  class="form-horizontal"  method="GET" role="form" id="addorderform">
                                <div class="row">
                                        <div class="col-md-3 col-sm-12 textseach">Keyword</div>
                                        <div class="col-md-2 col-sm-12">
                                        <select name="type"  class="form-control">    
                                        <option value="integration" >All</option> <option value="pdt_name" >Item Name</option>
                                       </select>
                                      </div>
                                        <div class="col-md-4 col-sm-12"><input type="text" class="form-control" id="usr" name="datasearch"></div>
                                        <div class="schBtn"><input type="image" src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_h50_sch.gif" alt="Search" /></div>
                                      </div>
                                  
                                <div class="row">
                                        <div class="col-md-3 col-sm-12 textseach">Price Range</div>
                                        <div class="col-md-2 col-sm-12"><input type="text" class="form-control" id="usr1" name="price">
                                            
                                      </div>
                                      <div class="test col-md-1 col-sm-12">BAHT ~ </div>
                                        <div class="col-md-2 col-sm-12"><input type="text" class="form-control" id="usr2" name="price_high"></div>
                                        <div class="col-md-1 col-sm-12">BAHT</div>
                                      </div>
                                </div>
                            </form>          
                </div>         
        </div>
    


        <div class="tab-content">
            <div id="product" class="tab-pane fade in active">
                <div id="all" class="product">
                    <div class="row">
                            @if(! $Product_type->isEmpty())
                            @foreach($Product_type as $Products)
                                
                        <div class="col-lg-3 col-md-3">
                            <a class="product_link_wrap" href="/product/detail/view/{{$Products->id}}">
                                <img src=" {{$Products->url_image}}" alt="product"
                                    style="width:100%;">
                            </a>
                            <div class="text-center prd-info">

                                <div class="preview-box clear bold">
                                    <span class="right"><span class="quick_basket" rel="1182" style="cursor:pointer"><i
                                                class="fa fa-shopping-cart"></i></span></span>
                                </div>

                                <h5><a href="">
                                        {{$Products->name}}
                                    </a></h5>
                                <p class="subname"></p>
                                <strong class="price">
                                    <span class="amount">
                                        <span>
                                        </span></span>
                                </strong>
                            </div>
                            <hr class="clear">
                        </div>
                        @endforeach
                        @else 
                        <div class="text-center"><h1>- ไม่มีสินค้า -</h1></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->
<!-- //content -->


@endsection

<script>


</script>