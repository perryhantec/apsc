<?php

namespace backend\assets;

use yii\web\AssetBundle;

class FastclickAsset extends AssetBundle
{

  public $sourcePath = '@bower/fastclick/';
  public $webPath = '@web';
  public $css = [
  ];
  public $js = [
    'lib/fastclick.js',
  ];
  public $depends = [
  ];

}
