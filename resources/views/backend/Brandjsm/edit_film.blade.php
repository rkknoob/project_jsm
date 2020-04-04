@extends('backend.layouts.content')

@section('content')
<style>
    .f-left{
        float: left;
    }
    .f-right{
        float: right;
    }
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
</style>

<div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Film Form</h1>

    <!-- DataTales Example -->
    <div class="card shadow col-md-10" style="margin-bottom: 8%;" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    @if (isset($msgSuccess))
                    <div class="alert alert-success">
                        {{ $msgSuccess}}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="box">
                        <form method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
              
                                <div class="form-group col-md-8">
                                    <label for="fname">Name EN</label> 
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name EN"  value="{{ $item->topic_name }}" >
                                </div>
                                <!-- <div class="form-group col-md-8">
                                    <label for="fname">Name TH</label> 
                                    <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name TH"  value="" >
                                </div> -->
                                <div class="form-group" style="padding-left:15px;"> 
                                    <label for="fileBannerImg">Picture Banner</label><br>
                                    <input type="file" name="fileBannerImg" id="fileBannerImg" OnChange="Preview(this)"><br>
                                    @if($item->img_banner != "")
                                    <a href="{{ asset($item->img_banner) }}" target="_blank">
                                        <img id="coverImage" name="coverImage" src="{{ asset($item->img_banner) }}" style="height: 150px; margin-top: 15px;" />
                                    </a>
                                    @endif
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="fname">Link Youtube</label> 
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Enter Link Youtube"  value="{{$item->img_banner}}" >
                                </div>
                                <div class="box-footer col-md-12">
                                    <br>
                                    <button type="submit" value="submit" name="submit" class="btn btn-success btn-icon-split">
                                        <span class="text" style="width:100px;">Save</span>
                                    </button>
                                    <button type="submit" value="delete" name="submit" class="btn btn-danger btn-icon-split">
                                        <span class="text" style="width:100px;">Delete</span>
                                    </button>
                                </div>
                                <input type="hidden" name="hideId" value="{{ $item->id }}" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
    function Preview(ele) {
        $('#coverImage').attr('src', ele.value);
        if (ele.files && ele.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               $('#coverImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(ele.files[0]);
        }
    }
</script>

@endsection
