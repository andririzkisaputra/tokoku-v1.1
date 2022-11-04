<?php

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
?>

<div class="site-index">
  <div class="">
    <table class="detail-tabel">
      <tbody>
        <tr>
          <td>batchnumber</td>
          <td>:</td>
          <td><?= $produk['batchnumber'] ?></td>
        </tr>
        <tr>
          <td>balance</td>
          <td>:</td>
          <td><?= $produk['sourceOfFunds'][0]['amount']['value'].' '. $produk['balance']['currency'] ?></td>
        </tr>
        <tr>
          <td>sender</td>
          <td>:</td>
          <td><?= $produk['sender']['nama_lengkap'] ?></td>
        </tr>
        <tr>
          <td>recipient</td>
          <td>:</td>
          <td><?= $produk['recipient']['nama_lengkap'] ?></td>
        </tr>
        <tr>
          <td>status</td>
          <td>:</td>
          <td><?= $produk['status'] ?></td>
        </tr>
        <tr>
          <td>type</td>
          <td>:</td>
          <td><?= $produk['type'] ?></td>
        </tr>
        <tr>
          <td>dateTime</td>
          <td>:</td>
          <td><?= $produk['dateTime'] ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
