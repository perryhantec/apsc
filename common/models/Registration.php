<?php

namespace common\models;

use Yii;
// use yii\helpers\Json;
// use Imagine\Image\Box;
// use Imagine\Image\Point;
// use yii\imagine\Image;

/**
 * This is the model class for table "general".
 */
class Registration extends \yii\db\ActiveRecord
{
    const COUNTRY_HK = 'HK';
    const REGISTRATION_NO_PREFIX       = 'RE';
    const REGISTRATION_NO_LENGTH       = 8;

    const PAYMENT_METHOD_PAYPAL        = 1;
    const PAYMENT_METHOD_CHEQUE        = 2;
    const PAYMENT_METHOD_BANK          = 3;

    const IS_ATTEND_YES                = 1;
    const IS_ATTEND_NO                 = 0;

    const STATUS_CANCELED              = 'canceled';
    const STATUS_FORM_SUBMITTED        = 'form_submitted';
    const STATUS_ONLINE_PAYMENT_FAILED = 'online_payment_failed';
    const STATUS_ONLINE_PAYMENT        = 'online_payment';
    const STATUS_WAITING_FOR_CONFIRM   = 'waiting_for_confirm';
    const STATUS_CONFIRMED             = 'confirmed';
    const STATUS_END                   = 'end';

    public $file_name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'professions', 'specialty', 'dietary', 'statement', 'is_refund', 'hotel', 'payment_type',
                'dinner', 'payment_method', 'is_attend', 'is_vip', 'check_is_abstracted', 'faculty_dinner'
            ], 'integer'],
            // [['total_payment'], 'number'],
            [[
                'registration_no', 'title', 'first_name', 'last_name', 'department', 'institution', 'country',
                'email', 'other_email', 'country_code', 'mobile', 'office_phone', 'other_pro', 'student_file_name', 'status'
            ], 'string', 'max' => 255],
            [['email'], 'email'],
            [['created_at', 'updated_at'], 'safe'],
            [['file_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, pdf'],

            [[
                'title', 'first_name', 'last_name', 'email', 'payment_type', 'payment_method'
            ], 'required'],

            // [['firstname', 'lastname', 'email', 'phone', 'file_name'], 'required'],
        ];
    }

    // public function checkClickCrop($attribute, $params)
    // {
    //     if($this->image_file != NULL && Json::decode($this->crop_info)==NULL){
    //         $this->addError($attribute, "Please click 'Crop'.");
    //     }
    // }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'registration_no'             => 'Registration No.',
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'department' => 'Department',
            'institution' => 'Institution / Hospital',
            'country' => 'Country',
            'email' => 'Email Address',
            'other_email' => 'Other Email Address',
            'country_code' => 'Country Code',
            'mobile' => 'Mobile Phone No.',
            'office_phone' => 'Other Phone No.',
            'professions' => 'Profession',
            'other_pro' => 'Other Profession',
            'specialty' => 'Specialty',
            'dietary' => 'Special Dietary Requirement',
            'statement' => 'Personal Statement',
            'is_refund' => 'Application for Registration Fee Refund',
            'file_name'                  => 'Student Proof',
            'student_file_name'          => 'Student Proof',
            'hotel' => 'Accommodation Arrangements',
            'payment_type' => 'Payment Type',
            'dinner' => 'Gala Dinner',
            // 'total_payment' => 'Total Payment',
            'payment_method' => 'Payment Method',
            'is_attend'                   => 'Pick up Badges',
            // 'registration_fee'            => 'Registration Fee',
            'status'                      => 'Status',
            'is_vip'                      => 'Is VIP',
            'check_is_abstracted'         => 'Is Abstracted',
            'faculty_dinner'              => 'Faculty Dinner',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated Dt'),
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->email) {
            $user_model = User::findOne(['email' => $this->email]);

            if ($user_model) {
                $call_for_abstract_model = CallForAbstract::findOne(['user_id' => $user_model->id, 'abstract_status' => CallForAbstract::ABSTRACT_STATUS_SUBMITTED]);

                if ($call_for_abstract_model) {
                    $this->check_is_abstracted = 1;

                    $call_for_abstract_models = CallForAbstract::find()->where(['user_id' => $user_model->id])->all();

                    foreach ($call_for_abstract_models as $model) {
                        $model->check_is_registered = 1;
                        $model->updateAttributes(['check_is_registered']);    
                    }
                } else {
                    $this->check_is_abstracted = 0;
                }
            } else {
                $this->check_is_abstracted = 0;
            }
        } else {
            $this->check_is_abstracted = 0;
        }

        return true;
    }

    public function saveContent()
    {
        if ($this->validate()) {
            // $this->registration_fee = self::REGISTRATION_FEE;
            // $this->total_payment = self::REGISTRATION_FEE;
            $this->status = self::STATUS_FORM_SUBMITTED;

            $is_new = $this->isNewRecord ? true : false;

            $this->save();

            if ($is_new) {
                $this->registration_no = Definitions::setCode(self::REGISTRATION_NO_PREFIX, self::REGISTRATION_NO_LENGTH, $this->id);
                // $this->registration_no = "$this->id";
                $this->updateAttributes(['registration_no']);    
            }
            
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

    public function getFilePath(){
        return Config::RegistrationFilePath($this->id);
    }

    public function getFileDisplayPath(){
        return Config::RegistrationFileDisplayPath($this->id);
    }

    public function getName()
    {
        $name = $this->title.' '.$this->first_name.' '.$this->last_name;

        return $name;
    }

    public function sendSubmittedEmail()
    {
        $subject_txt = 'APSC - Thank you for your registration';

        $send = Yii::$app->mailer->compose('receipt', [
                'model' => $this,
            ])
            ->setTo($this->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function sendReminderEmail()
    {
        $subject_txt = 'APSC - Reminder Payment';

        $send = Yii::$app->mailer->compose('reminder', [
                'model' => $this,
            ])
            ->setTo($this->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function sendConfirmEmail()
    {
        $subject_txt = 'APSC - Confirm Registration';

        $send = Yii::$app->mailer->compose('confirm', [
                'model' => $this,
            ])
            ->setTo($this->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function sendConfirmVipEmail()
    {
        $subject_txt = 'APSC - VIP Confirm Registration';

        $send = Yii::$app->mailer->compose('confirm-vip', [
                'model' => $this,
            ])
            ->setTo($this->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function sendMassEmail($title, $content)
    {
        $subject_txt = $title;

        $send = Yii::$app->mailer->compose('mass', [
                'model' => $this,
                'content' => $content,
            ])
            ->setTo($this->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['registration_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['email' => 'email']);
    }
}
