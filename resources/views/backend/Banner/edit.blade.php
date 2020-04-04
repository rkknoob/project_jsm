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
            width: 450px;
            padding-top: 25px;
            margin-bottom: 25px;
            border-radius: 0!important;

        }
    </style>


    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Banner Index Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">
                    
                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id" value="{{$item->id}}">
                        <input type="hidden" name="imagecolor" id="imagecolor" value="{{$item->img_en}}">
                        <input type="hidden" name="imageproduct" id="imageproduct"  value="{{$item->img_th}}" >
                        

                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Name</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{$item->name_en}}" >
                                </div>

                                <div class="form-group">
                                    <label for="category"><b>Category</b><font color="red">*</font></label>
                                    <select class="form-control idcategory" name="idcategory" id="idcategory" >
                                        @foreach($itemCategory as $category)
                                            <option value="{{$category->id}}" @if($category->id==$item->id_category){{'selected'}}@endif > {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category"><b>Product</b><font color="red">*</font></label>
                                    <select name="idproduct" class="form-control" id="idproduct" required>
                                        @foreach($itemProduct as $product)
                                            <option value="{{$product->id}}" @if($product->id==$item->id_product){{'selected'}}@endif > {{$product->name_en}} </option>
                                        @endforeach
                                    </select>
                                </div>
                          
                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="Y"  @if($item->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                        <option value="N"  @if($item->is_active=="N"){{'selected'}}@endif>No</option>
                                    </select>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-5 col-12 padding-zero">
                                            <label><b>Banner En</b><font color="red">*(ขนาดรูป 1200*630)</font></label>
                                            <input type="file" name="img_color" id="img_color">
                                            @if($item->img_en!="")
                                                <img src="/public/banner/{{ $item->img_en }}" alt="Banner Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageColor" >
                                            @else
                                                <img src="{{ $image_display }}" alt="Banner Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageColor" >
                                            @endif
                                        </div>
                                        <div class="col-sm-1 padding-zero">
                                        </div>

                                        <div class="col-sm-5 col-12 padding-zero">
                                            <label><b>Banner Th</b><font color="red">*(ขนาดรูป 1200*630)</font></label>
                                            <input type="file" name="img_product" id="img_product">
                                            @if($item->img_th!="")
                                                <img src="/public/banner/{{ $item->img_th }}" alt="Product Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageProduct" >
                                            @else
                                                <img src="{{ $image_display }}" alt="Product Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageProduct" >
                                            @endif
                                        </div>
                                        <div class="col-sm-1 padding-zero">
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

        $('.idcategory').change(function(){
            if($(this).val !='' ){
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "/cms/banner/add/fetch",
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
            var id = $('#id').val();
            var name_en = $('#name_en').val();
            var idcategory = $('#idcategory').val();
            var idproduct = $('#idproduct').val();
            var is_active = $('#is_active').val();
            var imagecolor = $('#imagecolor').val();
            var imageproduct = $('#imageproduct').val();

            //alert(id);
          
            if( (name_en == '') || (is_active =='') || (imagecolor == '') || (imageproduct == '') || (idcategory == '') || (idproduct == '')){
                return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type:'PUT',
                data:{id:id,name_en:name_en,is_active:is_active,img_en:imagecolor,img_th:imageproduct,id_category:idcategory,id_product:idproduct},
                url: '/cms/banner/update',
                success: function(datas){
                    swal("Good job!", "You clicked the button!", "success");
                    window.location.href = '/cms/banner'
                }
            })
        });

        ///--- Picture Index Banner ---///
        $('body').on('change', 'input[name= "img_color"]', function () {
            if ($('input[name ="img_color"]').val() != '') {

                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "img_color"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                    if((this.width != '1200') && (this.height != '630')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('img_color', file_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/cms/banner/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {
                            var $link = "<?php echo url('/public/banner/'); ?>";
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

        ///--- Banner ---///
        $('body').on('change', 'input[name= "img_product"]', function () {
            if ($('input[name ="img_product"]').val() != '') {

                var _URL = window.URL || window.webkitURL;
                var file, img;
                var file_data = $('input[name= "img_product"]').prop('files')[0];
                var form_data = new FormData();
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                    if((this.width != '1200') && (this.height != '630')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('img_product', file_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/cms/banner/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {
                            var $link = "<?php echo url('/public/banner/'); ?>";
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
