<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
    // public $css = [
    //     'css/site.css',
    // ];
    public $sourcePath = '@bower/admin-lte/';
    public $webPath = '@web';
    public $css = [
      'dist/css/AdminLTE.min.css',
      'dist/css/skins/_all-skins.min.css',
  //     'bootstrap/css/bootstrap.min.css',
  //    'plugins/iCheck/flat/blue.css',
  //     'plugins/morris/morris.css',
      'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
  //     'plugins/datepicker/datepicker3.css',
  //     'plugins/daterangepicker/daterangepicker-bs3.css',
      'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
      'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
      'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
  
    ];
    public $js = [
        'dist/js/adminlte.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap\BootstrapAsset',
        'backend\assets\MorrisjsAsset',
        'backend\assets\FastclickAsset',
        'backend\assets\SlimscrollAsset',  
    ];
}
