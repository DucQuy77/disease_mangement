@extends('user.main')

@section('content')
    <div id="success-message" class="d-none">{{ session('success') }}</div>
    <div id="error-message" class="d-none">{{ session('error') }}</div>
    @if($errors->any())
        <div>
            <strong>Error!</strong> {{ $errors->first() }}
        </div>
    @endif
    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-lg-12 col-md-12 col-sm-12">
                    <!-- Login Form -->
                    <div class="login-form">
                        <h2>Đăng nhập</h2>
                        <!--Login Form-->
                        <form method="post" action="{{route('handleLogin')}}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Email " required>
                            </div>

                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Đăng nhập</span></button>
                            </div>

                            <div class="form-group pass">
                                <a href="#" class="psw">Quên mật khẩu</a>
                            </div>
                            <div class="form-group pass">
                               Chưa có tài khoản ? <a href="/register" class="psw">Đăng ký ngay!</a>
                            </div>
                        </form>
                    </div>
                    <!--End Login Form -->
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
@endsection
