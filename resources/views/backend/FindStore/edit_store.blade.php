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
            margin-left: 0!important;
        }
    </style>


<div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Find A Store Form</h1>

    <!-- DataTales Example -->
    <div class="card shadow col-md-12" style="margin-bottom: 7%;" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <input type="hidden" name="image" id="image" value="{{ $item->img1 }}">
                    <input type="hidden" name="id" id="id" value="{{$item->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box">
                        <form method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="fname"><b>Name En</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{$item->name_en}}" >
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Name Th</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name" value="{{$item->name_th}}" >
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Type</b><font color="red">*</font></label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">--- Choose A Type ---</option>
                                        @foreach($category as $items)
                                            <option value="{{$items->id}}"  @if($item->type==$items->id){{'selected'}}@endif> {{$items->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        <option value="Y" @if($item->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                        <option value="N" @if($item->is_active=="N"){{'selected'}}@endif>No</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-12 padding-zero">
                                            <label><b>Image</b><font color="red">*(ขนาดรูป 320*210)</font></label><br>
                                            <input type="file" name="file_upload" id="file_upload">
                                        </div>
                                        <div class="col-sm-10 col-12 padding-zero">
                                        @if($item->img1!="")
                                            <img src="/public/findstore/{{ $item->img1 }}" alt="Img Store" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                        @else
                                            <img src="{{$image_display}}" alt="Img Store" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                        @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernotenstore" id="summernotenstore">{{ $item->detail_en }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Detail Text TH</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernotethstore" id="summernotethstore">{{ $item->detail_th }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Address</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$item->address}}">
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Tel</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="tel" id="tel" placeholder="Enter Tel" value="{{$item->tel}}">
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Google Maps</b><font color="red">*</font></label>
                                    <textarea type="text" class="form-control" name="map" id="map" placeholder="Enter Google Map" rows="5" cols="50">{{$item->map}}</textarea>
                                </div>

                                <div class="box-footer col-md-12 padding-zero" >
                                    <button type="button" class="btn btn-success btn-save btn-loading" style="width: 120px;">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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

var $link = "<?php echo url('/public/findstore/'); ?>";
var $backoffice_url = <?php echo json_encode(url('cms')); ?>

    /*
    var $link = <?php echo json_encode(Storage::url('')); ?>
    */
    $('.summernotethstore').summernote({
            height: 200,
            callbacks: {
                onImageUpload: function (files) {

                    var $files = $(files);
                    var $this = $(this);
                    $files.each(function () {
                        var file = this;
                        var data = new FormData();
                        data.append("summernotethstore", file);

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
                                    $('#summernotethstore').summernote('insertImage', $link +'/'+ resp.data);
                                }
                            });
                        }else{
                            swal("Error!", "เกิดข้อผิดพลาด กรุณาอัพโหลดใหม่", "error");
                        }
                    });
                }
            }    
        });
        $('.summernotenstore').summernote({
            height: 200,
            callbacks: {
                onImageUpload: function (files) {

                    var $files = $(files);
                    var $this = $(this);
                    $files.each(function () {
                        var file = this;
                        var data = new FormData();
                        data.append("summernotenstore", file);

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
                                    $('#summernotenstore').summernote('insertImage', $link +'/'+ resp.data);
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
        var type = $('#type').val();
        var is_active = $('#is_active').val();
        var image = $('#image').val();
        var summernoten = $('#summernotenstore').val();
        var summernoteth = $('#summernotethstore').val();
        var address = $('#address').val();
        var tel = $('#tel').val();
        var map = $('#map').val();

       

        if((name_en == '')||(name_th == '')||(type == '')||(is_active == '')||(image == '')||(summernoten == '')||(summernoteth == '')||(address == '')||(tel == '')||(map == '')){
            return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            type:'PUT' ,
            data:{id:id,name_en:name_en,name_th:name_th,type:type,is_active:is_active,img1:image,detail_en:summernoten,detail_th:summernoteth,address:address,tel:tel,map:map},
            url: '/cms/store/update',
            success: function(datas){
                console.log(datas);
                swal("Good job!", "You clicked the button!", "success");
                window.location.href = '/cms/store'
            }
        })
    });

 
    ///--------- Banner Picture ---------///
    $('body').on('change', 'input[name= "file_upload"]', function () {
        if ($('input[name ="file_upload"]').val() != '') {

            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "file_upload"]').prop('files')[0];
            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {

                // if((this.width != '4705') && (this.height != '834')){
                //     return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                // }

                form_data.append('file_upload', file_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/cms/store/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {

                            $('input[name=image]').val(resp.data);
                            $('#showImage').attr("src", $link +'/'+ resp.data);
                            swal("Good job!", "You clicked the button!", "success");
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
    }); 

    


</script>

@endsection
