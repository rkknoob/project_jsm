@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 10px;
}
/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {
    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px!important;
    }
    .store-list{
        padding-bottom: 0px!important;
    }
}
</style>


@section('content')
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

        <div class="store-list" style="padding-bottom:50px;">
            <div class="row" style="display: flex;justify-content: center;">
            </div>
        </div>

        <div class="depart" style="padding-bottom:100px;">

            @foreach($type as $i => $banners )

            @if($banners['sorting']==1)

            @else
            <div class="ju-page-title">
                <h1 class="entry-title"> {{$banners['name']}} </h1>
            </div>
            @endif


            @foreach(array_chunk($banners['item'], 4) as $row)
            <div class="row">
                @foreach($row as $products)
                @if($products['is_active']=="Y")
                @if($banners['sorting']==1)
                <div class="wpb_single_image wpb_content_element vc_align_center">
                    <a href="{{ url('/store/detail', ['id'=>$products['id']]) }}">
                        <img src="public/findstore/{{$products['img1']}}">
                    </a>
                </div>

                @else

                <div class="col-md-3 col-sm-4 col-xs-6" style="padding:0px 3px">
                    <a href="{{ url('/store/detail', ['id'=>$products['id']]) }}" class="store_img online"
                        style="background-image: url(public/findstore/{{$products['img1']}});"></a>
                    <h5 style="margin-top: 20px; letter-spacing: -1px;">{{$products['name_en']}} </h5>
                    <hr class="clear sm">
                </div>

                @endif

                @endif
                @endforeach
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div>

@endsection