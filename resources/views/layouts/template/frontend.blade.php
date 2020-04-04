<!DOCTYPE html>
<html>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JUNG SAEM MOOL </title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="icon" href="{!! asset('/jsmbeauty/src/icon.png') !!}" type="image/x-icon" />
    <link rel="shortcut icon" href="{!! asset('/jsmbeauty/src/icon.png') !!}">

    <link rel="apple-touch-icon" href="{!! asset('/jsmbeauty/src/favicon.png') !!}">
    <link rel="apple-touch-icon-precomposed" href="{!! asset('/jsmbeauty/src/favicon.png') !!}">


    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/text-fonts.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/bootstrap-theme.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/common.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/footer.1.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/header.1.css') !!}">

    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/js_composer.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/main.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/sb-instagram.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/swiper.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('jsmbeauty/css/woocommerce.css') !!}">


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

    <!-- banner slide -->

    <!-- banner slide -->

</head>

<style type="text/css">




    @font-face {
        font-family: SukhumvitSet;
        src: url('/fonts/SukhumvitSet-Thin.ttf');
    }


    body {

    }
    .s {
        font-family: 'SukhumvitSet';
        font-style: normal;
        font-weight: bold;
    }







</style>

@php
    $locale = session()->get('locale');
if($locale == 'th'){

       $a = 'text-thai';
}else{

    $a = '';
}




@endphp



<body>

<div id="wrap-container">
    @include('layouts.template.frontend.header')

    <div id="main" class="{{$a}}">
        @yield('content')
    </div>

    @include('layouts.template.frontend.footer')

</div>


</body>

<!-- Scripts -->



@yield('scripts')
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src='{{asset('jsmbeauty/js/core.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/jquery.zoom.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/header.1.js')}}'></script>
<script src='{{asset('jsmbeauty/js/footer.1.js')}}'></script>
<script src='{{asset('jsmbeauty/js/bootstrap.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/js_composer_front.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/masterslider.min.js')}}'></script>
-->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src='{{asset('jsmbeauty/js/bootstrap.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/jquery.zoom.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/widget.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/wp-embed.min.js')}}'></script>
<script src='{{asset('jsmbeauty/js/tabs.min.js')}}'></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
-->


</html>
