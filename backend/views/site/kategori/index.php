<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Admin';
$this->registerJsFile(
  '@web/js/page/kategori/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="site-index">
  <div class="">
    <h3>Kategori</h3>
  </div>
  <div class="tambah-data btn-group">
    <?= Html::button('Tambah Data', ['value' => Url::to(['tambah-data-kategori']), 'class' => 'btn btn-sm btn-info showModalButton']); ?>
  </div>
  <div class="">
    <table id="tabel_kategori" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Time</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Time</th>
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
