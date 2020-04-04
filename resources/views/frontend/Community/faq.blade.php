@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.table>tbody>tr:last-child>td {
    border-bottom: 0px solid #333 !important;
}
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

    <title> JSM ARTIST </title>
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
        <!-- main -->
        <main id="faqWrap">
            <!-- 검색영역 -->
            <div class="search-wrap well">
                <div class="item-search input-group col-sm-6 col-sm-offset-3">
                    <label class="displaynone"> <select class="MS_input_select select-category custom-blue"
                            id="search-category">
                            <option value="">전체검색</option>
                            <option value="1">배송관련</option>
                            <option value="2">주문,결제</option>
                            <option value="3">취소,환불,교환</option>
                            <option value="4">쿠폰,포인트</option>
                        </select></label>
                    <span class="input-group-addon letters" style="border-right:0;"><i class="fa fa-search"></i></span>
                    <input id='faqSearch' class="MS_input_txt form-control" onKeyPress='javascript:faqEnter(event);'
                        type='text' value='' /> <span class="input-group-btn"><a href="javascript:faqSearch('keyword')"
                            class="btn btn-default letters">SEARCH</a></span>
                </div>
            </div>
            <!-- //검색영역 -->
            <input type="hidden" name="id" id="id" value="{{$id}}" />
            <ul class="nav nav-tabs">
                <li class="{{ ($id == 0) ? 'active' : '' }}"><a href="/faq">All</a></li>
                @foreach($cate_faq as $cate_faqs)
                <li class="{{ ($cate_faqs->id == $id) ? 'active' : '' }}">
                    <a href="/faq/{{$cate_faqs->id}}">
                        @if($locale==='th')
                        {{$cate_faqs->name_th}}
                        @else
                        {{$cate_faqs->name_en}}
                        @endif
                    </a>
                </li>
                @endforeach
            </ul><!-- .faq-category-->

            <div class="faq-list" style="padding-bottom:50px;">
                <table summary="faq" class="table panel">
                    <colgroup>
                        <col width="20%" />
                        <col width="*" />
                    </colgroup>
                    <tbody>
                        @foreach($faq as $faqs)
                        <tr uid="22">
                            <td class="col-sm-2">
                                <div class="tb-center" onclick="myFunction({{$faqs->id}})">
                                    <span class="label label-default" style="color: #0d0d0d">
                                        {{$faqs->folder->name_en}}
                                    </span>
                                </div>
                            </td>
                            <td class="col-sm-10">
                                <div class="tb-left">{{$faqs->subject}}</div>
                            </td>
                        </tr>
                        <tr uid="22" id="my{{$faqs->id}}" hidden>
                            <td colspan="6" style="background-color: #efefef">
                                <div class="tb-slide">
                                    <dl class="adv">
                                        <dt></dt>
                                        <dd>
                                            {{$faqs->answer}}
                                        </dd>
                                    </dl>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            </form>
        </main>
        <!-- //main -->
    </div>
    <!-- //contents -->
</div>


<script type="text/javascript">
function myFunction(id) {

    var x = document.getElementById("my" + id);
    if (x.style.display === "contents") {

        var x = document.getElementById("my" + id).style.display = 'none';
    } else {
        var x = document.getElementById("my" + id).style.display = 'contents';
    }
}
</script>



@endsection