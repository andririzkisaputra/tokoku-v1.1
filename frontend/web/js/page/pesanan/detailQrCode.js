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
                gambar_f = '/e-commerce/uploads/frontend/qr_code/'+res.data.qr_code;
                array.push(
                    '<b>QR Code</b>'
                    +'<div style="margin: 10px">'
                        +'<img src='+gambar_f+'>'
                    +'</div>'
                    +'<b>Kode Transaksi</b><p>'+res.data.kode_transaksi+'</p>'
                    +'<b>Produk</b><p>'+res.data.harga_produk_f+'</p>'
                    +'<b>Ongkir</b><p>'+res.data.ongkir_f+'</p>'
                    +'<b>Total</b><p>'+res.data.total_f+'</p>'
                );
                array = array.join('');
                html  = array.toString();
                $('#list-qr-code').html(html);
                return true;
            },
            error: function(e){
                alert('ERROR at PHP side!!');
                return false;
            }
        });
    }