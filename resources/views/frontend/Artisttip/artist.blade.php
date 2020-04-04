@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

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

#ju-container .ju-page-title {
    margin-top: 200px;
}

.letters {
    letter-spacing: 0.2px;
    font-weight: 100;
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
        margin-bottom: 40px !important;
    }

    .distance {
        padding: 0px 5px !important;
    }

}

.distance {
    padding: 15px 5px;
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

        <div id="bbsData">
            <div class="page-body">
                <div class="bbs-table-list tabs-wrap">

                    @foreach ($list as $chunk)
                    <div class="row">
                        <div class="video-list" style="float: right;">
                            @foreach ($chunk as $list)
                            <div class="col-xl-3 col-md-3 col-sm-6 col-xs-6 distance">
                                <div class="box">
                                    <a href="{{ url('artisttip', ['id'=>$list->id]) }}" class="video_link">

                                        <div class="video_txt">
                                            <h6 class="letters">
                                                @if($locale=='en')
                                                {{ $list->title_en }}
                                                @else
                                                {{ $list->title_th }}
                                                @endif

                                            </h6>
                                        </div>

                                        <div class="video-thumbnail">
                                            <img src="/public/artisttip/{{ $list->img_banner }}"
                                                class="attachment-large size-large wp-post-image" alt="4">
                                        </div>

                                    </a>
                                    <hr class="clear sm">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <nav class="text-center">
            <ul class="pagination">
                {!! $item->render() !!}
            </ul>
        </nav><!-- .page-body -->

    </div><!-- #bbsData -->
</div><!-- #contentWrap -->

@endsection