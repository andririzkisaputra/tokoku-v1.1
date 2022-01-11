<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJs("
    $(document).ready(function(){
        _getDataDetailPesanan(".$id.");
    });
");
$this->registerJsFile(
  '@web/js/page/pesanan/detailPesanan.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="site-index">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" id='indicators'></ol>
        <div class="carousel-inner" id='img-pesanan'></div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div style="margin-top: 10px">
        <b>Nomor Transaksi</b><p>TR54321</p>
        <b>Nomor Pesanan</b><p>TR54321</p>
        <b>Produk</b><p>Bakso Granat, Bakso Komet</p>
        <b>Harga Produk</b><p>Rp 10.000</p>
        <b>Harga Ongkir</b><p>Rp 10.000</p>
        <b>Total</b><p>Rp 10.000</p>
    </div>
</div>