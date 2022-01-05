<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJs("
    $(document).ready(function(){
        var kode_transaksi = '$kode_transaksi'
        _getData(kode_transaksi);
    });

    function _getData(kode_transaksi)
    {
        $.ajax({
            type     : 'POST',
            url      : '".Url::base(true)."/api/qr-code',
            dataType : 'JSON',
            data     : {
                'kode_transaksi' : kode_transaksi
            },
            success: function(res){
                console.log(res);
                // array = array.join('');
                // html  = array.toString();
                // $('#list-qr-code').html(html);
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

<div class="site-index">
    <p><?= $kode_transaksi ?></p>
  <!-- <div id="list-qr-code"></div> -->
  <!-- <div class=""style="text-align: end; margin: 5px 0px 0px 0px">
    <button type="button" name="button" class="btn btn-info pembayaran" data-dismiss="modal" style="">Simpan</button>
  </div> -->
</div>
