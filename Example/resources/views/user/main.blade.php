
<!DOCTYPE html>
<html lang="en">
<head>
    @include ('user.head')
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

   @include('user.header')

    <!--Page Title-->
    <section class="page-title" style="background-image: url(/template/user/images/background/8.jpg)">
        <div class="auto-container">
        </div>
    </section>
    <!--End Page Title-->

    <!-- Portfolio Section -->
    <section class="portfolio-section alternate">
        <div class="auto-container">
            <!--MixitUp Galery-->
          @yield('content')
        </div>
    </section>
    <!-- End Portfolio Section -->

  @include('user.footer')

</div><!-- End Page Wrapper -->

<script src="/template/user/js/jquery.js"></script>
<script src="/template/user/js/popper.min.js"></script>
<script src="/template/user/js/bootstrap.min.js"></script>
<script src="/template/user/js/jquery.fancybox.js"></script>
<script src="/template/user/js/jquery.modal.min.js"></script>
<script src="/template/user/js/mmenu.polyfills.js"></script>
<script src="/template/user/js/mmenu.js"></script>
<script src="/template/user/js/appear.js"></script>
<script src="/template/user/js/mixitup.js"></script>
<script src="/template/user/js/owl.js"></script>
<script src="/template/user/js/wow.js"></script>
<script src="/template/user/js/script.js"></script>
<!-- Color Setting -->
<script src="/template/user/js/color-settings.js"></script>
{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('form').submit(function(event) {--}}
{{--            // Ngăn chặn hành vi mặc định của form--}}
{{--            event.preventDefault();--}}

{{--            // Thu thập dữ liệu từ form--}}
{{--            var searchTerm = $('input[name="results"]').val();--}}

{{--            // Gửi yêu cầu AJAX--}}
{{--            $.ajax({--}}
{{--                type: 'GET',--}}
{{--                url: '/search',--}}
{{--                data: {--}}
{{--                    searchTerm: searchTerm--}}
{{--                },--}}
{{--                success: function(response) {--}}

{{--                    $('#search-results').html(response);--}}
{{--                },--}}
{{--                error: function(xhr, status, error) {--}}
{{--                    // Xử lý lỗi nếu có--}}
{{--                    console.error(error);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}
</body>
</html>


