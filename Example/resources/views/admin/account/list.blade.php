@extends('admin.main')

@section('content')
<!-- Thêm các element này vào trong file Blade để chứa thông báo -->
<div id="success-message" class="d-none">{{ session('success') }}</div>
<div id="error-message" class="d-none">{{ session('error') }}</div>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Loại tài khoản</th>
            <th>Đổi mật khẩu</th>
            <th>Hành động</th>
        </tr>
        @foreach ($accounts as $account)
        <tr>
            <td>{{ $account->id }}</td>
            <td>{{ $account->name}}</td>
            <td>{{ $account -> email }}</td>
            <td>
                <input type="password" class="password-input" value="{{ $account->password }}" style="border: none" readonly/>
                <i class="fas fa-eye-slash toggle-password" style="cursor: pointer;"></i>
            </td>
            <td>@if($account->role == 1)Admin
                @else User
                @endif
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('showChange', ['account' => $account->id])}}">
                    <i class="fa-solid fa-retweet"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('showUpdate', ['account' => $account->id])}}">
                    <i class="fas fa-edit"></i>
                </a>
                <form id="confirmDelete" action="{{ route('deleteAccount', ['account' => $account->id]) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </thead>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                var passwordField = $(this).siblings('.password-input');
                var fieldType = passwordField.attr('type');

                // Remove readonly attribute before changing the type
                passwordField.removeAttr('readonly');

                if (fieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                }

                // Reapply readonly attribute after changing the type
                passwordField.attr('readonly', 'readonly');
            });
        });
    </script>
@endsection
