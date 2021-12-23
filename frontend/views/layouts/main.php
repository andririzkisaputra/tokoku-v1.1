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
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


        <div class="wrap">
            <?php
            // $cart = new ShoppingCart();
            // $view = $cart->getCount();

            NavBar::begin([
                'brandLabel' => 'HARBOLNAS',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'bg-menu mynavbar navbar-fixed-top'],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav mynavbar  navbar-right'],
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span> Beranda', 'url' => ['/osengmercon/default/index', 'slug' => 'oseng-mercon-bu-narti']],
                    ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang <span class="label label-success">$view"</span>"', 'url' => ['/osengmercon/default/cart']],
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

<main role="main" class="flex-shrink-0">
    <!-- <div class="container"> -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    <!-- </div> -->
</main>

<!-- footer start -->
<footer>
   <div class="container">
      <div class="row">
         <div class="col-md-4">
             <div class="full">
                <div class="logo_footer">
                  <a href="#"><img width="210" src="<?=  Url::base(true).'/images/logo.png' ?>" alt="#" /></a>
                </div>
                <div class="information_f">
                  <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                  <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                  <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                </div>
             </div>
         </div>
         <div class="col-md-8">
            <div class="row">
            <div class="col-md-7">
               <div class="row">
                  <div class="col-md-6">
               <div class="widget_menu">
                  <h3>Menu</h3>
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Services</a></li>
                     <li><a href="#">Testimonial</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">Contact</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6">
               <div class="widget_menu">
                  <h3>Account</h3>
                  <ul>
                     <li><a href="#">Account</a></li>
                     <li><a href="#">Checkout</a></li>
                     <li><a href="#">Login</a></li>
                     <li><a href="#">Register</a></li>
                     <li><a href="#">Shopping</a></li>
                     <li><a href="#">Widget</a></li>
                  </ul>
               </div>
            </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="widget_menu">
                  <h3>Newsletter</h3>
                  <div class="information_f">
                    <p>Subscribe by our newsletter and get update protidin.</p>
                  </div>
                  <div class="form_sub">
                     <form>
                        <fieldset>
                           <div class="field">
                              <input type="email" placeholder="Enter Your Mail" name="email" />
                              <input type="submit" value="Subscribe" />
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- footer end -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
