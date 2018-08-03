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
						<li class="breadcrumb-item"><a href="{{url('/')}}" style="color: #5499C7"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
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
						<div class='description_content' style="align-items: center; text-align: center">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-lg" style="margin-right: 10px; border-radius: 0px"><i class="fa fa-magnet" aria-hidden="true"></i> Magnet</button>
								<a href="{{action('MovieController@watch',$movie->slug)}}" type="button" class="btn btn-primary btn-lg" style="border-radius: 0px"><i class="fa fa-file-video-o" aria-hidden="true"></i> Xem phim</a>
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
						<small style="font-size: 15px;color: #0B7065;font-weight: bold">{{$movie->english}}</small>
						<h5 style="margin-top: 15px">Điểm IMDb: 
							 @if(!empty($movie->idmb))
							 <span class="label label-primary" style="font-weight: bold"> {{$movie->idmb}}</span>
							 @else
							     <small style="font-size: 12px;font-weight: bold">chưa có</small>
							 @endif
						</h5>
						<h5>Đạo diễn, diễn viên: 
							@if(!empty($movie->director))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px; font-weight: bold; color: #5499C7">{{$movie->director}}</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Quốc gia: 
							@if(!empty($global))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px;font-weight: bold">{{$global}}</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Năm sản xuất: 
							@if(!empty($movie->year))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px;font-weight: bold;">{{$movie->year}}</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Thời lượng phim: 
							@if(!empty($movie->lenght))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px;font-weight: bold;color: #5499C7">{{$movie->lenght}} phút</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Chất lượng phim: 
							@if(!empty($movie->resolution))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px;font-weight: bold;color: #5499C7">{{$movie->resolution}}</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Thể loại phim: 
							@if(!empty($category))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px;font-weight: bold;color: #5499C7">{{$category}}</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Hãng sản xuất: 
							@if(!empty($movie->production))
							    <a href="#" style="color: #5499C7"><small style="font-size: 12px;font-weight: bold;color: #5499C7">{{$movie->production}}</small></a>
							@else
								<small style="font-size: 12px;font-weight: bold">chưa có</small>
							@endif
					   </h5>
					   <h5>Tải về torrent: 
							@if(!empty($movie->file_720)&&!empty($movie->file_1080) )
								<div class="btn-group" style="margin-top: 10px">
										<a type="button" href="{{url('/resources/files/'.$movie->file_720)}}" title="Tải về torrent chất lượng 720" class="btn btn-success btn-lg" style="margin-right: 8px; border-radius: 0px"><i class="fa fa-download" aria-hidden="true"></i> 720 Tải về</a>
										<a type="button" href="{{url('/resources/files/'.$movie->file_1080)}}"  title="Tải về torrent chất lượng 1080" class="btn btn-success btn-lg" style="border-radius: 0px"><i class="fa fa-download" aria-hidden="true"></i> 1080 Tải về </a>
								</div>
							@elseif(!empty($movie->file_720)&&empty($movie->file_1080))
								<div class="btn-group" style="margin-top: 10px">
										<a type="button" href="{{url('/resources/files/'.$movie->file_720)}}" title="Tải về torrent chất lượng 720" class="btn btn-success btn-lg" style="margin-right: 8px; border-radius: 0px"><i class="fa fa-download" aria-hidden="true"></i> 720 Tải về</a>
								</div>
							@elseif(empty($movie->file_720)&&!empty($movie->file_1080))
							    <div class="btn-group" style="margin-top: 10px">
										<a type="button" href="{{url('/resources/files/'.$movie->file_1080)}}"  title="Tải về torrent chất lượng 1080" class="btn btn-success btn-lg" style="border-radius: 0px"><i class="fa fa-download" aria-hidden="true"></i> 1080 Tải về </a>
								</div>
							@else
								<small style="font-size: 12px;font-weight: bold">Chưa cập nhật torrent</small>
							@endif
					   </h5>
				   </div>
				</div>
				<div class="col-sm-12">
						<h4>Phim liên quan</h4>
						<div class="owl-carousel owl-theme">
								@foreach($relates as $new)
									<div class="item">
										<div class="panel panel-default work" style="border-radius:0px;padding: 1px">
												<!-- wrapper div -->  
												<div class='wrapper'>
														<div class="overlay" onclick="window.location.href='/movie/{{$new->slug}}'"></div>
														<div class="work-content">
															<div class="work-link">
																<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
																<a href="{{action('MovieController@movieDetail', $new->slug)}}" class="lightbox" href="{{asset('resources/images/'. $new->image)}}" title="{{$new->vietnamese}}"><i class="fa fa-search"></i></a>
															</div>
														</div>
														@php
															$current_date = strtotime($currentDay->format('Y-m-d'));
															$created_date = strtotime(date("Y-m-d", strtotime($new->created)));
															$datediff = abs($current_date - $created_date);
															$dateConvert = floor($datediff / (60*60*24));
														@endphp
														@if($dateConvert <= 14)
														<div class="bxitem-newmovie"></div>
														@endif
														<!-- image -->  
														<img src='{{asset('resources/images/'. $new->image)}}' style="width: 100%;height: 275px" />  
														<!-- description div -->  
														<div class='description'>  
															<!-- description content -->  
															<div class='description_content'> {{$new->vietnamese}} <p style="color: #F4D03F"><small>{{$new->english}}</small></p> </div>  
															<!-- end description content -->  
														</div>  
														<!-- end description div -->  
												</div>  
												<!-- end wrapper div --> 
										</div>
								</div>
								@endforeach
						</div>
						<br>
						<script>
								$('.owl-carousel').owlCarousel({
									loop:true,
									margin:5,
									nav:true,
									responsive:{
										0:{
											items:2
										},
										600:{
											items:4
										},
										1000:{
											items:4
										}
									},
									autoplay:true,
									autoplayTimeout:8000
								 });
						</script>
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