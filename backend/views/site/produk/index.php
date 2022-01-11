<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Admin';
$this->registerJsFile(
  '@web/js/page/produk/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="site-index">
  <div class="">
    <h3>Produk</h3>
  </div>
  <div class="tambah-data btn-group">
    <?= Html::button('Tambah Data', ['value' => Url::to(['tambah-data-produk']), 'class' => 'btn btn-sm btn-info showModalButton']); ?>
  </div>
  <div class="">
    <table id="tabel_produk" class="table table-bordered table-striped" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
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
