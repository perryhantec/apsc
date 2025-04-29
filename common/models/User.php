<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends \common\components\BaseActiveRecord implements IdentityInterface
{
    public $new_password;
    const COUNTRY_HK = 'HK';

    const SCENARIO_CREATE = 'create';

    const STATUS_DELETED = 0;
    // const STATUS_WAITVERIFY = -1;
    const STATUS_ACTIVE = 1;

    const ROLE_SUPERADMIN = 10;
    const ROLE_ADMIN = 15;
    const ROLE_MANAGER = 20;
    const ROLE_PRODUCT_MANAGER = 25;
    const ROLE_MEMBER = 30;

    const ROLES = [
            self::ROLE_ADMIN => [
                'banner',
                'menu',
                'registration',
                'call-for-abstract',
                'admin.general',
                'admin.menu',
                'admin.user',
                'fileBrowser'
            ],
    ];

//     public $roles = [self::ROLE_ADMIN => 'admin',  self::ROLE_USER=>'user', self::ROLE_MEMBER => 'member'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['title', 'first_name', 'last_name', 'department', 'institution', 'email', 'other_email', 'mobile', 'work_mobile', 'country', 'username'], 'string', 'max' => 255],
            [['username'], 'email'],
            [['username'], 'unique'],
            ['password_hash', 'string', 'max' => 160],
            ['password_reset_token', 'string', 'max' => 43],
            [['new_password'], 'required', 'on' => self::SCENARIO_CREATE],
            [['password_hash', 'auth_key'], 'string'],
            [['status', 'updated_UID'], 'integer'],
            [['new_password', 'created_at', 'updated_at'], 'safe'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'department' => 'Department',
            'institution' => 'Institution / Hospital',
            'email' => 'Email Address',
            'other_email' => 'Other Email Address (if any)',
            'mobile' => 'Mobile Number',
            'work_mobile' => 'Work Number',
            'country' => 'Country',
            'username' => Yii::t('app', 'Username'),
            'new_password' => Yii::t('app', 'Password'),
            'password_hash' => Yii::t('app', 'Password'),
            'auth_key' => Yii::t('app', 'Authentication Key'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated Dt'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->auth_key==NULL) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            if($this->new_password!=NULL){
              self::setPassword($this->new_password);
            }
            return true;
        } else {
            return false;
        }
    }

    public function submit()
    {
        if ($this->validate()) {
            $this->save(false);

            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_WAITVERIFY
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString(32) . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString(32) . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getRoles()
    {
      return (isset(self::ROLES[$this->role])) ? self::ROLES[$this->role] : [];
    }

    public function checkRole($role)
    {
      if ($this->role == self::ROLE_SUPERADMIN)
        return true;

      if (is_array($role)) {
          foreach ($role as $r) {
              if (in_array($r, $this->roles))
                return true;
          }
          return false;
      } else
          return in_array($role, $this->roles);
    }

    public function getName()
    {
        $name = $this->username;

        if ($this->title && $this->first_name && $this->last_name) {
            $name = $this->title.' '.$this->first_name.' '.$this->last_name;
        }

        return $name;
    }

    public function getCallForAbstract()
    {
        return $this->hasOne(CallForAbstract::className(), ['user_id' => 'id'])->where([
            'abstract_status' => CallForAbstract::ABSTRACT_STATUS_SUBMITTED,
            'result' => CallForAbstract::RESULT_ACCEPT
        ]);
    }
}
