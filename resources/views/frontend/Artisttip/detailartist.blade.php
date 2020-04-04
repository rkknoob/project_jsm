@extends('layouts.template.frontend')

@section('content')
@php
$locale = session()->get('locale');
@endphp

<style>
.title {
    margin-bottom: 65px;
}

.tabs-wrap {
    border: 0;
    border-top: 0px;
    padding-top: 15px;
}

.view_none img {
    display: none;
}

.note-video-clip {
    width: 100%;
    height: 600px;
}

.btn-listview {
    width: 367px;
    height: 45px;

}

.letters1 {
    letter-spacing: 0.1px;
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
    .note-video-clip {
        width: 320px!important;
        height: 220px !important;
    }
}
</style>
@php
$locale = session()->get('locale');
@endphp

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
        <hr class="clear">
        <h3 class="letters letters1" style="text-align: left; margin-bottom: 5%;">
            @if($locale=='en')
            {{ $item->title_en }}
            @else
            {{ $item->title_th }}
            @endif
        </h3>
        <main id="review-board-type">
            <div class="rbContent">
                <div class="content">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td>
                                    <div id="MS_WritenBySEB1">
                                        @if($locale=='en')
                                        {!! $item->detail_en !!}
                                        @else
                                        {!! $item->detail_th !!}
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="rb_icons"> </div>
            </div>
            <hr>
            <hr>
        </main>
        <div class="row" style="padding-bottom:50px;">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-12">
                <div class="write-btn">
                    <a href="/artisttip" class="btn btn-primary btn-lg btn-block letters letters1 btn-listview">View
                        List</a>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

@endsection