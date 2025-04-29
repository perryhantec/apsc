<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use common\models\CallForAbstract;
use common\models\Definitions;

/**
 * RegistrationForm is the model behind the login form.
 */
class UserAbstractForm extends CallForAbstract
{
    // const SCENARIO_WEB = "from_web";
    // const SCENARIO_APP = "from_app";

    // public $verifyCode;
    // public $first_accessed = false;
    public $terms;
    public $terms_2;
    public $is_draft;
    public $is_continue;
    public $file_remove;
    public $title_word_count;
    public $content_word_count;
    public $file_name;
    // public $reCaptcha;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['abstract_file_name', 'keyword_1', 'keyword_2', 'keyword_3'], 'string', 'max' => 255],
            [['title', 'content'], 'string'],
            [['user_id', 'present_type', 'theme', 'is_young', 'is_registered', 'abstract_status'], 'integer'],
            [[
                // 'first_accessed', 'affiliation', 'author', 'terms', 'terms_2', 'is_draft', 'is_continue', 'file_remove',
                'affiliation', 'author', 'terms', 'terms_2', 'is_draft', 'is_continue', 'file_remove',
                'title_word_count', 'content_word_count', 'created_at', 'updated_at'
            ], 'safe'],
            [['file_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png, doc, docx, xls, xlsx, pdf'],

            // [['title', 'present_type', 'theme', 'affiliation', 'author', 'content'], 'required'],

            // [['affiliation'], 'checkAffiliation'],
            // [['author'], 'checkAuthor'],
            // [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator3::className(),
            //     'threshold' => 0.5,
            //     'action' => 'abstract',
            // ],
        ];
    }

    // public function afterFind()
    // {
    //     parent::afterFind();
    // }
    // public function checkAffiliation($attribute, $params)
    // {
    //     $this->addError($attribute, 'Invalid Affiliation');
    // }
    // public function checkAuthor($attribute, $params)
    // {
    //     $this->addError($attribute, 'Invalid Author');
    // }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'terms' => 'I agree to the above Terms and Conditions',
            'terms_2' => 'I confirm that I am the designated the corresponding author for that abstract and all communications regarding the abstract (submission, review, presentation etc.) can be sent to the email address you used to set up your account.',
        ]);
    }

    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            'file_name' => 'Only accept jpg, jpeg, png, doc, docx, xls, xlsx, pdf file',
        ]);
    }

    public function submit()
    {
            // Definitions::dd($this,1);
        if ($this->is_draft === 'false') {
            // CallForAbstract::updateAll(['abstract_status' => $this::ABSTRACT_STATUS_DRAFT],['abstract_status' => $this::ABSTRACT_STATUS_SUBMITTED, 'user_id' => $this->user_id]);
            $this->abstract_status = $this::ABSTRACT_STATUS_SUBMITTED;
        }

        $this->save();

        if ($this->file_name != NULL) {
            $_file_name = $this->file_name->baseName.'.'.$this->file_name->extension;
            $this->abstract_file_name = $this->fileDisplayPath.$_file_name;
            $this->save();
//         }
// // //                 }
//         if ($this->file_name!=NULL) {
            $this->abstract_file_name = $this->filePath.$_file_name;
            $this->file_name->saveAs($this->abstract_file_name);
            // $this->save();
        }
        
        $this->afterFind();
        $this->sendConfirmAbstractEmail();

        return true;

        // return false;
    }
}
