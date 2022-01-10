<?php

// use Yii;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
$this->registerJs("
    var kode = '$kode';
    $(document).ready(function(){
        _getDataBuktiBayar(kode);
    });
");
$this->registerJsFile(
    '@web/js/page/pesanan/buktiBayar.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="site-index">
    <div id="list-bukti-bayar"></div>
    <div id="input-bukti-bayar">
        <?php $form = ActiveForm::begin([
            'id' => 'dynamic-form'
        ]); ?>
        <?= $form->field($model, 'kode_tagihan')->textInput(['id' => 'kode_tagihan']) ?>
        <?= $form->field($model, 'total_bayar')->textInput(['id' => 'total_bayar']) ?>
        <?= $form->field($model, 'bukti_bayar')->fileInput(['class' => 'btn btn-primary', 'accept' => 'image/*', 'capture' => 'camera', 'id' => 'bukti_bayar'])->label(false) ?>
        <?= Html::button('Kirim', ['class' => 'btn btn-sm btn-info', 'id' => 'kirim-bukti-bayar']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
