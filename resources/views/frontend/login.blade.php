@extends('layouts.template.frontend')

<style type="text/css">
    #ju-container .ju-page-title {
        margin-top: 179px;
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
                <h1 class="entry-title text-gotham text-center">Store</h1>
            </div>
            <div id="contentWrapper">
                <div id="contentWrap">
                    <div id="content">
                        <div id="loginWrap">
                            <div class="loc_nevi">
                                <dt class="blind">Current Page</dt>
                                <dd>
                                    <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a> &gt; Member Services &gt; <strong>login</strong>
                                </dd>
                            </div>
                            <div class="page-body">
                                <div class="login_inner">
                                    <div class="login_box">
                                        <h3 class="h_tit">MEMBER LOGIN</h3>
                                        <p class="h_msg">if you sign up now. you will be given more benefits</p>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                        <div class="login_sns">
                                            <div class='facebook-btn'  onclick=makeshop.commPopupOpen('/Member/Auth/popup/api/facebook','',750,540);><img src= //www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_facebook.png alt='' ><span>Facebook Login</span></div>


                                            <div class='btn-google' onclick=makeshop.commPopupOpen('/Member/Auth/popup/api/google','',750,540);><img src= //www.jsmbeauty.us/storage/jsmbeautyEN/www/frontstore/default_5/EN/Frontend/btn/btn_google_login.png alt=''><span>Google Login</span></div>



                                        </div>
                                        <ul class="u_menu">
                                            <li><a href="{{ route('register') }}">SIGN-UP</a></li>
                                            <li><a href="/Member/Join/findid">FIND ID</a></li>
                                            <li><a href="/Member/Join/findpasswd">FIND PASSWORD</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="login_inner nomember">
                                    <div class="login_box">
                                        <h3 class="h_tit">NOMEMBERS ORDER STATUS</h3>
                                        <p class="h_msg">Order number is sent by your email address what purchased.</p>
                                        <form name="formGuestOrderLogin" action="" method="post" >
                                            <input type="hidden" name="mode" value="GUEST_ORDER" />
                                            <fieldset>
                                                <legend>member login</legend>
                                                <ul id="n_order" class="login_w">
                                                    <li><label for="shop_oid" class="f_label">ORDER NUMBER</label><input type="text" id="shop_oid" name="shop_oid" /></li>
                                                    <li class="last"><label for="n_passwd" class="f_label">ORDER PASSWORD</label><input type="password" id="n_passwd" name="passwd"/></li>
                                                    <li><button type="button" class="btn_login" onclick="makeshop.search_nonmember_order();">SEARCH</button></li>
                                                </ul>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- .page-body -->
                        </div><!-- #loginWrap -->
                    </div><!-- #content -->
                </div><!-- #contentWrap -->
            </div><!-- #contentWrapper-->
            <hr />
        </div>
    </div>



@endsection
