@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.bbs-table-list thead th {
    /* color: #9d9d9d;
    font-weight: bold;
    font-size: 11px;
    border-top: 1px solid #e5e5e5;
    border-bottom: 1px solid #e5e5e5; */
}

.bbs-table-list tbody td {
    padding: 6px 0;
}

.text-review {
    padding-top: 30px;

}

.text-product-name {
    /* border-top: dotted;
    border-bottom: dotted;
    border-width: 1px 1px;*/
    text-align: center;
    border-top: 1px solid #e5e5e5;
    border-bottom: 1px solid #e5e5e5;
}

.text-product-detail {
    border-bottom: 1px solid #e5e5e5;
}

.bord {
    border-top: dotted;
    border-bottom: dotted;
    border-width: 1px 1px;
}

.text-hit {
    text-align: right;
}

.icon {
    color: #F51D30 !important;
}

.review {
    color: #777 !important;
}

.review:hover {
    color: #e51a94 !important;
}

.distance {
    padding-top: 16px !important;
}

@media(max-width:767px) {
    .text-hit {
        text-align: left;
    }


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

            <div class="row" style="border-style: groove ;border-width: 5px;border: 3px solid #e0e0e0;">
                <div class="col-md-3 col-sm-12">
                    <div>
                        <div style="border-right: groove">
                            <div class="tb-center">
                                <img src="/public/product/{{$product_details->cover_img}}" height="100" width="100"
                                    class="img-fluid rounded mx-auto">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 text-review">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            Item name : {{$product_details->name_en}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            Item price : <b>{{$product_details->price}} B</b>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row text-product-name">
                <div class="col-md-12 col-sm-12">
                    <b>{{$revi->title}}</b>
                </div>
            </div>
            <div class="row text-product-detail">
                <div class="col-md-2 col-sm-12">
                    Date:
                    {{ substr($revi->created_at,0,10) }}
                </div>
                <div class="col-md-2 col-sm-12">
                    Score:
                    @for ($i = 0; $i < $revi->score; $i++)
                        <span class="icon">★</span>
                        @endfor
                </div>

                <div class="col-md-8 col-sm-12 text-hit">
                    Hits: {{$revi->hit}}
                </div>
            </div>

            <div class="row text-product-detail">
                <div class="form-group col-md-12">
                    <!-- <div class="tabs-wrap"> -->
                    <div>
                        <br />
                        {!! $revi->content !!}
                        <br />
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <br />
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
                            @foreach ($reviews as $reviewss)
                            <tr>
                                <td class="distance">
                                    <div class="tb-center">
                                        {{$reviewss['id']}}
                                    </div>
                                </td>
                                <td>
                                    <div class="tb-center">
                                        <img src="/public/product/{{$reviewss['product']['cover_img']}}" height="42"
                                            width="42" class="img-fluid rounded mx-auto">

                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-left">

                                        <a href='/review/board/view/category/{{$reviewss['id']}}/{{$reviewss['product_id']}}'
                                            class="review">{{$reviewss['title']}}</a>
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-center">
                                        @for ($i = 0; $i < $reviewss['score']; $i++) <span class="icon">★</span>
                                            @endfor
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-center">
                                        {{$reviewss['created_at']}}
                                    </div>
                                </td>
                                <td class="distance">
                                    <div class="tb-center">
                                        {{$reviewss['hit']}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <ul class="pagination">

                    </ul>
                </div>
            </div>

        </main>
    </div>
</div>

@endsection