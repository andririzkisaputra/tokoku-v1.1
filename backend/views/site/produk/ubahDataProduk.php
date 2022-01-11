<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJsFile(
  '@web/js/page/produk/ubahDataProduk.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index">
  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <?= $form->field($modelProduk, 'produk_id')->textInput(['id' => 'produk_id', 'value' => $produk['produk_id'], 'readonly' => true]) ?>
      <?= $form->field($modelProduk, 'nama_produk')->textInput(['id' => 'nama_produk', 'value' => $produk['nama_produk']]) ?>
      <?= $form->field($modelKategori, 'nama_kategori')->dropDownList(
            $kategori, ['id' => 'nama_kategori', 'value' => $produk['kategori_id']],
      ) ?>
      <?= $form->field($modelProduk, 'qty')->textInput(['id' => 'qty', 'value' => $produk['qty']]) ?>
      <?= $form->field($modelProduk, 'gambar')->fileInput(['class' => 'btn btn-primary', 'accept' => 'image/*', 'capture' => 'camera', 'id' => 'gambar', 'value' => $produk['gambar']])->label(false) ?>
      <?= Html::button('Ubah', ['class' => 'btn btn-sm btn-success', 'id' => 'ubah-produk']); ?>
  <?php ActiveForm::end(); ?>
</div>
