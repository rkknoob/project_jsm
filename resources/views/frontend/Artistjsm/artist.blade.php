@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM ARTIST </title>
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
            <li class="active"><a href="/artist" class="letters">Introduction</a></li>
            <li><a href="/artist/magazines" class="letters">Magazine</a></li>
        </ul>
        <div class="tabs-wrap">
            <div>
                @if($locale==='th')
                    <img src="{{ url('/public/magazine/'.$numberMagazine->img_url_thai) }}"
                        class="attachment-large size-large wp-post-image" alt="4">
                @else
                    <img src="{{ url('/public/magazine/'.$numberMagazine->img_url) }}"
                        class="attachment-large size-large wp-post-image" alt="4">
                @endif
            </div>
        </div>

    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->
<!-- //content -->


@endsection