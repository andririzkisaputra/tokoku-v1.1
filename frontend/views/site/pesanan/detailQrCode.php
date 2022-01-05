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
                let html     = '';
                let gambar_f = '';
                let array    = [];
                console.log(res.data);
                res.data.map((item, index) => {
                    gambar_f = '/e-commerce/uploads/frontend/qr_code/'+item.qr_code;
                    array.push(
                        '<b>QR Code</b>'
                        +'<div style=".'"margin: 10px"'.">'
                            +'<img src='+gambar_f+'>'
                        +'</div>'
                        +'<b>Kode Transaksi</b><p>'+item.kode_transaksi+'</p>'
                        +'<b>Produk</b><p>Rp '+item.harga_produk+'</p>'
                        +'<b>Ongkir</b><p>Rp '+item.ongkir+'</p>'
                    );
                });
                array = array.join('');
                html  = array.toString();
                $('#list-qr-code').html(html);
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

<div class="site-index" style="text-align: center">
  <div id="list-qr-code"></div>
  <!-- <div class=""style="text-align: end; margin: 5px 0px 0px 0px">
    <button type="button" name="button" class="btn btn-info pembayaran" data-dismiss="modal" style="">Simpan</button>
  </div> -->
</div>
