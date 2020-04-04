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
        <h1 class="h3 mb-4 text-gray-800">

            @if($status == 'edit')
                Edit FAQ Form
            @else
                Add FAQ Form
            @endif
        </h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    @if($status == 'edit')
                        <input type="hidden" name="status" id="status" value="{{$status}}">
                        <input type="hidden" name="id" id="id" value="{{$faq->id}}">
                    @else
                        <input type="hidden" name="status" id="status" value="{{$status}}">
                    @endif
                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <!-- <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label for="nameen"><b>Subject</b></label>
                                            @if($status == 'edit')
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject"  value="{{$faq->subject}}">
                                            @else
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject"  value="">
                                            @endif

                                        </div>
                                </div> -->


                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="nameen"><b>Question</b><font color="red">*</font></label>

                                        @if($status == 'edit')
                                            <textarea class="form-control" rows="5" id="question"  placeholder="Enter Question"  value="">{{$faq->question}}</textarea>
                                        @else
                                            <textarea class="form-control" rows="5" id="question"  placeholder="Enter Question"  value=""></textarea>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="nameen"><b>Answer</b><font color="red">*</font></label>

                                        @if($status == 'edit')
                                            <textarea class="form-control" rows="5" id="answer"  placeholder="Enter Question"  value="">{{$faq->answer}}</textarea>
                                        @else
                                            <textarea class="form-control" rows="5" id="answer"  placeholder="Enter Question"  value=""></textarea>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Type</b><font color="red">*</font></label>
                                    @if($status == 'edit')
                                        <select class="form-control" name="cate_id" id="cate_id">
                                            @foreach($faq_ate as $faq_ates)
                                                <option value="{{$faq_ates->id}}" @if($faq_ates->id==$faq->type){{'selected'}}@endif> {{$faq_ates->name_en}} </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control" name="cate_id" id="cate_id">
                                            <option value="">--- Choose A Type ---</option>
                                            @foreach($faq_ate as $faq_ates)
                                                <option value="{{$faq_ates->id}}" > {{$faq_ates->name_en}} </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        @if($status == 'edit')
                                            <option value="Y"@if($faq->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($faq->is_active=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>


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
    <script type="text/javascript">



        $('body').on('click', '.btn-save', function () {
            var subject =  $('#question').val();
            var question = $('#question').val();
            var answer = $('#answer').val();
            var cate_id = $('#cate_id').val();
            var status = $('#status').val();
            var is_active = $('#is_active').val();
            var id = $('#id').val();
            
            if((subject == '') || (question == '') || (answer == '') || (cate_id == '') || (is_active == '')){
                return swal("Error", "กรุณากรอกข้อมูลให้ครบ", "error");
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
                    data:{id:id,subject:subject,question:question,type:cate_id,status:status,is_active:is_active,answer:answer},
                    url: '/cms/faq/settingfaq/' + id,
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                    //    window.location.replace(base_url+'/backoffice/artist/magazine')
                        window.location.replace(base_url+'/cms/faq/settingfaq')
                    }
                });

            }else{
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    data:{subject:subject,question:question,type:cate_id,status:status,is_active:is_active,answer:answer},
                    url: '/cms/faq/settingfaq',
                    success: function(datas){
                        swal("Good job!", "You clicked the button!", "success");

                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                      //  window.location.replace(base_url+'/backoffice/artist/magazine')
                        window.location.replace(base_url+'/cms/faq/settingfaq')
                    }
                })
            }

        });
    </script>

@endsection
