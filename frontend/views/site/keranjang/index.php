<?php

use yii\helpers\Url;

$this->title = 'Keranjang';
$this->registerJsFile(
  '@web/js/page/keranjang/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
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
      Keranjang
      <span>Kosong</span>
    </h2>
  </div>
  <br>
  <div class="empty-button btn-box" style="text-align: center">
    <a class="btn btn-info" href="javascript:void(0)" id="beli">Pesanan</a>
  </div>

</div>
