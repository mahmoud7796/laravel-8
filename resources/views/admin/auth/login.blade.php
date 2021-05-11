<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title></title>

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
        <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{asset('assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

        <!-- SLEEK CSS -->
        <link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}" />



        <!-- FAVICON -->
        <link href="{{asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />

        <!--
          HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{asset('backend/assets/plugins/nprogress/nprogress.js')}}"></script>
    </head>

</head>
<body class="bg-light-gray" id="body">
<div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a href="/index.html">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                                 viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name">Sing in to dashboard</span>
                        </a>
                    </div>
                </div>
                @if(Session('success'))
                    <div class="row mr-2 ml-2 py-2">
                        <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                id="type-error">{{Session('success')}}
                        </button>
                    </div>
                @endif
                <div class="card-body p-5">
                    <h4 class="text-dark mb-5">Sign In</h4>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input name="email" type="email" class="form-control input-lg" aria-describedby="emailHelp" required placeholder="Your E-mail">
                            </div>
                            <div class="form-group col-md-12 ">
                                <input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="d-inline-block mr-3">
                                        <label class="control control-checkbox">Remember me
                                            <input name="remember" type="checkbox" />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>
                                    @if (Route::has('password.request'))
                                        <p><a class="text-blue" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                                <p>Don't have an account yet ?
                                    <a class="text-blue" href="{{route('admin.signup')}}">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright pl-0">
        <p class="text-center">&copy; 2021 Copyright Mamhoud Diab by
            <a class="text-primary" href="https://github.com/mahmoud7796" target="_blank">@Diab</a>.
        </p>
    </div>
</div>
</body>
</html>
