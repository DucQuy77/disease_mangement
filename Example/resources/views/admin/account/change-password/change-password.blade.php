@extends('admin.main')

@section('head')
    <script src="/ckediter/ckediter.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đổi mật khẩu của {{ $account->name }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form method="POST" action="{{route('handleChange', ['account' => $account->id])}}">
                                @csrf

                                <div class="form-group">
                                    <label for="new_password">Mật khẩu mới</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password" required>
                                </div>

                                <div class="form-group">
                                    <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
