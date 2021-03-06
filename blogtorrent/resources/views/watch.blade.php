<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<link href="{{asset('css/video.css')}}" rel="stylesheet">
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
            <div class="col-md-12half" style="margin-top: 0px">
					<video id="MY_VIDEO_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{"fluid": true}' poster="https://znews-photo-td.zadn.vn/w660/Uploaded/spuocaw/2017_08_21/DeadpoolandTheAvengers.jpg">
					<source src="{{$play}}"  type='video/mp4'>
						<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
					</video>
					<br>
					<div class="btn-group">
						@if(strlen($vietsub) > 0)
						    <button id="server-0" type="button" onclick="setLinkStream(0)" class="btn btn-primary btn-sm" style="margin-right: 10px;border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px"><i class="fa fa-link" aria-hidden="true"></i> Server - Vietsub</button>
						@endif

						@if(strlen($thuyetminh) > 0)
							<button id="server-1" type="button" onclick="setLinkStream(1)" class="btn btn-success btn-sm" style="margin-right: 10px;border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px"><i class="fa fa-link" aria-hidden="true"></i> Server - Thuyết minh</button>
						@endif
                    </div>
					<script>
						videojs('MY_VIDEO_1',{ "controls": true, "autoplay": true, "preload": "auto",  "muted": true });
					</script>
					<br><br>
					<input type="hidden" id="serverId" value="{{$serverId}}"/>
					<h4 style="margin-left: 0px ! important;margin-top: 10px;margin-bottom: 0px ! important;color: #EE471A">{{$movie->vietnamese}}</h4>
					<small style="margin-top: 0px ! important;font-size: 14px">{{$movie->english}}</small>
					<h4 style="margin-top: 20px; margin-bottom: 5px"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Phim xem nhiều</h4>
					<div class="owl-carousel owl-theme" style="margin-bottom: 0px">
						@foreach($mosts as $new)
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
												<img src='{{asset('resources/images/'. $new->image)}}' style="width: 100%;height: 325px" />  
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
										items:5
									}
								},
								autoplay:true,
								autoplayTimeout:8000
							});
					</script>
					<h4 style="margin-bottom: 5px; margin-top: 0px"><i class="fa fa-commenting-o" aria-hidden="true"></i> Bình luận</h4>
					<div class="thumbnail" style="padding: 20px">
						<div id="disqus_thread"></div>
						<script>
							var disqus_config = function () {
							this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
							this.page.identifier = '{{$movie->slug}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
							};
							
							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');
							s.src = 'https://movie-comments-1.disqus.com/embed.js';
							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					</div>
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
		//get link play stream:
		var serverId = $('#serverId').val();
		//setactive playing:
		$("#server-"+serverId).removeClass("btn btn-primary btn-sm")
		$("#server-"+serverId).addClass("btn btn-primary btn-sm active");
		function setLinkStream(serVerid){
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "/watch-movie/link/"+serVerid,
					type: "post",
					success: function (response) {                
			            console.log(response);
						window.location.reload();
					},
					error: function(jqXHR, textStatus, errorThrown) {
					   console.log(textStatus, errorThrown);
					}
				});
		}
	</script>

</body>

</html>