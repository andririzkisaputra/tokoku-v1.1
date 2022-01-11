$(document).on('click', '#ubah-produk', function(e) {
    e.preventDefault();
    var formData      = new FormData($('form')[1]);
    var nama_produk   = $('#nama_produk').val();
    var qty           = $('#qty').val();
    var nama_kategori = $('#nama_kategori').val();
    $("#nama_produk").blur();
    $("#qty").blur();
    $("#nama_kategori").blur();
    if (nama_produk && qty && nama_kategori) {
        var baseUrl = window.location+'/../../api/ubah-produk';
        console.log(baseUrl);
        $.ajax({
            type        : 'POST',
            url         : baseUrl,
            dataType    : 'JSON',
            data        : formData,
            cache       : false,
            contentType : false,
            processData : false,
            success     : function(data){
                $('#modal').modal('hide');
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
        });
    } else {
        return false;
    }
});