@extends('user.main')

@section('content')
    <!--Login Section-->
    @if($errors->any())
        <div>
            <strong>Error!</strong> {{ $errors->first() }}
        </div>
    @endif

    @if(session('success'))
        <div>
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-lg-12 col-md-12 col-sm-12">
                    <!-- Register Form -->
                    <div class="login-form register-form">
                        <h2>Đăng kí</h2>
                        <!--Login Form-->
                        <form method="post" action="{{route('handleRegister')}}">
                            @csrf
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input type="text" name="name" placeholder="Họ tên" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label>Xác thực mật khẩu</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Xác thực mật khẩu" required>
                            </div>

                            <div class="form-group text-right">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Đăng kí</span></button>
                            </div>
                        </form>
                    </div>
                    <!--End Register Form -->
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
@endsection
