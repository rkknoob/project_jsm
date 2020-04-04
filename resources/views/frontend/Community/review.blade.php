@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.bbs-table-list thead th {
    color: #9d9d9d;
    font-weight: bold;
    font-size: 11px;
    border-top: 1px solid #e5e5e5;
    border-bottom: 1px solid #e5e5e5;
}

.bbs-table-list tbody td {
    padding: 6px 0;
}

.distance{
    padding-top: 16px!important;
}

.review {
    color: #777 !important;
}

.review:hover {
    color: #e51a94 !important;
}

.icon {
    color: #F51D30 !important;
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
            <h1 class="entry-title text-thai text-center">{{$subject->subject_th}}</h1>
            <div class="text-center text-thai">{{$subject->summary_th}}</div>
            @else
            <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
            <div class="text-center text-gotham">{{$subject->summary_en}}</div>
            @endif

        </div>
        <!-- main -->
        <main id="review-board-list">

            <div style="padding: 3%;">
                <form style="text-align: right;" hidden>
                    <input type="radio" name="Name" value="Name"><label style="padding-right: 2%;">Name</label>
                    <input type="radio" name="Title" value="Title"><label style="padding-right: 2%;">Title</label>
                    <input type="radio" name="Content" value="Content"><label style="padding-right: 2%;">Content</label>
                    <span><input type="text" style="" style="margin: 3%;"><img
                            src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_bbs_sch.gif">
                    </span>

                </form>
            </div>
            <div style="padding-bottom: 3%;">
                <!-- <table>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col"></th>
                        </tr>
                        <tr>
                            <td>January</td>
                        </tr>
                    </table> -->
                <div class="bbs-table-list">
                    <table style="width: 100%;">
                        <colgroup>
                            <col width="50px">
                            <col width="130px">
                            <col width="*">
                            <col width="110px">
                            <col width="110px">
                            <col width="50px">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="tb-center">No.</div>
                                </th>
                                <th scope="col">
                                    <div class="tb-center">Product</div>
                                </th>
                                <th scope="col">
                                    <div class="tb-center">Title</div>
                                </th>
                                <th scope="col">
                                    <div class="tb-center">Score</div>
                                </th>
                                <th scope="col">
                                    <div class="tb-center">Date</div>
                                </th>
                                <th scope="col">
                                    <div class="tb-center">Hits</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $reviews)
                            <tr>
                                <td class="distance">
                                    <div class="tb-center">
                                        {{$reviews['id']}}
                                    </div>
                                </td>
                                <td>
                                    <div class="tb-center">
                                        <img src="/public/product/{{$reviews['product']['cover_img']}}" height="42"
                                            width="42" class="img-fluid rounded mx-auto">
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-left">

                                        <a href='/review/board/view/category/{{$reviews['id']}}/{{$reviews['product_id']}}'
                                            class="review">{{$reviews['title']}}</a>
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-center">
                                        @for ($i = 0; $i < $reviews['score']; $i++) <span class="icon">★</span>
                                            @endfor
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-center">
                                        {{ substr($reviews['created_at'],0,10) }}
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-center">
                                        {{$reviews['hit']}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- <div class="text-center">
                    <ul class="pagination">

                    </ul>
                </div> -->
            </div>

        </main>
    </div>
</div>

@endsection