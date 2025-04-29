<?php

namespace common\components;

use Yii;
use common\models\Staff;

class StaffAccessRule extends \yii\filters\AccessRule
{

    /** @inheritdoc */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        if (self::checkRole($this->roles)) {
          return true;
        }
        return false;
    }

    function checkRole($roles)
    {
        $result = false;
        foreach ($roles as $role) {
            switch($role){
                case '*':
                    $result |= true;
                case '?':
                    $result |= Yii::$app->staff->isGuest;
                case '@':
                    $result |= !Yii::$app->staff->isGuest && Yii::$app->staff->identity->role != Staff::ROLE_MEMBER;
                case '$':
                    $result |= !Yii::$app->staff->isGuest;
                default:
                    $result |= !Yii::$app->staff->isGuest && Yii::$app->staff->identity->checkRole($role);
            }
        }
        return $result;
    }
}
