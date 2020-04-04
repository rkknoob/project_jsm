@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
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

/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px;
    }
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JUNG SAEM MOOL </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
@php
$locale = session()->get('locale');
@endphp
@section('content')
<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title">
            @if($locale==='th')
            <h1 class="entry-title text-thai">{{$subject->subject_th}}</h1>
            <div class="text-center text-thai">{{$subject->summary_th}}</div>
            @else
            <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
            <div class="text-center text-gotham">{{$subject->summary_en}}</div>
            @endif
        </div>
        <ul class="nav nav-tabs">
            <li><a href="/brand/" class="letters">@lang('lang.concept')</a></li>
            <li class="active"><a href="/brand/film/" class="letters">@lang('lang.film')</a></li>
            <li><a href="/brand/magazine/" class="letters">@lang('lang.magazine')</a></li>
        </ul>
        <div class="bbs-table-list" style="padding: 15px 0px;">
            <div class="fixed-img-collist video-list">
                @foreach ($film as $chunk)
                <div class="row">
                    @foreach ($chunk as $films)
                    <div class="col-lg-3 col-md-3 col-6 col-xs-6 ">
                        <div class="box">
                            <a href="/brand/film/media/cid/{{$films->id}}" class="video_link">
                                <div class="video_txt">
                                    <h6 class="letters">{{$films->name_en}}</h6>
                                    <p class="letters"></p>
                                </div>
                                <div class="video-thumbnail">
                                    <img width="683" height="1024" src="/public/brandjsm/{{$films->img_en}}"
                                        class="attachment-large size-large wp-post-image" alt="4">
                                </div>
                            </a>
                            <hr class="clear sm">
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>
        </div>


        <div class="text-center">
            <ul class="pagination">
                {!! $Paginate->render() !!}
            </ul>
        </div>
    </div>
</div><!-- .page-body -->

</div>
<!--#ju-content-->
</div>
<!--#ju-container-->
<!-- //content -->


@endsection