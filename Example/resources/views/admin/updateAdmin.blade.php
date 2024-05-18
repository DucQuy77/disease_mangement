@extends('admin.main')

@section('head')
    <script src="/ckediter/ckediter.js"></script>
@endsection

@section('content')

    <form action="{{route('updateHandleAdmin', ['id' => $user->id])}}" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Người Dùng </label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control"  placeholder="Nhập tên người dùng">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ $user->email }}"  class="form-control"  placeholder="Nhập email người dùng">
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
