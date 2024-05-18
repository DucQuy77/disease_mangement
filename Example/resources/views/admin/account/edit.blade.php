@extends('admin.main')

@section('head')
    <script src="/ckediter/ckediter.js"></script>
@endsection

@section('content')
    <form action="{{route('handleUpdate', ['account' => $account->id])}}" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Người Dùng </label>
                <input type="text" name="name" value="{{ $account ->name }}" class="form-control"  placeholder="Nhập tên người dùng">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ $account ->email }}"  class="form-control"  placeholder="Nhập email người dùng">
            </div>

            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="text" name="password" value="{{ $account ->password }}" class="form-control" id="content" placeholder="Nhập mật khẩu">
            </div>

            <div class="form-group">
                <label>Loại tài khoản</label>
                <select name="role" class="form-control">
                    <option value="1" {{ $account->role == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $account->role == 2 ? 'selected' : '' }}>User</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
    CKEDITOR.replace('content');
    </script>
@endsection
