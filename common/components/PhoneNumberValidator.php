<?php

namespace common\components;

use Yii;
use yii\validators\Validator;

class PhoneNumberValidator extends Validator
{

    public function init()
    {
        parent::init();
        $this->message = Yii::t('app', '{attribute} is not a valid phone number.');
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if (!$this->isEmpty($value) && !preg_match('/[2-9]\d{7}/', $value))
            $this->addError($model, $attribute, $this->formatMessage($this->message, [
                    'attribute' => $model->getAttributeLabel($attribute),
                ]));
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = json_encode($this->formatMessage($this->message, [
                'attribute' => $model->getAttributeLabel($attribute),
            ]), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return "if (value != '' && !value.match(/[2-9]\d{7}/)) { messages.push($message); }";
    }

}
