@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
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

@section('content')
@php
$locale = session()->get('locale');
@endphp
<div id="ju-container" style="margin-top: 8.5%;">
    <div class="top_sun01" style="text-align: center;">
        @if($locale==='en')
        @foreach($item as $line)
        <img src="/public/linestory/{{ $line->img_en }}" style="width: 100%;">
        @endforeach
        @elseif($locale==='th')
        <!-- <img src="/img/no_photo.jpg" style="width: 30%;"> -->
        @foreach($item as $line)
        <img src="/public/linestory/{{ $line->img_en }}" style="width: 100%;">
        @endforeach
        @endif
    </div>

</div>

@endsection