@extends('admin.main')

@section('content')
    <div id="success-message" class="d-none">{{ session('success') }}</div>
    <div id="error-message" class="d-none">{{ session('error') }}</div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('filterBySeason') }}" method="get" class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <select class="custom-select form-select" for="inputGroupSelect01" name="season_id" id="season">
                                <option value="">Select season</option>
                                @foreach($seasons as $season)
                                    <option value="{{$season->id}}">{{$season->season_name}}</option>
                                @endforeach
                                <option value="0">Lấy tất cả các mùa</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <button id="filter" class="btn btn-outline-success">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <form action="{{ route('filterByObject') }}" method="get" class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <select class="custom-select form-select" for="inputGroupSelect01" name="object_id" id="object">
                                <option value="">Select object</option>
                                @foreach($objects as $object)
                                    <option value="{{$object->id}}">{{$object->object_name}}</option>
                                @endforeach

                                <option value="0">Lấy tất cả các đối tượng</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <button id="filter" class="btn btn-outline-success">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <form action="{{route('searchByDiseaseName')}}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="disease_name" class="form-control" placeholder="Nhập tên bệnh">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<table class="table">
    <thead>
        <tr>
            <th>Tên bệnh</th>
            <th>Ảnh</th>
            <th>Tổng quan</th>
            <th>Tìm hiểu chung</th>
            <th>Triệu chứng</th>
            <th>Nguyên nhân</th>
            <th>Nguy cơ</th>
            <th>Phương pháp</th>
            <th>Phòng ngừa</th>
            <th>Mùa</th>
            <th>Đối tượng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody >
    @if($diseases->isEmpty())
        <p style="text-align: center">Không có dữ liệu.</p>
    @else
        @foreach ($diseases as $disease)
        <tr>
            <td style="font-weight: bold">
                {{ $disease->disease_name}}
            </td>
            <td>{{ $disease->image}}</td>
            <td>{{ $disease -> overview }}</td>
            <td>{{ $disease -> learn_general }}</td>
            <td>{{ $disease -> symptom }}</td>
            <td>{{ $disease -> reason }}</td>
            <td>{{ $disease -> risk }}</td>
            <td>{{ $disease -> diagnose }}</td>
            <td>{{ $disease -> prevent }}</td>
            <td>
                @if ($disease->seasons->isEmpty())
                    {{ 'Đang cập nhật' }}
                @else
                    @foreach ($disease->seasons as $season)
                        {{ $season->season_name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                @endif
            </td>
            <td>
                @if ($disease->objects->isEmpty())
                    {{ 'Đang cập nhật' }}
                @else
                    @foreach ($disease->objects as $object)
                        {{ $object->object_name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                @endif
            </td>
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('menuForm', ['disease' =>$disease->id])}}">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{route('deleteMenuItem',['disease' =>$disease->id])}}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>

    <div class="pagination">
        {{ $diseases->links() }}
    </div>
</table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#season').change(function () {
            var season_id = $(this).val();
            $.ajax({
                url: "{{ route('filterBySeason') }}",
                type: "GET",
                data: {season_id: season_id},
                success: function(response) {
                    $('#table-body').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });


    $(document).ready(function() {
        $('#object').change(function () {
            var object_id = $(this).val();
            $.ajax({
                url: "{{ route('filterByObject') }}",
                type: "GET",
                data: {object_id: object_id},
                success: function(response) {
                    $('#table-body').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>
@endsection
