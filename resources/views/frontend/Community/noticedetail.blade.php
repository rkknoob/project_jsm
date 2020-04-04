@extends('layouts.template.frontend')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM ARTIST </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <style>
    #ju-container .ju-page-title {
        margin-top: 179px;
        margin-bottom: 0px !important;
    }

    .bbs-table-list thead th {
        font-size: 13px !important;
    }

    tr {
        height: 30px !important;
    }

    td {
        padding-top: 5px !important;
        border-bottom: 1px solid #e5e5e5;
    }

    th {
        color: #9d9d9d;
        font-weight: 500;
        font-size: 16px;
        border-top: 1px solid #e5e5e5;
        border-bottom: 1px solid #e5e5e5;
    }

    #text {
        color: black !important;
    }

    #text:hover {
        color: #e51a92 !important;
    }

    .text-active {
        font-weight: bold;
        text-decoration: underline;
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
            <table summary="Read" style="width: 100%; margin-bottom: 5%;">
                <caption></caption>
                <thead>
                    <tr>
                        <th>
                            <div class="tb-center">{{ $item->content}}</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="line">
                            <div class="cont-sub-des">
                                <div>
                                    <span>
                                        <em>Date :</em>
                                        <span title="">{{ substr($item->created_at,0,10) }}</span>
                                    </span>
                                </div>
                                <div>
                                    <span><em>Name :</em> {{ $item->name }} </span>
                                </div>
                                <div class="hit"><span><em>Hits :</em> {{ $item->hit }}</span></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="data-bd-cont">
                                <div id="MS_WritenBySEB" style="margin-top:20px;">
                                    <div>
                                        <img src="/public/notice/{{ $item->detail }}">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="view-link" style="text-align: right;">
                <dl class="bbs-link con-link">
                    <dt></dt>
                    <dd></dd>
                </dl>
                <dl class="bbs-link">
                    <dt></dt>
                    <dd>
                        <a id="text" href="javascript:;" onclick="window.location='/notice'">|View List</a>
                    </dd>
                </dl>
            </div>
            <div style="padding-bottom: 7%;">
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
                                <th scope="col"></th>

                                <th scope="col">
                                    <div class="tb-center">Content</div>
                                </th>
                                <th scope="col">
                                    <div class="tb-center">Name</div>
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
                            @foreach ($itemAll as $Notice)
                            <tr>
                                <td>
                                    <div class="tb-center">{{ $Notice->id }}</div>
                                </td>
                                <td>
                                    <div class="tb-center">{{ $Notice->type }}</div>
                                </td>
                                <td>
                                    <div class="tb-left">
                                        @if($Notice->id==$id)
                                        <a href="{{ url('/notice/detail', ['id'=>$Notice->id]) }}" id="text"
                                            class="b_subject text-active">{{ $Notice->content }}</a>
                                        @else
                                        <a href="{{ url('/notice/detail', ['id'=>$Notice->id]) }}" id="text"
                                            class="b_subject">{{ $Notice->content }}</a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="tb-center">{{ $Notice->name }}</div>
                                </td>
                                <td>
                                    <div class="tb-center"><span
                                            title="09:13:50.927994">{{ substr($Notice->created_at,0,10) }}</span></div>
                                </td>
                                <td>
                                    <div class="tb-center">{{ $Notice->hit }}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav class="text-center">
                        <ul class="pagination">
                            {!! $itemAll->render() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection