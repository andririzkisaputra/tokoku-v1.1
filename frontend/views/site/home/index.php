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
          let gambar_f = '/tokoku-v1.1/uploads/backend/produk/'+item.gambar;
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
<div class="osengmercon-default-index">
  <style>
    .parallax {
        /* The image used */
        background-image: url(<?php echo Url::to('@web/img/banner_oseng_mercon_01.jpg'); ?>);

        /* Full height */
        height: 100%;
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
  </div>
</div>
