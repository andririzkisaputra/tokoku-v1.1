$(document).ready(function() {
    _getDataPesanan();
});

function _getDataPesanan() {
    var baseUrl = window.location+'/../../api/get-pesanan';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        success: function(res){
            let html             = '';
            let array            = [];
            let array_keranajang = [];
            res.data.map((item, index) => {
                item.keranjang.map((item1, index1) => {
                    let gambar_f     = '/e-commerce/uploads/backend/produk/'+item1.gambar;
                    array_keranajang.push('<div class="container-pesanan row">'
                    +'<div style="width: 320px;">'
                        +'<img width="300" src='+gambar_f+'>'
                    +'</div>'
                    +'<div style="width: 69%">'
                        +'<b>'+item1.nama_produk+'</b>'
                        +'<div class="justify-content">'
                            +'<div>'
                                +'<p>'+item1.qty_keranjang+'x'+item1.harga_f+'</p>'
                            +'</div>'
                            +'<div class="right-keranjang text-align-end">'
                                +'<p>'+item1.harga_produk_f+'</p>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'</div>')
                });
                array_keranajang = array_keranajang.join('');
                html  = array_keranajang.toString();
                array.push(
                    '<div class="container-keranjang justify-content">'
                        +'<div>'
                            +'<b>'+item.kode_transaksi+'</b>'
                        +'</div>'
                        +'<div class="right-keranjang text-align-end">'
                            +item.status_transaksi_f
                        +'</div>'
                    +'</div>'
                    +html
                    +'<div class="container-keranjang">'
                        +'<div class="justify-content rincian-pesanan">'
                            +'<div>'
                                +'<b>Harga Produk</b>'
                            +'</div>'
                            +'<div class="right-keranjang text-align-end">'
                                +'<span>'+item.harga_produk_f+'</span>'
                            +'</div>'
                        +'</div>'
                        +'<div class="justify-content rincian-pesanan">'
                            +'<div>'
                                +'<b>Harga Ongkir</b>'
                            +'</div>'
                            +'<div class="right-keranjang text-align-end">'
                                +'<span>'+item.ongkir_f+'</span>'
                            +'</div>'
                        +'</div>'
                        +'<div class="justify-content rincian-pesanan">'
                            +'<div>'
                                +'<b>Total Bayar</b>'
                            +'</div>'
                            +'<div class="right-keranjang text-align-end">'
                                +'<span>'+item.total_f+'</span>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                );
                if (item.pembayaran_id == "1") {
                    array.push(
                    '<div class="container-keranjang row" style="width: 100%" >'
                        +'<div style="width: 50%;" >'
                            +'<button class="btn btn-success showModalButton" style="margin: 0px 20px 0px 0px;" value="bukti-bayar?data='+item.transaksi_id+'">Bukti Bayar</button>'
                        +'</div>'
                        +'<div style="width: 50%; text-align: end;" >'
                            +'<button class="btn btn-info bayar" style="margin: 0px 20px 0px 0px;" data-value='+item.url_bayar+'>Bayar</button>'
                        +'</div>'
                    +'</div>'
                    );
                } else if (item.pembayaran_id == "3") {
                    array.push(
                    '<div class="container-keranjang row" style="width: 100%" >'
                        +'<div style="width: 50%;" >'
                            +'<button class="btn btn-success showModalButton" style="margin: 0px 20px 0px 0px;" value="bukti-bayar?data='+item.transaksi_id+'">Bukti Bayar</button>'
                        +'</div>'
                        +'<div style="width: 50%; text-align: end;" >'
                            +'<button class="btn btn-info qr_code showModalButton" style="margin: 0px 20px 0px 0px;" value="qr-code?data='+item.kode_transaksi+'">Bayar</button>'
                        +'</div>'
                    +'</div>'
                    );
                }
                array_keranajang = [];
                html  = '';
            });
            array = array.join('');
            html  = array.toString();
            $('#list-pesanan').html(html);
            if (res.data.length > 0) {
                $('.empty-data').hide();
            } else {
                $('.empty-data').show();
            }
            return true;
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}


$(document).on('click', '.bayar', function() {
    var data = $(this).data("value");
    location.href=data;
});
