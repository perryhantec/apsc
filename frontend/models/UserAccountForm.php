<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * RegistrationForm is the model behind the login form.
 */
class UserAccountForm extends User
{
    // const SCENARIO_WEB = "from_web";
    // const SCENARIO_APP = "from_app";

    // public $verifyCode;
    // public $re_username;
    public $old_password;
    public $re_new_password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // [['username', 're_username'], 'trim'],
            // [['username', 're_username'], 'string', 'max' => 255],
            // [['username', 're_username', 'new_password', 're_new_password'], 'required'],
            // [['username', 're_username'], 'email'],
            [['username'], 'trim'],
            [['username'], 'string', 'max' => 255],
            [['username', 'new_password', 're_new_password'], 'required'],
            [['username'], 'email'],

            [['username'], 'unique'],
            [['old_password'], 'required'],
            [['old_password'], 'checkOldPassword'],
            [['re_new_password'], 'string'],
            ['new_password', 'string', 'min' => 8, 'max' => 25],
            [['new_password'], 'checkNewPassword'],
        ];
    }

    public function checkOldPassword($attribute, $params)
    {
        if($this->old_password != "" && !self::validatePassword($this->old_password)) {
            $this->addError($attribute, Yii::t('app','Old password is not correct.'));
        }
    }

    public function checkNewPassword($attribute, $params)
    {
        if ($this->new_password != $this->re_new_password) {
            $this->addError($attribute, Yii::t('app','These two passwords are not the same.'));
        }
    }

    public function attributeLabels()
    {
        return [
          'username' => 'Account Email Address',
          'old_password' => 'Current Password',
          'new_password' => 'New Password',
          're_new_password' => 'Confirm New Password',
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
            if ($this->new_password == "" || ($this->new_password != "" && self::validatePassword($this->old_password))) {
                return $this->save(false);
            }

            return true;
        }
        return false;
    }

}
