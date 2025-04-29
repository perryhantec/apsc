<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Config;
use yii\helpers\Html;
use common\models\Banner;

class BannerReorder extends Model
{
    public $array = [];
    public $seq;

    public function __construct($config = [])
    {
      $models = Banner::find()->orderBy('seq')->all();

      foreach($models as $model){
        $array_one = [];
        $array_one['id'] = $model->id;
        $array_one['content'] = Html::img($model->image_file_name, ['style'=>'width:100%;']);
        $this->array[] = $array_one;
      }

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
          $model = Banner::findOne($id);
          $model->seq = $seq;
          $model->save();
          $seq++;
        }

        return true;
      }
      return false;
    }


}
