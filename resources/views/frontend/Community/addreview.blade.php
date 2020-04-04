@extends('layouts.template.frontend')

@section('content')
    <style type="text/css">
        #ju-container .ju-page-title {
            margin-top: 179px;
        }
        .MS_input_txt {
            padding: 2px 0 0 2px!important;
            height: 22px !important;
            line-height: 17px !important;
            border: 1px solid #dcdcdc !important;
        }
        .text-size{
            font-size: 12px;
        }
    </style>
    @php
        $locale = session()->get('locale');
    @endphp

    <div id="ju-container">
        <div id="ju-content" class="container">
            <div class="ju-page-title">
                @if($locale==='th')
                    <h1 class="entry-title text-thai text-center">{{$subject->subject_th}}</h1>
                    <div class="text-center text-thai">{{$subject->summary_th}}</div>
                @else
                    <h1 class="entry-title text-gotham text-center">{{$subject->subject_en}}</h1>
                    <div class="text-center text-gotham">{{$subject->summary_en}}</div>
                @endif
            </div>

            <div class="bbs-table-write" >
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="#">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
                    <table summary="" style="width: 100%;">
                        <tbody>
                        <tr>
                            <th><div class="text-size">Name</div></th>
                            <td><div><input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="MS_input_txt" maxlength="80" disabled></div></td>
                            <th></th>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <th><div class="text-size">Title</div></th>
                            <td colspan="3">
                                <div class="title">
                                    <input type="text" name="title" id="title" value="" style="width:400px;" class="MS_input_txt" maxlength="80">
                                </div>
                            </td>
                        </tr>
                        <tr hidden>
                            <th><div class="text-size">Product</div></th>
                            <td colspan="3">
                                <div class="title">
                                    <select class="MS_select MS_input_txt idcategory" name="idcategory" id="idcategory" >
                                        <option value="">--- Choose A Category ---</option>
                                        @foreach($cate as $category)
                                            <option value="{{$category->id}}"> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                    <select class="MS_select MS_input_txt idproduct" name="product_id" id="product_id">
                                        <option value="">--- Choose A Product ---</option>
                                    </select>
                                    <input type="hidden" name="b_oldcategory" value="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><div class="text-size">Score</div></th>
                            <td colspan="3">
                                <div class="title">
                                    <select class="MS_select MS_input_txt" name="score" id="score" >
                                        <option value="">--- Choose A Score ---</option>
                                        <option value="1"><span class="icon">★</span></option>
                                        <option value="2"><span class="icon">★★</span></option>
                                        <option value="3"><span class="icon">★★★</span></option>
                                        <option value="4"><span class="icon">★★★★</span></option>
                                        <option value="5"><span class="icon">★★★★★</span></option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><div class="text-size">Content</div></th>
                            <td colspan="3">
                                <div>
                                    <textarea name="content" class="summernoten" id="content"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th ><div class="text-size">Code</div></th>
                            <td colspan="12">
                                <input type="text" name="captcha" id="captcha" class="MS_input_txt " style="width: 130px;" placeholder="Enter Captcha"><br>
                                <span id="oldDiv"></span>
                                <div class="btn-sp btn-galbh21 col-md-12" style="vertical-align: middle;margin-top: 5px; padding-left:0px;">
                                   
                                    <div class="captcha" style="float:left;"  ><span>{!! captcha_img() !!}</span></div>
                                    <button type="button" class="btn btn-success btn-refresh" id="refresh" style="float:left; margin-left: 10px;"><i class="fa fa-refresh"></i></button>
                                    
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="box-footer col-md-12" style="padding: 15px 65px 50px">
                        <button type="button" class="btn btn-success btn-save btn-loading" style="width: 120px;">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script>
        if (!window.moment) {
            document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
        }
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#refresh').click(function(){
            $.ajax({
                type:'GET',
                url:'/refreshcaptcha',
                success:function(data){

                    $(".captcha span").html(data.captcha);
                }
            });
        });

        $(document).ready(function() {
            $('.summernoten').summernote({
                height: 200,
            });
        });

        $('.idcategory').change(function(){
            if($(this).val !='' ){
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "/qa/board/fetch",
                    method: "POST",
                    data: {select:select,_token:_token},
                    success:function(data){
                        console.log(data.datas)
                        $('#product_id').empty();
                        $.each(data.datas, function(i, item) {
                            $('#product_id').append('<option value="'+ item.id +'">'+ item.name_en +'</option>');
                        })

                    }
                })
            }
        });

        $('body').on('click', '.btn-save', function (e) {

            var user_id = $('#user_id').val();
            var product_id = $('#product_id').val();
            var captcha = $('#captcha').val();
            var title = $('#title').val();
            var content = $('#content').val();
            var score = $('#score').val();
            var status = 'Y';
            var _token = $('input[name="_token"]').val();
            var hit = 1;

            if((user_id == '' ) || (product_id == '') || (captcha == '') || (content =='') || (score == '') ||(title =='')){

                return swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูลให้ครบ", "error");
            }


            $.ajax({
                url: "/review/save/data",
                method: "POST",
                data: {user_id:user_id,product_id:product_id,captcha:captcha,content:content,score:score,title:title,_token:_token,status:status,hit:hit},
                success:function(data){

                    if (data.code == '200') {
                        swal("Good job!", "Complate", "success");

                        setTimeout(function(){
                            var base_url = window.location.origin;
                            window.location.replace(base_url+'/review');
                        }, 2000);
                    }  else if (data.code == '500') {
                        swal("Error", "Contact Admin", "error");
                    }else{
                        swal("Error", "Error Valid", "error");
                    }

                }
            })

        });


    </script>

@endsection
