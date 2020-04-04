<style>
@media (min-width: 900px) {

    /* .longmenu {
        display: block;

    } */

    body {
        overflow-y: scroll;
        overflow-x: hidden;
    }

}
</style>


<header id="ju-header">
    <!-- top bar -->
    <div id="topBar">
        <div class="container">
            <nav class="text-right clearfix">
                <ul id="menu-topbar" class="list-inline">
                    <li><a href="{{ url('login') }}"><img src="/jsmbeauty/src/Icon/1.png" style="width: 20px;"> LOGIN
                        </a></li>
                    <li><a href="{{ url('register') }}"><img src="/jsmbeauty/src/Icon/2.png" style="width: 20px;">
                            JOIN</a></li>
                    <li><a href=""><img src="/jsmbeauty/src/Icon/3.png" style="width: 20px;"> ORDER</a></li>
                </ul>

                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a href="#" style="display:block !important;" class="btn btn-primary btn-sm cart"
                        data-toggle="tooltip" data-placement="bottom" title="" data-original-title="TEST">
                        <i class="fa fa-shopping-cart"></i> <span class="badge"><span id="user_basket_quantity"
                                class="user_basket_quantity"><span
                                    class="count_course">{{Cart::count()}}</span></span></span>
                    </a>
                    <a href="{{ url('lang/th') }}" class="btn btn-primary btn-sm"
                        style="border-left: 1px solid rgba(255,255,255,0.2);padding-top: 4px; padding-bottom: 8px;">
                        <strong>TH</strong>
                    </a>
                    <a href="{{ url('lang/en') }}" class="btn btn-primary btn-sm"
                        style="border-left: 1px solid rgba(255,255,255,0.2);padding-top: 4px; padding-bottom: 8px;">
                        <strong>English</strong>
                    </a>
                    <!-- <a href="" class="btn btn-primary btn-sm" style="border-left: 1px solid rgba(255,255,255,0.2);padding-top: 4px; padding-bottom: 8px;">
                        <strong>TEST</strong>
                    </a> -->
                </div>
            </nav>
        </div>
    </div>
    <!-- //top bar -->
    <div id="ju-header-navi" data-spy="affix" data-offset-top="150" class="affix-top heads"
        style="background-color: rgba(255, 255, 255, 0.65);">
        <div class="ju-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2">
                        <div class="logo">
                            <a href="/" style="margin-right: auto;"><img src="{!!asset('jsmbeauty/src/logo1.png')!!}"
                                    class="img-responsive _mg-top"></a>

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
                                    <li class="menu-item">
                                        <a href="#">JUNGSAEMMOOL</a>
                                        <ul class="sub-menu" style="height: 230px;">
                                            <li class="menu-item"><a href="/brand">Brand JSM</a></li>
                                            <li class="menu-item"><a href="/artist">Artist JSM</a></li>
                                            <li class="menu-item"><a href="/artist/tip">ARTIST TIP</a></li>
                                            <li class="menu-item"><a href="/store">FIND A STORE</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item">
                                        <a href="/Product/Category/list/cid/10">ALL PRODUCTS</a>
                                        <ul class="sub-menu" style="height: 230px;">
                                            <li class="menu-item"><a href="/Product/Category/list/cid/9">BEST
                                                    SELLERS</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/1">BASE</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/2">LIP</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/3">EYE</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/4">SKIPCARE</a>
                                            </li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/5">TOOL</a></li>

                                        </ul>
                                    </li>
                                    <li id="menu-item-1467" class="menu-item">
                                        <a href="/event">LOUNGE</a>
                                        <ul class="sub-menu" style="height: 230px;">
                                            <li class="menu-item"><a href="/event">EVENT</a></li>
                                            <li class="menu-item"><a href="/linestory">LINE STORY</a></li>
                                            <!-- <li class="menu-item"><a href="">MEMBERSHIP</a></li> -->
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/faq">CONTACT</a>
                                        <ul class="sub-menu" style="height: 230px;">
                                            <li class="menu-item"><a href="/faq">FAQ</a></li>
                                            <li class="menu-item"><a href="/Notice">Notice</a></li>
                                            <li class="menu-item"><a href="/QA">Q&amp;A</a></li>
                                            <li class="menu-item"><a href="/review">REVIEW</a></li>
                                        </ul>
                                    </li>
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
                                    <li class="menu-item _li">
                                        <a href="#" style="color: #fff;">JUNGSAEMMOOL</a>
                                        <ul class="sub-menu _ul">
                                            <li class="menu-item"><a href="/brand" style="color: #aaa;">Brand JSM</a></li>
                                            <li class="menu-item"><a href="/artist" style="color: #aaa;">Artist JSM</a></li>
                                            <li class="menu-item"><a href="/artist/tip" style="color: #aaa;">ARTIST TIP</a></li>
                                            <li class="menu-item"><a href="/store" style="color: #aaa;">FIND A STORE</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item _li">
                                        <a href="/Product/Category/list/cid/10" style="color: #fff;">ALL PRODUCTS</a>
                                        <ul class="sub-menu _ul">
                                            <li class="menu-item"><a href="/Product/Category/list/cid/10" style="color: #aaa;">BEST
                                                    SELLERS</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/1" style="color: #aaa;">BASE</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/2" style="color: #aaa;">LIP</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/3" style="color: #aaa;">EYE</a></li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/4" style="color: #aaa;">SKIPCARE</a>
                                            </li>
                                            <li class="menu-item"><a href="/Product/Category/list/cid/5" style="color: #aaa;">TOOL</a></li>

                                        </ul>
                                    </li>
                                    <li id="menu-item-1467" class="menu-item _li">
                                        <a href="/event" style="color: #fff;" style="color: #aaa;">LOUNGE</a>
                                        <ul class="sub-menu _ul">
                                            <li class="menu-item"><a href="/event" style="color: #aaa;">EVENT</a></li>
                                            <li class="menu-item"><a href="/linestory" style="color: #aaa;">LINE STORY</a></li>

                                        </ul>
                                    </li>
                                    <li class="menu-item _li">
                                        <a href="/faq" style="color: #fff;">CONTACT</a>
                                        <ul class="sub-menu _ul">
                                            <li class="menu-item"><a href="/faq" style="color: #aaa;">FAQ</a></li>
                                            <li class="menu-item"><a href="/Notice" style="color: #aaa;">Notice</a></li>
                                            <li class="menu-item"><a href="/QA" style="color: #aaa;">Q&amp;A</a></li>
                                            <li class="menu-item"><a href="/review" style="color: #aaa;">REVIEW</a></li>
                                        </ul>
                                    </li>
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
                                <button class="btn btn-primary" type="submit">SEARCH</button>
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
