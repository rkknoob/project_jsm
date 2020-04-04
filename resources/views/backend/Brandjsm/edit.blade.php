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
        .note-group-select-from-files {
            display: none;
        }
    </style>


    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Concept Form </h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">
                    <input type="hidden" name="id" id="id" value="{{$data_con->id}}">
                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoten" id="summernoten">{{ $data_con->detail_en }}</textarea>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="editor"><b>Detail Text TH</b></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoteth" id="summernoteth">{{ $data_con->detail_th }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_active"><b>Display</b></label>
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="Y" @if($data_con->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                    <option value="N" @if($data_con->is_active=="N"){{'selected'}}@endif>No</option>
                                </select>
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
    <script>


        var $link = "<?php echo url('/public/Artisttip/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

            /*
            var $link = <?php echo json_encode(Storage::url('')); ?>
            */
            $(document).ready(function() {
                $('.summernoteth').summernote({
                    height: 200,
                    callbacks: {
                        onImageUpload: function(image) {
                            alert(image);
                            editor = $(this);
                            uploadImageContent(image[0], editor);
                        }
                    }

                });
                $('.summernoten').summernote({
                    height: 200,
                    callbacks: {
                        onImageUpload: function(image) {
                            console.log(image);
                            editor = $(this);
                            uploadImageContent(image[0], editor);
                        }
                    }
                });
            });

        $('body').on('click', '.btn-save', function () {
            var id = $('#id').val();
            var summernoten = $('#summernoten').val();
            var is_active = $('#is_active').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type:'PUT' ,
                data:{id:id,summernoten:summernoten,is_active:is_active},
                url: '/cms/brandjsm/concept/' + id,
                success: function(datas){
                    if(datas.code_return == 1){
                        swal("Good job!", "Edit Complate", "success");
                        var base_url = window.location.origin;
                        window.location.replace(base_url+'/cms/brandjsm/concept');
                    }else{
                        swal("Error!", datas.msg_return, "error");
                    }
                }
            });
        });


    </script>

@endsection
