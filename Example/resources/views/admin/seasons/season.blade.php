@extends('admin.main')

@section('content')
    <!-- Thêm các element này vào trong file Blade để chứa thông báo -->
    <div id="success-message" class="d-none">{{ session('success') }}</div>
    <div id="error-message" class="d-none">{{ session('error') }}</div>
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên mùa</th>
            <th>Ảnh minh họa</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($seasons as $season)
            <tr>
                <td>{{ $season->id }}</td>
                <td>{{ $season->season_name }}</td>
                <td>{{ $season->pictures}}</td>
                <td>
                    <form id="confirmDelete" action="{{route('deleteSeason',['season'=> $season->id])}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <i class="fas fa-exclamation-circle text-warning"></i> Không có dữ liệu
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
