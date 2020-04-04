@extends('backend.layouts.content')

@section('content')
    <style>
        .btn-icon-split .icon {
            padding-top: 5%;
        }
        .box-footer{
            clear:both;
            margin-top: 15px;
            text-align : left;
            padding-top: 20px;
            padding-bottom: 15px;
        }
        .note-popover{
            display:none;
        }
        .padding-zero{
            padding-left: 0px!important;
        }
        .profile-image{
            width: 250px;
            padding-top: 25px;
            margin-bottom: 25px;

        }
    </style>


    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Artist Intro Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <div class="box">
                            {{ csrf_field() }}
                            <div class="box-body col-md-12">
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                            <label for="title"><b>Title</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="id" id="id"  value="{{$topic['id']}}">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Name Title"  value="{{$topic['title']}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="title"><b>No Hits</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="hit" id="hit" placeholder="Enter Hit"  value="{{$topic['hit']}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Type</b><font color="red">*</font></label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">--- Choose A Status ---</option>
                                        @foreach($cate as $category)
                                            <option value="{{$category->id}}" {{ $category->id==$topic['type'] ? 'selected' : '' }}> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="Y"  @if($topic['status']=="Y"){{'selected'}}@endif>Yes</option>
                                        <option value="N"  @if($topic['status']=="N"){{'selected'}}@endif>No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Content</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->

                                    <textarea name="summernoten" class="summernoten" id="summernoten">{{$topic['content']}}</textarea>

                                </div>
                            </div>

                            <div class="box-footer col-md-12">
                                <button type="button" class="btn btn-success btn-save btn-loading" style="width: 120px;">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script>
        if (!window.moment) {
            document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
        }
    </script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
    <script type="text/javascript">

        var $link = "<?php echo url('/public/magazine/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

        $(document).ready(function() {
            $('.summernoteth').summernote({
                height: 200,
            });
            $('.summernoten').summernote({
                height: 200,
            });
        });



        $('body').on('click', '.btn-save', function () {

            var id = $('#id').val();
            var title = $('#title').val();
            var hit = $('#hit').val();
            var type = $('#type').val();
            var status = $('#status').val();
            var content = $('#summernoten').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                dataType: 'json',
                type:'PUT' ,
                data:{id:id,title:title,hit:hit,type:type,status:status,content:content},
                url: '/cms/qa/settingqa/' + id,
                success: function(datas){
                    swal("Good job!", "You clicked the button!", "success");
                    var base_url = window.location.origin;
                    setTimeout(function(){
                        window.location.replace(base_url+'/cms/qa/settingqa')

                    }, 1000);

                }
            });

        });
    </script>

@endsection
