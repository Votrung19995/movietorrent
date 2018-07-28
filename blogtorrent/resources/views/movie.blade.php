<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>{{$movie->vietnamese}}</title>
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

	<!-- jQuery Plugins -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
						<li class="breadcrumb-item"><a href="#" style="color: #5499C7"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
						<li class="breadcrumb-item"><a href="#" style="color: #5499C7">{{$category}}</a></li>
						<li class="breadcrumb-item active" aria-current="page" style="">{{$movie->vietnamese}}</li>
					</ol>
				</nav>
		</div>
		<div class="row">
			<div class="col-md-8half thumbnail" style="border-radius: 0px;">
				<div class="col-sm-6">
			     <div class="panel panel-default work" style="border-radius:0px;padding: 1px; margin-top: 15px">
				  <div class='wrapper'>
					<img src="{{asset('resources/images/'.$movie->image)}}" style="width: 100%; height: 520px" class="img-fluid"/>
					<div class='description'>  
						<!-- description content -->  
						<div class='description_content'>
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-lg" style="margin-right: 10px; border-radius: 0px"><i class="fa fa-download" aria-hidden="true"></i> Tải về torent</button>
								<button type="button" class="btn btn-primary btn-lg" style="border-radius: 0px"><i class="fa fa-file-video-o" aria-hidden="true"></i> Xem phim</button>
							</div>
						</div> 
						<!-- end description content -->  
					</div>  
				  </div>
				</div>
				<br>
				</div>
				<div class="col-sm-6">
                   <div style="margin-top: 15px;padding: 5px ! important;" class="thumbnail">
						<h4>{{$movie->vietnamese}}</h4>
						<small style="font-size: 15px;color: #12887B;font-weight: bold">{{$movie->english}}</small>
				   </div>
				</div>
				<div class="col-sm-12">
						<h4>Trailer phim</h4>
						<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$trailer}}" allowfullscreen></iframe>
						</div>
						<br>
				</div>
				<div class="col-sm-12">
					    <br>
						<h4>Nội dung phim</h4>
						  @if(strlen($movie->content) > 10)
						      <p style="font-weight: bold;color: black">{!!$movie->content!!}</p>
						  @else
							  <b> Chưa có nội dung phim !</b>
							  <br>
						  @endif
						<br>
				</div>
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