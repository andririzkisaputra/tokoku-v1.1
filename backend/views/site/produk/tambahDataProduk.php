<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJsFile(
  '@web/js/page/produk/tambahDataProduk.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index">
  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <?= $form->field($modelProduk, 'nama_produk')->textInput(['autofocus' => true, 'id' => 'nama_produk']) ?>
      <?= $form->field($modelKategori, 'nama_kategori')->dropDownList(
            $kategori, ['id' => 'nama_kategori']
      ) ?>
      <?= $form->field($modelProduk, 'qty')->textInput(['id' => 'qty']) ?>
      <?= $form->field($modelProduk, 'gambar')->fileInput(['class' => 'btn btn-primary', 'accept' => 'image/*', 'capture' => 'camera', 'id' => 'gambar'])->label(false) ?>
      <?= Html::button('Simpan', ['class' => 'btn btn-sm btn-success', 'id' => 'simpan-produk', 'data-dismiss' => 'modal']); ?>
  <?php ActiveForm::end(); ?>
</div>
