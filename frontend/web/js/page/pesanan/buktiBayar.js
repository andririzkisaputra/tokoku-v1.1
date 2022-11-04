function _getDataBuktiBayar(kode) {
    var baseUrl = window.location+'/../../api/get-tagihan';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        data     : {
            'kode' : kode
        },
        success: function(res){
            if (res.data.status_tagihan == '2') {
                let html     = '';
                let gambar_f = '';
                let array    = [];
                gambar_f = '/e-commerce/uploads/frontend/bukti_bayar/'+res.data.bukti_bayar;
                array.push(
                    '<div style="text-align: center">'
                        +'<b>Bukti Bayar</b>'
                        +'<div style="margin: 10px">'
                        +'<img width="100%" src='+gambar_f+'>'
                        +'</div>'
                        +'<b>Kode Tagihan</b><p>'+res.data.kode_tagihan+'</p>'
                        +'<b>Total Bayar</b><p>'+res.data.total_bayar_f+'</p>'
                    +'</div>'
                );
                array = array.join('');
                html  = array.toString();
                $('#list-bukti-bayar').show();
                $('#input-bukti-bayar').hide();
                $('#list-bukti-bayar').html(html);
            } else {
                $('#list-bukti-bayar').hide();
                $('#input-bukti-bayar').show();
                $('#transaksi_id').val(res.data.transaksi_id);
                $('#kode_tagihan').val(res.data.kode_tagihan);
                $('#total_bayar').val(res.data.total_bayar_f);
            }
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}

$(document).on('click', '#kirim-bukti-bayar', function(e){
    e.preventDefault();
    var formData = new FormData($('form')[0]);
    var gambar   = $('#bukti_bayar').val();
    $("#bukti_bayar").blur();
    if (gambar) {
        var baseUrl = window.location+'/../../api/kirim-bukti-bayar';
        $.ajax({
            type        : 'POST',
            url         : baseUrl,
            dataType    : 'JSON',
            data        : formData,
            cache       : false,
            contentType : false,
            processData : false,
            success: function(res){
                if (res) {
                    $('#modal').modal('hide');
                    $('#kode_tagihan').val('');
                    $('#total_bayar').val('');
                    $('#bukti_bayar').val('');
                    _getDataPesanan();
                }
            },
            error: function(e){
                alert('ERROR at PHP side!!');
                return false;
            }
        });   
    }
})