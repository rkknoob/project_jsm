@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.img-responsive {
    width: 100%;
}

.text-topic {
    color: #333;
    font-size: 15px;
    line-height: 1.25;
    padding-left: 5px;
}

.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}

.label-danger {
    background-color: #e51a92 !important;
}

.fa-calendar {
    color: #333;
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

    <title> JSM PRODUCT </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')
@php
$locale = session()->get('locale');
@endphp

<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title">
            @if($locale==='th')
            <h1 class="entry-title text-thai text-center">{{$subject->subject_th}}</h1>
            <div class="text-center text-thai">{{$subject->summary_th}}</div>
            @else
            <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
            <div class="text-center text-gotham">{{$subject->summary_en}}</div>
            @endif
        </div>

        <div class="title">
            <ul class="nav nav-tabs">
                <li class="active"><a href="/event"><strong>Ongoing Event</strong></a></li>
                <li><a href="/event/endevent" class="letters"><strong>End Event</strong></a></li>
            </ul>
            <hr class="clear">
        </div>

        <hr class="clear">
        @foreach ($products->chunk(2) as $chunk)
        <div class="row">
            @foreach ($chunk as $products)
            <div class="col-md-6">
                <div class="thumbnail event">

                    <a class="thumnail_img" href="{{ url('/event/details', ['id'=>$products->id]) }}">


                        <img src="/public/event/{{ $products->banner2 }}" class="img-responsive">
                    </a>
                    <div class="caption">
                        <h5 class="letters">

                            <a href="{{ url('/Event/details', ['id'=>$products->id]) }}" class="text-primary"
                                rel="bookmark">


                                <i class="fa fa-calendar"></i>
                                <span class="text-topic">


                                    @if($locale==='th')
                                    จองแซมมุล {{ $products->topic_th }}
                                    @else
                                    JUNGSAEMMOOL {{ $products->topic_en }}
                                    @endif


                                </span>
                            </a>
                            <span class="label label-danger text-white letters" style="margin-left:5px;"> 0 </span>
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach

        <nav class="text-center">
            <ul class="pagination">
                {!! $item->render() !!}
            </ul>
        </nav>

    </div>
    <!--#ju-content-->
</div>
<!--#ju-container-->


@endsection