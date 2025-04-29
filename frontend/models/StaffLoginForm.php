<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\base\UserException;
use yii\helpers\Html;
use common\models\Staff;

/**
 * LoginForm is the model behind the login form.
 */
class StaffLoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = false;
    public $verifyCode;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            // [['username'], 'email'],
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['verifyCode', 'captcha'],
//             [['verifyCode'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfEFw8UAAAAAGPn6b7Yck8_igt99FOFq4WR7XJJ']


        ];
    }

    public function attributeLabels()
    {
        return [
          'username' => Yii::t('app', 'Username'),
          'password' => Yii::t('app', 'Password'),
          'rememberMe' => Yii::t('app', 'Remember Me'),
          'verifyCode' => Yii::t('app', 'Verification Code'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
//             if (!$user || !$user->validatePassword($this->password) || $user->role!=User::ROLE_MEMBER) {
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect email or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if (($user=$this->getUser()) != null) {
                // if ($user->status == User::STATUS_WAITVERIFY)
                //     throw new UserException(Yii::t('app', 'You must verify your email before logging in.').'&nbsp'.Html::a(Yii::t('app', 'Resend Verification Email'), ['/site/resend-verification-email']));

                if ($user->status == Staff::STATUS_ACTIVE && Yii::$app->staff->login($user, $this->rememberMe ? 3600*24*7 : 0)) {
                    // $this->user->last_login_at=date('Y-m-d H:i:s');
                    $this->user->save();

                    return true;
                }
            }

            return false;

        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Staff::findByUsername($this->username);
        }

        return $this->_user;
    }
}
