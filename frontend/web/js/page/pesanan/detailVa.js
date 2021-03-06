function _getData(kode) {
    var baseUrl = window.location+'/../../api/qr-code';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        data     : {
            'kode_transaksi' : kode
        },
        success: function(res){
            let html     = '';
            let gambar_f = '';
            let array    = [];
            gambar_f = '/e-commerce/uploads/backend/other/va.png';
            array.push(
                '<b>Virtual Account</b>'
                +'<div>'
                    +'<img width="100%;" style="margin-bottom: 10px;" src='+gambar_f+'>'
                +'</div>'
                +'<b>VA Number</b><p>'+res.data.va_account+'</p>'
                +'<b>Nama</b><p>'+res.data.va_username+'</p>'
                +'<b>Produk</b><p>'+res.data.harga_produk_f+'</p>'
                +'<b>Ongkir</b><p>'+res.data.ongkir_f+'</p>'
                +'<b>Total</b><p>'+res.data.total_f+'</p>'
            );
            array = array.join('');
            html  = array.toString();
            $('#list-va').html(html);
            return true;
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}