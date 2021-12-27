<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJs("
  $(document).ready(function(){
    _getData();
  });

  function _getData()
  {
    $.ajax({
        type     : 'POST',
        url      : '".Url::base(true)."/api/pembayaran',
        dataType : 'JSON',
        success: function(res){
          let html  = '';
          let array = [];
          res.data.map((item, index) => {
            let id       = item.pembayaran_id
            let gambar_f = '/e-commerce/uploads/backend/other/'+item.gambar;
            array.push('<div class=".'"form-check"'." style=".'"margin: 0px 0px 20px 0px"'.">'
              +'<input class=".'"form-check-input"'." style=".'"margin-top: 1.3rem"'." type=".'"radio"'." id=".'"dataPembayaran"'." value='+id+' name=".'"pembayaran"'."/>'
              +'<img width=".'"50"'." src="."'+gambar_f+'"." style=".'"margin: 0px 20px 0px 0px"'.">'
              +'<label class=".'"form-check-label"'." for=".'"flexCheckDefault"'.">'
                +item.pembayaran
              +'</label>'
            +'</div>');
          })
          array = array.join('');
          html  = array.toString();
          $('#list-pembayaran').html(html);
          return true;
        },
        error: function(e){
          alert('ERROR at PHP side!!');
          return false;
        }
    });
  }

  $(document).on('click', '.pembayaran', function() {
    var pembayaran   = $('input[name=pembayaran]:checked').val();
    var keranjang_id = ".$id."
    if (pembayaran) {
      $.ajax({
          type     : 'POST',
          url      : '".Url::base(true)."/api/select-pembayaran',
          dataType : 'JSON',
          data     : {
            pembayaran   : pembayaran,
            // keranjang_id : keranjang_id,
          },
          success: function(data){
            document.location.reload();
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

<div class="site-index">
  <div id="list-pembayaran"></div>
  <div class=""style="text-align: end; margin: 5px 0px 0px 0px">
    <button type="button" name="button" class="btn btn-info pembayaran" data-dismiss="modal" style="">Simpan</button>
  </div>
</div>
