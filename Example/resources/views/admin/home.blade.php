@extends('admin.main')

@section('content')
    <div id="success-message" class="d-none">{{ session('success') }}</div>
    <div id="error-message" class="d-none">{{ session('error') }}</div>
    nội dung
@endsection
