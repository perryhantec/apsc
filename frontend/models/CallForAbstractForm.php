<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Definitions;
use common\models\CallForAbstract;

class CallForAbstractForm extends CallForAbstract
{
    public $file_name;

    public function rules()
    {
        return [
            [['abstract_file_name'], 'string', 'max' => 255],
            [['prefix', 'firstname', 'lastname', 'email'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'email'],
            // [['email'], 'unique'],
            [['created_at', 'updated_at'], 'safe'],
            // [['file_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, pdf'],
            [['file_name'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, JPG, jpeg, JPEG, PNG, doc, docx, pdf'],

            [['prefix', 'firstname', 'lastname', 'email', 'phone', 'file_name'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
        ]);
    }

    // public function attributeHints()
    // {
    //     return ArrayHelper::merge(parent::attributeHints(), [
    //         'file_name' => 'Only accept doc, docx, pdf file',
    //     ]);
    // }

    // public function beforeSave($insert)
    // {
    //     if (!parent::beforeSave($insert)) {
    //         return false;
    //     }

    //     return true;
    // }

    public function saveContent()
    {
        if ($this->validate() && $this->save()) {
            if ($this->file_name != NULL)
                $_file_name = $this->file_name->baseName.'.'.$this->file_name->extension;
                $this->abstract_file_name = $this->fileDisplayPath.$_file_name;
// //                 }
            $this->save();
            if ($this->file_name!=NULL) {
                $this->abstract_file_name = $this->filePath.$_file_name;
                $this->file_name->saveAs($this->abstract_file_name);
                // $this->save();
            }
            return true;
        } else {
            return false;
        }
    }

}