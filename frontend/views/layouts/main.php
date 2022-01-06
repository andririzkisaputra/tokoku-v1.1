<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;
use yz\shoppingcart\ShoppingCart;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <style>
            .bg-menu{
                background:#034f84;
            }
            .navbar-brand {
                color:white;
                display: inline-block;
                padding-top: 0.3125rem;
                padding-bottom: 0.3125rem;
                margin-right: 1rem;
                font-size: 1.25rem;
                line-height: inherit;
                white-space: nowrap;
                font-weight: 500;
                font-family: monospace;
            }
            .navbar-brand:hover{
                color:white;
            }
            .nav-link {
                font-weight: 500;
                font-family: monospace;
                font-size: 13px;
            }
            .nav-link:hover {
                color: #023f6a;
                background-color: #eeeeee !important;
            }
        </style>

        <div class="wrap">
            <?php
            $cart = new ShoppingCart();
            // $view = 0;
            $view = $cart->getCount();

            NavBar::begin([
                'brandLabel' => 'TokoKu',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-expand-md bg-menu mynavbar navbar-fixed-top navbar', 'id' => 'navbar-brand'],
            ]);
            if (Yii::$app->user->isGuest) {
              echo Nav::widget([
                  'options' => ['class' => 'navbar-nav mynavbar  navbar-right'],
                  'items' => [
                      ['label' => '<span class="glyphicon glyphicon-log-in"></span> Login', 'url' => ['/site/login']],
                  ],
                  'encodeLabels' => false,
              ]);
            } else {
              echo Nav::widget([
                  'options' => ['class' => 'navbar-nav mynavbar  navbar-right'],
                  'items' => [
                      ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Beranda', 'url' => ['/site/index']],
                      ['label' => '<span class="glyphicon glyphicon-envelope"></span> Pesanan', 'url' => ['/site/pesanan']],
                      ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang', 'url' => ['/site/keranjang']],

                      ['label' => '<span class="glyphicon glyphicon-log-out"></span> Logout ('.Yii::$app->user->identity->username.')', 'url' => ['/site/logout']],
                      // ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang <span class="label label-success">'.$view."</span>", 'url' => ['/site/keranjang']],
                  ],
                  'encodeLabels' => false,
              ]);
            }

            NavBar::end();

            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])

                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer" style="background:#034f84;">
            <div class="container">
                <p class="pull-left" style="color:white">&copy; TokoKu <?= date('Y') ?></p>
                <!-- <p class="pull-right" style="color:white">Powered by FasaPay Indonesia</p> -->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();
