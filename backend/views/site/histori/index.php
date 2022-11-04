<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Admin';

$this->registerJsFile(
  '@web/js/page/histori/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="site-index">
  <div class="">
    <h3>Histori</h3>
  </div>
  <?php 
      foreach ($saldo['accountInfo'] as $key => $value) {
  ?>
      <label for=""><?php echo $value['balanceType'] ?> : </label>
      <label for=""><?php echo $value['amount']['value'] ?></label>
      <label for=""><?php echo $value['amount']['currency'] ?></label>
      <br>
  <?php
    }
  ?>
  <div class="">
    <table id="tabel_histori" class="table table-bordered table-striped" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>batchnumber</th>
                <th>balance</th>
                <th>remark</th>
                <th>status</th>
                <th>dateTime</th>
                <th>type</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>batchnumber</th>
                <th>balance</th>
                <th>remark</th>
                <th>status</th>
                <th>dateTime</th>
                <th>type</th>
                <th>aksi</th>
            </tr>
        </tfoot>
    </table>
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
