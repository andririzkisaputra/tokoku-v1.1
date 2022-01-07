$('#simpan-produk').click(function(e) {
    var formData      = new FormData($('form')[1]);
    var nama_produk   = $('#nama_produk').val();
    var qty           = $('#qty').val();
    var gambar        = $('#gambar').val();
    var nama_kategori = $('#nama_kategori').val();
    if (nama_produk && qty && gambar) {
        var baseUrl = window.location+'/../../api/post-produk';
        $.ajax({
            type     : 'POST',
            url      : baseUrl,
            dataType : 'JSON',
            data     : formData,
            success: function(data){
                $('#nama_produk').val('');
                $('#qty').val('');
                $('#gambar').val('');
                $('#tabel_produk').DataTable().ajax.reload();
                return true;
            },
            error: function(){
                alert('ERROR at PHP side!!');
                return false;
            },
            cache: false,
            contentType: false,
            processData: false
        });
    } else {
        return false;
    }
});