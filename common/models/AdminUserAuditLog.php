<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin_user_auditLog".
 *
 * @property int $id
 * @property int $admin_user_id
 * @property string $msg
 * @property string|null $ip
 * @property string $created_at
 *
 * @property AdminUser $user
 */
class AdminUserAuditLog extends \yii\db\ActiveRecord
{
    const TYPE_LOGIN = 1;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_user_auditlog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_user_id', 'type', 'msg'], 'required'],
            [['admin_user_id', 'type'], 'integer'],
            [['created_at'], 'safe'],
            [['msg'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 15],
            [['admin_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminUser::className(), 'targetAttribute' => ['admin_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'admin_user_id' => Yii::t('app', 'User ID'),
            'type' => Yii::t('app', 'Type'),
            'msg' => Yii::t('app', 'Message'),
            'ip' => Yii::t('app', 'IP'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AdminUser::className(), ['id' => 'admin_user_id']);
    }
}