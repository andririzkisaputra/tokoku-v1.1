$(document).ready(function(){
    _getData();
});

function _getData() {
    var baseUrl = window.location+'/../../api/get-transaksi';
    $.ajax({
        type     : 'POST',
        url      : baseUrl,
        dataType : 'JSON',
        data     : {},
        success: function(res){
            let total       = 0;
            let html        = '';
            let array       = [];
            res.data.map((item, index) => {
            let gambar_f = '/e-commerce/uploads/backend/produk/'+item.gambar;
            array.push(
                '<div class="container-keranjang row">'
                    +'<div class="row row-keranjang">'
                    +'<img width="100" src='+gambar_f+'>'
                    +'<div class="list-keranjang">'
                        +'<p>'+item.nama_produk+'</p>'
                        +'<p>'+item.harga_f+'</p>'
                        +'<p>Qty '+item.qty+'</p>'
                    +'</div>'
                    +'</div>'
                    +'<div class="list-keranjang right-keranjang">'
                    +'</div>'
                +'</div>');
            })
            array = array.join('');
            html  = array.toString();
            $('#list-transaksi').html(html);
            html  = '';
            array = [];
            html  = '<div class="row-keranjang">'
                    +'<p>'+((res.data[0].pembayaran) ? res.data[0].pembayaran : "Metode Pembayaran")+'</p>'
                    +'</div>'
                    +'<div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">'
                    +'<button class="btn btn-sm btn-info showModalButton" value="'+window.location+'/../pembayaran?nomor=1">Pilih</button>'
                    +'</div>'
            $('#metode-pembayaran').html(html);

            html  = '';
            array = [];
            for (i=0; i < 5 ; i++) {
            if (i == 0) {
                array.push('<div style="column-count: 2">'
                +'<div class="row-keranjang">'
                    +'<p>Harga</p>'
                +'</div>'
                +'<div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">'
                    +'<a>'+res.rincian_f.harga_f+'</a>'
                +'</div>'
                +'</div>');
            }
            if (i == 1) {
                // array.push('<div style=".'"column-count: 2"'.">'
                //   +'<div class=".'"row-keranjang"'.">'
                //     +'<p>Biaya Admin</p>'
                //   +'</div>'
                //   +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                //     +'<a>'+res.rincian_f.biaya_admin_f+'</a>'
                //   +'</div>'
                // +'</div>');
            }
            if (i == 2) {
                // array.push('<div style=".'"column-count: 2"'.">'
                //   +'<div class=".'"row-keranjang"'.">'
                //     +'<p>Kode Unik</p>'
                //   +'</div>'
                //   +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                //     +'<a>'+res.rincian_f.kode_unik_f+'</a>'
                //   +'</div>'
                // +'</div>');
            }
            if (i == 3) {
                array.push('<div style="column-count: 2">'
                +'<div class="row-keranjang">'
                    +'<p>Ongkir</p>'
                +'</div>'
                +'<div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">'
                    +'<a>'+res.rincian_f.onkir_f+'</a>'
                +'</div>'
                +'</div>');
            }
            if (i == 4) {
                array.push('<div style="column-count: 2">'
                +'<div class="row-keranjang">'
                    +'<p>Total Harga</p>'
                +'</div>'
                +'<div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">'
                    +'<a>'+res.rincian_f.total_f+'</a>'
                +'</div>'
                +'</div>');
            }
            }
            $('#pembayaran_id').val(res.data[0].pembayaran_id)
            $('#fp_acc').val(res.fasapay_data.fp_acc)
            $('#fp_item').val(res.fasapay_data.fp_item)
            $('#fp_comments').val(res.fasapay_data.fp_comments)
            $('#fp_merchant_ref').val(res.fasapay_data.fp_merchant_ref)
            $('#fp_currency').val('IDR')
            $('#fp_success_url').val(res.fp_success_url)
            $('#fp_success_method').val('POST')
            $('#fp_fail_url').val(res.fp_fail_url)
            $('#fp_fail_method').val('GET')
            $('#fp_status_url').val(res.fp_status_url)
            $('#fp_status_method').val('POST')
            $('#fp_amnt').val(res.fasapay_data.fp_amnt)
            $('#track_id').val(res.fasapay_data.track_id)
            $('#order_id').val(res.fasapay_data.order_id)
            document.getElementById("pesanan").disabled = ((res.data[0].pembayaran) ? false : true);
            array = array.join('');
            html  = array.toString();
            $('#list-total').html(html);
            return true;
        },
        error: function(e){
            alert('ERROR at PHP side!!');
            return false;
        }
    });
}