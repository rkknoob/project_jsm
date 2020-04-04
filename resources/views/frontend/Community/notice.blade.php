@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.bbs-table-list thead th {
    font-size: 13px !important;
}

tr {
    height: 30px !important;
}

td {
    padding-top: 5px !important;
}

.MS_input_txt {
    padding: 2px 0 0 2px;
    height: 17px;
    line-height: 17px;
    border: 1px solid #dcdcdc;
}

tr {
    border-bottom: 1px dotted #dcdcdc !important;
    padding: 1%;
}

#text {
    color: black !important;
}

#text:hover {
    color: #e51a92 !important;
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
            <div style="padding: 1% 3%;">
                <form style="text-align: right;">
                    <input type="radio" name="Name" value="Name"><label
                        style="padding-right: 2%;padding-left: 0.5%;">Name</label>
                    <input type="radio" name="Title" value="Title"><label
                        style="padding-right: 2%;padding-left: 0.5%;">Title</label>
                    <input type="radio" name="Content" value="Content"><label
                        style="padding-right: 2%;padding-left: 0.5%;">Content</label>
                    <span>
                        <input type="text" class="MS_input_txt" style="padding: 0.5px; height: 20px;">
                        <img src="{!!asset('jsmbeauty/src/Icon/btn_bbs_sch.gif')!!}" style="height: 20px;">
                    </span>
                </form>
            </div>
            <div>
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
                            @foreach ($item as $Notice)
                            <tr>
                                <td>
                                    <div class="tb-center">{{ $Notice->id }}</div>
                                </td>
                                <td>
                                    <div class="tb-center">{{ $Notice->type }}</div>
                                </td>
                                <td>
                                    <div class="tb-left">
                                        <a href="{{ url('/notice/detail', ['id'=>$Notice->id]) }}" id="text"
                                            class="b_subject">{{ $Notice->content }}</a>
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
                            {!! $item->render() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection