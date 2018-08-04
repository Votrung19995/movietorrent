<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>Xem phim {{$movie->vietnamese}}</title>
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
	<link rel="stylesheet" href="{{asset('css/jquery.ui.autocomplete.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
	

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="https://vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
	<!-- jQuery Plugins -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.fitvids.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
	<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
	<script src="https://vjs.zencdn.net/7.1.0/video.js"></script>
	
	<style>
		ol li a:hover{
			color: orangered ! important;
		}
	</style>
</head>

<body>
	@include('navbar')
	@include('search')
	<!-- Header -->
	
	<div class="container">
		<br>
		<div class="row">
				<nav aria-label="breadcrumb" style="margin-bottom: 0px">
					<ol class="breadcrumb thumbnail">
						<li class="breadcrumb-item"><a href="{{url('/')}}" style="color: #5499C7"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
						<li class="breadcrumb-item"><a href="#" style="color: #5499C7">{{$category}}</a></li>
						<li class="breadcrumb-item active" aria-current="page" style="">{{$movie->vietnamese}}</li>
					</ol>
				</nav>
		</div>
		<div class="row">
            <div class="col-md-8half" style="margin-top: 0px">
					<video id="MY_VIDEO_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{"fluid": true}' poster="https://znews-photo-td.zadn.vn/w660/Uploaded/spuocaw/2017_08_21/DeadpoolandTheAvengers.jpg">
						<source src="{{action('MovieController@getUrl',$movie->slug)}}"  type='video/mp4'>
						<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
					</video>
					<br><br>
					<div class="btn-group">
                            @foreach($links as $index => $lk)
                              <a type="button" class="btn btn-danger btn-sm" style="margin-right: 10px; border-radius: 0px"><i class="fa fa-link" aria-hidden="true"></i> Server - {{$index + 1}}</a>
                            @endforeach
                    </div>
					<script>
						videojs('MY_VIDEO_1',{ "controls": true, "autoplay": true, "preload": "auto",  "muted": true });
					</script>
					<br><br>
            </div>
			<div class="col-md-1half" style="margin-top: 0px"></div>
            <div class="col-md-3half thumbnail" style="border-radius: 0px; margin-top: 0px">
                  <img src="https://gaja.vn/wp-content/uploads/2016/07/quangcaotreninternet.png" class="img-fluid"/>
            </div>
		</div>
		
	</div>

	@include('footer')

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	{{-- //hiden h1: --}}

	<script>
		$('#back-to-top').each(function(){
			$(this).click(function(){ 
				$('html,body').animate({ scrollTop: 0 }, 'slow');
				return false; 
			});
        });
		$('#imageqc').fadeIn(2500);
		$('#updatemovie').fadeIn(2500);
		$('#newmovie').fadeIn(2500);
		$('#searchbox').fadeIn(1000);
		$('#trailer').fadeIn(2500);
		$('#new').fadeIn(2500);
	</script>

</body>

</html>