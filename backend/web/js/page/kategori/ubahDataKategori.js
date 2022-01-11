$(document).on('click', '#ubah-kategori', function(e) {
    e.preventDefault();
    var baseUrl         = window.location+'/../../api/ubah-kategori';
    var formData        = new FormData($('form')[1]);
    var nama_kategori   = $('#nama_kategori').val();
    $('#nama_kategori').blur();
    if (nama_kategori) {
        $.ajax({
            type        : 'POST',
            url         : baseUrl,
            dataType    : 'JSON',
            data        : formData,
            cache       : false,
            contentType : false,
            processData : false,
            success: function(data){
                $('#nama_kategori').val('');
                $('#tabel_kategori').DataTable().ajax.reload();
                $('#modal').modal('hide');
                return true;
            },
            error: function(){
                alert('ERROR at PHP side!!');
                return false;
            },
        });
    } else {
        return false;
    }
});