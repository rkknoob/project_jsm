@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

@media (min-width: 900px) {

    .longmenu {
        display: block;

    }

    body {
        overflow-y: scroll;
        overflow-x: hidden;
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

}

/* Horizontal 6/7/8 Plus*/

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

<div id="main">
    <div id="ju-container" style="margin-top: 179px;">
        <div id="ju-content" class="container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="ju-page-title">
                @if($locale==='th')
                <h1 class="entry-title text-thai text-center">{{$subject->subject_th}}</h1>
                <div class="text-center text-thai">{{$subject->summary_th}}</div>
                @else
                <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
                <div class="text-center text-gotham">{{$subject->summary_en}}</div>
                @endif

            </div>
            <div class="wpb_single_image wpb_content_element vc_align_center" style="margin-bottom: 10%;">
                <div>
                    

                        @if($locale==='th')
                        <h4 class="entry-title text-thai text-left" style="color: #777;">
                            จองแซมมุล {{ $event->topic_th }}
                        </h4>
                        @else
                        <h4 class="entry-title text-gotham text-left" style="color: #777;">
                            JUNGSAEMMOOL {{ $event->topic_en }}
                        </h4>
                        @endif

                  
                    <br>
                </div>
                <div class="html-content">
                    @if($locale==='th')
                    {!! $event->detail_th !!}
                    @else
                    {!! $event->detail_en !!}
                    @endif
                </div>
            </div>
            <hr size="1" color="#E5E5E5">
            <div class="view-link col-sm-4 col-sm-offset-4">
                <dl class="bbs-link">
                    <dt></dt>
                    <dd>
                        <a href="javascript:;" onclick="window.location='/event'"
                            class="btn btn-primary btn-lg btn-block">View List</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

</div>
@endsection

<!-- Scripts -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>