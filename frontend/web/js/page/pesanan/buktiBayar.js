// function _getDataBuktiBayar(kode) {
//     var baseUrl = window.location+'/../../api/get-tagihan';
//     $.ajax({
//         type     : 'POST',
//         url      : baseUrl,
//         dataType : 'JSON',
//         data     : {
//             'kode' : kode
//         },
//         success: function(res){
//             $('#kode_tagihan').val(res.data.kode_tagihan);
//             $('#total_bayar').val(res.data.total_bayar_f);
//         },
//         error: function(e){
//             alert('ERROR at PHP side!!');
//             return false;
//         }
//     });
// }

$(document).on('click', '#kirim-bukti-bayar', function(){
    var formData = new FormData($('form')[0]);
    console.log(formData);
    var kode_tagihan = $('#kode_tagihan').val();
    var gambar       = $('#bukti_bayar').val();
    // if (gambar) {
        var baseUrl = window.location+'/../../api/kirim-bukti-bayar';
        $.ajax({
            type     : 'POST',
            url      : baseUrl,
            dataType : 'JSON',
            data     : {
                'kode_tagihan' : kode_tagihan,
                'gambar'       : gambar
            },
            // data     : formData,
            success: function(res){
                if (res) {
                    $('#kode_tagihan').val('');
                    $('#total_bayar').val('');
                    $('#bukti_bayar').val('');
                    _getData();
                }
            },
            error: function(e){
                alert('ERROR at PHP side!!');
                return false;
            },
            // cache: false,
            // contentType: false,
            // processData: false
        });   
    // }
})