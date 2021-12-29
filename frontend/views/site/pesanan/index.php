<?php

use yii\helpers\Url;

$this->title = 'Pesanan';

$this->registerJs("

  $(document).ready(function() {
    _getData();
  });

  function _getData() {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/get-pesanan',
        dataType : 'JSON',
        success: function(res){
          let html             = '';
          let array            = [];
          let array_keranajang = [];
          res.data.map((item, index) => {
            item.keranjang.map((item1, index1) => {
              let gambar_f     = '/e-commerce/uploads/backend/produk/'+item1.gambar;
              array_keranajang.push('<div class=".'"container-pesanan row"'.">'
                +'<div style=".'"width: 320px;"'.">'
                  +'<img width=".'"300"'." src='+gambar_f+'>'
                +'</div>'
                +'<div style=".'"width: 69%"'.">'
                  +'<b>'+item1.nama_produk+'</b>'
                  +'<div class=".'"justify-content"'.">'
                    +'<div>'
                      +'<p>'+item1.qty_keranjang+'x'+item1.harga_f+'</p>'
                    +'</div>'
                    +'<div class=".'"right-keranjang text-align-end"'.">'
                      +'<p>'+item1.harga_produk_f+'</p>'
                    +'</div>'
                  +'</div>'
                +'</div>'
              +'</div>')
            });
            array_keranajang = array_keranajang.join('');
            html  = array_keranajang.toString();
            array.push('<div class=".'"container-keranjang justify-content"'.">'
                +'<div>'
                  +'<b>'+item.kode_transaksi+'</b>'
                +'</div>'
                +'<div class=".'"right-keranjang text-align-end"'.">'
                  +item.status_transaksi_f
                +'</div>'
              +'</div>'
              +html
              +'<div class=".'"container-keranjang"'.">'
                +'<div class=".'"justify-content rincian-pesanan"'.">'
                  +'<div>'
                    +'<b>Harga Produk</b>'
                  +'</div>'
                  +'<div class=".'"right-keranjang text-align-end"'.">'
                    +'<span>'+item.harga_produk_f+'</span>'
                  +'</div>'
                +'</div>'
                +'<div class=".'"justify-content rincian-pesanan"'.">'
                  +'<div>'
                    +'<b>Harga Ongkir</b>'
                  +'</div>'
                  +'<div class=".'"right-keranjang text-align-end"'.">'
                    +'<span>'+item.ongkir_f+'</span>'
                  +'</div>'
                +'</div>'
                +'<div class=".'"justify-content rincian-pesanan"'.">'
                  +'<div>'
                    +'<b>Total Bayar</b>'
                  +'</div>'
                  +'<div class=".'"right-keranjang text-align-end"'.">'
                    +'<span>'+item.total_f+'</span>'
                  +'</div>'
                +'</div>'
              +'</div>'
              +'</div>');
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

");
?>
<div class="container">
  <div id="list-pesanan"></div>
  <!-- <div class="container-keranjang justify-content">
    <div class="">
      <b>Nomor Transaksi</b>
    </div>
    <div class="right-keranjang text-align-end">
      <b class="">Status Pesanan</b>
    </div>
  </div>
  <div class="container-pesanan row" style="">
    <div class="" style="width: 320px;">
      <img width="300" src="https://asset.kompas.com/crops/riPGK5eD7amHKtv3dFNqioI6IqI=/13x7:700x465/780x390/data/photo/2021/09/24/614dc6865eb24.jpg">
    </div>
    <div style="width: 69%">
      <b>Nama Produk</b>
      <div class="justify-content" style="">
        <div>
          <p>1.000</p>
        </div>
        <div class="right-keranjang text-align-end">
          <p>Rp 100.00.000.000</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-pesanan row" style="">
    <div class="" style="width: 320px;">
      <img width="300" src="https://asset.kompas.com/crops/riPGK5eD7amHKtv3dFNqioI6IqI=/13x7:700x465/780x390/data/photo/2021/09/24/614dc6865eb24.jpg">
    </div>
    <div style="width: 69%">
      <b>Nama Produk</b>
      <div class="justify-content" style="">
        <div>
          <p>1.000</p>
        </div>
        <div class="right-keranjang text-align-end">
          <p>Rp 100.00.000.000</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-keranjang justify-content">
    <div>
      <input class="btn btn-info" type="submit" value="Detail" />
    </div>
    <div class="right-keranjang text-align-end">
      <b class="">Total Belanja</b>
    </div>
  </div> -->
</div>
