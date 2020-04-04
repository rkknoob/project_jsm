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
    padding: 6px 6px 6px 140px ! important;
    font-size: 14px;
    line-height: 1.65;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 0 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
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

    <title> JSM Register </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

@section('content')
<div id="ju-container">
    <div id="ju-content" class="container">
        <div class="ju-page-title">
            <h1 class="entry-title text-gotham text-left">REGISTER</h1>
            <div class="well well-white">
                <p class="h_msg">Your personal information is protected and not be disclosed</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div id="content">
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
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                            placeholder="">
                                        <span class="text--email">First Name</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                            placeholder="">
                                        <span class="text--email">Last Name</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="">
                                        <span class="text--email">EMAIL Address</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="">
                                        <span class="text--email">Password</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" id="password_confirm"
                                            name="password_confirm" placeholder="">
                                        <span class="text--email">Re-Enter Password</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" value="submit" name="submit"
                                            class="button btnlogin">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="content" class="text-center" style="color:#fff">
            <hr />
        </div>
        <br><br>
    </div>
</div>


@endsection