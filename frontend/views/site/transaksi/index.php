<?php

use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Transaksi';

$this->registerJs("
  $(document).ready(function(){
    _getData();
  });

  function _getData()
  {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/get-transaksi',
        dataType : 'JSON',
        data     : {
          'nomor' : ".$nomor."
        },
        success: function(res){
          let total       = 0;
          let html        = '';
          let array       = [];
          res.data.map((item, index) => {
          let gambar_f = '/tokoku/uploads/backend/produk/'+item.gambar;
          array.push('<div class=".'"container-keranjang row"'.">'
              +'<div class=".'"row row-keranjang"'.">'
                +'<img width=".'"100"'." src="."'+gambar_f+'".">'
                +'<div class=".'"list-keranjang"'.">'
                  +'<p>'+item.nama_produk+'</p>'
                  +'<p>'+item.harga_f+'</p>'
                  +'<p>Qty '+item.qty+'</p>'
                +'</div>'
              +'</div>'
              +'<div class=".'"list-keranjang right-keranjang"'.">'
              +'</div>'
            +'</div>');
          })
          array = array.join('');
          html  = array.toString();
          $('#list-transaksi').html(html);
          html  = '';
          array = [];
          html = '<div class=".'"row-keranjang"'.">'
                  +'<p>'+((res.data[0].pembayaran) ? res.data[0].pembayaran : ".'"Metode Pembayaran"'.")+'</p>'
                 +'</div>'
                 +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<button class=".'"btn btn-sm btn-info showModalButton"'." value=".Url::to(['pembayaran?nomor='.$nomor]).">Pilih</button>'
                 +'</div>'
          $('#metode-pembayaran').html(html);

          html  = '';
          array = [];
          for (i=0; i < 5 ; i++) {
            if (i == 0) {
              array.push('<div style=".'"column-count: 2"'.">'
                +'<div class=".'"row-keranjang"'.">'
                  +'<p>Harga</p>'
                +'</div>'
                +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<a>'+res.rincian_f.harga_f+'</a>'
                +'</div>'
              +'</div>');
            }
            if (i == 1) {
              array.push('<div style=".'"column-count: 2"'.">'
                +'<div class=".'"row-keranjang"'.">'
                  +'<p>Biaya Admin</p>'
                +'</div>'
                +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<a>'+res.rincian_f.biaya_admin_f+'</a>'
                +'</div>'
              +'</div>');
            }
            if (i == 2) {
              array.push('<div style=".'"column-count: 2"'.">'
                +'<div class=".'"row-keranjang"'.">'
                  +'<p>Kode Unik</p>'
                +'</div>'
                +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<a>'+res.rincian_f.kode_unik_f+'</a>'
                +'</div>'
              +'</div>');
            }
            if (i == 3) {
              array.push('<div style=".'"column-count: 2"'.">'
                +'<div class=".'"row-keranjang"'.">'
                  +'<p>Ongkir</p>'
                +'</div>'
                +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<a>'+res.rincian_f.onkir_f+'</a>'
                +'</div>'
              +'</div>');
            }
            if (i == 4) {
              array.push('<div style=".'"column-count: 2"'.">'
                +'<div class=".'"row-keranjang"'.">'
                  +'<p>Total Harga</p>'
                +'</div>'
                +'<div class=".'"list-keranjang"'." style=".'"text-align: end; padding: 0px 15px 0px 0px"'.">'
                  +'<a>'+res.rincian_f.total_f+'</a>'
                +'</div>'
              +'</div>');
            }
          }

          array.push(
             '<input type=".'"hidden"'." name=".'"fp_acc"'." value='+res.fasapay_data.fp_acc+' />'
            +'<input type=".'"hidden"'." name=".'"fp_item"'." value='+res.fasapay_data.fp_item+' />'
            +'<input type=".'"hidden"'." name=".'"fp_comments"'." value='+res.fasapay_data.fp_comments+' />'
            +'<input type=".'"hidden"'." name=".'"track_id"'." value='+res.fasapay_data.fp_track_id+' />'
            +'<input type=".'"hidden"'." name=".'"order_id"'." value='+res.fasapay_data.fp_order_id+' />'
            +'<input type=".'"hidden"'." name=".'"fp_merchant_ref"'." value='+res.fasapay_data.fp_merchant_ref+' />'
            +'<input type=".'"hidden"'." name=".'"fp_currency"'." value=".'"IDR"'.">'
            +'<input type=".'"hidden"'." name=".'"fp_success_url"'." value='+res.fp_success_url+' />'
            +'<input type=".'"hidden"'." name=".'"fp_success_method"'." value=".'"POST"'." />'
            +'<input type=".'"hidden"'." name=".'"fp_fail_url"'." value='+res.fp_fail_url+' />'
            +'<input type=".'"hidden"'." name=".'"fp_fail_method"'." value=".'"GET"'." />'
            +'<input type=".'"hidden"'." name=".'"fp_status_url"'." value='+res.fp_status_url+' />'
            +'<input type=".'"hidden"'." name=".'"fp_status_method"'." value=".'"POST"'." />'
            +'<input type=".'"hidden"'." name=".'"fp_amnt"'." value='+res.fasapay_data.fp_amnt+' />'
          );
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
");
?>
<div class="container">
  <!-- produk -->
  <div id="list-transaksi"></div>
  <!-- end produk -->
  <!-- pembayaran -->
  <div class="container-keranjang" style="column-count: 2" id="metode-pembayaran"></div>
  <!-- end pembayaran -->
  <!-- Voucher -->
  <!-- <div class="container-keranjang" style="column-count: 2">
    <div class="row-keranjang">
      <p>Voucher</p>
    </div>
    <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
      <a href="javascript:void(0)">Pilih</a>
    </div>
  </div> -->
  <!-- end Voucher -->
  <form method="POST" action="https://sandbox.fasapay.com/sci/">
    <!-- total -->
      <div class="container-keranjang" id="list-total"></div>
    <!-- end total -->
    <!-- <input type="hidden" name="fp_acc" value="FPX4593"> -->
    <!-- <input type="hidden" name="fp_item" value="2 pieces of Clothes"> -->
    <!-- <input type="hidden" name="fp_amnt" value="2000"> -->
    <!-- <input type="hidden" name="fp_currency" value="IDR"> -->
    <!-- <input type="hidden" name="fp_comments" value="Purchase of 2 pieces of black clothes with white collar"> -->
    <!-- <input type="hidden" name="fp_merchant_ref" value="BL002883" /> -->
    <!-- <input type="hidden" name="fp_success_url" value="http://192.168.9.98/tokoku/frontend/web/site/keranjang" /> -->
    <!-- <input type="hidden" name="fp_success_method" value="POST" /> -->
    <!-- <input type="hidden" name="fp_fail_url" value="http://192.168.9.98/tokoku/frontend/web/" /> -->
    <!-- <input type="hidden" name="fp_fail_method" value="GET" /> -->
    <!-- <input type="hidden" name="fp_status_url" value="http://192.168.9.98/tokoku/frontend/web/" /> -->
    <!-- <input type="hidden" name="fp_status_method" value="POST" /> -->
    <!-- additional fields -->
    <!-- <input type="hidden" name="track_id" value="558421222"> -->
    <!-- <input type="hidden" name="order_id" value="BJ2993800"> -->
    <div class="" style="text-align: end; margin: 5px 0px 0px 0px">
      <input class="btn btn-success" type="submit" value="Pesan">
      <!-- <button class="btn btn-success" type="button" name="button">Pesan</button> -->
    </div>
  </form>
</div>


<?php
  Modal::begin([
    'id'=>'modal',
    'size'=>'modal-md',
  ]);

  echo "<div id='modalContent'></div>";

  Modal::end();
?>
