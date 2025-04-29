<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Definitions;
use common\models\Registration;
use common\models\Setting;

class RegistrationForm extends Registration
{
    public $re_email;
    public $file_name;
    public $terms;
    // public $current = 1;
    public $current;
    // public $is_check = 1;
    // public $show_back_summary_btn = 0;
    // public $return_to_summary = 0;
    // public $reCaptcha;

    public function rules()
    {
        return [
            [['professions', 'specialty', 'dietary', 'statement', 'is_refund', 'hotel', 'payment_type', 'dinner', 'terms', 'payment_method', 'is_attend'], 'integer'],
            // [['total_payment'], 'number'],
            [[
                'registration_no', 'title', 'first_name', 'last_name', 'department', 'institution', 'country',
                'email', 'other_email', 'country_code', 'mobile', 'office_phone', 'other_pro', 'student_file_name', 'status', 're_email'
            ], 'string', 'max' => 255],
            [['other_email'], 'string'],
            [['email', 're_email'], 'email'],
            [['email'], 'checkEmail'],

            [['payment_type'], 'checkPaymentType'],

            // [[
            //     'title', 'first_name', 'last_name', 'institution', 'email', 're_email', 'mobile', 'country',
            //     'professions', 'specialty', 'statement', 'is_refund',
            // ], 'required', 'when' => function($model) {
            //     return $model->current == 1;
            // }],

            // [['payment_type'], 'required', 'when' => function($model) {
            //     return $model->current == 2;
            // }],

            // [['terms'], 'required', 'when' => function($model) {
            //     return $model->current == 3;
            // }],

            // [['payment_method'], 'required', 'when' => function($model) {
            //     return $model->current == 4;
            // }],

            [[
                'title', 'first_name', 'last_name', 'institution', 'email', 're_email', 'mobile', 'country',
                'professions', 'specialty', 'statement', 'is_refund', 'payment_type', 'terms', 'payment_method'
            ], 'required'],


            // [['current', 'is_check', 'show_back_summary_btn', 'return_to_summary', 'created_at', 'updated_at'], 'safe'],
            [['current', 'created_at', 'updated_at'], 'safe'],
            [['file_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, pdf'],

            // [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator3::className(),
            //     'threshold' => 0.5,
            //     'action' => 'registration',
            // ],
        ];
    }

    public function checkEmail($attribute, $params)
    {
        if ($this->email != $this->re_email) {
            $this->addError($attribute, 'These two emails are not the same.');
        }
    }

    public function checkPaymentType($attribute, $params)
    {
        $setting_model = Setting::findOne(1);

        $early_list = [1,2,3,4,5,6,7,8];
        $regular_list = [9,10,11,12,13,14,15,16];

        $current_timestamp = time();
        $reg_early_close_timestamp = strtotime($setting_model->reg_early_close);
        $reg_regular_close_timestamp = strtotime($setting_model->reg_regular_close);

        if (
            (in_array($this->payment_type, $early_list)
            && $current_timestamp >= $reg_early_close_timestamp)
            || (in_array($this->payment_type, $regular_list)
            && $current_timestamp >= $reg_regular_close_timestamp)
        ) {
            $this->addError($attribute, 'Invalid Registration Category');
        }
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'last_name' => 'Last Name (e.g. Chan)',
            'first_name' => 'First Name (e.g. Peter Tai Man)',
            'other_email' => 'Other Email Address (if any)',
            're_email' => 'Verify Email Address',
            'hotel' => 'Accommodation Arrangements (Please choose your preferred hotel or arrangement)',
            'terms' => 'I agree with the above terms and conditions.',
        ]);
    }

    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            // 'file_name' => 'Only accept doc, docx, pdf file, otherwise failure',
        ]);
    }

    // public function beforeSave($insert)
    // {
    //     if (!parent::beforeSave($insert)) {
    //         return false;
    //     }

    //     return true;
    // }

    /*
    public function checkContent()
    {
        if ($this->validate()) {
            // $this->save();
                
            return true;
        } else {
            return false;
        }
    }
    */

    public function saveContent()
    {
        if ($this->validate()) {
            // $this->registration_fee = self::REGISTRATION_FEE;
            // $this->total_payment = self::REGISTRATION_FEE;
            $this->status = self::STATUS_FORM_SUBMITTED;
            $this->save();

            $this->registration_no = Definitions::setCode(self::REGISTRATION_NO_PREFIX, self::REGISTRATION_NO_LENGTH, $this->id);
            // $this->registration_no = "$this->id";
            $this->updateAttributes(['registration_no']);
            
            if ($this->file_name != NULL) {
                $_file_name = $this->file_name->baseName.'.'.$this->file_name->extension;
                $this->student_file_name = $this->fileDisplayPath.$_file_name;
                $this->save();
    //         }
    // // //                 }
    //         if ($this->file_name!=NULL) {
                $this->student_file_name = $this->filePath.$_file_name;
                $this->file_name->saveAs($this->student_file_name);
                // $this->save();
            }
    
            return true;
        } else {
            return false;
        }
    }
}