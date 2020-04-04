<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login BackOffice</title>

    <link rel="icon" href="{!! asset('/jsmbeauty/src/icon.png') !!}" type="image/x-icon" />
    <link rel="shortcut icon" href="{!! asset('/jsmbeauty/src/icon.png') !!}">

    <!-- Custom fonts for this template-->
    <link href="่{!! asset('jsm_cms/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('jsm_cms/css/sb-admin-2.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin: auto; width: 100%; padding: 65px 10px;">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>
                                    <br><br>

                                    <form class="user" id="FormLogin">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email " name="email">
                                        </div>
                                        <div class="form-group" hidden>
                                            <input type="password" class="form-control form-control-user" id="pass"
                                                placeholder="Password" name="password">
                                        </div>
                                        <br>
                                        <div class="form-group" hidden>
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <button type="button" name="submit" id="submit"
                                            class="btn btn-google btn-user btn-block btn-save"
                                            style="margin-bottom: 10%; margin-top:10%;">
                                            <i class="fab fa-google fa-fw"></i> Sent
                                        </button>
                                        <div class="text-center" hidden>
                                            <a class="small" href="">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <!-- <a class="small" href="">Create an Account!</a> -->
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script>
    if (!window.moment) {
        document.write('<script src="assets/plugins/moment/moment.min.js"><\/script>');
    }
    </script>
    <script type="text/javascript">
    $('body').on('click', '.btn-save', function() {
        var email = $('#email').val();
        //alert(email);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            dataType: 'json',
            type: 'POST',
            data: {
                email: email
            },
            url: '/cms/resetpassword',
            success: function(datas) {
                console.log(datas)

                if (datas.code == 500) {
                    swal("Error job!", "You Check Is Active No!", "error");
                } else if (datas.code == 200) {
                    swal(datas.title, datas.content, "success");
                    var base_url = window.location.origin;


                    //         window.location.replace = '/backoffice/products';
                } else if (datas.code == 501) {
                    swal(datas.title, datas.content, "error");
                } else {
                    swal("Error job!", "Contact Admin", "error");
                }

            }
        });

    });
    </script>
</body>

</html>