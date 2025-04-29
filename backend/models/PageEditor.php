<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\PageType;
use yii\helpers\Html;
use common\models\Menu;


class PageEditor
{
// Backend Menu
  public static function generate_menus(){
    $models = Menu::find()
                ->where(['type'=>1])
                ->orderBy('seq')
                ->all();
    return $models;
  }

  public static function generate_menus_lv2($MID){
    $models = Menu::find()
                ->where(['type'=>2, 'MID'=>$MID])
                ->andWhere(['!=', 'page_type', '0'])
                ->orderBy('seq')
                ->all();
    return $models;
  }



}
