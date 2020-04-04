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
    <h1 class="h3 mb-4 text-gray-800">Edit Plops Form</h1>

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
                                    <label for="fname"><b>Name</b></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$item->name_en}}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Detail Text EN</b></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoten" id="summernoten">{{ $item->detail_en }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Detail Text TH</b></label><br>
                                    <!-- Create the editor container -->
                                    <textarea name="detail" class="summernoteth" id="summernoteth">{{ $item->detail_th }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Address</b></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$item->address}}">
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Tel</b></label>
                                    <input type="text" class="form-control" name="tel" id="tel" placeholder="Enter Tel" value="{{$item->tel}}">
                                </div>

                                <div class="form-group">
                                    <label for="fname"><b>Google Maps</b></label>
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
    var $link = "<?php echo url('/public/findstore/'); ?>";

    $(document).ready(function() {
        $('.summernoteth').summernote({
            height: 200,
        });
        $('.summernoten').summernote({
            height: 200,
        });
    });

    $('body').on('click', '.btn-save', function () {
        var id = $('#id').val();
        var summernoten = $('#summernoten').val();
        var summernoteth = $('#summernoteth').val();
        var address = $('#address').val();
        var tel = $('#tel').val();
        var map = $('#map').val();

        if((summernoten == '')||(summernoteth == '')||(address == '')||(tel == '')||(map == '')){
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
            data:{id:id,detail_th:summernoteth,detail_en:summernoten,address:address,tel:tel,map:map},
            url: '/cms/store/plops/update',
            success: function(datas){
                console.log(datas);
                swal("Good job!", "You clicked the button!", "success");
                window.location.href = '/cms/store/plops'
            }
        })
    });




</script>

@endsection
