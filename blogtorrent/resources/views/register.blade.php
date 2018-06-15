<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Đăng ký tài khoản</title>

	{{-- icon --}}
	<link rel="shortcut icon" href="{{asset('img/h5-new.png')}}">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

	<!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}" />

	<!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />

	<!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">	
    <link rel="stylesheet" type="text/css" href="{{asset('css/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
{{-- '   <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
	<!-- jQuery Plugins -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    
    <style>
        #nav {
            padding: 10px 0px;
            background: #FFF;
            -webkit-transition: 0.2s padding;
            transition: 0.2s padding;
            z-index: 999;
            color: #FFF;
            -webkit-box-shadow: 0 0px 0px 0px #999;
            -moz-box-shadow: 0 0px 0px 0px #999;
            box-shadow: 0 0px 0px 0px #999;
        }
        
        #nav.navbar {
            border: none;
            border-radius: 0;
            margin-bottom: 0px;
        }
        
        #nav.fixed-nav {
            position: fixed;
            left: 0;
            right: 0;
            padding: 0px 0px;
            background-color: #FFF !important;
            border-bottom: 1px solid #EEE;
        }
        
        #nav.nav-transparent {
            color: #FFF;
            background: transparent;
            opacity: 1;
        }

        .btn-warning{
            width: 100px;
            background: #FF5733;
            box-shadow:none;
        }

        .btn-primary{
            background: #2980B9;
        }

    </style>
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
            <div class="bg-img" style="background-image: url('{{asset('img/background.jpg')}}');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		@include('navbar')
		<!-- /Nav -->
        <div class="container">
                @if (!empty($error))
                    <div id="err" class="alert alert-warning alert-dismissible ms-warning" role="alert" style="position: absolute;top: 12%; right: 10px; z-index: 3;display: none"
                        <strong style="color: red">Lỗi: </strong> {{$error}} 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <script>
                        $('#err').fadeIn();
                        setTimeout(function(){ 
                            $('#err').fadeOut();
                        }, 4000);
                    </script>
                @endif
		<!-- home wrapper -->
		<div class="home-wrapper">
				<div class="container">
                        <div class="row">
                                <!-- home content -->
                                <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                                    <div class="home-content">
                                        <h3 class="white-text">Đăng Ký</h3>
                                        <form id="register" class="login100-form validate-form" method="POST" action="{{action('RegisterController@acceptRegister')}}" accept-charset="UTF-8">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <input class="input100" name="username" style="width: 100%" type="text" value="{{$user->username}}" placeholder="Tên tài khoản" required>
                                                    <span class="focus-input100"></span>
                                                    <span class="symbol-input100">
                                                        <span class="lnr lnr-envelope"></span>
                                                    </span>
                                               </div>
                            
                                               <div class="form-group">
                                                    <input class="input100" name="password" type="password" style="width: 100%" value="{{$user->password}}" type="text" placeholder="Mật khẩu" required>
                                                    <span class="focus-input100"></span>
                                                    <span class="symbol-input100">
                                                        <span class="lnr lnr-envelope"></span>
                                                    </span>
                                               </div>
            
                                               <div class="form-group">
                                                    <input class="input100" name="phone" style="width: 100%" type="text" value="{{$user->phone}}" placeholder="Số điện thoại" required>
                                                    <span class="focus-input100"></span>
                                                    <span class="symbol-input100">
                                                        <span class="lnr lnr-envelope"></span>
                                                    </span>
                                               </div>
            
                                               <div class="form-group">
                                                    <input class="input100" name="email" style="width: 100%" type="text" value="{{$user->email}}" placeholder="Địa chỉ email" required>
                                                    <span class="focus-input100"></span>
                                                    <span class="symbol-input100">
                                                        <span class="lnr lnr-envelope"></span>
                                                    </span>
                                               </div>
            
                                               <div class="form-group">
                                                    <input class="input100" name="address" style="width: 100%" type="text" value="{{$user->address}}" placeholder="Địa chỉ nơi ở" required>
                                                    <span class="focus-input100"></span>
                                                    <span class="symbol-input100">
                                                        <span class="lnr lnr-envelope"></span>
                                                    </span>
                                               </div>
                                                
                                                <div class="form-group">
                                                    <button class="login100-form-btn" title="Đăng ký tài khoản">
                                                        Đăng ký ngay
                                                    </button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                                <!-- /home content -->
                        </div>
                </div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->
    @include('about1')
	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
    
    @include('footer')

    <script>
            $('#register').addClass("active");
    </script>
</body>

</html>
