function _getData(kode) {
    var baseUrl = window.location+'/../../api/get-tagihan';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        data     : {
            'kode' : kode
        },
        success: function(res){
            console.log(res.data)
            $('#kode_tagihan').val(res.data.kode_tagihan);
            $('#total_bayar').val(res.data.total_bayar_f);
            $('#bukti_bayar').val(res.data.bukti_bayar);
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}

$(document).on('click', '#kirim-bukti-bayar', function(){
    var kode_tagihan = $('#kode_tagihan').val();
    var gambar  = $('#bukti_bayar').val();
    var baseUrl = window.location+'/../../api/kirim-bukti-bayar';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        data     : {
            'kode_tagihan' : kode_tagihan,
            'gambar'       : gambar
        },
        success: function(res){
            if (res.success) {
                $('#kode_tagihan').val('');
                $('#total_bayar').val('');
                $('#bukti_bayar').val('');
                _getData();
            }
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
})