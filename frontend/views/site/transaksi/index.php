<?php

use yii\helpers\Url;
use yii\bootstrap4\Modal;

$this->title = 'Transaksi';
$this->registerJsFile(
  '@web/js/page/transaksi/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="container">
  <!-- produk -->
  <div id="list-transaksi"></div>
  <!-- end produk -->
  <!-- pembayaran -->
  <div class="container-keranjang" style="column-count: 2" id="metode-pembayaran"></div>
  <!-- end pembayaran -->
  <!-- Voucher -->
  <!-- <div class="container-keranjang" style="column-count: 2">
    <div class="row-keranjang">
      <p>Voucher</p>
    </div>
    <div class="list-keranjang" style="text-align: end; padding: 0px 15px 0px 0px">
      <a href="javascript:void(0)">Pilih</a>
    </div>
  </div> -->
  <!-- end Voucher -->

  <!-- total -->   
  <form method="POST" action="sci-secure">
    <div class="container-keranjang" id="list-total"></div>
    <input id="pembayaran_id" type="hidden" name="pembayaran_id" />
    <input id="fp_acc" type="hidden" name="fp_acc" />
    <input id="fp_item" type="hidden" name="fp_item" />
    <input id="fp_comments" type="hidden" name="fp_comments" />
    <input id="fp_merchant_ref" type="hidden" name="fp_merchant_ref" />
    <input id="fp_currency" type="hidden" name="fp_currency" />
    <input id="fp_success_url" type="hidden" name="fp_success_url" />
    <input id="fp_success_method" type="hidden" name="fp_success_method" />
    <input id="fp_fail_url" type="hidden" name="fp_fail_url" />
    <input id="fp_fail_method" type="hidden" name="fp_fail_method" />
    <input id="fp_status_url" type="hidden" name="fp_status_url" />
    <input id="fp_status_method" type="hidden" name="fp_status_method" />
    <input id="fp_amnt" type="hidden" name="fp_amnt" />
    <input id="track_id" type="hidden" name="track_id" />
    <input id="order_id" type="hidden" name="order_id" />
    <div style="text-align: center; margin: 15px 0px 0px 0px">
      <button id="pesanan" class="btn btn-info" type="submit">Pesan</button>
    </div>
  </form>
  <!-- end total -->
</div>


<?php
  Modal::begin([
    'id'=>'modal',
    'size'=>'modal-md',
  ]);

  echo "<div id='modalContent'></div>";

  Modal::end();
?>
