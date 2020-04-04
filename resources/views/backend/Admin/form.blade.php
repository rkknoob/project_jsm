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
        <h1 class="h3 mb-4 text-gray-800">Add Admin Form</h1>

        <div class="card shadow col-md-12" style="margin-bottom: 7%;">
            <div class="collapse show" id="collapseCardExample" >
                <div class="card-body">

                    <form name="myForm" action="#" id="productForm" onsubmit="return validateForm()" method="post">
                        <input type="hidden" class="form-control" name="status" id="status"   value="{{$status}}">
                        <input type="hidden" class="form-control" name="id" id="id"   value="">
                        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
                        <div class="box">
                            {{ csrf_field() }}
                            <div class="box-body col-md-12">
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="nameen"><b>First Name</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name"  value="">
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="name_th"><b>Last Name</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name"  value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="name_th"><b>Email</b><font color="red">*</font></label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email"  value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="name_th"><b>Password</b><font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"  value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="name_th"><b>Password</b><font color="red">*</font></label>
                                        <input type="password" class="form-control" name="password" id="password_con" placeholder="Enter Password Confirm"  value="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_active"><b>Status</b><font color="red">*</font></label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="">--- Choose A Status ---</option>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                    </select>
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

        $('#sort_id').keypress(function(event){
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault();
            }});


        $('body').on('click', '.btn-save', function () {
            var id = $('#id').val();
            var finame= $('#fname').val();
            var liname = $('#lname').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var password_con = $('#password_con').val();
            var is_active = $('#is_active').val();
            var token =$('#token').val();

            if((finame == '') || (liname == '') || (email == '') || (password == '') || (password_con == '') || (is_active == '')){

               return swal("Error", "กรุณากรอกข้อมูลให้ครบ", "error");
            }
            if(password != password_con){
                return swal("Error", "Password Not Same ", "error");
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                dataType: 'json',
                type:'post' ,
                data:{id:id,fname:finame,lname:liname,email:email,password:password,password_con:password_con,is_active:is_active,token:token},
                url: '/cms/admin/add',
                success: function(datas){
                    console.log(datas.code);
                    if(datas.code == 500){
                        swal("Error job!", "You Check Is Active No!", "error");
                    }else if(datas.code == 200){
                        swal("Good job!", "You clicked the button!", "success");
                        var base_url = window.location.origin;
                        //         window.location.replace = '/backoffice/products';
                        setTimeout(function(){
                            window.location.replace(base_url+'/cms/admin')
                        }, 1000);
                    }else if(datas.code == 501){
                        swal("Error job!", "You Check Email Same Data!", "error");
                    }
                    else{
                        swal("Error job!", "Contact Admin", "error");
                    }

                }
            });

        });
    </script>

@endsection
