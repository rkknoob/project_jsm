@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}
/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px!important;
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
            <h1>{{$subject->subject_th}}</h1>
            <div>{{$subject->summary_th}}</div>
            @else
            <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
            <div class="text-center text-gotham">{{$subject->summary_en}}</div>
            @endif
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="/brand/" class="letters">@lang('lang.concept')</a></li>
            <li><a href="/brand/film/" class="letters">@lang('lang.film')</a></li>
            <li><a href="/brand/magazine/" class="letters">@lang('lang.magazine')</a></li>
        </ul>
        <div class="tabs-wrap">
            <DIV id=MS_WritenBySEB1>
                <div>
                @if($locale==='th')
                    <img src="{{ url('/public/brandjsm/'.$brand->img_th) }}"
                        class="attachment-large size-large wp-post-image" alt="4">
                @else
                    <img src="{{ url('/public/brandjsm/'.$brand->img_en) }}"
                        class="attachment-large size-large wp-post-image" alt="4">
                @endif

                </div>
            </DIV>
        </div>
    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->
<!-- //content -->


@endsection
