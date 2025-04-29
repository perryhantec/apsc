<?php

namespace common\models;
// use yii\helpers\ArrayHelper;

use Yii;
// use yii\helpers\Json;
// use Imagine\Image\Box;
// use Imagine\Image\Point;
// use yii\imagine\Image;

/**
 * This is the model class for table "general".
 */
class CallForAbstract extends \yii\db\ActiveRecord
{
    const ABSTRACT_STATUS_DRAFT = 1;
    const ABSTRACT_STATUS_SUBMITTED = 2;
    const ABSTRACT_NO_PREFIX       = 'AB';
    const ABSTRACT_NO_LENGTH       = 8;

    const RESULT_ACCEPT = 1;
    const RESULT_REJECT = 2;
    public $file_name;
    public $abstract_user;
    // public $crop_info;

    // public $crop_width;
    // public $crop_height;

    // const CROP_WIDTH = 700;
    // const CROP_HEIGHT = 190;
    // const CROP_WIDTH = 311;
    // const CROP_HEIGHT = 367;

    // const HAVE_COPYRIGHT_NOTICE = true;
    // const HAVE_DISCLAIMER = true;
    // const HAVE_PRIVACY_STATEMENT = true;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'call_for_abstract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abstract_no', 'abstract_file_name', 'keyword_1', 'keyword_2', 'keyword_3'], 'string', 'max' => 255],
            [['title', 'content'], 'string'],
            [['user_id', 'present_type', 'theme', 'is_young', 'is_registered', 'abstract_status', 'result', 'accept_type', 'check_is_registered'], 'integer'],
            [['abstract_user', 'affiliation', 'author', 'created_at', 'updated_at'], 'safe'],
            [['file_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png, doc, docx, xls, xlsx, pdf'],

            [[
                'user_id'
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
            'abstract_no'                 => 'Abstract No.',
            'user_id'                     => 'Abstract User',
            'title'                       => 'Abstract Title',
            'present_type'                => 'Presentation Type',
            'keyword_1'                   => 'Keyword 1',
            'keyword_2'                   => 'Keyword 2',
            'keyword_3'                   => 'Keyword 3',
            'theme'                       => 'Theme',
            'affiliation'                 => 'Author Affiliation',
            'author'                      => 'Abstract Authors',
            'content'                     => 'Abstract',
            'file_name'                   => 'Table / Graphic / Representative Figure',
            'abstract_file_name'          => 'Table / Graphic / Representative Figure',
            'is_young'                    => 'Young Investigator Award',
            'is_registered'               => 'Register Preference',
            'abstract_status'             => 'Abstract Status',
            'result'                      => 'Result',
            'accept_type'                 => 'Accept Type',
            'check_is_registered'         => 'Is Registered',
            // 'created_at' => Yii::t('app', 'Created At'),
            // 'updated_at' => Yii::t('app', 'Updated At'),
            'created_at'                  => 'Created At',
            'updated_at'                  => 'Updated At',
        ];
    }

    // public function attributeHints()
    // {
    //     return ArrayHelper::merge(parent::attributeHints(), [
    //         'file_name' => 'Only accept jpg, jpeg, png, doc, docx, xls, xlsx, pdf file',
    //     ]);
    // }

    public function afterFind()
    {        
        parent::afterFind();
        $this->affiliation = json_decode($this->affiliation, true);
        if (!is_array($this->affiliation)) $this->affiliation = [];

        $this->author = json_decode($this->author, true);
        if (!is_array($this->author)) $this->author = [];
        
        if ($this->affiliation) {
            $affiliations = [];

            $i = 1;
            foreach ($this->affiliation as $affiliation) {
                $affiliations[$i]['affiliation'] = $affiliation['affiliation'];
                $affiliations[$i]['city'] = $affiliation['city'];
                $affiliations[$i]['state'] = $affiliation['state'];
                // $affiliations[$i]['country'] = Definitions::getCountry($affiliation['country']);
                $affiliations[$i]['country'] = $affiliation['country'];

                $i++;
            }

            $this->affiliation = $affiliations;
        }

        if ($this->author) {
            $authors = [];

            $i = 1;
            foreach ($this->author as $author) {
                $authors[$i]['tle'] = $author['tle'];
                $authors[$i]['first_name'] = $author['first_name'];
                $authors[$i]['last_name'] = $author['last_name'];
                $authors[$i]['is_presenter'] = $author['is_presenter'];
                $authors[$i]['organization'] = $author['organization'];
                $authors[$i]['position'] = $author['position'];
                $authors[$i]['affiliations'] = $author['affiliations'];

                $i++;
            }

            $this->author = $authors;
        }
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->user_id) {
            $user_model = User::findOne($this->user_id);
            $registration_model = Registration::findOne(['email' => $user_model->email]);

            if ($registration_model) {
                $this->check_is_registered = 1;

                $registration_models = Registration::find()->where(['email' => $user_model->email])->all();

                foreach ($registration_models as $model) {
                    $model->check_is_abstracted = 1;
                    $model->updateAttributes(['check_is_abstracted']);    
                }
            } else {
                $this->check_is_registered = 0;
            }
        } else {
            $this->check_is_registered = 0;
        }

        if ($this->isAttributeChanged('affiliation')) {
            $this->affiliation = $this->affiliation ? $this->affiliation : [];
            $this->affiliation = json_encode($this->affiliation);
        }

        if ($this->isAttributeChanged('author')) {
            $this->author = $this->author ? $this->author : [];
            $this->author = json_encode($this->author);
        }

        return true;
    }

    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         $this->updated_at=date('Y-m-d H:i:s');
    //         if(isset(Yii::$app->user->id)){
    //           $this->updated_UID=Yii::$app->user->id;
    //         }
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function saveContent()
    {
        if ($this->validate()) {
            // if ($this->user_id && $this->abstract_status == self::ABSTRACT_STATUS_SUBMITTED) {
            //     self::updateAll(['abstract_status' => self::ABSTRACT_STATUS_DRAFT],['abstract_status' => self::ABSTRACT_STATUS_SUBMITTED, 'user_id' => $this->user_id]);
            // }

            $is_new = $this->isNewRecord ? true : false;

            $this->save();

            if ($is_new) {
                $this->abstract_no = Definitions::setCode(self::ABSTRACT_NO_PREFIX, self::ABSTRACT_NO_LENGTH, $this->id);
                $this->updateAttributes(['abstract_no']);
            }

            if ($this->file_name != NULL) {
                $_file_name = $this->file_name->baseName.'.'.$this->file_name->extension;
                $this->abstract_file_name = $this->fileDisplayPath.$_file_name;

                $this->save();

                $this->abstract_file_name = $this->filePath.$_file_name;
                $this->file_name->saveAs($this->abstract_file_name);
                // $this->save();
            }

            if ($this->user_id && $this->result == self::RESULT_ACCEPT) {
                $this->sendAcceptEmail();
            }

            return true;
        } else {
            return false;
        }
    }

    public function sendAcceptEmail()
    {
        $subject_txt = 'APSC - Accept call for abstract';

        $send = Yii::$app->mailer->compose('accept', [
                'model' => $this,
            ])
            ->setTo($this->user->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function sendConfirmAbstractEmail()
    {
        $subject_txt = 'APSC 2023: Successful Abstract Submission';

        $send = Yii::$app->mailer->compose('confirm-abstract', [
                'model' => $this,
            ])
            ->setTo($this->user->email)
            // ->setBcc($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($subject_txt)
            ->send();
    }

    public function getAbstractNoWithName()
    {
        return $this->abstract_no . (isset($this->user->name) && $this->user->name != "" ? (' ('.$this->user->name.')') : '');
    }

    public function getFilePath(){
        return Config::CallForAbstractFilePath($this->id);
    }

    public function getFileDisplayPath(){
        return Config::CallForAbstractFileDisplayPath($this->id);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
