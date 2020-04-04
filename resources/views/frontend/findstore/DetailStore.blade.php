@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.btn-block {
    width: 100%;
    text-align: center;
    padding: 12px 15px;
    font-weight: bold;
    color: #fff !important;
    background: #292828 !important;
    border: 1px solid #292828 !important;
    border-radius: 0px !important;
}

.text--center {
    text-align: center;
}

.map-desktop {
    display: flex !important;
}

/* Vertical IPad Pro  && Horizontal IPad */
@media  screen and (max-width: 1024px) {
    .map-mobile {
        display: none !important;
    }
}

/* Vertical IPad */
@media  screen and (max-width: 768px) {
    .map-mobile {
        display: none !important;
    }
}


/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px !important;
    }

    .note-video-clip {
        width: 320px !important;
        height: 220px !important;
    }

    .text--center {
        text-align: left;
    }

    .map-mobile {
        display: none !important;
    }
}
</style>

@section('content')
@php
$locale = session()->get('locale');
@endphp

<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title">
            <h1 class="entry-title text-left">
                @if($locale=='en')
                {{$item->name_en}}
                @else
                {{$item->name_th}}
                @endif
            </h1>
        </div>

        <main id="review-board-type">
            <div class="rbContent">
                <div class="content">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>
                                    <div id="MS_WritenBySEB1" class="text--center">
                                        @if($locale=='en')
                                        {!! $item->detail_en !!}
                                        @else
                                        {!! $item->detail_th !!}
                                        @endif
                                    </div>
                                    <hr class="clear">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <span class="fa-stack fa-lg fa-3x">
                                                        <i class="fa fa-circle fa-stack-2x"></i>
                                                        <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <hr class="clear sm">
                                                    <h4 class="media-heading">ADDRESS / ที่อยู่</h4>
                                                    <p class="letters">{{$item->address}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left">
                                                    <span class="fa-stack fa-lg fa-3x">
                                                        <i class="fa fa-circle fa-stack-2x"></i>
                                                        <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <hr class="clear sm">
                                                    <h4 class="media-heading">TEL / เบอร์โทรศัพท์</h4>
                                                    <p class="letters">{{$item->tel}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="clear">
                                </td>
                            </tr>
                            <tr class="map-mobile map-desktop">
                                <td>
                                    <div cless="col-md-12 col-12 col-xs-12 " style="width:100%;">
                                        {!!$item->map!!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="rb_icons"> </div>
            </div>
            <div class="view-link col-sm-4 col-sm-offset-4">
                <dl class="bbs-link">
                    <dt></dt>
                    <dd style="margin: 10%;">
                        <a class="displaynone" href="/board/board.html?code=jsmbeauty_image15&page=&board_cate=&type=i">
                            글쓰기
                        </a>
                        <a href="/store" class="btn btn-primary btn-lg btn-block">
                            View List
                        </a>
                    </dd>
                </dl>
            </div>
            <hr>
            <hr>
        </main>
    </div>
</div>


@endsection