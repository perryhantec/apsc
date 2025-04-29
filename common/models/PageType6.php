<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "page_type4".
 */
class PageType6 extends \common\components\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_type6';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MID', 'status', 'updated_UID'], 'integer'],
            [['display_at', 'created_at', 'updated_at'], 'safe'],
            [['display_at'], 'required'],
            // [Yii::$app->config->getRequiredLanguageAttributes(['content']), 'required'],
            // [['content_tw', 'content_cn', 'content_en'], 'string'],
            [Yii::$app->config->getRequiredLanguageAttributes(['title']), 'required'],
            [['title_tw', 'title_cn', 'title_en'], 'string'],
            [['MID'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['MID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'MID' => Yii::t('app', 'Mid'),
            'display_at' => Yii::t('app', 'Display At'),
            'title' => Yii::t('app', 'Title'),
            'title_tw' => Yii::t('app', 'Title').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'title_cn' => Yii::t('app', 'Title').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'title_en' => Yii::t('app', 'Title').' '.Yii::t('app', '(English Version)'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_UID' => Yii::t('app', 'Updated UID'),
        ];
    }

    public function saveContent()
    {
        if ($this->validate()) {
            $this->save();

            return true;
        } else {
            return false;
        }
    }
    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'MID']);
    }

    public function getTitle(){
        return $this->title_en;
        // if (Yii::$app->language == 'en' && !empty($this->content_en))
        //     return $this->content_en;
        // else if (Yii::$app->language == 'zh-CN' && !empty($this->content_cn))
        //     return $this->content_cn;
        // return $this->content_tw;
    }

    // public function getContent(){
    //     return $this->content_en;
    //     // if (Yii::$app->language == 'en' && !empty($this->content_en))
    //     //     return $this->content_en;
    //     // else if (Yii::$app->language == 'zh-CN' && !empty($this->content_cn))
    //     //     return $this->content_cn;
    //     // return $this->content_tw;
    // }

}
