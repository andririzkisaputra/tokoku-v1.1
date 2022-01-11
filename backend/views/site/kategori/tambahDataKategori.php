<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

$this->registerJsFile(
  '@web/js/page/kategori/tambahDataKategori.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index">
  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <?= $form->field($model, 'nama_kategori')->textInput(['autofocus' => true, 'id' => 'nama_kategori']) ?>
      <?= Html::button('Simpan', ['class' => 'btn btn-sm btn-success', 'id' => 'simpan-kategori']); ?>
  <?php ActiveForm::end(); ?>
</div>
