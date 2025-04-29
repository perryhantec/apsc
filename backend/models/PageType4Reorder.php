<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Menu;
use common\models\PageType4;

class PageType4Reorder extends Model
{
    public $MID;
    public $array = [];
    public $seq;
    public $menu;

    public function __construct($config = [])
    {
      $this->MID = $config['MID'];
      $models = PageType4::find()->where(['MID' => $this->MID])
                                  ->orderBy('seq')
                                  ->all();
      foreach($models as $model){
        $array_one = [];
        $array_one['id'] = $model->id;
        $array_one['content'] = $model->title;
        $this->array[] = $array_one;
      }
      $this->menu = Menu::findOne(['id' => $this->MID]);

      parent::__construct($config);
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
          ['seq', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'array' => Yii::t('app', 'Array'),
        ];
    }


    public function saveContent(){
      if ($this->validate()) {
        $lists = explode("-", $this->seq);
        $seq = 0;
        foreach($lists as $list){
          $id = $this->array[$list]['id'];
          $model = PageType4::findOne($id);
          $model->seq = $seq;
          $model->save();
          $seq++;
        }

        return true;
      }
      return false;
    }


}
