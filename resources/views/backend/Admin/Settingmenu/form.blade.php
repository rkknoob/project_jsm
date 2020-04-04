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
        <h1 class="h3 mb-4 text-gray-800">Edit Menu Group </h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" class="form-control" name="status" id="status"   value="{{$status}}">
                        <input type="hidden" class="form-control" name="id" id="id"   value="{{$data_menu->id}}">
                        <div class="box">
                            {{ csrf_field() }}

                            <div class="box-body col-md-12">
                                <div class="form-group col-md-12">

                                        <div class="form-group">
                                            <label for="nameen"><b>Name En</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name"  value="{{$data_menu->name_en}}">
                                        </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                            <label for="name_th"><b>Name Th</b><font color="red">*</font></label>
                                            <input type="text" class="form-control" name="name_th" id="name_th" placeholder="Enter Name"  value="{{$data_menu->name_th}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="sort_id"><b>Sort Id</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="sort_id" id="sort_id" placeholder="Enter Sort Id  Number"  value="{{$data_menu->sort_id}}" maxlength="1">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        @if($status == 'edit')
                                            <option value="Y"@if($data_menu->is_active=="Y"){{'selected'}}@endif>Yes</option>
                                            <option value="N"@if($data_menu->is_active=="N"){{'selected'}}@endif>No</option>
                                        @else
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer col-md-12">
                                <button type="button" class="btn btn-success btn-save" style="width: 120px;">Save</button>
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

        $('#sort_id').keypress(function(event){
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault();
            }
            if(String.fromCharCode(event.which) == 0){
                document.getElementById('sort_id').value = 1;
            }

        });


        $('body').on('click', '.btn-save', function () {
            var id = $('#id').val();
            var name_en = $('#name_en').val();
            var name_th = $('#name_th').val();
            var status = $('#status').val();
            var sort_id = $('#sort_id').val();
            var is_active = $('#is_active').val();

            if( (name_en == '') || (name_th =='')  || (sort_id == '') || (is_active == '') || (status == '')){
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
                data:{id:id,name_en:name_en,name_th:name_th,sort_id:sort_id,is_active:is_active},
                url: '/cms/settingmenu/' + id,
                success: function(datas){
                    console.log(datas.code);
                    if(datas.code == 500){
                        swal("Error job!", "You Check Is Active No!", "error");
                    }else if(datas.code == 200){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        setTimeout(function(){
                            window.location.replace(base_url+'/cms/settingmenu')
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
