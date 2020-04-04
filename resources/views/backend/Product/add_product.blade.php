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
        .table{
            width: 0pt !important;
        }
    </style>


    <div>

        <!-- Page Heading -->
        @if($status == 'edit')
            <h1 class="h3 mb-4 text-gray-800">Edit Product Form</h1>
        @else
            <h1 class="h3 mb-4 text-gray-800">Add Product Form</h1>
        @endif

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if($status == 'edit')
                            <input type="hidden" name="id" id="id" value="{{$product->id}}">
                            <input type="hidden" name="image" id="image" value="{{$product->cover_img}}">
                            <input type="hidden" name="imagezoom" id="imagezoom" value="{{$product->cover_zoom}}">
                            <input type="hidden" name="multifile" id="multifile" value="{{$multifile}}">
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="deletefile_name" id="deletefile_name" value="">
                            <input type="hidden" name="deletefile_id" id="deletefile_id" value="">

                        @else
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="image" id="image" value="">
                            <input type="hidden" name="imagezoom" id="imagezoom" value="">
                            <input type="hidden" name="multifile" id="multifile" value="">
                            <input type="hidden" name="status" id="status" value="{{$status}}">
                            <input type="hidden" name="deletefile_name" value="">
                            <input type="hidden" name="deletefile_id" value="">
                        @endif

                        <div class="box">
                            {{ csrf_field() }}
                            <div class="box-body col-md-12">

                                <div class="form-group">
                                    <label for="fname"><b>Name</b><font color="red">*</font></label>
                                    @if($status == 'edit')
                                        <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{$product->name_en}}">
                                    @else
                                        <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price"><b>Price</b><font color="red">*</font></label>
                                    @if($status == 'edit')
                                        <input type="number" class="form-control" name="price" id="price"placeholder="Enter Price" value="{{$product->price}}">
                                    @else
                                        <input type="number" class="form-control" name="price" id="price"placeholder="Enter Price">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price"><b>Size</b></label>
                                    @if($status == 'edit')
                                        <input type="text" class="form-control" name="size" id="size"placeholder="Enter Size" value="{{$product->size}}">
                                    @else
                                        <input type="text" class="form-control" name="size" id="size"placeholder="Enter Size">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="category"><b>Category</b><font color="red">*</font></label>
                                    <select class="form-control" name="idCategory" id="idCategory">
                                        <option value="">--- Choose A Category ---</option>
                                        @foreach($itemCategory as $category)
                                            <option value="{{$category->id}}" @if($status =="edit"){{ $category->id==$product->category_id ? 'selected' : '' }} @endif> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        @if($status == 'edit')
                                            <option value="Y"@if($product->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($product->is_active=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Display</b><font color="red">*</font></label>
                                    <select class="form-control" name="display_type" id="display_type">
                                        <option value="">--- Choose A Status ---</option>
                                        @if($status == 'edit')
                                            <option value="Y"@if($product->display_type=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($product->display_type=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="is_active"><b>Best Seller</b><font color="red">*</font></label>
                                    <select class="form-control" name="best" id="best">
                                        <option value="">--- Choose A Status ---</option>
                                        @if($status == 'edit')
                                            <option value="Y"@if($product->is_bestseller=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($product->is_bestseller=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>
                                </div>


                                <div class="col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-5 col-12 padding-zero">
                                            <label><b>Picture Product</b><font color="red">*(ขนาดรูป 600*600)</font></label>
                                            <input type="file" name="file_upload" id="file_upload">
                                            @if($status == 'edit')
                                                <img src="/public/product/{{ $product->cover_img }}" alt="Picture Product" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                            @else
                                                <img src="{{ $image_display }}" alt="Picture Product" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                            @endif
                                        </div>
                                        <div class="col-sm-1 padding-zero">
                                        </div>

                                        <div class="col-sm-5 col-12 padding-zero">
                                            <label><b>Picture Product Zoom</b><font color="red">*(ขนาดรูป 1200*1200)</font></label>
                                            <input type="file" name="img_zoom" id="img_zoom">
                                            @if($status == 'edit')
                                                <img src="/public/product/{{ $product->cover_zoom }}" alt="Picture Product Zoom" class="img-fluid rounded mx-auto d-block profile-image" id="showImageZoom" >
                                            @else
                                                <img src="{{ $image_display }}" alt="Picture Product Zoom" class="img-fluid rounded mx-auto d-block profile-image" id="showImageZoom" >

                                            @endif
                                        </div>
                                        <div class="col-sm-1 padding-zero">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><B>
                                        Date Range:
                                    </B></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                        </div>

                                        @if($status == 'edit')
                                            <input type="text" class="form-control daterangepicker-field" id="daterange"  value="{{$date}}"/>
                                        @else
                                            <input type="text" class="form-control daterangepicker-field" id="daterange"  value=""/>
                                        @endif

                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group" hidden>
                                    <label for="startdate"><b>Start Date</b></label><br>
                                    <input type="date" name="startdate" id="startdate" />
                                </div>

                                <div class="form-group" hidden>
                                    <label for="enddate"><b>End Date</b></label><br>
                                    <input type="date" name="enddate" id="enddate">
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    @if($status == 'edit')
                                        <textarea name="detail" class="summernotenproduct" id="summernotenproduct">{{ $product->detail_en }}</textarea>
                                    @else
                                        <textarea name="detail" class="summernotenproduct" id="summernotenproduct"></textarea>
                                    @endif
                                </div>

                                <div class="form-group" >
                                    <label for="editor"><b>Detail Text TH</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->
                                    @if($status == 'edit')
                                        <textarea name="detail" class="summernotethproduct" id="summernotethproduct">{{ $product->detail_th }}</textarea>
                                    @else
                                        <textarea name="detail" class="summernotethproduct" id="summernotethproduct"></textarea>
                                    @endif
                                </div>

                                <!-- /.input group -->
                                <div class="form-group">
                                    <label><b>Detail Picture EN</b> <font color="red">*</font></label>
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

        $(".daterangepicker-field").daterangepicker({
            forceUpdate: true,
            callback: function(startDate, endDate, period){
                var title = startDate.format('L') + ' – ' + endDate.format('L');
                $(this).val(title)
            }
        });


        $('#price').keypress(function(event){
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault();
            }
        });

        var $link = "<?php echo url('/public/product/'); ?>";
        var $backoffice_url = <?php echo json_encode(url('cms')); ?>

            /*
            var $link = <?php echo json_encode(Storage::url('')); ?>
            */
        $(document).ready(function() {
            $('.summernotethproduct').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function (files) {

                        var $files = $(files);
                        var $this = $(this);
                        $files.each(function () {
                            var file = this;
                            var data = new FormData();
                            data.append("summernotethproduct", file);

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
                                        $('#summernotethproduct').summernote('insertImage', $link +'/'+ resp.data);
                                    }
                                });

                            }else{
                                swal("Error!", "เกิดข้อผิดพลาด กรุณาอัพโหลดใหม่", "error");

                            }
                        });
                    }
                }
            });
            $('.summernotenproduct').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function (files) {

                        var $files = $(files);
                        var $this = $(this);
                        $files.each(function () {
                            var file = this;
                            var data = new FormData();
                            data.append("summernotenproduct", file);

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
                                        $('#summernotenproduct').summernote('insertImage', $link +'/'+ resp.data);
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
            var price = $('#price').val();
            var size = $('#size').val();
            var category = $('#idCategory').val();
            var is_active = $('#is_active').val();
            var startdate = $('#startdate').val();
            var enddate = $('#enddate').val();
            var summernoten = $('#summernotenproduct').val();
            var summernoteth = $('#summernotethproduct').val();
            var imagezoom = $('#imagezoom').val();
            var image = $('#image').val();
            var file = $('#multifile').val();
            var display_type = $('#display_type').val();
            var status = $('#status').val();
            var id = $('#id').val();
            var deletefile_id = $('#deletefile_id').val();
            var deletefile_name = $('#deletefile_name').val();
            var date = $('#daterange').val();
            var start_date = date.substr(0, 10);
            var end_date = date.substr(13, 24);
            var best = $('#best').val();

            //alert(best);


            if((name_en == '' ) || (price == '') || (category == '') || (is_active =='') || (imagezoom == '') || (image == '') || (display_type == '' ) || (summernoten == '<p><br></p>' ) || (summernoteth == '<p><br></p>' ) || (file == '') || (summernoten == '' ) || (summernoteth == '' )||(best =="")){

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
                    data:{id:id,name_en:name_en,price:price,size:size,is_active:is_active,file:file,detail_th:summernoteth,detail_en:summernoten,category:category,imagezoom:imagezoom,image:image,display_type:display_type,deletefile_id:deletefile_id,deletefile_name:deletefile_name,file:file,start_date:start_date,end_date:end_date,is_bestseller:best},
                    url: '/cms/products/' + id,
                    success: function(datas){
                        if(datas.code_return == 1){
                            swal("Good job!", "Edit Complate", "success");
                            var base_url = window.location.origin;
                            window.location.replace(base_url+'/cms/products')
                        }else{
                            swal("Error!", datas.msg_return, "error");
                        }
                    }
                });

            }else{

                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{name_en:name_en,price:price,size:size,is_active:is_active,file:file,summernoteth:summernoteth,summernoten:summernoten,category:category,imagezoom:imagezoom,image:image,display_type:display_type,start_date:start_date,end_date:end_date,is_bestseller:best},
                    url: '/cms/products',
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");
                        window.location.href = '/cms/products'
                    }
                })
            }
        });

        Dropzone.autoDiscover = false;
        if ($('#productForm').length) {
          // var arrImage = [];
            var deleteFileId = [];
            var deleteFileName = [];
            var file = $('#multifile').val();
            var array = file.split(",");
            var arrImage = file.split(",");



            var myDropzone = new Dropzone("div#uploadDropzone", {
                paramName: 'file_upload',
                url:  '/cms/products/uploadimage',
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 15,
                maxFilesize: 50, // MB
                addRemoveLinks: true,
                dictRemoveFile: 'ลบรูปภาพ',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function () {
                    this.on('success', function (file) {

                        var filename = JSON.parse(file.xhr.response);
                        var datats = array.push(filename.data);
                        var index = array.indexOf(file.name);


                        $('input[name=multifile]').val(array);
                        file.dataURL = filename.data;
                        console.log(index);
                    });

                    this.on('removedfile', function (file) {

                        deleteFileName.push(file.name);
                        if (!file.processing) {
                            deleteFileId.push(file.id);
                            $('input[name=deletefile_id]').val(deleteFileId);
                        }
                        $('input[name=deletefile_name]').val(deleteFileName);

                        //  array on multifile
                        var index = array.indexOf(file.name);

                        console.log(file.name);
                        array.splice(index, 1);

                        $('input[name=multifile]').val(array);
                    });
                }
            });
        }

        ///------ สินค้าหลัก ------///
        $('body').on('change', 'input[name= "file_upload"]', function () {
            if ($('input[name ="file_upload"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "file_upload"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        if((this.width != '600') && (this.height != '600')){
                            return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                        form_data.append('file_upload', file_data);
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

        ///------สินค้าzoom------///
        $('body').on('change', 'input[name="img_zoom"]', function () {
            if ($('input[name ="img_zoom"]').val() != '') {
                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "img_zoom"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {
                        if((this.width != '1200') && (this.height != '1200')){
                            return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                        form_data.append('img_zoom', file_data);
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
                                $('input[name=imagezoom]').val(resp.data);
                                $('#showImageZoom').attr("src", $link +'/'+ resp.data);
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

        $('body').on('change', 'input[name= "uploadDropzone2"]', function () {
            var myDropzone = new Dropzone("div#uploadDropzone2", {
                paramName: 'file_upload',
                url:  '/cms/products/uploadimage',
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 15,
                maxFilesize: 50, // MB
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
                        deleteFileName.push(file.dataURL);
                        if (!file.processing) {
                            deleteFileId.push(file.name);
                            $('input[name=deletefile_id]').val(deleteFileId);
                        }

                        $('input[name=deletefile_name]').val(deleteFileName);

                        // pop array on multifile
                        var index = arrImage.indexOf(filename.data);

                        if (index > -1) {
                            arrImage.splice(index, 1);
                            $('input[name=multifile]').val(arrImage);
                        }
                    });
                }
            });
        });

        // exist image file dropzone

        if($('input[name=id]').val()) {
            axios.get($backoffice_url + '/products/' + $('input[name=id]').val() + '/images')
            .then(function (response) {
                response.data.forEach(function (data) {
                    let thumbFile = {
                        id: data.id,
                        name: data.img_en,
                        size: 0,
                        dataURL: $link+ '/' + data.img_en
                    };
                    myDropzone.emit('addedfile', thumbFile);
                    myDropzone.createThumbnailFromUrl(thumbFile,
                        myDropzone.options.thumbnailWidth,
                        myDropzone.options.thumbnailHeight,
                        myDropzone.options.thumbnailMethod, true,
                        function (thumbnail) {
                            myDropzone.emit('thumbnail', thumbFile, thumbnail);
                        });
                    myDropzone.emit('complete', thumbFile);
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>


@endsection
