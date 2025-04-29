<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Registration;

/**
 * AdminGroup model
 *
 */
class BadgeForm extends Registration
{
    // public $ingredients;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['registration_no'], 'string'],
            [['registration_no'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'registration_no' => 'Registration No.',
        ]);
    }

    public function checkRegistration()
    {
        if ($this->validate()) {
            // Definitions::dd($this->ingredients,1);
            $model = Registration::findOne(['registration_no' => $this->registration_no]);

            if ($model) {
                return $model->id;
            } else {
                $this->addError('registration_no', 'Registration No. is not found.');
            }
        }
        // Definitions::dd($this->ingredients,1);

        return false;
    }

    public function saveContent()
    {
        if ($this->validate()) {
            $this->save();

            return true;
        }
        // Definitions::dd($this->ingredients,1);

        return false;
    }

}
