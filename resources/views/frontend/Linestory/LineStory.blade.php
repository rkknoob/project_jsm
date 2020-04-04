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

@section('content')
@php
$locale = session()->get('locale');
@endphp

<div id="ju-container">
    <div id="ju-content" class="container" style="margin-bottom:60px;">
        <div class="ju-page-title">

            @if($locale==='th')
            <h1 class="entry-title text-thai text-center">{{$subject->subject_th}}</h1>
            <div class="text-center text-thai">{{$subject->summary_th}}</div>
            @else
            <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
            <div class="text-center text-gotham">{{$subject->summary_en}}</div>
            @endif
        </div>

        @foreach ($item as $line)
        <div class="wpb_single_image wpb_content_element vc_align_center">
            <div style="margin-bottom: 30px;">

                <a href="{{ url('linestory/detail', ['id'=>$line->id]) }}">
                    <img SRC="/public/linestory/{{ $line->banner_en }}" border="0">
                </a>

                <BR>
            </div>
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