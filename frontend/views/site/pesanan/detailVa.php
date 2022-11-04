<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
$this->registerJs("
    var kode = '$kode_transaksi';
    $(document).ready(function(){
        _getData(kode);
    });
");
$this->registerJsFile(
    '@web/js/page/pesanan/detailVa.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index" style="text-align: center">
  <div id="list-va"></div>
</div>
