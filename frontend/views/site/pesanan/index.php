<?php

use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Pesanan';
$this->registerJsFile(
  '@web/js/page/pesanan/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="container">
  <div id="list-pesanan"></div>
  <div class="empty-data heading_center" style="text-align: center">
    <h2>
      Tidak Ada Pesanan
    </h2>
  </div>
</div>
<?php
  Modal::begin([
    'id'=>'modal',
    'size'=>'modal-md',
  ]);

  echo "<div id='modalContent'></div>";
  Modal::end();
?>