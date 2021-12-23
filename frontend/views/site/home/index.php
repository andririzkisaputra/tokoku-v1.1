<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'TokoKu';

$this->registerJs("
  $(document).ready(function() {
    _getData();
  });

  function _getData()
  {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/rekomendasi-produk',
        dataType : 'JSON',
        success: function(res){
          let html  = '';
          let array = [];
          res.data.map((item, index) => {
          let gambar_f = '/tokoku/uploads/backend/produk/'+item.gambar;
          if (item.keranjang) {
            html = '<div style=".'"text-align: center;"'.">'
                     +'<a href=".'"javascript:void(0)"'." class=".'"col-sm-2 col-md-2 col-lg-2 option1 minKeranjang"'." data='+item.keranjang.keranjang_id+'>'
                       +'-'
                     +'</a>'
                     +'<b style=".'"padding: 0px 10px 0px 10px"'.">'+item.keranjang.qty+'</b>'
                     +'<a href=".'"javascript:void(0)"'." class=".'"col-sm-2 col-md-2 col-lg-2 option1 plusKeranjang"'." data='+item.keranjang.keranjang_id+'>'
                       +'+'
                     +'</a>'
                    +'</div>'
          } else {
            html = '<a href=".'"javascript:void(0)"'." class=".'"option1 keranjang"'." data='+item.produk_id+'>'
                   +'Keranjang'
                   +'</a>'
          }
          array.push('<div class=".'"col-sm-6 col-md-4 col-lg-4"'.">'
               +'<div class=".'"box"'.">'
                  +'<div class=".'"option_container"'.">'
                     +'<div class=".'"options"'.">'
                        +html
                        +'<a href=".'"javascript:void(0)"'." class=".'"option2 beli"'." data='+item.produk_id+'>'
                         +'Beli'
                        +'</a>'
                     +'</div>'
                  +'</div>'
                  +'<div class=".'"img-box"'.">'
                     +'<img src="."'+gambar_f+'".">'
                  +'</div>'
                  +'<div class=".'"detail-box"'.">'
                     +'<h5>'
                        +item.nama_produk
                     +'</h5>'
                     +'<h6>'
                        +item.harga_f
                     +'</h6>'
                  +'</div>'
               +'</div>'
            +'</div>');
          })
          array = array.join('');
          html  = array.toString();
          $('#rekomendasi-produk').html(html);
          return true;
        },
        error: function(e){
          alert('ERROR at PHP side!!');
          return false;
        }
    });
  }

  $(document).on('click', '.beli', function() {
    var produk_id = $(this).attr('data');
    if (produk_id) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/select-keranjang',
          dataType : 'JSON',
          data     : {
            produk_id : produk_id
          },
          success: function(res){
            _getData();
						location.href = ".'"site/transaksi?nomor="'."+res.data;
            return true;
          },
          error: function(){
            alert('ERROR at PHP side!!');
            return false;
          }
      });
    } else {
      return false;
    }
  });

  $(document).on('click', '.keranjang', function() {
    var produk_id = $(this).attr('data');
    if (produk_id) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/select-keranjang',
          dataType : 'JSON',
          data     : {
            produk_id : produk_id
          },
          success: function(data){
            _getData();
            return true;
          },
          error: function(){
            alert('ERROR at PHP side!!');
            return false;
          }
      });
    } else {
      return false;
    }
  });

  $(document).on('click', '.minKeranjang', function() {
    var keranjang_id = $(this).attr('data');
    if (keranjang_id) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/keranjang',
          dataType : 'JSON',
          data     : {
            keranjang_id : keranjang_id,
            is_keranjang : 0
          },
          success: function(data){
            _getData();
            return true;
          },
          error: function(){
            alert('ERROR at PHP side!!');
            return false;
          }
      });
    } else {
      return false;
    }
  });

  $(document).on('click', '.plusKeranjang', function() {
    var keranjang_id = $(this).attr('data');
    if (keranjang_id) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/keranjang',
          dataType : 'JSON',
          data     : {
            keranjang_id : keranjang_id,
            is_keranjang : 1
          },
          success: function(data){
            _getData();
            return true;
          },
          error: function(){
            alert('ERROR at PHP side!!');
            return false;
          }
      });
    } else {
      return false;
    }
  });
");
?>
<!-- <div class="row">
  <div class="col-sm-12">
     <div id="divInfo" class="alert alert-success show fade ">
        <div class="alert-heading"> :</div> <p></p>
     </div>
 </div>
</div> -->
<div>
  <!-- slider section -->
  <section class="slider_section">
     <div class="slider_bg_box">
        <img src="images/slider-bg.png" alt="">
     </div>
     <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
           <div class="carousel-item active">
              <div class="container ">
                 <div class="row">
                    <div class="col-md-7 col-lg-6 ">
                       <div class="detail-box">
                          <h1>
                             <span>
                             Diskon 20%
                             </span>
                             <br>
                             Akhir Tahun
                          </h1>
                          <p>
                            Beli barang yang kamu inginkan, nikmati diskon akhir tahun untuk kalian semua
                          </p>
                          <div class="btn-box">
                             <a href="site/produk" class="btn1">
                               Beli Sekarang
                             </a>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="container">
           <ol class="carousel-indicators">
              <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
              <!-- <li data-target="#customCarousel1" data-slide-to="1"></li>
              <li data-target="#customCarousel1" data-slide-to="2"></li> -->
           </ol>
        </div>
     </div>
  </section>
  <!-- end slider section -->
  <div class="container">
    <!-- why section -->
    <section class="why_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Mengapa Berbelanja Dengan Kami
          </h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="https://img.icons8.com/nolan/64/clock.png"/>
              </div>
              <div class="detail-box">
                <h5>
                  Pengiriman Cepat
                </h5>
                <p>
                  Agen pengiriman ada di seluruh indonesia
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="https://img.icons8.com/nolan/64/box.png"/>
              </div>
              <div class="detail-box">
                <h5>
                  Pengiriman 10K
                </h5>
                <p>
                  Kamu bisa mengirim di seluruh yogyakarta hanya 10K
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="https://img.icons8.com/nolan/64/idea.png"/>
              </div>
              <div class="detail-box">
                <h5>
                  Kualitas Terbaik
                </h5>
                <p>
                  Kualitas barang tidak diragukan lagi
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end why section -->
    <!-- product section -->
    <section class="product_section layout_padding">
       <div class="container">
          <div class="heading_container heading_center">
             <h2>
                Rekomendasi <span>produk</span>
             </h2>
          </div>
          <div class="row" id="rekomendasi-produk">
          </div>
          <div class="btn-box">
             <a href="site/produk">
             View All products
             </a>
          </div>
       </div>
    </section>
    <!-- end product section -->

  </div>
</div>
