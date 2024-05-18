@extends('admin.main')

@section('head')
    <script src="/ckediter/ckediter.js"></script>
@endsection

@section('content')

<form action="" method="POST">
<div class="card-body">
                  <div class="form-group">
                    <label for="menu">Tên Người Dùng</label>
                    <input type="text" name="name" class="form-control"  placeholder="Tên người dùng">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control"  placeholder="Email">
                  </div>

                  <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" name="password" class="form-control" id="content" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group">
                    <label>Loại tài khoản</label>
                    <select name="role" value= "" class="form-control">
                      <option value="1">Admin</option>
                      <option value="2">User</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
    <script>
    CKEDITOR.replace('content');
    </script>
@endsection
