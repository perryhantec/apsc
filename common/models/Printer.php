<?php

namespace common\models;

use Yii;
// use yii\helpers\Json;
// use Imagine\Image\Box;
// use Imagine\Image\Point;
// use yii\imagine\Image;

/**
 * This is the model class for table "general".
 */
class Printer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'printer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 20],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'location' => 'Location',
            'ip' => 'IP',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function saveContent()
    {
        if ($this->validate()) {
            $this->save();

            return true;
        } else {
            return false;
        }
    }
}
