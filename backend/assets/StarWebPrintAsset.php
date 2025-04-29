<?php

namespace backend\assets;

use yii\web\AssetBundle;

class StarWebPrintAsset  extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'dist/bundle.js',
        'js/StarWebPrintBuilder.js',
        'js/StarWebPrintTrader.js'
    ];
    public $css = [
        'dist/index.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
