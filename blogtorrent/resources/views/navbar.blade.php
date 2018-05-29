<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
                <div class="container">
    
                    <div class="navbar-header">
                        <!-- Logo -->
                        <div class="navbar-brand">
                                <a href="{{action('HomeController@index')}}">
                                <img class="logo" src="img/logo.png" alt="logo">
                                <img class="logo-alt" src="img/logo-alt.png" alt="logo">
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
                        <li><a href="#home" title="Phim mới">Phim mới</a></li>
                        <li><a href="#about" title="Phim chiếu rạp">Phim chiếu rạp</a></li>
                        <li><a href="#portfolio" title="Trailer mới">Trailer mới</a></li>
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
                        <li id="login"><a href="{{action('LoginController@goLogin')}}" title="Đăng nhập">Đăng nhập</a></li>
                        <li id="register"><a href="{{action('RegisterController@goRegister')}}" title="Đăng ký">Đăng ký</a></li>
                    </ul>
                    <!-- /Main navigation -->
    
                </div>
</nav>
<!-- /Nav -->
    