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
            <h1 class="h3 mb-4 text-gray-800">Edit Film Form</h1>
        @else
            <h1 class="h3 mb-4 text-gray-800">Add Film Form </h1>
        @endif

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if($status == 'edit')

                            <input type="hidden" name="id" id="id" value="{{$data_brand->id}}">
                            <input type="hidden" name="imageen" id="imageen" value="{{$data_brand->img_en}}">
                            <input type="hidden" name="imageth" id="imageth" value="{{$data_brand->img_th}}">
                            <input type="hidden" name="multifile" id="multifile" value="">
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="deletefile_name" value="">
                            <input type="hidden" name="deletefile_id" value="">

                            <input type="hidden" name="width_en" id="width_en" value="">
                            <input type="hidden" name="height_en" id="height_en" value="">

                            <input type="hidden" name="width_th" id="width_th" value="">
                            <input type="hidden" name="height_th" id="height_th" value="">

                            <input type="hidden" name="type" id="type" value="F">

                        @else
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="imageen" id="imageen" value="">
                            <input type="hidden" name="imageth" id="imageth" value="">
                            <input type="hidden" name="multifile" id="multifile" value="">
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="deletefile_name" value="">
                            <input type="hidden" name="deletefile_id" value="">

                            <input type="hidden" name="width_en" id="width_en" value="">
                            <input type="hidden" name="height_en" id="height_en" value="">

                            <input type="hidden" name="width_th" id="width_th" value="">
                            <input type="hidden" name="height_th" id="height_th" value="">
                            <input type="hidden" name="type" id="type" value="F">
                        @endif

                        <div class="box">
                            {{ csrf_field() }}
                            <div class="box-body col-md-12">

                                @if($status == 'edit')
                                    <div class="form-group">
                                        <label for="nameen"><b>Name En</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name EN" value="{{ $data_brand->name_en }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nameth"><b>Name Th</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name TH" value="{{ $data_brand->name_th }}">
                                    </div>

                                @else
                                    <div class="form-group">
                                        <label for="nameen"><b>Name En</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name EN" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nameth"><b>Name Th</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name TH" value="">
                                    </div>

                                @endif


                                <div class="form-group">
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

                                <div class="form-group" hidden>
                                    <label for="is_active"><b>Type</b></label>
                                    <select class="form-control" name="type" id="type" onchange="myFunction()">
                                        <option value="">--- Choose A Status ---</option>
                                        @if($status == 'edit')
                                            <option value="F"@if($data_brand->type=="F"){{'selected'}}@endif>Film</option>
                                            <option value="M"@if($data_brand->type=="M"){{'selected'}}@endif>Magazine</option>
                                        @else
                                            <option value="F">Film</option>
                                            <option value="M">Magazine</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Picture Img En</b><font color="red">*(ขนาดรูป 562*314)</font></label>
                                            <input type="file" name="file_brandjsm_en" id="file_brandjsm_en">

                                            @if($status == 'edit')
                                                <img src="/public/brandjsm/{{ $data_brand->img_en }}" alt="รูปภาพประจำBrand" class="img-fluid rounded mx-auto d-block profile-image" id="showImageEn" >
                                            @else
                                                <img src="{{ $image_display }}" alt="Picture Brand" class="img-fluid rounded mx-auto d-block profile-image" id="showImageEn" >
                                            @endif



                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>

                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Picture Img Th</b><font color="red">*(ขนาดรูป 562*314)</font></label>
                                            <input type="file" name="file_brandjsm_th" id="file_brandjsm_th">

                                            @if($status == 'edit')
                                                <img src="/public/brandjsm/{{ $data_brand->img_th }}" alt="รูปภาพประจำBrand" class="img-fluid rounded mx-auto d-block profile-image" id="showImageTh" >
                                            @else
                                                <img src="{{ $image_display }}" alt="Picture Brand" class="img-fluid rounded mx-auto d-block profile-image" id="showImageTh" >
                                            @endif

                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>
                                    </div>
                                </div>

                                <div id="myDIV" hidden>
                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoten" id="summernoten"></textarea>
                                </div>

                                <div class="form-group" >
                                    <label for="editor"><b>Detail Text TH</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoteth" id="summernoteth"></textarea>
                                </div>
                                </div>

                                <div id="film">
                                <div class="form-group" >
                                    <label for="editor"><b>Detail Film</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernotefilm" id="summernotefilm"></textarea>
                                </div>
                                </div>


                                <!-- /.input group -->
                                <div class="form-group" hidden>
                                    <label><b>Detail Picture EN</b></label>
                                    <div class="dropzone dz-clickable" id="uploadDropzone">
                                        <div class="dz-default dz-message" data-dz-message="">
                                            <span>Drop files to upload or click</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"  hidden>
                                    <label><b>Detail Picture TH</b></label>
                                    <div class="dropzone dz-clickable" id="uploadDropzone2" name="uploadDropzone2">
                                        <div class="dz-default dz-message" data-dz-message="">
                                            <span>Drop files to upload or click</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.input group -->

                                <div class="box-footer col-md-12">
                                    <button type="button" class="btn btn-success btn-save btn-loading" style="width: 120px;">Save</button>
                                </div>

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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
    <script>

        document.getElementById("myDIV").style.display = 'none';

        var type = $('#type').val();
        ///// fisrt ////////
        if((type === "M") || (type === "F")){
            myFunction();
        }


        $(".daterangepicker-field").daterangepicker({
            forceUpdate: true,
            callback: function(startDate, endDate, period){
                var title = startDate.format('L') + ' – ' + endDate.format('L');
                $(this).val(title)
            }
        });

        var $link = "<?php echo url('/public/brandjsm/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

            /*
            var $link = <?php echo json_encode(Storage::url('')); ?>
            */
            $(document).ready(function() {
                $('.summernoteth').summernote({
                    height: 200,
                });
                $('.summernoten').summernote({
                    height: 200,
                });
                $('.summernotefilm').summernote({
                    height: 300,
                    callbacks: {
                        onImageUpload: function (files) {

                            var $files = $(files);
                            var $this = $(this);
                            $files.each(function () {
                                var file = this;
                                var data = new FormData();
                                data.append("summernotefilm", file);

                                console.log(file.type);

                                
                                if(file.type === "image/jpeg" || file.type === "image/png" ){

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        data: data,
                                        type: "POST",
                                        url: "/cms/products/uploadimage",
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(resp) {
                                            $this.summernote('insertImage',$link +'/'+ resp.data, function ($image) {

                                            });
                                        }
                                    });
                                }else{
                                    swal("Error!", "เกิดข้อผิดพลาด กรุณาอัพโหลดใหม่", "error");

                                }
                            });
                        }
                    }
                });

         

        

            });




        $('body').on('click', '.btn-save', function () {

            var id = $('#id').val();
            var name_en = $('#name_en').val();
            var name_th = $('#name_th').val();
            var is_active = $('#is_active').val();
            var summernoten = $('#summernoten').val();
            var summernoteth = $('#summernoteth').val();
            var summernotefilm = $('#summernotefilm').val();
            var imageen = $('#imageen').val();
            var imageth = $('#imageth').val();
            var type = $('#type').val();
           var status = $('#status').val();

            var width_en = $('#width_en').val();
            var height_en = $('#height_en').val();

            var width_th = $('#width_th').val();
            var height_th = $('#height_th').val();


            if((name_en == '' ) || (name_th == '') || (type == '') || (is_active =='') || (imageth == '') || (imageen == '')){

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
                    data:{id:id,name_en:name_en,name_th:name_th,is_active:is_active,detail_en:summernoten,detail_th:summernoteth,detail_film:summernotefilm,img_en:imageen,img_th:imageth,type:type},
                    url: '/cms/brandjsm/brandcontent/' + id,
                    success: function(datas){
                        if(datas.code_return == 1){
                            swal("Good job!", "Edit Complate", "success");
                            var base_url = window.location.origin;
                            window.location.replace(base_url+'/cms/brandjsm/brandcontent');
                        }else{
                            swal("Error!", datas.msg_return, "error");
                        }
                    }
                });
            }else{

                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{name_en:name_en,name_th:name_th,is_active:is_active,summernoten:summernoten,summernoteth:summernoteth,summernotefilm:summernotefilm,imageen:imageen,imageth:imageth,type:type},
                    url: '/cms/brandjsm/brandcontent',
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        window.location.replace(base_url+'/cms/brandjsm/brandcontent')

                    }
                })
            }
        });

        Dropzone.autoDiscover = false;
        if ($('#productForm').length) {
            var arrImage = [];
            var deleteFileId = [];
            var deleteFileName = [];

            var myDropzone = new Dropzone("div#uploadDropzone", {
                paramName: 'file_upload',
                url:  '/cms/products/uploadimage',
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 7,
                maxFilesize: 25, // MB
                addRemoveLinks: true,
                dictRemoveFile: 'ลบรูปภาพ',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function () {
                    this.on('success', function (file) {
                        var filename = JSON.parse(file.xhr.response);
                        arrImage.push(filename.data);
                        $('input[name=multifile]').val(arrImage);
                        file.dataURL = filename.data;
                    });

                    this.on('removedfile', function (file) {
                        // assign delete value
                        deleteFileName.push(file.name);
                        if (!file.processing) {
                            deleteFileId.push(file.id);
                            $('input[name=deletefile_id]').val(deleteFileId);
                        }
                        $('input[name=deletefile_name]').val(deleteFileName);

                        // pop array on multifile
                        var index = arrImage.indexOf(file.dataURL);

                        if (index > -1) {
                            arrImage.splice(index, 1);
                            $('input[name=multifile]').val(arrImage);
                        }
                    });
                }
            });
        }

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
                       if((this.width != '562') && (this.height != '314')){
                            return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }

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

        ///------สินค้าzoom------///
        $('body').on('change', 'input[name="file_brandjsm_th"]', function () {
            if ($('input[name ="file_brandjsm_th"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "file_brandjsm_th"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        $('#width_th').val(this.width);
                        $('#height_th').val(this.height);
                        if((this.width != '562') && (this.height != '314')){
                            return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                        form_data.append('file_brandjsm_th', file_data);
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
                                $('input[name=imageth]').val(resp.data);
                                $('#showImageTh').attr("src", $link +'/'+ resp.data);
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

        function myFunction() {
            var x = document.getElementById("type").value;
            var y = document.getElementById("myDIV");
            var film = document.getElementById("film");

            if(x === "M"){
                y.style.display = "block";
                film.style.display = "none";
            }else if(x === "F"){
                film.style.display = "block";
                y.style.display = "none";
            }
            else{
             y.style.display = "none";
            }

        }

        if ($('input[name ="status"]').val() == 'edit') {
            data();

        }

        function data() {
            var id = $('#id').val();

            $.ajax({
                dataType: 'json',
                type: 'get',

                url: '/cms/brandjsm/content/' +id,
                success: function(data) {
                    console.log(data)
                    // $("#deskripsi").summernote('code', data.detail_film);
                    $("#summernotefilm").summernote('code', data.detail_film);
                    $("#summernoteth").summernote('code', data.detail_th);
                    $("#summernoten").summernote('code', data.detail_en);

                }
            })
        }

    </script>


@endsection
