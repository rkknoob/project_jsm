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
        @if($status == 'edit')
            <h1 class="h3 mb-4 text-gray-800">Edit Magazine Form</h1>
        @else
            <h1 class="h3 mb-4 text-gray-800">Add Magazine Form</h1>
        @endif

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        @if($status == 'edit')
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="imageen" id="imageen" value="{{$data_brand->img_en}}">
                            <input type="hidden" name="id" id="id" value="{{ $data_brand->id }}">
                            <input type="hidden" name="type" id="type" value="M">
                        @else
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="imageen" id="imageen" value="">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="type" id="type" value="M">
                        @endif

                        <div class="box">
                            {{ csrf_field() }}



                            <div class="box-body col-md-12">
                                <div class="form-group col-md-12">
                                    @if($status == 'edit')
                                        <div class="form-group">
                                            <label for="nameen"><b>Name En</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name Magazine"  value="{{ $data_brand->name_en }}">
                                        </div>


                                    @else
                                        <div class="form-group">
                                            <label for="nameen"><b>Name En</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name Magazine"  value="">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">



                                    @if($status == 'edit')
                                        <div class="form-group">
                                            <label for="nameth"><b>Name Th</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_th" id="name_th" placeholder="กรอกภาษาไทย"  value="{{ $data_brand->name_th }}">
                                        </div>


                                    @else
                                        <div class="form-group">
                                            <label for="fname"><b>Name Th</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_th" id="name_th" placeholder="กรอกภาษาไทย"  value="">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        @if($status == 'edit')
                                            <option value="Y"@if($data_brand->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($data_brand->is_active=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>
                                </div>

                         
                           
                                <div class="form-group" style="padding-left:15px;">
                                    <label><b>Picture Img En</b><font color="red">*</font></label><br>
                                    <input type="file" name="file_brandjsm_en" id="file_brandjsm_en">

                                        @if($status == 'edit')
                                            <img src="/public/brandjsm/{{ $data_brand->img_en }}" alt="รูปภาพประจำBrand" class="img-fluid rounded mx-auto d-block profile-image" id="showImageEn" >
                                        @else
                                            <img src="{{ $image_display }}" alt="Picture Brand" class="img-fluid rounded mx-auto d-block profile-image" id="showImageEn" >
                                        @endif
                                </div>

                                <div class="form-group"hidden>
                                    <label for="editor"><b>Detail Text EN</b></label><br>
                                    Create the editor container

                                    @if($status == 'edit')
                                        <textarea name="summernoten" class="summernoten" id="summernoten">{{ $data_brand->detail_en }}</textarea>
                                    @else
                                        <textarea name="summernoten" class="summernoten" id="summernoten"></textarea>
                                    @endif

                                </div>
                                <div class="form-group" hidden>
                                    <label for="editor"><b>Detail Text TH</b></label><br>
                                    Create the editor container
                                    @if($status == 'edit')
                                        <textarea name="summernoteth" class="summernoteth" id="summernoteth">{{ $data_brand->detail_th }}</textarea>
                                    @else
                                        <textarea name="summernoteth" class="summernoteth" id="summernoteth"></textarea>
                                    @endif

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

        $(document).ready(function() {
            $('.summernoteth').summernote({
                height: 200,
            });
            $('.summernoten').summernote({
                height: 200,
            });
        });

        var $link = "<?php echo url('/public/brandjsm/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

        $('body').on('change', 'input[name="file_brandjsm_en"]', function () {
            if ($('input[name ="file_brandjsm_en"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "file_brandjsm_en"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                       $('#width_en').val(this.width);
                       $('#height_en').val(this.height);
                 

                        form_data.append('file_brandjsm_en', file_data);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/cms/products/uploadimage',
                            dataType: 'json',
                            type: 'POST',
                            data: form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function success(resp) {
                                $('input[name=imageen]').val(resp.data);
                                $('#showImageEn').attr("src", $link +'/'+ resp.data);
                                swal("Good job!", "You clicked the button!", "success");
                            }
                        });
                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        });



        $('body').on('click', '.btn-save', function () {

            var name_en = $('#name_en').val();
            var name_th = $('#name_th').val();
            var file = $('#imageen').val();
            var status = $('#status').val();
            var is_active = $('#is_active').val();
            var id = $('#id').val();

        


            //alert(file);
            //console.log(summernoten,summernoteth);

            if((name_en == '' ) ||(name_th == '' ) || (file == '')|| (is_active == '')){

                return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(status == 'edit'){

                $.ajax({
                    dataType: 'json',
                    type:'PUT' ,
                    data:{id:id,name_en:name_en,name_th:name_th,img_en:file,status:status,type:'M',is_active:is_active},
                    url: '/cms/brandjsm-magazine-setting/' + id,
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        window.location.replace(base_url+'/cms/brandjsm-magazine-setting')
                    }
                });

            }else{
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{name_en:name_en,name_th:name_th,img_en:file,status:status,is_active:is_active,type:'M'},
                    url: '/cms/brandjsm-magazine-setting',
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");

                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        window.location.replace(base_url+'/cms/brandjsm-magazine-setting')
                    }
                })
            }

        });
    </script>

@endsection
