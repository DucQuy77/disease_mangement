<!-- Main Footer -->
<footer class="main-footer">
    <!--Widgets Section-->
    <div class="widgets-section" style="background-image: url(images/background/7.jpg);">
        <div class="auto-container">
            <div class="row">
                <!--Big Column-->
                <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <!--Footer Column-->
                        <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget about-widget">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo-2.png" alt="" /></a>
                                </div>
                                <div class="text">
                                    <p>Chúng tôi tạo ra phầm mềm này với mong muốn giúp người dùng có thể tìm hiểu thêm về những bệnh thường gặp.</p>
                                    <p>Chúng tôi mong muốn người dùng có trải nghiệm tốt nhất khi sử dụng phần mềm này.</p>
                                </div>
                                <ul class="social-icon-three">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>

                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->

                    </div>
                </div>

                <!--Big Column-->
                <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <!--Footer Column-->
                            <div class="footer-widget recent-posts">
                                <h2 class="widget-title">Latest News</h2>
                                <!--Footer Column-->
                                <div class="widget-content">
                                    <div class="post">
                                        <div class="thumb"><a href="/template/user/blog-post-image.html"><img src="/template/user/images/resource/post-thumb-1.jpg" alt=""></a></div>
                                        <h4><a href="blog-post-image.html">Integrative Medicine <Br>& Cancer Treatment.</a></h4>
                                        <span class="date">July 11, 2020</span>
                                    </div>

                                    <div class="post">
                                        <div class="thumb"><a href="/template/user/blog-post-image.html"><img src="/template/user/images/resource/post-thumb-2.jpg" alt=""></a></div>
                                        <h4><a href="blog-post-image.html">Achieving Better <br>Health Care Time.</a></h4>
                                        <span class="date">August 1, 2020</span>
                                    </div>

                                    <div class="post">
                                        <div class="thumb"><a href="/template/user/blog-post-image.html"><img src="/template/user/images/resource/post-thumb-3.jpg" alt=""></a></div>
                                        <h4><a href="/template/user/blog-post-image.html">Great Health Care <br>For Patients.</a></h4>
                                        <span class="date">August 1, 2020</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <!--Footer Column-->
                            <div class="footer-widget contact-widget">
                                <h2 class="widget-title">Contact Us</h2>
                                <!--Footer Column-->
                                <div class="widget-content">
                                    <ul class="contact-list">
                                        <li>
                                            <span class="icon flaticon-placeholder"></span>
                                            <div class="text">2130 Fulton Street San Diego <Br>CA 94117-1080 USA</div>
                                        </li>

                                        <li>
                                            <span class="icon flaticon-call-1"></span>
                                            <div class="text">Mon to Fri : 08:30 - 18:00</div>
                                            <a href="tel:+89868679575"><strong>+898 68679 575</strong></a>
                                        </li>

                                        <li>
                                            <span class="icon flaticon-email"></span>
                                            <div class="text">Do you have a Question?<br>
                                                <a href="mailto:info@gmail.com"><strong>info@gmail.com</strong></a></div>
                                        </li>

                                        <li>
                                            <span class="icon flaticon-back-in-time"></span>
                                            <div class="text">Mon - Sat 8.00 - 18.00<br>
                                                <strong>Sunday CLOSED</strong></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer Bottom-->
    <div class="footer-bottom">
        <!-- Scroll To Top -->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="footer-nav">
                    <ul class="clearfix">
                        <li><a href="index.html">Privacy Policy</a></li>
                        <li><a href="about-us.html">Contact</a></li>
                        <li><a href="services.html">Supplier</a></li>
                    </ul>
                </div>

                <div class="copyright-text">
                    <p>Copyright © 2020 <a href="#">Bold Touch</a>All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Main Footer -->
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script>
    // Kiểm tra và lấy thông báo từ các element HTML có ID tương ứng
    var successMessage = document.getElementById('success-message') ? document.getElementById('success-message').textContent : null;
    var errorMessage = document.getElementById('error-message') ? document.getElementById('error-message').textContent : null;

    // Hiển thị SweetAlert nếu có thông báo thành công
    if(successMessage) {
        Swal.fire({
            title: 'Thành công!',
            text: successMessage,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }

    // Hiển thị SweetAlert nếu có thông báo lỗi
    if(errorMessage) {
        Swal.fire({
            title: 'Lỗi!',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
</script>
@yield('footer')
