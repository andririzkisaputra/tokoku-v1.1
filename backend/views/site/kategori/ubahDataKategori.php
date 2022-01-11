<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJsFile(
  '@web/js/page/kategori/ubahDataKategori.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index">
  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <?= $form->field($model, 'kategori_id')->textInput(['readonly' => true, 'id' => 'kategori_id', 'value' => $kategori['kategori_id']]) ?>
      <?= $form->field($model, 'nama_kategori')->textInput(['id' => 'nama_kategori', 'value' => $kategori['nama_kategori']]) ?>
      <?= Html::button('Ubah', ['class' => 'btn btn-sm btn-success', 'id' => 'ubah-kategori']); ?>
  <?php ActiveForm::end(); ?>
</div>
