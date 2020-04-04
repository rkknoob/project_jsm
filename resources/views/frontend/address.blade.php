@extends('layouts.template.frontend')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM Store </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>


<style>
    #ju-container .ju-page-title {
        margin-top: 179px;
        margin-bottom: 40px;
    }
    .embed-responsive-10by3 {
        padding-top: 30%;
    }

    .video {

        position: relative;


    }

</style>

@section('content')
    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title">
                <h1 class="entry-title">PLOPS</h1>
                <div></div>
            </div>
            <hr class="clear">
            <div class="grid">
                <div class="row video">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
                        </div>

                </div>
            </div>

            <DIV class="row-r" style="padding: 20px">
                <DIV class="col-sm-6 col-md-6">
                    <DIV class="media">
                        <DIV class="media-left"><SPAN class="fa-stack fa-lg fa-3x"><I class="fa fa-circle fa-stack-2x"></I><I class="fa fa-map-marker fa-stack-1x fa-inverse"></I></SPAN></DIV>
                        <DIV class="media-body">
                            <HR class="clear sm">
                            <H4 class="media-heading">ADDRESS / ที่อยู่</H4>
                            <P class="letters">40, Apgujeong-ro 12-gil, Gangnam-gu, Seoul, Republic of Korea</P>
                        </DIV>
                    </DIV>
                </DIV>
                <DIV class="col-sm-6 col-md-6">
                    <DIV class="media">
                        <DIV class="media-left">
                            <SPAN class="fa-stack fa-lg fa-3x"><I class="fa fa-circle fa-stack-2x"></I><I class="fa fa-phone fa-stack-1x fa-inverse"></I></SPAN>
                        </DIV>
                        <DIV class="media-body">
                            <HR class="clear sm">
                            <H4 class="media-heading">TEL / เบอร์โทร</H4>
                            <P class="letters">02-6713-5345</P>
                        </DIV>

                    </DIV>

                </DIV>

            </DIV>

            <HR class="clear">
                <DIV id="google_map" style="HEIGHT: 100px"></DIV>

                <DIV id="MS_WritenBySEB">
                    <IFRAME width="100%" height=550 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5421.537410349909!2d127.01998701314504!3d37.52241603540038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca3eb156e8985%3A0x91a6684fd95e1382!2z7ISc7Jq47Yq567OE7IucIOqwleuCqOq1rCDslZXqtazsoJXroZwxMuq4uCA0MA!5e0!3m2!1sko!2skr!4v1495671944783" frameBorder=0 style="BORDER-TOP: 0px; BORDER-RIGHT: 0px; BORDER-BOTTOM: 0px; BORDER-LEFT: 0px" allowfullscreen></IFRAME>
                    </HR>
                </DIV>
                <div class="view-link col-sm-4 col-sm-offset-4" style="margin-top:40px">
                    <dl class="bbs-link">
                        <dd>
                            <a href="/store" class="btn btn-primary btn-lg btn-block">View List</a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div><!--#ju-content-->
    </div><!--#ju-container-->
    <!-- //content -->

@endsection


