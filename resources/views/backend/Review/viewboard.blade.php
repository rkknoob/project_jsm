@extends('backend.layouts.content')

@section('content')

    <style>
        .btn-icon-split .icon {
            padding-top: 5%;
        }
        .center{
            text-align:center;
        }
        .btn-delete{
            color:  #e74a3b!important;
        }
        .btn-delete:hover{
            color:  #fff!important;
        }

        .qablog{
            text-align:center;
            border: 1px solid;
            vertical-align: middle;
        }

        .topichead{
            text-align:center;
            font-size: 20px;
            border: 1px solid;
            font-weight: bold;
        }
        .cont{
            line-height: 5em;
        }

        textarea
        {
            width:100%;
        }

    </style>

    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Q&A Reply</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow col-md-12" style="margin-bottom: 8%;">
            <input type="text" class="form-control" name="id" id="id" value="{{$id}}">
            <div class="card-body">
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 topichead">
                           Title Topic :  {{$topic['title']}}
                        </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 qablog">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                User : {{$user['email']}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 qablog cont">
                        {!! $topic['content'] !!}
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 qablog">
                        Time : {{$topic['created_at']}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow col-md-12" style="margin-bottom: 8%;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 topichead">
                    Reply :  {{$topic['title']}}
                </div>
            </div>

            <div id="qaboard">
            </div>
        </div>
    </div>


    <div class="card shadow col-md-12" style="margin-bottom: 8%;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12 qablog">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            User : {{$admin}}
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12 cont">
                    <textarea name="message" id="message"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <button type="button" class="btn btn-primary  btn-block btn-save">Reply</button>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        datareload();
        $('body').on('click', '.btn-save', function (e) {

            var id = $('#id').val();
            var details = $('#message').val();

            if(details == ''){
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type:'POST',
                data:{qa_id:id,details:details},
                url:  '/cms/qa/replyqa',
                success: function(datas){
                    swal("Good job!", "You clicked the button!", "success");
                }
            });




            datareload();
        });

        function datareload() {
            var id = $('#id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type:'POST',
                data:{id:id},
                url:  "{!! route('boardshow.data') !!}",
                success: function(data){
                    console.log(data.answer);
                    var html = '';
                    $.each(data.answer, function(index, itemdata) {
                        html +=
                            '<div class="row">';
                        html += '<div class="col-md-2 col-sm-12 col-xs-12 qablog">'+itemdata.user_anser+'';
                        html += '</div>';
                        html += '<div class="col-md-8 col-sm-12 col-xs-12 qablog cont">'+itemdata.details+'';
                        html += '</div>';
                        html += '<div class="col-md-2 col-sm-12 col-xs-12 qablog">'+itemdata.created_at+'';
                        html += '</div>';
                        html += '</div>';
                    });

                    $('#qaboard').html(html);
                }
            });

        }









    </script>


@endsection



