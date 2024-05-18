<!-- Main Header-->
<header class="main-header header-style-two">

    <!-- Header top -->
    <div class="header-top-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="top-left">
                    <ul class="contact-list clearfix">
                        <li><i class="flaticon-hospital-1"></i>234 Triumph, Los Angeles, <br>California, US </li>
                        <li><i class="flaticon-back-in-time"></i>Mon - Sat 8.00 - 18.00. <br>Sunday CLOSED</li>
                    </ul>
                </div>
                <div class="top-right">
                    <ul class="social-icon-one">
                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                    </ul>
                    <div class="btn-box">
                        @if(session('user'))
                            <a href="appointment.html" id="appointment-btn" class="theme-btn btn-style-three">
                                <span class="btn-title">
                                  Chào, {{ session('user')->name }}!
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng Xuất</button>
                        @else
                            <a href="/login" class="theme-btn btn-style-three">
                                <span class="btn-title">
                                    Đăng nhập ngay.
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header Lower -->
    <div class="header-lower">
        <div class="auto-container">
            <!-- Main box -->
            <div class="main-box">

                <div class="logo-box">
                    <div class="logo"><a href="index.html"><img src="/template/user/images/logo-9.png" alt="" title=""></a></div>
                </div>

                <!--Nav Box-->
                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li class="dropdown">
                                <span>Home</span>
                                <ul>
                                    <li><a href="index.html">Home Medical</a></li>
                                    <li><a href="index-2.html">Home Clanic</a></li>
                                    <li><a href="index-3.html">Home Dental Care</a></li>
                                    <li><a href="index-4.html">Home Eye Care</a></li>
                                    <li><a href="index-5.html">Home Prenatal care</a></li>
                                </ul>
                            </li>

                            <li class="dropdown current">
                                <span>Pages</span>
                                <ul>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li class="current"><a href="services.html">Gallery</a></li>
                                    <li><a href="pricing-table.html">Pricing Table</a></li>
                                    <li><a href="elements.html">UI Elements</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                    <li><a href="error-page.html">Error 404</a></li>
                                    <li><a href="terms-and-condition.html">Terms and Condition</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <span>Doctors</span>
                                <ul>
                                    <li><a href="doctors.html">Doctors</a></li>
                                    <li><a href="doctor-detail.html">Doctor Detail</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <span>Departments</span>
                                <ul>
                                    <li><a href="departments.html">Departments</a></li>
                                    <li><a href="department-detail.html">Cardiology</a></li>
                                    <li><a href="department-detail.html">Neurology</a></li>
                                    <li><a href="department-detail.html">Urology</a></li>
                                    <li><a href="department-detail.html">Gynecological</a></li>
                                    <li><a href="department-detail.html">Pediatrical</a></li>
                                    <li><a href="department-detail.html">Laboratory</a></li>
                                    <li><a href="department-detail.html">Department Detail</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <span>Blog</span>
                                <ul>
                                    <li><a href="blog-standard.html">Standard</a></li>
                                    <li><a href="blog-checkboard.html">Checkerboard</a></li>
                                    <li><a href="blog-masonry.html">Masonry</a></li>
                                    <li><a href="blog-two-col.html">Two Columns</a></li>
                                    <li><a href="blog-three-col.html">Three Colums</a></li>
                                    <li><a href="blog-four-col-wide.html">Four Colums</a></li>
                                    <li class="dropdown">
                                        <span>Post Types</span>
                                        <ul>
                                            <li><a href="blog-post-image.html">Image Post</a></li>
                                            <li><a href="blog-post-gallery.html">Gallery Post</a></li>
                                            <li><a href="blog-post-link.html">Link Post</a></li>
                                            <li><a href="blog-post-audio.html">Audio Post</a></li>
                                            <li><a href="blog-post-quote.html">Quote Post</a></li>
                                            <li><a href="blog-post-video.html">Video Post</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- Main Menu End-->

                    <div class="outer-box">
                        <button class="search-btn"><span class="fa fa-search"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="main-box">
                <div class="logo-box">
                    <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
                </div>

                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Search Btn -->
                <div class="search-box">
                    <button class="search-btn mobile-search-btn"><i class="flaticon-magnifying-glass"></i></button>
                </div>

                <!-- Cart Btn -->
                <button class="cart-btn"><i class="icon flaticon-shopping-cart"></i><span class="count">3</span></button>

                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="fa fa-bars"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>

    <!-- Header Search -->
    <div class="search-popup">
        <span class="search-back-drop"></span>
        <button class="close-search"><span class="fa fa-times"></span></button>

        <div class="search-inner">
            <form method="GET" action="{{ route('search') }}"> <!-- Đặt action của form là route 'search' -->
                <div class="form-group">
                    <input type="search" name="query" value="{{ request('query') }}" placeholder="Tìm kiếm..." required=""> <!-- Trường input sẽ gửi yêu cầu tìm kiếm với key 'query' -->
                    <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Header Search -->

</header>
<!--End Main Header -->
@yield('header')