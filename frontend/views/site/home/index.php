<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use yii\bootstrap4\Modal;

$this->title = 'TokoKu';

$this->registerJs("
  $(document).ready(function() {
    _getData();
  });

  function _getData()
  {
    var keranjang = 1;
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/rekomendasi-produk',
        dataType : 'JSON',
        success: function(res){
          let html  = '';
          let array = [];
          res.data.map((item, index) => {
          let gambar_f = '/e-commerce/uploads/backend/produk/'+item.gambar;
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
                        +'<div class=".'""'." style=".'"text-align: center"'.">'
                          +'<a href=".'"javascript:void(0)"'." class=".'"col-sm-4 option2 beli"'." data='+item.produk_id+' style=".'"margin: 5px 5px 0px 10px"'.">'
                           +'Beli'
                          +'</a>'
                          +'<a href=".'"javascript:void(0)"'." class=".'"col-sm-4 option3 detail"'." data='+item.produk_id+' style=".'"margin: 5px 5px 0px 10px"'.">'
                           +'Detail'
                          +'</a>'
                        +'</div>'
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
<div class="osengmercon-default-index">
  <style>
    .parallax {
        /* The image used */
        background-image: url(<?php echo Url::to('@web/images/banner_oseng_mercon_01.jpg'); ?>);

        /* Full height */
        height: 10%;
        padding: 30px;
        width:100%;
        margin-top:50px;
        /* Create the parallax scrolling effect */
        /*background-attachment: fixed;*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .parallax::before{background:#000;}
    div.first {
        background: rgba(0, 0, 0, 0.2);
        padding:5px;
        color:#0a3d62;
    }
  </style>

  <div class="container">
    <div class="parallax">
      <div class="row">
          <div class="col-sm-12">
              <div align="right" class="first">
                  <h3 style="color: white">TokoKu 12.12</h3>
                  <h4 style="color: white">Discount 30% all item*</h4>
              </div>
              <br /><br /><br /><br /><br /><br /><br /><br /><br />
          </div>
      </div>
    </div>
  </div>

  <hr />
  <br />
  <section class="product_section layout_padding">
      <div class="container">
        <h4 class="title">PRODUK</h4>
        <div class="row" id="rekomendasi-produk" style="border-width: 1px; border-style: solid; border-color: #ddd; padding: 0px 25px 10px 25px"></div>
      </div>
  </section>
</div>
