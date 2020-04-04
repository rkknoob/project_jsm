<style>
.ju-header {
    background-color: rgba(255, 255, 255, 0.65);
}

.affix-top {
    position: relative;
}

.affix {
    background-color: #fff !important;
    border-bottom: 1px solid #eaeaea;
}

header#ju-header #topBar .btn-group .btn-primary {
    padding: 9px;
}

header#ju-header #topBar ul.list-inline>li>a {
    padding: 9px 9px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 140px !important;
    padding: .5rem 0;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .25rem;
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

.secondary {
    background-color: transparent !important;
    color: rgba(255, 255, 255, 0.6) !important;
    text-transform: uppercase;
    padding: 6px 9px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 0;
    display: block;

}

.btn-primary {
    width: 100%;
    text-align: center;
    padding: 12px 15px;
    font-weight: bold;
    color: #fff !important;
    background: #292828 !important;
    border: 1px solid #292828 !important;

}

@media (min-width: 900px) {

    /* .longmenu {
            display: block;

        } */

    body {
        overflow-y: scroll;
        overflow-x: hidden;
    }

}


/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px;
    }
    .btn-header-search{
        height: 30px!important;
    }
    .btn-default {
        height: 30px!important;
    }
}





    @font-face {
        font-family: SukhumvitSet;
        src: url('/fonts/SukhumvitSet-Thin.ttf');
    }
    body {

    }
    .text-thai {
        font-family: 'SukhumvitSet';
        font-style: normal;
        font-weight: bold;
    }
</style>

<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158580077-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-158580077-1');
    </script>
    <!-- End Global site tag (gtag.js) - Google Analytics -->

    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2706744739433188');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=2706744739433188&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</body>

@php

$datas = \App\CoreFunction\Helper::menufront();
$locale = session()->get('locale');

