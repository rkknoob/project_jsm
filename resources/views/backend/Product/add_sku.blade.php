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
        .profile-image{
            width: 200px;
            padding-top: 25px;
            margin-bottom: 25px;

        }
        .padding-zero{
            padding-left: 0px!important;
        }
    </style>

    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Sku Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="skuForm" method="post">
                        <input type="hidden" name="imagecolor" id="imagecolor">
                        <input type="hidden" name="imageproduct" id="imageproduct" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">

                                <div class="form-group">
                                    <label for="category"><b>Category</b><font color="red">*</font></label>
                                    <select class="form-control idcategory" name="idcategory" id="idcategory" >
                                            <option value="">--- Choose A Category ---</option>
                                        @foreach($itemCategory as $category)
                                            <option value="{{$category->id}}"> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category"><b>Product</b><font color="red">*</font></label>
                                    <select name="idproduct" class="form-control" id="idproduct" required>
                                        <option value="">--- Choose A Product ---</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Code Sku</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="code_sku" id="code_sku" placeholder="Enter Code Sku">
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Name Sku</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_sku" id="name_sku" placeholder="Enter Name Sku">
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Color Image</b><font color="red">*(ขนาดรูป 300*300)</font></label>
                                            <input type="file" name="img_color" id="img_color">
                                            <img src="{{ $image_display }}" alt="Color Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageColor" >
                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>

                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Product Image </b><font color="red">*(ขนาดรูป 600*600)</font></label>
                                            <input type="file" name="img_product" id="img_product">
                                            <img src="{{ $image_display }}" alt="Product Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageProduct" >
                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>

                                    </div>
                                </div>

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

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
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
    <script type="text/javascript">

        $('.idcategory').change(function(){
            if($(this).val !='' ){
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "/cms/sku/add/fetch",
                    method: "POST",
                    data: {select:select,_token:_token},
                    success:function(data){
                        // console.log(data.datas)
                        // $("#idproduct").html(data);
                        $('#idproduct').empty();
                        $.each(data.datas, function(i, item) {
                            $('#idproduct').append('<option value="'+ item.id +'">'+ item.name_en +'</option>');

                        })
                    }
                })
            }
        });

        $('body').on('click', '.btn-save', function () {

            //var idcategory = $('#idcategory').val();
            var code_sku = $('#code_sku').val();
            var name_sku = $('#name_sku').val();
            var is_active = $('#is_active').val();
            var idproduct = $('#idproduct').val();
            var imagecolor = $('#imagecolor').val();
            var imageproduct = $('#imageproduct').val();
            if((code_sku == '' ) || (name_sku == '') || (is_active =='') || (idproduct == '')){
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
                data:{sku:code_sku,is_active:is_active,name_en:name_sku,product_id:idproduct,img_color:imagecolor,img_product:imageproduct},
                url: '/cms/sku',
                success: function(datas){

                    if(datas.code_return==0){
                        swal("เกิดข้อผิดพลาด!", "SKU Code ซ้ำ!! กรุณากรอกข้อมูลใหม่", "error");
                    }
                    else if(datas.code_return==1){
                        swal("Good job!", "You clicked the button!", "success");
                        window.location.href = '/cms/sku'
                    }

                }
            })
        });

        ///--- Picture Color ---///
        $('body').on('change', 'input[name= "img_color"]', function () {
            if ($('input[name ="img_color"]').val() != '') {

                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "img_color"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                    if((this.width != '300') && (this.height != '300')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('img_color', file_data);
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
                            //console.log(resp);
                            var $link = "<?php echo url('/public/color/'); ?>";
                            $('input[name=imagecolor]').val(resp.data);
                                $('#showImageColor').attr("src", $link +'/' + resp.data);

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

        ///--- Picture Product ---///
        $('body').on('change', 'input[name= "img_product"]', function () {
            if ($('input[name ="img_product"]').val() != '') {

                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "img_product"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                    if((this.width != '600') && (this.height != '600')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('img_product', file_data);
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
                            console.log(resp);

                            var $link = "<?php echo url('/public/colorproduct/'); ?>";
                            $('input[name=imageproduct]').val(resp.data);
                                $('#showImageProduct').attr("src", $link +'/'+ resp.data);

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
