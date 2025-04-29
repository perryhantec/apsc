<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string|null $ab_close
 * @property string|null $reg_early_close
 * @property string|null $reg_regular_close
 * @property string|null $created_at
 * @property string $updated_at
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['ab_close', 'reg_early_close', 'reg_regular_close'], 'required'],

            ['reg_regular_close', 'checkRegTime'],
        ];
    }

    public function checkRegTime($attribute, $params)
    {
        if($this->reg_regular_close <= $this->reg_early_close){
            $this->addError($attribute, "Registration Regular Deadline 必須遲於 Registration Early Deadline");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ab_close' => 'Call For Abstract - Submission Deadline',
            'reg_early_close' => 'Registration - Early Bird Deadline',
            'reg_regular_close' => 'Registration - Regular Deadline',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function submit()
    {
        if ($this->validate()) {
            $this->save(false);
            
            return true;
        }
        return false;
    }
}
