<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
$this->registerJs("
    var kode = '$kode';
    $(document).ready(function(){
        _getData(kode);
    });
");
$this->registerJsFile(
    '@web/js/page/pesanan/buktiBayar.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index" style="">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'kode_tagihan')->textInput(['id' => 'kode_tagihan', 'disabled' => true]) ?>
        <?= $form->field($model, 'total_bayar')->textInput(['id' => 'total_bayar', 'disabled' => true]) ?>
        <?= $form->field($model, 'bukti_bayar')->fileInput(['class' => 'btn btn-primary', 'accept' => 'image/*', 'capture' => 'camera', 'id' => 'bukti_bayar'])->label(false) ?>
        <?= Html::button('Kirim', ['class' => 'btn btn-sm btn-info', 'id' => 'kirim-bukti-bayar', 'data-dismiss' => 'modal']); ?>
    <?php ActiveForm::end(); ?>
</div>
