@extends('layouts.template.frontend')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JUNG SAEM MOOL｜Cosmetics - Official Site</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<style>
    #ju-container .ju-page-title {
        margin-top: 179px;
    }

</style>
@section('content')
    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title">
                <h1 class="entry-title text-gotham text-center">Brand JSM</h1>
                <div class="text-center text-gotham">Brand JUNGSAEMMOOL</div>
            </div>


            <ul class="nav nav-tabs">
                <li><a href="/brand" class="letters">Concept</a></li>
                <li><a href="/brand/film" class="letters">Film</a></li>
                <li class="active"><a href="/brand/magazines" class="letters">Magazines</a></li>
            </ul>



            <div class="bbs-table-list">
                <div class="fixed-img-collist video-list">
                    <div class="row">
                        @foreach ($item as $Magazines)
                        <div class="col-lg-3 col-md-3">
                            <div class="box">
                                <a href="#" class="video_link">
                                    <div class="video_txt">
                                        <h5 class="letters">{{ $Magazines->topic_name }}</h5>
                                        <p class="letters"></p>
                                    </div>
                                    <div class="video-thumbnail">
                                        <img src="{{$Magazines->img_banner}}" class="attachment-large size-large wp-post-image" alt="4">
                                    </div>
                                </a>
                                <hr class="clear sm">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <nav class="text-center">
                <ul class="pagination">
                    <li><span class="page-numbers current">1</span></li>
                </ul>
            </nav>
            <div class="paging">
                <ol class="paging">
                    <li class="now"><a href="/Board/list/board_name/media_2/page/1/pnum/15">1</a></li>
                </ol>
            </div>
        </div>
    </div><!-- .page-body -->
    <!-- //content -->


@endsection


