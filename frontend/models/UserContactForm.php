<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * RegistrationForm is the model behind the login form.
 */
class UserContactForm extends User
{
    // const SCENARIO_WEB = "from_web";
    // const SCENARIO_APP = "from_app";

    // public $verifyCode;
    public $re_email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title', 'first_name', 'last_name', 'department', 'institution', 'email', 'other_email', 'mobile', 'work_mobile', 'country', 're_email'], 'string', 'max' => 255],
            [['other_email'], 'string'],
            [['email', 're_email'], 'email'],
            [['email'], 'checkEmail'],

            [['title', 'first_name', 'last_name', 'institution', 'email', 're_email', 'mobile', 'country'], 'required'],
        ];
    }
    public function checkEmail($attribute, $params)
    {
        if ($this->email != $this->re_email) {
            $this->addError($attribute, 'These two emails are not the same.');
        }
    }

    public function attributeLabels()
    {
        return [
            're_email' => 'Verify Email Address',
        ];
    }

    public function attributeHints()
    {
        return [
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
