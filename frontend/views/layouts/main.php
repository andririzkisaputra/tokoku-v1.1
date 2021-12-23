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
// use yz\shoppingcart\ShoppingCart;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <style>
            .bg-menu{
                background:#034f84;
                color:white !important;
            }
            .navbar-header > a{
                color:white;
            }
        </style>

        <div class="wrap">
            <?php
            // $cart = new ShoppingCart();
            $view = 0;
            // $view = $cart->getCount();

            NavBar::begin([
                'brandLabel' => 'TokoKu',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-expand-md bg-menu mynavbar navbar-fixed-top'],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav mynavbar  navbar-right'],
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span> Beranda', 'url' => ['/site/index']],
                     // ['label' => '<span class="glyphicon glyphicon-search"></span> Produk',
                     //     'items' => [
                     //         ['label' => 'Face Products', 'url' => ['/site/face']],
                     //         ['label' => 'Hair Products', 'url' => ['/site/hair']],
                     //         ['label' => 'Body Products', 'url' => ['/site/body']],
                     //     ]
                     // ],
                    ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang <span class="label label-success">'.$view."</span>", 'url' => ['/site/keranjang']],
                ],
                'encodeLabels' => false,
            ]);

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

                <p class="pull-right" style="color:white">Powered by FasaPay Indonesia</p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();
