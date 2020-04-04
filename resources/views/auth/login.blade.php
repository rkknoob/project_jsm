@extends('layouts.template.frontend')

<style type="text/css">
#ju-container .ju-page-title {
    margin-top: 179px;
    margin-bottom: 0px !important;
}

#content {
    width: 480px;
    margin: 0 auto;

}

.btnlogin {
    width: 100%;
    text-align: center;
    padding: 12px 15px;
    font-weight: bold;
    color: #fff;
    background: #292828;
    border: 1px solid #292828;

}

.u_menu>li {

    position: relative;
    display: inline-block;

    padding: 0 12px 0 13px;
}

.u_menu>li>a {
    color: #777;
}

.well.well-white {
    border-top: 2px solid #333;
    border-bottom: none !important;
    border-radius: 0px !important;
}

.form-control {
    display: block;
    width: 100%;
    height: 37px !important;
    padding: 6px 6px 6px 115px ! important;
    font-size: 14px;
    line-height: 1.65;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

input:invalid,
textarea:invalid {
    background-color: #fff !important;
    border-radius: 0 !important;
    box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075), 0 0 0px rgba(102, 175, 233, .6) !important;
}

input:valid,
textarea:valid {
    background-color: #fff !important;
    border-radius: 0 !important;
    box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075), 0 0 0px rgba(102, 175, 233, .6) !important;
}

.form-control:focus {
    border-color: #e51a94 !important;
    -webkit-box-shadow: none;
}

.text--email {
    margin-top: -28px;
    margin-left: 10px;
    position: absolute;
    color: #ccc !important;
}

a:hover {
    color: #e51a94 !important;
}


/* Horizontal 6/7/8 Plus*/
@media screen and (max-width: 736px) {

    #content {
        width: 280px;

    }

    #ju-container .ju-page-title {
        margin-top: 10px !important;
        text-align: center;
        margin-bottom: 40px;
    }

    h1.entry-title {

        margin-bottom: 0px !important;
    }
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> JSM Login </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')
<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title">
            <h1 class="entry-title text-gotham text-left">MEMBER LOGIN</h1>
            <div class="well well-white">
                <p class="h_msg text-center">if you sign up now. you will be given more benefits</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="user" id="FormLogin">
                        {{ csrf_field() }}
                        <div id="content">
                            <div class="form-group">
                                <div class="row text-left">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="">

                                        <span class="text--email">ID / E-MAIL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="pass" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="">
                                        <span class="text--email">PASSWORD</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" name="submit" id="submit"
                                            class="button btnlogin btn-save">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12"></div>
            </div>
        </div>
        <div id="content" class="text-center" style="color:#fff">
            <hr />
            <ul class="u_menu">
                <li><a href="/register">SIGN-UP</a></li>
                <li><a href="/resetpassword">FIND PASSWORD</a></li>
            </ul>
        </div>
        <br><br><br>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
<script>
if (!window.moment) {
    document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
}
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css"
    rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body').on('click', '.btn-save', function(e) {
    var email = $('#email').val();
    var password = $('#pass').val();

    if ((email == '') || (password == '')) {

        swal('เข้าสู่ระบบ', 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'error');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        dataType: 'json',
        type: 'POST',
        data: {
            email: email,
            password: password
        },
        url: '/index/checkLogin',
        success: function(res) {
            if (res == 0) {
                swal('เข้าสู่ระบบ', 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง', 'error');
            } else {
                window.location = "{{url('/')}}";
            }
        }
    })



});
</script>
@endsection