if($locale == 'th'){

    $a = 'text-thai';
}else{

    $a = '';
}
@endphp
<header id="ju-header">
    <!-- top bar -->

    <div id="topBar">
        <div class="container">
            <nav class="text-right clearfix">

                @auth
                <ul id="menu-topbar" class="list-inline">

                    <strong>{{ Auth::user()->name }}</strong>
                    <li>
                        <a href="#" class="{{$a}}"><img src="/jsmbeauty/src/Icon/1.png" style="width: 20px;"> @lang('lang.mypage')
                        </a>
                    </li>
                    <!-- <li>
                            <a href=""><img src="/jsmbeauty/src/Icon/2.png" style="width: 20px;">
                                JOIN
                            </a>
                        </li> -->
                    <li>
                        <a href="/index/logout" class="{{$a}}">
                            <img src="/jsmbeauty/src/Icon/logout.png" style="width: 18px;"> @lang('lang.logout')
                        </a>
                    </li>
                    <!-- <li>
                            <a href="#">
                                <img src="/jsmbeauty/src/Icon/3.png" style="width: 20px;"> @lang('lang.order')
                            </a>
                        </li> -->


                </ul>

                <div class="btn-group pull-right" role="group" aria-label="..." class="{{$a}}">
                    <!-- <a href="#" style="display:block !important;" class="btn btn-primary btn-sm cart"
                           data-toggle="tooltip" data-placement="bottom" title="" data-original-title="CART">
                            <i class="fa fa-shopping-cart"></i> <span class="badge"><span id="user_basket_quantity"
                                                                                          class="user_basket_quantity"><span
                                        class="count_course">{{Cart::count()}}</span></span></span>
                        </a> -->
                    <div class="btn-group pull-right" role="group" aria-label="..." >
                        <div class="dropdown">
                            <a class="btn btn-secondary secondary dropdown-toggle {{$a}}" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Language
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item {{$a}}" href="http://www.jsmbeauty.us/" >USA/English</a>
                                <a class="dropdown-item {{$a}}" href="http://www.jsmbeauty.cn/" >中文</a>
                                <a class="dropdown-item {{$a}}" href="http://www.jsmbeauty.jp/" >日本語</a>
                                @if($locale==='th')
                                <a class="dropdown-item {{$a}}" href="{{ url('lang/en') }}" >ประเทศไทย/อังกฤษ</a>
                                @else
                                <a class="dropdown-item {{$a}}" href="{{ url('lang/th') }}" >ประเทศไทย/ไทย</a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>



                @else

                <ul id="menu-topbar" class="list-inline">


                    <li>
                        <a href="/index/login" class="{{$a}}"><img src="/jsmbeauty/src/Icon/1.png" style="width: 20px;">
                            @lang('lang.login')
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('register') }}" class="{{$a}}"><img src="/jsmbeauty/src/Icon/2.png" style="width: 20px;">
                            @lang('lang.join')
                        </a>
                    </li>
                    <!-- <li >
                            <a href="#" >
                                <img src="/jsmbeauty/src/Icon/3.png" style="width: 20px;"> @lang('lang.order')
                            </a>
                        </li> -->

                </ul>

                <div class="btn-group pull-right" role="group" aria-label="..." >
                    <div class="dropdown">
                        <a class="btn btn-secondary secondary dropdown-toggle {{$a}}" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            Language
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item {{$a}}" href="http://www.jsmbeauty.us/" >USA/English</a>
                            <a class="dropdown-item {{$a}}" href="http://www.jsmbeauty.cn/" >中文</a>
                            <a class="dropdown-item {{$a}}" href="http://www.jsmbeauty.jp/" >日本語</a>
                            @if($locale==='th')
                            <a class="dropdown-item {{$a}}" href="{{ url('lang/en') }}" >ประเทศไทย/อังกฤษ</a>
                            @else
                            <a class="dropdown-item {{$a}}" href="{{ url('lang/th') }}" >ประเทศไทย/ไทย</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <!-- <a href="#" style="display:block !important;" class="btn btn-primary btn-sm cart"
                           data-toggle="tooltip" data-placement="bottom" title="" data-original-title="CART">
                            <i class="fa fa-shopping-cart"></i> <span class="badge"><span id="user_basket_quantity"
                                                                                          class="user_basket_quantity"><span
                                        class="count_course">{{Cart::count()}}</span></span></span>
                        </a> -->
                    <!-- <a href="{{ url('lang/th') }}" class="btn btn-primary btn-sm"
                           style="border-left: 1px solid rgba(255,255,255,0.2);padding-top: 4px; padding-bottom: 8px;">
                            <strong>TH</strong>
                        </a>
                        <a href="{{ url('lang/en') }}" class="btn btn-primary btn-sm"
                           style="border-left: 1px solid rgba(255,255,255,0.2);padding-top: 4px; padding-bottom: 8px;">
                            <strong>English</strong>
                        </a> -->
                </div>



                @endauth




            </nav>
        </div>
    </div>
    <!-- //top bar -->
    <div id="ju-header-navi" data-spy="affix" data-offset-top="150" class="affix-top heads">
        <!-- style="background-color: rgba(255, 255, 255, 0.65);" -->
        <div class="ju-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2">
                        <div class="logo">
                            <a href="/" style="margin-right: auto;"><img src="{!!asset('jsmbeauty/src/logo1.png')!!}"
                                    class="img-responsive _mg-top"></a>

                            <button type="button"
                                class="btn-header-search btn btn-default pull-right hidden-lg hidden-md _bar _mg-top"
                                data-toggle="modal" data-target="#juSearch">
                                <i class="fa fa-search"></i>
                            </button>

                            <button type="button" class="btn btn-default hidden-lg hidden-md _bar _mg-top"
                                data-toggle="modal" data-target="#myNavbar">
                                <i class="fa fa-bars"></i>
                            </button>


                        </div>
                    </div>

                    <div id="" class="collaspe in longmenu hidden-sm hidden-xs">
                        <div class="col-lg-9 col-md-10 longmenu">
                            <nav class="clearfix">
                                <ul id="menu-main-menu" class="pull-left">
                                    @foreach($datas as $i => $data)
                                    <li class="menu-item">
                                        <a href="#">
                                            @if($locale == 'th')
                                            {{$data['name_th']}}
                                            @else
                                            {{$data['name_en']}}
                                            @endif
                                        </a>
                                        <ul class="sub-menu" style="height: 230px;">
                                            @foreach($data['sub_menu'] as $sub)
                                            <li class="menu-item"><a href="{{$sub['uri']}}">
                                                    @if($locale == 'th')
                                                    {{$sub['name_th']}}
                                                    @else
                                                    {{$sub['name_en']}}
                                                    @endif
                                                </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-header-search btn btn-default pull-right "
                                    data-toggle="modal" data-target="#juSearch">
                                    <i class="fa fa-search"></i>
                                </button>

                            </nav>
                        </div>
                    </div>

                    <div id="myNavbar" class="modal in longmenu _mobile _desktop hidden-lg hidden-md"
                        style=" background-color: rgba(0, 0, 0, 0.9);">
                        <div class="col-lg-9 col-md-10 longmenu">
                            <nav class="clearfix">
                                <button type="button" class="close hidden-lg hidden-md" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times"
                                            style="color: #e51a92;zoom: 2;"></i></span>
                                </button>
                                <ul id="menu-main-menu" class="pull-left _mg-ul ">

                                    @foreach($datas as $i => $data)
                                    @if($locale == 'th')
                                    <li class="menu-item _li">
                                        <a href="#" style="color: #fff;">{{$data['name_th']}}</a>
                                        <ul class="sub-menu _ul">
                                            @foreach($data['sub_menu'] as $sub)
                                            <li class="menu-item"><a href="{{$sub['uri']}}" style="color: #aaa;">
                                                    @if($locale == 'th')
                                                    {{$sub['name_th']}}
                                                    @else
                                                    {{$sub['name_en']}}
                                                    @endif</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>

                                    @else
                                    <li class="menu-item _li">
                                        <a href="#" style="color: #fff;">{{$data['name_en']}}</a>
                                        <ul class="sub-menu _ul">
                                            @foreach($data['sub_menu'] as $sub)
                                            <li class="menu-item"><a href="{{$sub['uri']}}" style="color: #aaa;">
                                                    @if($locale == 'th')
                                                    {{$sub['name_th']}}
                                                    @else
                                                    {{$sub['name_en']}}
                                                    @endif</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="juSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-search"></i> SEARCH</h4>
                </div>
                <div class="modal-body">
                    <form action="/search" method="get">

                        <div class="input-group input-group-lg">
                            <input name="datasearch" value="" class="MS_search_word form-control" placeholder="">
                            <span class="input-group-btn">
                                <button class="btn btn-primary btnlogin" type="submit">SEARCH</button>
                            </span>
                        </div>
                        <!-- input-group -->
                    </form>
                    <hr class="clear sm">
                </div>
            </div>
        </div>
    </div>

</header>
