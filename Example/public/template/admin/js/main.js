$.ajaxSetup({
    Headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function removeRow(id,url)
{
    if(confim('Bạn có chắc chắn xóa?')){
        $.ajax({
            type: 'DELETE',
            databyte: 'JSON',
            data: { id },
            url: url,
            success: function (result){
                if (result.error == false) {
                    alert(result.message);
                    location.reload();

                } else {
                    alert('xóa lỗi vui lòng thử lại');
                }
            }

        })
    }
}