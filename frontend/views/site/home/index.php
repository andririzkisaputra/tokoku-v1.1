<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use yii\bootstrap4\Modal;

$this->title = 'TokoKu';
$this->registerJsFile(
  '@web/js/page/home/index.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>
<div class="osengmercon-default-index">
  <style>
    .parallax {
        /* The image used */
        background-image: url(<?php echo Url::to('@web/images/banner_oseng_mercon_01.jpg'); ?>);

        /* Full height */
        height: 10%;
        padding: 30px;
        width:100%;
        margin-top:50px;
        /* Create the parallax scrolling effect */
        /*background-attachment: fixed;*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .parallax::before{background:#000;}
    div.first {
        background: rgba(0, 0, 0, 0.2);
        padding:5px;
        color:#0a3d62;
    }
  </style>

  <div class="container">
    <div class="parallax">
      <div class="row">
          <div class="col-sm-12">
              <div align="right" class="first">
                  <h3 style="color: white">TokoKu 12.12</h3>
                  <h4 style="color: white">Discount 30% all item*</h4>
              </div>
              <br /><br /><br /><br /><br /><br /><br /><br /><br />
          </div>
      </div>
    </div>
  </div>

  <hr />
  <br />
  <section class="product_section layout_padding">
      <div class="container">
        <h4 class="title">PRODUK</h4>
        <div class="row" id="rekomendasi-produk" style="border-width: 1px; border-style: solid; border-color: #ddd; padding: 0px 25px 10px 25px"></div>
      </div>
  </section>
</div>
