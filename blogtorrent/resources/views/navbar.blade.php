<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
                <div class="container">
    
                    <div class="navbar-header">
                        <!-- Logo -->
                        <div class="navbar-brand">
                                <a href="{{action('HomeController@index')}}">
                                <img class="logo" src="{{asset('img/logo5.png')}}" alt="logo">
                                <img class="logo-alt" src="{{asset('img/logo4.png')}}" alt="logo">
                            </a>
                        </div>
                        <!-- /Logo -->
    
                        <!-- Collapse nav button -->
                        <div class="nav-collapse">
                            <span></span>
                        </div>
                        <!-- /Collapse nav button -->
                    </div>
    
                    <!--  Main navigation  -->
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li><a href="#home" title="Phim mới">
                            Phim mới</a></li>
                        <li><a href="#about" title="Phim chiếu rạp">Phim chiếu rạp</a></li>
                        <li><a href="#service" title="Phim lẻ">Phim lẻ</a></li>
                        <li class="has-dropdown">
                                <a href="#blog">Thể loại</a>
                                <ul class="dropdown">
                                    <li><a href="blog-single.html">Hành động</a></li>
                                    <li><a href="blog-single.html">Viễn tưởng</a></li>
                                    <li><a href="blog-single.html">Hài hước</a></li>
                                    <li><a href="blog-single.html">Phiêu lưu</a></li>
                                    <li><a href="blog-single.html">Chiến tranh</a></li>
                                </ul>
                        </li>
                        <li><a href="#portfolio" title="Trailer mới">Trailer mới</a></li>
                        <li class="has-dropdown">
                                <a href="#blog">Công cụ</a>
                                <ul class="dropdown">
                                    <li><a href="blog-single.html">Tải về Bit torrent</a></li>
                                </ul>
                        </li>

                         {{-- set user cokkie: --}}
                        @if(!empty(request()->cookie('username')))
                            <li class="has-dropdown">
                                    <a href="#blog" style="color: #FFA533"><img src="{{{ asset('/img/user.png') }}}" alt="Smiley face" height="20px" width="20px"> {{ request()->cookie('username') }}</a>
                                    <ul class="dropdown">
                                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Thông tin</a></li>
                                        @if(!empty(request()->cookie('check')))
                                            @php
                                               $checkUser = request()->cookie('check');
                                            @endphp

                                            @if($checkUser == 'admin')
                                               <li><a href="{{url('/admin/home')}}"><i class="fa fa-wrench" aria-hidden="true"></i> Quản lý</a></li>
                                            @endif
                                        @endif
                                        <li><a href="{{url('/logOut')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
                                    </ul>
                            </li>
                        @else
                            <li id="login"><a href="{{action('LoginController@goLogin')}}" title="Đăng nhập">Đăng nhập</a></li>
                            <li id="register"><a href="{{action('RegisterController@goRegister')}}" title="Đăng ký">Đăng ký</a></li>
                        @endif
                    </ul>
                    <!-- /Main navigation -->
    
                </div>
</nav>
<!-- /Nav -->
    