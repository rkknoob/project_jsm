@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
}

.bord {

    border-bottom: 2px solid #ddd;
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
            <div class="row">
                <div class="col-md-12 f_title_div" align="center">
                    {{$answer['title']}}
                </div>
            </div>
            <div class="row tabs-wrap bord">
                <div class="col-sm-12">Date : {{$answer['created_at']}} </div>
            </div>
            <div class="row tabs-wrap bord">
                <div class="col-md-6 col-sm-12 f_title_div">Name : {{$answer['usertopics']['fname']}}
                    {{$answer['usertopics']['lname']}} {{$answer['usertopics']['email']}}</div>
                <div class="col-md-6 col-sm-12 f_title_div" align="right">Hits : {{$answer['hit']}}</div>
            </div>
            <br>
            <div class="form-group col-md-12 bord" style="padding: 0px">
                <div class="tabs-wrap">
                    <div>

                        {!!$answer['content']!!}
                    </div>
                </div>
            </div>
            @foreach($answer['answer'] as $answers)
            <div class="row">
                <div class="form-group col-md-2" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>
                            JSM Thailand
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-8" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>

                            {!! $answers['details']!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="padding: 0px" align="center">
                    <div class="tabs-wrap">
                        <div>
                            {{ $answers['created_at']->format('Y-m-d') }}

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="row col-md-12">
                <div class="form-group col-md-1" style="padding: 0px">
                    <div class="tabs-wrap">
                        <!-- <div>


                                <button class="btn-edit" onclick="window.location.href='{{ url('/qa/board/edit/' . $answer['id']) }}'">Modifly</button>
                            </div> -->
                    </div>
                </div>
                <div class="form-group col-md-1" style="padding: 0px">
                    <div class="tabs-wrap">
                        <!-- <div>

                                <button class="btn-delete">Delete</button>
                            </div> -->
                    </div>
                </div>
                <div class="form-group col-md-2" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" style="padding: 0px">
                    <div class="tabs-wrap">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
            @auth
            <div class="form-group col-md-1">
                <a href="/qa/board"><img
                        src="//www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_bbs_sch.gif"><span>Write</span></a>
            </div>
            @endauth
            <input type="hidden" name="id" id="id" value="{{$answer['id']}}" />
            <input type="hidden" name="cate_type" id="cate_type" value="{{$cate_type}}" />
            <div class="form-group col-md-4">
                <select class="form-control" name="type" id="type" onchange="location = this.value;">
                    <option value="/qa">Please select the category</option>
                    @foreach($cates as $category)
                    <option value="/qa/cate/{{$category->id}}" {{ ($category->id == $cate_type) ? "selected" : "" }}>
                        {{$category->name}} </option>
                    @endforeach
                </select>
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

                            @foreach ($topics as $topics)
                            <tr>
                                <td>
                                    <div class="tb-center">
                                        {{$topics->id}}
                                    </div>
                                </td>
                                <td>
                                    <div class="tb-center">
                                        {{$topics->name}}

                                    </div>
                                </td>

                                <td>
                                    <div class="tb-left">
                                        @if(isset(Auth::user()->id))
                                        @if((Auth::user()->id) == ($topics->user_id) )
                                        <a
                                            href='/qa/board/view/category/{{$topics->user_id}}/{{$topics->id}}'>{{$topics->title}}</a>
                                        @else
                                        {{$topics->title}}
                                        @endif
                                        @else
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="tb-center">
                                        {{$topics->email}}
                                    </div>
                                </td>
                                <td>
                                    <div class="tb-center"><span
                                            title="09:13:50.927994">{{ substr($topics->created_at,0,10) }}</span></div>
                                </td>
                                <td>
                                    <div class="tb-center">{{$topics->hit}}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <ul class="pagination">
                        {!! $paginate->render() !!}
                    </ul>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
<script>
if (!window.moment) {
    document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css"
    rel="stylesheet">


<script type="text/javascript">
$('body').on('click', '.btn-delete', function(e) {
    e.preventDefault();

    var id = $('#id').val();

    deleteConf(id);
});

function deleteConf(id) {

    swal({
            title: "Are you sure?",
            text: name,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    dataType: 'json',
                    type: 'DELETE',
                    data: {
                        id: id
                    },
                    url: '/qa/dele/' + id,

                    success: function(datas) {

                        if (datas.code_return == 99) {
                            swal("Good job!", "You Contact Admin!", "error");
                        } else {
                            swal("Good job!", "You clicked the button!", "success");
                            setTimeout(function() {
                                var base_url = window.location.origin;
                                window.location.replace(base_url + '/qa');
                            }, 2000);
                        }
                    }
                })
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
} // error form show text
</script>


@endsection