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
        <h1 class="h3 mb-4 text-gray-800">Edit Lang Menu</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" class="form-control" name="status" id="status"   value="{{$status}}">
                        <input type="hidden" class="form-control" name="id" id="id"   value="{{$data_lang['id']}}">
                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group col-md-12">

                                        <div class="form-group">
                                            <label for="nameen"><b>Subject En</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="subject_en" id="subject_en" placeholder="Enter Subject En"  value="{{$data_lang['subject_en']}}">
                                        </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                            <label for="name_th"><b>Subject Th</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="subject_th" id="subject_th" placeholder="Enter Subject Th"  value="{{$data_lang['subject_th']}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="sort_id"><b>Summary En</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="summary_en" id="summary_en" placeholder="Enter Summary En"  value="{{$data_lang['summary_en']}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="sort_id"><b>Summary Th</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="summary_th" id="summary_th" placeholder="Enter Summary Th"  value="{{$data_lang['summary_th']}}" >
                                    </div>
                                </div>
                                <div class="box-footer col-md-12">
                                    <button type="button" class="btn btn-success btn-save" style="width: 120px;">Save</button>
                                </div>
                            </div>

                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script>
        if (!window.moment) {
            document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
        }
    </script>
    <script type="text/javascript">




        $('body').on('click', '.btn-save', function () {
            var id = $('#id').val();
            var subject_en = $('#subject_en').val();
            var subject_th = $('#subject_th').val();
            var summary_en = $('#summary_en').val();
            var summary_th = $('#summary_th').val();

            if( (subject_en == '') || (subject_th =='')  || (summary_en == '') || (summary_th == '')){
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
                data:{id:id,subject_en:subject_en,subject_th:subject_th,summary_en:summary_en,summary_th:summary_th},
                url: '/cms/setting-lang/' + id,
                success: function(datas){
                    console.log(datas.code);
                    if(datas.code == 500){
                        swal("Error job!", "You Check Is Active No!", "error");
                    }else if(datas.code == 200){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        setTimeout(function(){
                            window.location.replace(base_url+'/cms/setting-lang')
                            }, 1000);
                    }else if(datas.code == 501){
                        swal("Error job!", "You Check Sort Id Same Data!", "error");
                    }
                    else{
                        swal("Error job!", "Contact Admin", "error");
                    }

                }
            });

        });
    </script>

@endsection
