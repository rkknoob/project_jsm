@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

@media (min-width: 900px) {

    .longmenu {
        display: block;

    }

    body {
        overflow-y: scroll;
        overflow-x: hidden;
    }

}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="fOOdP2mKggRzBD2LfLPrR8uzpN5xdSoslLEQjNsd">

    <title> JSM Event </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')

<div id="main">
    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title">
                <h1 class="entry-title text-gotham text-center">Event</h1>
                <h6 class="entry-title text-gotham text-center" style="color: #777;">JUNGSAEMMOOL BEAUTY EVENT</h6>
            </div>
            <div class="wpb_single_image wpb_content_element vc_align_center" style="margin-bottom: 10%;">
                <div>
                    <h4 class="entry-title text-gotham text-left" style="color: #777;">JUNGSAEMMOOL GRAND OPENING</h4>
                </div>
                <a href="/Detail/Store">
                    <IMG src="/public/event/002.jpg">
                </a>
            </div>
            <hr size="1" color="#E5E5E5">
            <div class="view-link col-sm-4 col-sm-offset-4">
                <dl class="bbs-link">
                    <dt></dt>
                    <dd>
                        <a href="javascript:;" onclick="window.location='/store'"
                            class="btn btn-primary btn-lg btn-block">View List</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Scripts -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src='http://47.74.244.86:168/jsmbeauty/js/bootstrap.min.js'></script>
<script src='http://47.74.244.86:168/jsmbeauty/js/jquery.zoom.min.js'></script>
<script src='http://47.74.244.86:168/jsmbeauty/js/widget.min.js'></script>
<script src='http://47.74.244.86:168/jsmbeauty/js/wp-embed.min.js'></script>
<script src='http://47.74.244.86:168/jsmbeauty/js/tabs.min.js'></script>