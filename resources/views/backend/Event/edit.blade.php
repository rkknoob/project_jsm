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

        }
    </style>


    <div>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Event Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_event" id="id_event" value="{{ $product->id }}">
                        <input type="hidden" name="imagecolor" id="imagecolor" value="{{$product->banner1}}">
                        <input type="hidden" name="imageproduct" id="imageproduct" value="{{$product->banner2}}">
                        <input type="hidden" name="multifile" id="multifile" value="">


                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group">
                                    <label for="fname"><b>Name En</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{$product->topic_en}}">
                                </div>
                                <div class="form-group">
                                    <label for="fname"><b>Name Th</b><font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name" value="{{$product->topic_th}}">
                                </div>

                                <div class="form-group">
                                    <label>
                                    <B>
                                        Date Range:<font color="red">*</font>
                                    </B>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input type="text" class="form-control daterangepicker-field" id="daterange" name="daterange" value="{{$date}}"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                        <option value="Y" @if($product->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                        <option value="N" @if($product->is_active=="N"){{'selected'}}@endif>No</option>
                                    </select>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Banner Event Index</b><font color="red">*(ขนาดรูป 385*500)</font></label>
                                            <input type="file" name="img_color" id="img_color">
                                            <img src="/public/event/{{ $product->banner1 }}" alt="Color Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageColor" >
                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>

                                        <div class="col-sm-4 col-12 padding-zero">
                                            <label><b>Banner Event</b><font color="red">*(ขนาดรูป 550*308)</font></label>
                                            <input type="file" name="img_product" id="img_product">
                                            <img src="/public/event/{{ $product->banner2 }}" alt="Product Image" class="img-fluid rounded mx-auto d-block profile-image" id="showImageProduct" >
                                        </div>
                                        <div class="col-sm-2 padding-zero">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b><font color="red">*</font></label><br>
                                        <!-- Create the editor container -->
                                        <textarea name="detail" class="summernoteen" id="summernoteen">{!! $product->detail_en !!}</textarea>
                                </div>

                                <div class="form-group" >
                                    <label for="editor"><b>Detail Text TH</b><font color="red">*</font></label><br>
                                        <!-- Create the editor container -->
                                        <textarea name="detail" class="summernoteth" id="summernoteth">{!! $product->detail_th !!}</textarea>
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
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
    <script>

        $(".daterangepicker-field").daterangepicker({
            forceUpdate: true,
            callback: function(startDate, endDate, period){
                var title = startDate.format('L') + ' – ' + endDate.format('L');
                $(this).val(title)
            }
        });

        $(document).ready(function() {

            var $link = "<?php echo url('/public/event/'); ?>";
            var $backoffice_url = <?php echo json_encode(url('cms')); ?>

                /*
                var $link = <?php echo json_encode(Storage::url('')); ?>
                */
                $('#summernoteth').summernote({
                    height: 200,
                    callbacks: {
                        onImageUpload: function (files) {

                            var $files = $(files);
                            var $this = $(this);
                            $files.each(function () {
                                var file = this;
                                var data = new FormData();
                                data.append("eventth", file);

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
                                        console.log(resp);

                                        $('#summernoteth').summernote('insertImage', $link +'/'+ resp.data);
                                    }
                                });
                            });
                        }
                    }

                });
            $('#summernoteen').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function (files) {

                        var $files = $(files);
                        var $this = $(this);
                        $files.each(function () {
                            var file = this;
                            var data = new FormData();
                            data.append("eventen", file);

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
                                    console.log(resp);
                                    console.log(resp);

                                    $('#summernoteen').summernote('insertImage', $link +'/'+ resp.data);
                                }
                            });
                        });
                    }
                }

            });
        });

        $('body').on('click', '.btn-save', function () {
            var id = $('#id_event').val();
            var name_en = $('#name_en').val();
            var name_th = $('#name_th').val();
            var is_active = $('#is_active').val();
            var imagecolor = $('#imagecolor').val();
            var imageproduct = $('#imageproduct').val();
            var summernoteen = $('#summernoteen').val();
            var summernoteth = $('#summernoteth').val();

            var date = $('#daterange').val();
            var start_date = date.substr(0, 10);
            var end_date = date.substr(13, 24);

            //alert(date);

            if( (name_en == '') ||(name_th == '')|| (is_active =='') || (imagecolor == '') || (imageproduct == '') || (summernoteen == '') || (summernoteth == '') || (summernoteen == '<p><br></p>' ) || (summernoteth == '<p><br></p>' )  || (date == '')){
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
                data:{id:id,topic_en:name_en,topic_th:name_th,is_active:is_active,banner1:imagecolor,banner2:imageproduct,detail_en:summernoteen,detail_th:summernoteth,start_date:start_date,end_date:end_date},
                url: '/cms/event/update',
                success: function(datas){

                    swal("Good job!", "You clicked the button!", "success");
                    var base_url = window.location.origin;
                    //         window.location.replace = '/backoffice/products';
                    setTimeout(function(){
                        window.location.replace(base_url+'/cms/event')
                    }, 1000);
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

                    if((this.width != '385') && (this.height != '500')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('img_color', file_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/cms/event/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {
                            var $link = "<?php echo url('/public/event/'); ?>";
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

                    if((this.width != '550') && (this.height != '307')){
                        return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }

                    form_data.append('img_product', file_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/cms/event/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {
                            var $link = "<?php echo url('/public/event/'); ?>";
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
