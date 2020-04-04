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
        <h1 class="h3 mb-4 text-gray-800">Add Artist Tip Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="image" id="image" value="">

                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Name En</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="fname"><b>Name Th</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Banner Image</b><font color="red">*(ขนาดรูป 562*314)</font></label>
                                            <input type="file" name="file_upload" id="file_upload">
                                            <img src="{{ $image_display }}" alt="Img Artist Tip" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernotentip" id="summernotentip"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editor"><b>Detail Text TH</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernotethtip" id="summernotethtip"></textarea>
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
    <script>

        var $link = "<?php echo url('/public/Artisttip/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

        /*
        var $link = <?php echo json_encode(Storage::url('')); ?>
        */
        $(document).ready(function() {
            $('.summernotethtip').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function (files) {

                        var $files = $(files);
                        var $this = $(this);
                        $files.each(function () {
                            var file = this;
                            var data = new FormData();
                            data.append("summernotethtip", file);

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
                                        $('#summernotethtip').summernote('insertImage', $link +'/'+ resp.data);
                                    }
                                });
                            }else{
                                swal("Error!", "เกิดข้อผิดพลาด กรุณาอัพโหลดใหม่", "error");
                            }
                        });
                    }
                }    
            });
            $('.summernotentip').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function (files) {

                        var $files = $(files);
                        var $this = $(this);
                        $files.each(function () {
                            var file = this;
                            var data = new FormData();
                            data.append("summernotentip", file);

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
                                        $('#summernotentip').summernote('insertImage', $link +'/'+ resp.data);
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

            var name_en = $('#name_en').val();
            var name_th = $('#name_th').val();
            var is_active = $('#is_active').val();
            var summernoten = $('#summernotentip').val();
            var summernoteth = $('#summernotethtip').val();
            var image = $('#image').val();

            //alert(image);

            if((name_en == '' ) ||(name_th == '' )|| (is_active =='') || (summernoten == '') || (summernoteth == '') || (image == '')){
                return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type:'POST',
                data:{title_en:name_en,title_th:name_th,is_active:is_active,img_banner:image,detail_th:summernoteth,detail_en:summernoten},
                url: '/cms/artistTip',
                success: function(datas){
                    console.log(datas);
                    swal("Good job!", "You clicked the button!", "success");
                    window.location.href = '/cms/artistTip'
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

                    if((this.width != '562') && (this.height != '314')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('file_upload', file_data);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/cms/artistTip/uploadimage',
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
