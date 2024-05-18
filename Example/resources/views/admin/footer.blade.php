<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>

<script src="/template/admin/js/main.js"></script>

<script src="../../js/alert.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script>
    // Kiểm tra và lấy thông báo từ các element HTML có ID tương ứng
var successMessage = document.getElementById('success-message') ? document.getElementById('success-message').textContent : null;
var errorMessage = document.getElementById('error-message') ? document.getElementById('error-message').textContent : null;

// Hiển thị SweetAlert nếu có thông báo thành công
if(successMessage) {
    Swal.fire({
        title: 'Thành công!',
        text: successMessage,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// Hiển thị SweetAlert nếu có thông báo lỗi
if(errorMessage) {
    Swal.fire({
        title: 'Lỗi!',
        text: errorMessage,
        icon: 'error',
        confirmButtonText: 'OK'
    });
}
</script>
@yield('footer')
