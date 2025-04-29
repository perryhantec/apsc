<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * RegistrationForm is the model behind the login form.
 */
class UserRegistrationForm extends User
{
    // const SCENARIO_WEB = "from_web";
    // const SCENARIO_APP = "from_app";

    // public $verifyCode;
    public $re_username;
    public $re_new_password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 're_username'], 'trim'],
            // [['mobile'], 'string', 'max' => 8],
            [['username', 're_username'], 'string', 'max' => 255],
            [['username', 're_username', 'new_password', 're_new_password'], 'required'],
            [['username', 're_username'], 'email'],
            [['username'], 'unique'],
            // ['mobile', 'unique', 'message' => Yii::t('app', 'This {attribute} has already been taken.')],
            // [['mobile'], 'checkMobile'],

            // [['username'], 'trim'],
            // [['phone'], 'string', 'max' => 16],
            // [['name'], 'string', 'max' => 255],
            // [['name', 'phone', 'username', 'new_password', 're_new_password'], 'required'],
            [['re_new_password'], 'string'],
            // [['username'], 'email'],
            // ['username', 'unique', 'message' => Yii::t('app', 'This {attribute} has already been taken.')],
            ['new_password', 'string', 'min' => 8, 'max' => 25],
            [['username'], 'checkUsername'],
            [['new_password'], 'checkNewPassword'],
            // [['new_password'], 'match', 'pattern' => '/^(?=.[a-zA-Z])(?=.[0-9]).*$/', 'message' => 'Password should be combination of alphanumeric character, number and symbol.'],
            // [['new_password'], 'match', 'pattern' => '/^(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', 'message' => '密碼必須包含一個 英文字母、數字、符號。'],
            // [['new_password'], 'match', 'pattern' => '/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/', 'message' => '密碼必須為大楷英文、小楷英文及數字的任意組合。'],
            // ['verifyCode', 'captcha', 'on' => self::SCENARIO_WEB],
//             ['acknowledge_tc', 'required', 'requiredValue' => 1, 'message' => Yii::t('app', 'Please indicate that you have read and agree to the Terms and Conditions')],
/*
            [['verifyCode'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LcV0SoUAAAAAGUn76265Lau1QS_MjhKkwVzbfx7']
*/
        ];
    }

    // public function checkMobile ($attribute) {
    //     if (
    //         (int)$this->mobile < 40000000 ||
    //         ((int)$this->mobile > 69999999 && (int)$this->mobile < 90000000) ||
    //         (int)$this->mobile > 99999999
    //     ) {
    //         $this->addError($attribute, '請輸入正確電話號碼');
    //         return false;
    //     }
    // }

    public function checkUsername($attribute, $params)
    {
        if ($this->username != $this->re_username) {
            $this->addError($attribute, 'These two usernames are not the same.');
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
            // 'chi_name' => '姓名(中文)',
            // 'eng_name' => '姓名(英文)',
            // 'mobile' => '流動電話號碼',
            // 'username' => '電郵地址',

        //   'name' => Yii::t('app', 'Name'),
        //   'phone' => Yii::t('app', 'Phone'),
        //   'email' => Yii::t('app', 'Email'),
        //   'username' => Yii::t('app', 'Email'),
          'username' => 'Email Address',
          're_username' => 'Reenter Email Address',
          'new_password' => Yii::t('app', 'Password'),
          're_new_password' => 'Confirm Password',
        //   'verifyCode' => Yii::t('app', 'Verification Code'),
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
            // $this->role = self::ROLE_MEMBER;
            // $this->oAuth_user = 0;
            // $this->email = $this->username;
            // $this->user_appl_status = self::UNALLOCATED_UNIT;

            // if ($this->save(false)) {
                // $no_of_zero = self::APP_NO_LENGTH - strlen($this->id);
                // $this->app_no = str_pad(self::APP_NO_PREFIX, $no_of_zero, '0').$this->id;

                $this->save(false);

                return Yii::$app->user->login($this, 0);
            // }
        }
        return false;
    }

}
