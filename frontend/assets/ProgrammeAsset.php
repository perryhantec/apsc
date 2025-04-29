<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ProgrammeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery.fancybox.css',

//         'fonts/font-awesome.min.css',
//         // 'fonts/simple-line-icons.css',
//   //       'css/all-11db917a1ad4c44f3e82b69f4a4306c1.css',
//   //       'css/all-ff0a690407d57c042b37e2e5995f68cd.css',
//         'css/site.css?v=1.11',
//         'css/style.css?v=1.4',
//         // 'css/ecommerce.css?v=1.0',
//         // 'css/template-services.css?v=1.6',
//         'css/custom.css?v=1.1',
//         'css/icofont.min.css',
//         'css/jquery.specialinput.css',
//         'css/swiper-bundle.min.css',
//         'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i',
        'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i',
    ];
    public $js = [
        'js/freeze-table.js',
        'js/jquery.fancybox.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',

        // 'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        // 'common\assets\OwlCarouselAsset'
    ];
}
