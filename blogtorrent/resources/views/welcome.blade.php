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

	

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />

	<!-- jQuery Plugins -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</head>

<body>
	@include('navbar')
	@include('search')
	<!-- Header -->
	
			<div class="container">
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <h4 id ="newmovie" class="text-mutex" style="display: none">Phim mới ra mắt <img style="margin-bottom: 3px" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
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
																<div class="overlay"></div>
																<div class="work-content">
																	<div class="work-link">
																		<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
																		<a class="lightbox" href="{{asset('resources/images/'. $new->image)}}"><i class="fa fa-search"></i></a>
																	</div>
																</div>
																<div class="bxitem-newmovie"></div> 
																<!-- image -->  
																<img src='{{asset('resources/images/'. $new->image)}}' style="width: 100%;height: 300px" />  
																<!-- description div -->  
																<div class='description'>  
																	<!-- description content -->  
																	<div class='description_content'>The pack, the basic unit of wolf social life </div>  
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
                        <h4 id="updatemovie" class="text-mutex" style="display: none">Phim lẻ mới cập nhật <img style="margin-bottom: 3px;" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
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
											<div class="overlay" style="width: 100%"></div>
											<div class="work-content">
												<div class="work-link">
													<a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
													<a class="lightbox" href="./img/work1.jpg"><i class="fa fa-search"></i></a>
												</div>
											</div>
											<div class="bxitem-newmovie"></div> 
											<!-- image -->  
											<img src='{{asset('resources/images/'. $new->image)}}' class="img-responsive" style="width: 100%;height: 300px" />  
											<!-- description div -->  
											<div class='description'>  
												<!-- description content -->  
												<div class='description_content'>The pack, the basic unit of wolf social life </div>  
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
                        <h4 id="trailer" class="text-mutex" style="display: none">Trailer mới cập nhật <img style="margin-bottom: 3px;" src="http://muabangiatot.tk/resources/images/new.gif"/></h4>
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
												<div class="overlay" style="width: 100%"></div>
												<div class="work-content">
													<div class="work-link">
														<a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
														<a class="lightbox" href="./img/work1.jpg"><i class="fa fa-search"></i></a>
													</div>
												</div>
												<div class="bxitem-newmovie"></div> 
												<!-- image -->  
												<img src='{{asset('resources/images/'. $new->image)}}' class="img-responsive" style="width: 100%;height: 300px" />  
												<!-- description div -->  
												<div class='description'>  
													<!-- description content -->  
													<div class='description_content'>The pack, the basic unit of wolf social life </div>  
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

	<!-- About -->
	<div id="about" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Welcome to Website</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-cogs"></i>
						<h3>Fully Customizible</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet.</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-magic"></i>
						<h3>Awesome Features</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet.</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-mobile"></i>
						<h3>Fully Responsive</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet.</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->


	<!-- Portfolio -->
	<div id="portfolio" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Featured Works</h2>
				</div>
				<!-- /Section header -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work1.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Lorem ipsum dolor</h3>
						<div class="work-link">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
							<a class="lightbox" href="./img/work1.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work2.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Lorem ipsum dolor</h3>
						<div class="work-link">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
							<a class="lightbox" href="./img/work2.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work3.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Lorem ipsum dolor</h3>
						<div class="work-link">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
							<a class="lightbox" href="./img/work3.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work4.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Lorem ipsum dolor</h3>
						<div class="work-link">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
							<a class="lightbox" href="./img/work4.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work5.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Lorem ipsum dolor</h3>
						<div class="work-link">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
							<a class="lightbox" href="./img/work5.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work6.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Lorem ipsum dolor</h3>
						<div class="work-link">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i></i></a>
							<a class="lightbox" href="./img/work6.jpg"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Portfolio -->

	<!-- Service -->
	<div id="service" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">What we offer</h2>
				</div>
				<!-- /Section header -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-diamond"></i>
						<h3>App Development</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero.</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-rocket"></i>
						<h3>Graphic Design</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero.</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-cogs"></i>
						<h3>Creative Idea</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero.</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-diamond"></i>
						<h3>Marketing</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero.</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-pencil"></i>
						<h3>Awesome Support</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero.</p>
					</div>
				</div>
				<!-- /service -->

				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-flask"></i>
						<h3>Brand Design</h3>
						<p>Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero.</p>
					</div>
				</div>
				<!-- /service -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Service -->


	<!-- Why Choose Us -->
	<div id="features" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- why choose us content -->
				<div class="col-md-6">
					<div class="section-header">
						<h2 class="title">Why Choose Us</h2>
					</div>
					<p>Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris. Ultrices sagittis orci a scelerisque purus.</p>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Quis varius quam quisque id diam vel quam elementum.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Mauris augue neque gravida in fermentum.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Orci phasellus egestas tellus rutrum.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
					</div>
				</div>
				<!-- /why choose us content -->

				<!-- About slider -->
				<div class="col-md-6">
					<div id="about-slider" class="owl-carousel owl-theme">
						<img class="img-responsive" src="./img/about1.jpg" alt="">
						<img class="img-responsive" src="./img/about2.jpg" alt="">
						<img class="img-responsive" src="./img/about1.jpg" alt="">
						<img class="img-responsive" src="./img/about2.jpg" alt="">
					</div>
				</div>
				<!-- /About slider -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Why Choose Us -->


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

	<!-- Pricing -->
	<div id="pricing" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Pricing Table</h2>
				</div>
				<!-- /Section header -->

				<!-- pricing -->
				<div class="col-sm-4">
					<div class="pricing">
						<div class="price-head">
							<span class="price-title">Basic plan</span>
							<div class="price">
								<h3>$9<span class="duration">/ month</span></h3>
							</div>
						</div>
						<ul class="price-content">
							<li>
								<p>1GB Disk Space</p>
							</li>
							<li>
								<p>100 Email Account</p>
							</li>
							<li>
								<p>24/24 Support</p>
							</li>
						</ul>
						<div class="price-btn">
							<button class="outline-btn">Purchase now</button>
						</div>
					</div>
				</div>
				<!-- /pricing -->

				<!-- pricing -->
				<div class="col-sm-4">
					<div class="pricing">
						<div class="price-head">
							<span class="price-title">Silver plan</span>
							<div class="price">
								<h3>$19<span class="duration">/ month</span></h3>
							</div>
						</div>
						<ul class="price-content">
							<li>
								<p>1GB Disk Space</p>
							</li>
							<li>
								<p>100 Email Account</p>
							</li>
							<li>
								<p>24/24 Support</p>
							</li>
						</ul>
						<div class="price-btn">
							<button class="outline-btn">Purchase now</button>
						</div>
					</div>
				</div>
				<!-- /pricing -->

				<!-- pricing -->
				<div class="col-sm-4">
					<div class="pricing">
						<div class="price-head">
							<span class="price-title">Gold plan</span>
							<div class="price">
								<h3>$39<span class="duration">/ month</span></h3>
							</div>
						</div>
						<ul class="price-content">
							<li>
								<p>1GB Disk Space</p>
							</li>
							<li>
								<p>100 Email Account</p>
							</li>
							<li>
								<p>24/24 Support</p>
							</li>
						</ul>
						<div class="price-btn">
							<button class="outline-btn">Purchase now</button>
						</div>
					</div>
				</div>
				<!-- /pricing -->

			</div>
			<!-- Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Pricing -->


	<!-- Testimonial -->
	<div id="testimonial" class="section md-padding">

		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/background3.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Testimonial slider -->
				<div class="col-md-10 col-md-offset-1">
					<div id="testimonial-slider" class="owl-carousel owl-theme">

						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<img src="./img/perso1.jpg" alt="">
								<h3 class="white-text">John Doe</h3>
								<span>Web Designer</span>
							</div>
							<p class="white-text">Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris.</p>
						</div>
						<!-- /testimonial -->

						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<img src="./img/perso2.jpg" alt="">
								<h3 class="white-text">John Doe</h3>
								<span>Web Designer</span>
							</div>
							<p class="white-text">Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris.</p>
						</div>
						<!-- /testimonial -->

					</div>
				</div>
				<!-- /Testimonial slider -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Testimonial -->

	<!-- Team -->
	<div id="team" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Our Team</h2>
				</div>
				<!-- /Section header -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="./img/team1.jpg" alt="">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>John Doe</h3>
							<span>Web Designer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="./img/team2.jpg" alt="">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>John Doe</h3>
							<span>Web Designer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="./img/team3.jpg" alt="">
							<div class="overlay">
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>John Doe</h3>
							<span>Web Designer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Team -->

	<!-- Blog -->
	<div id="blog" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Recents news</h2>
				</div>
				<!-- /Section header -->

				<!-- blog -->
				<div class="col-md-4">
					<div class="blog">
						<div class="blog-img">
							<img class="img-responsive" src="./img/blog1.jpg" alt="">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li><i class="fa fa-user"></i>John doe</li>
								<li><i class="fa fa-clock-o"></i>18 Oct</li>
								<li><i class="fa fa-comments"></i>57</li>
							</ul>
							<h3>Molestie at elementum eu facilisis sed odio</h3>
							<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
							<a href="blog-single.html">Read more</a>
						</div>
					</div>
				</div>
				<!-- /blog -->

				<!-- blog -->
				<div class="col-md-4">
					<div class="blog">
						<div class="blog-img">
							<img class="img-responsive" src="./img/blog2.jpg" alt="">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li><i class="fa fa-user"></i>John doe</li>
								<li><i class="fa fa-clock-o"></i>18 Oct</li>
								<li><i class="fa fa-comments"></i>57</li>
							</ul>
							<h3>Molestie at elementum eu facilisis sed odio</h3>
							<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
							<a href="blog-single.html">Read more</a>
						</div>
					</div>
				</div>
				<!-- /blog -->

				<!-- blog -->
				<div class="col-md-4">
					<div class="blog">
						<div class="blog-img">
							<img class="img-responsive"  src="./img/blog3.jpg" alt="">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li><i class="fa fa-user"></i>John doe</li>
								<li><i class="fa fa-clock-o"></i>18 Oct</li>
								<li><i class="fa fa-comments"></i>57</li>
							</ul>
							<h3>Molestie at elementum eu facilisis sed odio</h3>
							<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
							<a href="blog-single.html">Read more</a>
						</div>
					</div>
				</div>
				<!-- /blog -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Blog -->

	<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Get in touch</h2>
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

				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form">
						<input type="text" class="input" placeholder="Name">
						<input type="email" class="input" placeholder="Email">
						<input type="text" class="input" placeholder="Subject">
						<textarea class="input" placeholder="Message"></textarea>
						<button class="main-btn">Send message</button>
					</form>
				</div>
				<!-- /contact form -->

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
		$('#imageqc').fadeIn(3000);
		$('#updatemovie').fadeIn(3000);
		$('#newmovie').fadeIn(3000);
		$('#searchbox').fadeIn(3000);
		$('#trailer').fadeIn(3000);
	</script>

</body>

</html>