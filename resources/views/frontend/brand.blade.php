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

    <title> JUNG SAEM MOOL </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')
<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title">
            <h1 class="entry-title text-gotham text-center">Brand JSM</h1>
            <div class="text-center text-gotham">Brand JUNGSAEMMOOL
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="/brand" class="letters">Concept</a></li>
            <li><a href="/brand/film" class="letters">Film</a></li>
            <li><a href="/brand/magazines" class="letters">Magazine</a></li>
        </ul>
        <div class="tabs-wrap">
            <DIV id=MS_WritenBySEB1>
                <div>
                    <img src="{!!asset('jsmbeauty/src/artist/brand_jsm_en.jpg')!!}">
                </div>
            </DIV>
        </div>

    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->
<!-- //content -->


@endsection