<?php

namespace common\components;

use Yii;

class BaseActiveRecord extends \yii\db\ActiveRecord
{

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->updated_at=date('Y-m-d H:i:s');
            $this->updated_UID=isset(Yii::$app->user->id) ? Yii::$app->user->id : null;

            return true;
        } else {
            return false;
        }
    }

}
