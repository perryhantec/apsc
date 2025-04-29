<?php

namespace backend\assets;

use yii\web\AssetBundle;

class SlimscrollAsset extends AssetBundle
{

  public $sourcePath = '@bower/slimscroll/';
  public $webPath = '@web';
  public $css = [
  ];
  public $js = [
    'jquery.slimscroll.min.js',
  ];
  public $depends = [
  ];

}
