<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
	<title>Xem và tải phim torrent HD chất lượng tốt nhất</title>
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
</head>

<body>
	@include('navbar')
	@include('search')
	<!-- Header -->
	
			<div class="container">
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h4 id ="newmovie" class="text-mutex" style="display: none">Bạn cũng có thể xem <img style="margin-bottom: 3px" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-9">
                                <div class="owl-carousel owl-theme">
										@foreach($newmovies as $new)
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
																<img src='{{asset('resources/images/'. $new->image)}}' style="width: 100%;height: 300px" />  
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
						</div>
						<div class ="col-md-3">
						   <img id="imageqc" class="img-responsive" src="{{asset('img/right-2.jpg')}}" style="height: 236px; display: none"/>
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
                                        items:4
                                    }
                                },
								autoplay:true,
                                autoplayTimeout:4000
                             });
                        </script>
				</div>
				<br>
                <div class="row">
                    <div class="col-md-4">
                        <h4 id="new" class="text-mutex" style="display: none">Phim chiếu rạp mới  <img style="margin-bottom: 3px;" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
					</div>
					<div class="col-md-8">
							<a href="#" class="pull-right hov" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 35px; font-weight: 550;">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="row">
					@foreach($news as $new)
					<div class="col-sm-3half col-sm-4half">
							<div class="panel panel-default work" style="border-radius:0px;padding: 1px">
									<!-- wrapper div -->  
									<div class='wrapper'>
											<div class="overlay" onclick="window.location.href='/movie/{{$new->slug}}'"></div>
											<div class="work-content">
												<div class="work-link">
													<a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
													<a href="{{action('MovieController@movieDetail', $new->slug)}}" class="lightbox" href="./img/work1.jpg" title="{{$new->vietnamese}}"><i class="fa fa-search"></i></a>
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
											<img src='{{asset('resources/images/'. $new->image)}}' class="img-responsive" style="width: 100%;height: 300px" />  
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
                <div class="row">
                    <div class="col-md-4">
                        <h4 id="updatemovie" class="text-mutex" style="display: none">Phim chiếu rạp cập nhật <img style="margin-bottom: 3px;" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
					</div>
					<div class="col-md-8">
							<a href="#" class="pull-right hov" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 35px; font-weight: 550;">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="row">
					@foreach($newupdates as $new)
					<div class="col-sm-3half col-sm-4half">
							<div class="panel panel-default work" style="border-radius:0px;padding: 1px">
									<!-- wrapper div -->  
									<div class='wrapper'>
											<div class="overlay" onclick="window.location.href='/movie/{{$new->slug}}'"></div>
											<div class="work-content">
												<div class="work-link">
													<a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
													<a href="{{action('MovieController@movieDetail', $new->slug)}}" class="lightbox" href="./img/work1.jpg" title="{{$new->vietnamese}}"><i class="fa fa-search"></i></a>
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
											<img src='{{asset('resources/images/'. $new->image)}}' class="img-responsive" style="width: 100%;height: 300px" />  
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
                <div class="row">
                    <div class="col-md-4">
                        <h4 id="trailer" class="text-mutex" style="display: none">Phim sắp chiếu (Trailer) <img style="margin-bottom: 3px;" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
					</div>
					<div class="col-md-8">
							<a href="#" class="pull-right hov" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 35px; font-weight: 550;">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="row">
						@foreach($trailers as $new)
						<div class="col-sm-3half col-sm-4half">
								<div class="panel panel-default work" style="border-radius:0px;padding: 1px">
										<!-- wrapper div -->  
										<div class='wrapper'>
												<div class="overlay" onclick="window.location.href='/movie/{{$new->slug}}'"></div>
												<div class="work-content">
													<div class="work-link">
														<a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
														<a href="{{action('MovieController@movieDetail', $new->slug)}}" class="lightbox" href="./img/work1.jpg" title="{{$new->vietnamese}}"><i class="fa fa-search"></i></a>
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
												<img src='{{asset('resources/images/'. $new->image)}}' class="img-responsive" style="width: 100%;height: 300px" />  
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
            </div>
	
	<!-- /Header -->
	<!-- Service -->
	<div id="service" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Từ khóa nổi bật</h2>
				</div>
				<!-- /Section header -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Người nhện</h3>
						<p>Tìm kiếm liên quan dến từ khóa người nhện.</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Người ngoài hành tinh</h3>
						<p>Trả về kết quả các bộ phim người ngoài hành tinh</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Siêu anh hùng Marvel</h3>
						<p>Các bộ phim về siêu anh hùng hấp dẫn và hay nhất</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Quái vật</h3>
						<p>Các bộ phim về quái vật hấp dẫn và hay nhất</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Người máy</h3>
						<p>Các bộ phim về người máy hấp dẫn và hay nhất</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Phim viễn tưởng hay</h3>
						<p>Các bộ phim về viễn tưởng chọn lọc hay nhất</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Thám tử</h3>
						<p>Các bộ phim về thám tử chọn lọc hay nhất</p>
					</div>
				</div>

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Brad Pitt</h3>
						<p>Tổng các bộ phim của diễn viên Brad Pitt </p>
					</div>
				</div>

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-tags" aria-hidden="true"></i>
						<h3>Hãng Sonny Pictures</h3>
						<p>Các bộ phim được sản xuất từ hãng phim chọn lọc</p>
					</div>
				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Service -->

	<!-- Numbers -->
	<div id="numbers" class="section sm-padding">

		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/background.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-users"></i>
						<h3 class="white-text"><span class="counter">451</span></h3>
						<span class="white-text">Happy clients</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-trophy"></i>
						<h3 class="white-text"><span class="counter">12</span></h3>
						<span class="white-text">Awards won</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-coffee"></i>
						<h3 class="white-text"><span class="counter">154</span>K</h3>
						<span class="white-text">Cups of Coffee</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-file"></i>
						<h3 class="white-text"><span class="counter">45</span></h3>
						<span class="white-text">Projects completed</span>
					</div>
				</div>
				<!-- /number -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Numbers -->
	<!-- Contact -->
	<div id="contact" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Về chúng tôi</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>512-421-3940</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>email@support.com</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>1739 Bubby Drive</p>
					</div>
				</div>
				<!-- /contact -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->

	@include('footer')

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
		$('#searchbox').fadeIn(2500);
		$('#trailer').fadeIn(2500);
		$('#new').fadeIn(2500);
	</script>

</body>

</html>