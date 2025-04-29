<?php

namespace backend\assets;

use yii\web\AssetBundle;

class MorrisjsAsset extends AssetBundle
{

  public $sourcePath = '@bower/morris.js/';
  public $webPath = '@web';
  public $css = [
  ];
  public $js = [
    'morris.min.js',
  ];
  public $depends = [
  ];

}
