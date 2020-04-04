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
        <h1 class="h3 mb-4 text-gray-800">Edit Artist Introduction Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        @if($status == 'edit')
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="image" id="image" value="{{ $data_magazine->img_url }}">
                            <input type="hidden" name="image_th" id="image_th" value="{{ $data_magazine->img_url_thai }}">
                            <input type="hidden" name="id" id="id" value="{{ $data_magazine->id }}">
                        @else
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="image" id="image" value="">
                            <input type="hidden" name="image_th" id="image_th" value="">
                            <input type="hidden" name="id" id="id" value="">
                        @endif

                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group col-md-12">
                                    @if($status == 'edit')
                                        <div class="form-group">
                                            <label for="nameen"><b>Name En</b></label>
                                            <input type="text" class="form-control" name="nameen" id="nameen" placeholder="Enter Name Magazine"  value="{{$data_magazine->name_en}}" readonly>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="nameen"><b>Name En</b></label>
                                            <input type="text" class="form-control" name="nameen" id="nameen" placeholder="Enter Name Magazine"  value="{{$data_magazine->name_en}}">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    @if($status == 'edit')
                                        <div class="form-group">
                                            <label for="nameth"><b>Name En</b></label>
                                            <input type="text" class="form-control" name="nameth" id="nameth" placeholder="Enter Name Magazine"  value="{{$data_magazine->name_th}}" readonly>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="fname"><b>Name En</b></label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Magazine"  value="{{$data_magazine->name_th}}">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        @if($status == 'edit')
                                            <option value="Y"@if($data_magazine->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($data_magazine->is_active=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group" style="padding-left:15px;">
                                    <label for="filemagazine"><B>File Picture En</B><font color="red">*</font></label><br>
                                    <input type="file" name="filemagazine" id="filemagazine"><br>
                                </div>

                                @if($status == 'edit')
                                    @if($data_magazine->img_url != "")
                                        <img src="/public/magazine/{{ $data_magazine->img_url }}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                    @else
                                        <img src="{{ $image_display }}" alt="filemagazine" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                    @endif                               
                                @else
                                    <img src="{{ $image_display }}" alt="filemagazine" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                @endif

                                <div class="form-group" style="padding-left:15px;">
                                    <label for="filemagazine_th"><B>File Picture Th</B><font color="red">*</font></label><br>
                                    <input type="file" name="filemagazine_th" id="filemagazine_th"><br>
                                </div>

                                @if($status == 'edit')
                                    @if($data_magazine->img_url_thai != "")
                                        <img src="/public/magazine/{{ $data_magazine->img_url_thai }}" alt="filemagazine_th" class="img-fluid rounded mx-auto d-block profile-image" id="showImage_th" >
                                    @else
                                        <img src="{{ $image_display }}" alt="filemagazine_th" class="img-fluid rounded mx-auto d-block profile-image" id="showImage_th" >
                                    @endif                              
                                @else
                                    <img src="{{ $image_display }}" alt="filemagazine_th" class="img-fluid rounded mx-auto d-block profile-image" id="showImage_th" >
                                @endif

                                <div class="form-group" hidden>
                                    <label for="editor"><b>Detail Text EN</b></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoten" id="summernoten">{{ $data_magazine->detail_en }}</textarea>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="editor"><b>Detail Text TH</b></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoteth" id="summernoteth">{{ $data_magazine->detail_th }}</textarea>
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

        $('body').on('change', 'input[name= "filemagazine"]', function () {
            if ($('input[name ="filemagazine"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "filemagazine"]').prop('files')[0];
                var form_data = new FormData();

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {


                        form_data.append('filemagazine', file_data);
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
                                //alert(resp.data);
                                $('input[name=image]').val(resp.data);

                                $('#showImage').attr("src", $link +'/'+ resp.data);
                            },
                            error: function error(xhr, textStatus, errorThrown) {
                                showFormErrors(xhr, $('#customerForm'));
                                console.log(errorThrown);
                            }
                        });

                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        }); // event on shown modal

        $('body').on('change', 'input[name= "filemagazine_th"]', function () {
            if ($('input[name ="filemagazine_th"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "filemagazine_th"]').prop('files')[0];
                var form_data = new FormData();

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {


                        form_data.append('filemagazine_th', file_data);
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
                                //alert(resp.data);
                                $('input[name=image_th]').val(resp.data);

                                $('#showImage_th').attr("src", $link +'/'+ resp.data);
                            },
                            error: function error(xhr, textStatus, errorThrown) {
                                showFormErrors(xhr, $('#customerForm'));
                                console.log(errorThrown);
                            }
                        });

                    };
                    img.onerror = function() {
                        alert( "not a valid file: " + file.type);
                    };
                    img.src = _URL.createObjectURL(file);
                }
            }
        }); // event on shown modal


        $('body').on('click', '.btn-save', function () {

            /*
                        var name_en = document.getElementById("name_en").value;
                        var price = document.getElementById("price").value;
                        var category = document.getElementById("idCategory").value;
                        var is_active = document.getElementById("is_active").value;
                        //    var fileCoverImg = document.getElementById("fileCoverImg").value;
                        //    var fileCoverImg2 = document.getElementById("fileCoverImg2").value;
                        var startdate = document.getElementById("startdate").value;
                        var enddate = document.getElementById("enddate").value;
                        var summernoten = document.getElementById("summernoten").value;
                        var summernoteth = document.getElementById("summernoteth").value;
                        var imagezoom = document.getElementById("imagezoom").value;
                        var image = document.getElementById("image").value;

                        var file = $('input[name="multifile[]"]').map(function(){
                            return this.value;
                        }).get();

             */
            var name = $('#name').val();
            var file = $('#image').val();
            var file_th = $('#image_th').val();
            var status = $('#status').val();
            var is_active = $('#is_active').val();
            var id = $('#id').val();

            if((name == '' ) ||(file == '') ||(file_th == '') ){
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
                    data:{id:id,name:name,img_url:file,img_url_thai:file_th,status:status},
                    url: '/cms/artist/' + id,
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        window.location.replace(base_url+'/cms/artist')
                    }
                });

            }else{
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{name:name,img_url:file,status:status,is_active:is_active},
                    url: '/cms/artist/magazine',
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");

                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        window.location.replace(base_url+'/cms/artist/magazine')
                    }
                })
            }

        });
    </script>

@endsection
