<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJsFile(
  '@web/js/page/transaksi/pembayaran.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index">
  <div id="list-pembayaran"></div>
  <div class=""style="text-align: end; margin: 5px 0px 0px 0px">
    <button type="button" name="button" class="btn btn-info pembayaran" data-dismiss="modal" style="">Simpan</button>
  </div>
</div>
