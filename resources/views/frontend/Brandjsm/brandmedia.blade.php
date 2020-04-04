@extends('layouts.template.frontend')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JUNG SAEM MOOL｜Cosmetics - Official Site</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<style>
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

/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px;
    }
}
</style>
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
            <li><a href="/brand/film/" class="letters">@lang('lang.film')</a></li>
            <li class="active"><a href="/brand/magazine/" class="letters">@lang('lang.magazine')</a></li>

        </ul>
        <h3 class="letters">
            @if($locale==='th')
            {{ $numberMagazine->name_th }}
            @else
            {{ $numberMagazine->name_en }}
            @endif
            <br>
            <span class="label label-danger text-white"></span></h3>
        <div class="tabs-wrap" style="text-align: center;">

            <div>
                <input type="hidden" name="id" id="id" value="{{ $numberMagazine->type }}">

                <div>
                    <img src="{{ url('/public/brandjsm/'.$numberMagazine->img_en) }}"
                        class="attachment-large size-large wp-post-image">
                </div>
            </div>
        </div>
        <hr size="1" color="#E5E5E5" />
        <div class="view-link col-sm-4 col-sm-offset-4">
            <dl class="bbs-link">
                <dd>
                    <a class="displaynone"></a><a href="/brand/magazine" class="btn btn-primary btn-lg btn-block">
                        View List</a>
                </dd>
            </dl>
        </div>

    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->


@endsection