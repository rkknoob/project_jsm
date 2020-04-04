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
            width: 620px;
            padding-top: 25px;
            margin-bottom: 25px;
            margin-left: 0!important;
        }
    </style>


<div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Category Form</h1>

    <!-- DataTales Example -->
    <div class="card shadow col-md-12" style="margin-bottom: 7%;" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <input type="hidden" name="image" id="image" value="{{ $item->img }}">
                    <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box">
                        <form method="post" action="{{$item->id}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="fname"><b>Name Category</b></label>
                                    <input type="text" class="form-control col-md-8" name="name" id="name" placeholder="Enter Name Category"  value="{{ $item->name }}" readonly>
                                </div>

                                <div class="col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-12 padding-zero">
                                            <label><b>Banner Image</b><font color="red">*</font></label><br>
                                            <input type="file" name="file_upload" id="file_upload">
                                        </div>
                                        <div class="col-sm-10 col-12 padding-zero">
                                        @if($item->img!="")
                                            <img src="/public/category/{{ $item->img }}" alt="Img Category" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                        @else
                                            <img src="{{$image_display}}" alt="Img Category test" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" >
                                        @endif
                                        </div>
                                    </div>
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
<script type="text/javascript">

    var $link = "<?php echo url('/public/category/'); ?>";

    $('body').on('click', '.btn-save', function () {
        var id = $('#id').val();
        var image = $('#image').val();

        if((image == '')){
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
            data:{id:id,img:image},
            url: '/cms/category/update',
            success: function(datas){
                console.log(datas);
                swal("Good job!", "You clicked the button!", "success");
                window.location.href = '/cms/category'
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

                if((this.width != '4705') && (this.height != '834')){
                    return  swal("Cancelled", "Your imaginary file is safe :)", "error");
                }

                form_data.append('file_upload', file_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/cms/category/uploadimage',
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
