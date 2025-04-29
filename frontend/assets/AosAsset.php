<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AosAsset extends AssetBundle {
    public $basePath = '@webroot/plugin/aos';
    public $baseUrl = '@web/plugin/aos';
    public $css = [
      'aos.css',
    ];
    public $js = [
      'aos.js',
    ];
}
