<?php

use yii\helpers\Url;

$this->title = 'Keranjang';

$this->registerJs("
  $(document).ready(function(){
    _getData();
  });

  function _getData() {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/get-keranjang',
        dataType : 'JSON',
        success: function(res){
          let html  = '';
          let array = [];
          res.data.map((item, index) => {
          let gambar_f = '/tokoku/uploads/backend/produk/'+item.gambar;
          array.push('<div class=".'"container-keranjang row"'.">'
              +'<div class=".'"row row-keranjang"'.">'
                +'<img width=".'"100"'." src="."'+gambar_f+'".">'
                +'<div class=".'"list-keranjang"'.">'
                  +'<b>'+item.nama_produk+'</b>'
                  +'<p>'+item.harga_f+'</p>'
                  +'<p>'+item.qty+'</p>'
                +'</div>'
              +'</div>'
              +'<div class=".'"list-keranjang right-keranjang"'.">'
                +'<a href=".'"javascript:void(0)"'." id=".'"delete-keranjang"'." data='+item.keranjang_id+'>'
                  +'<i class=".'"btn btn-default fa fa-trash-o"'." aria-hidden=".'"true"'."></i>'
                +'</a>'
                +'<div class=".'"btn-box"'.">'
                  +'<a href=".'"javascript:void(0)"'." id=".'"beli"'." data='+item.keranjang_id+'>Beli</a>'
                +'</div>'
              +'</div>'
            +'</div>');
          })
          array = array.join('');
          html  = array.toString();
          $('#list-keranjang').html(html);
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

  $(document).on('click', '#delete-keranjang', function() {
    var keranjang_id = $(this).attr('data');
    if (keranjang_id) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/delete-keranjang',
          dataType : 'JSON',
          data     : {
            keranjang_id : keranjang_id
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

  $(document).on('click', '#beli', function() {
    var keranjang_id = $(this).attr('data');
    location.href = ".'"'.Url::base(true).'/site/transaksi?nomor="+keranjang_id'.";
    // if (keranjang_id) {
    //   $.ajax({
    //       type     : 'POST',
    //       url      : '".Url::base(true)."/api/pre-pesan',
    //       dataType : 'JSON',
    //       data     : {
    //         keranjang_id : keranjang_id
    //       },
    //       success: function(data){
    //         // _getData();
    //         return true;
    //       },
    //       error: function(){
    //         alert('ERROR at PHP side!!');
    //         return false;
    //       }
    //   });
    // } else {
    //   return false;
    // }
  });
");
?>
<div class="container">
  <!-- <div class="container-keranjang" style="column-count: 2">
    <div class="row-keranjang">
      <label><input type="checkbox" value=""> Pilih Semua</label>
    </div>
  </div> -->
  <div id="list-keranjang">
  </div>
  <div class="empty-data heading_center" style="text-align: center">
    <h2>
      Keranjang <span>Kosong</span>
    </h2>
  </div>
</div>
