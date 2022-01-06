<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/bootstrap-glyphicons.css'
    ];
    public $js = [
      'js/modal.js',
    //   'js/page/home/index.js',
    //   'js/page/keranjang/index.js',
      // 'js/popper.min.js',
      // 'js/bootstrap.js',
      // 'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
