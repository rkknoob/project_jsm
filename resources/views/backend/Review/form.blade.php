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
        @if($isstatus == 'edit')
            <h1 class="h3 mb-4 text-gray-800">Edit Review Form</h1>
        @else
            <h1 class="h3 mb-4 text-gray-800">Add Review Form</h1>
        @endif


        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">
                    @if($isstatus == 'edit')
                        <input type="hidden" class="form-control" name="isstatus" id="isstatus" placeholder="Enter Title" value="{{$isstatus}}">
                        <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter Title" value="{{$review['id']}}">
                    @else
                        <input type="hidden" class="form-control" name="isstatus" id="isstatus" placeholder="Enter Title" value="{{$isstatus}}">
                    @endif

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <div class="box">
                            {{ csrf_field() }}
                            <div class="box-body col-md-12">


                                    <div class="form-group">
                                        <label for="nameen"><b>Title</b><font color="red">*</font></label>
                                        @if($isstatus == 'edit')
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{$review['title']}}">
                                        @else
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="">
                                        @endif

                                    </div>

                                <div class="form-group">
                                    <label for="is_active"><b>User</b><font color="red">*</font></label>
                                    <select class="form-control" name="user_id" id="user_id">
                                            @if($isstatus == 'edit')
                                            @foreach($user as $users)
                                                <option value="{{$users->id}}" @if($isstatus =="edit"){{ $review['user_id']==$users->id ? 'selected' : '' }} @endif> {{$users->fname}} </option>

                                            @endforeach
                                            @else
                                                @foreach($user as $users)
                                                    <option value="{{$users->id}}"> {{$users->fname}} </option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="is_active"><b>Product</b><font color="red">*</font></label>
                                    <select class="form-control" name="product_id" id="product_id">

                                        @if($isstatus == 'edit')
                                            @foreach($product as $products)
                                                <option value="{{$products->id}}" @if($isstatus =="edit"){{ $review['product_id']==$products->id ? 'selected' : '' }} @endif> {{$products->name_en}} </option>
                                            @endforeach
                                        @else
                                            @foreach($product as $products)
                                                <option value="{{$products->id}}" > {{$products->name_en}} </option>

                                            @endforeach
                                        @endif
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="is_active"><b>Score</b><font color="red">*</font></label>
                                    <select class="form-control" name="score" id="score">
                                        @if($isstatus == 'edit')
                                            <option value="1"  @if($isstatus =="edit"){{ $review['score']==1 ? 'selected' : '' }} @endif><span class="icon">★</span></option>
                                            <option value="2"  @if($isstatus =="edit"){{ $review['score']==2 ? 'selected' : '' }} @endif><span class="icon">★★</span></option>
                                            <option value="3"  @if($isstatus =="edit"){{ $review['score']==3 ? 'selected' : '' }} @endif><span class="icon">★★★</span></option>
                                            <option value="4"  @if($isstatus =="edit"){{ $review['score']==4 ? 'selected' : '' }} @endif><span class="icon">★★★★</span></option>
                                            <option value="5"  @if($isstatus =="edit"){{ $review['score']==5 ? 'selected' : '' }} @endif><span class="icon">★★★★★</span></option>
                                        @else
                                            <option value="1"><span class="icon">★</span></option>
                                            <option value="2"><span class="icon">★★</span></option>
                                            <option value="3"><span class="icon">★★★</span></option>
                                            <option value="4"><span class="icon">★★★★</span></option>
                                            <option value="5"><span class="icon">★★★★★</span></option>
                                        @endif
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="status"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="status" id="status">
                                        @if($isstatus == 'edit')
                                            <option value="">--- Choose A Status ---</option>
                                            <option value="Y"@if($review['status']=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($review['status']=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="">--- Choose A Status ---</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif

                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="nameth"><b>Hit</b><font color="red">*</font></label>
                                    @if($isstatus == 'edit')
                                        <input type="text" class="form-control" name="hit" id="hit" placeholder="Enter Hit Number" value="{{$review['hit']}}" maxlength="3">
                                    @else
                                        <input type="text" class="form-control" name="hit" id="hit" placeholder="Enter Hit Number" value="" maxlength="3">
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="editor"><b>Content</b><font color="red">*</font></label><br>
                                    <!-- Create the editor container -->

                                    @if($isstatus == 'edit')
                                        <textarea name="content" class="content" id="testttt">{!!$review['content']!!}</textarea>
                                    @else
                                        <textarea name="content" class="content" id="testttt"></textarea>
                                    @endif

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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>


        $("#product_id").select2();
        $("#user_id").select2();

        $(document).ready(function() {
            $('.content').summernote({
                height: 200,
            });
        });
        $('#hit').keypress(function(event){
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault();
            }
        });

        $('body').on('click', '.btn-save', function (e) {

            var id = $('#id').val();
            var user_id = $('#user_id').val();
            var product_id = $('#product_id').val();

            var title = $('#title').val();
            var content = $('#testttt').val();
            var score = $('#score').val();
            var status = $('#status').val();
            var hit = $('#hit').val();
            var isstatus = $('#isstatus').val();


            if((user_id == '' ) || (product_id == '') || (title == '') || (content == '') || (score == '') || (status == '') || (hit == '')){
                return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
            }

            if(isstatus == 'edit'){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/cms/review/settingreview/" + id,
                    method: "PUT",
                    data: {id:id,user_id:user_id,product_id:product_id,title:title,contentt:content,score:score,status:status,hit:hit},
                    success:function(data){
                        if (data.code == '200') {
                            swal("Good job!", "Complete", "success");

                            var base_url = window.location.origin;

                            setTimeout(function(){
                                window.location.replace(base_url+'/cms/review/settingreview')
                            }, 1000);

                        }  else if (data.code == '500') {
                            swal("Error", "Contact Admin", "error");
                        }else{
                            swal("Error", "Review นี้ซ้ำกับ User", "error");
                        }
                    }
                })


            }else{

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/cms/review/settingreview",
                    method: "POST",
                    data: {user_id:user_id,product_id:product_id,title:title,content:content,score:score,status:status,hit:hit},
                    success:function(data){
                        if (data.code == '200') {
                            swal("Good job!", "Complate", "success");

                            var base_url = window.location.origin;

                            setTimeout(function(){
                                window.location.replace(base_url+'/cms/review/settingreview')
                            }, 1000);

                        }  else if (data.code == '500') {
                            swal("Error", "Contact Admin", "error");
                        }else{
                            swal("Error", "Review นี้ซ้ำกับ User", "error");
                        }
                    }
                })
            }
        });
    </script>
@endsection
