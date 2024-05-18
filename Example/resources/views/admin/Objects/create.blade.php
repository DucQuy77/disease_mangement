@extends('admin.main')

@section('head')
    <script src="/ckediter/ckediter.js"></script>
@endsection

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Đối tượng</label>
                <input type="text" name="object_name" class="form-control"  placeholder="Điền đối tượng theo độ tuổi">
            </div>
            <div class="form-group">
                <label for="menu">Ảnh minh họa</label>
                <input type="file" name="pictures" class="form-control" >
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm đối tượng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
