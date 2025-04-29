<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "home".
 */
class Home extends \common\components\BaseActiveRecord
{
    public $image_file_1;
    public $image_file_2;
    public $image_file_3;
    public $image_file_4;
    public $image_file_5;
    // const HAVE_TOP_YOUTUBE = true;
    // const NUM_OF_YOUTUBE = 4;

    // public $youtube;
    // public $top_youtube_id=[];
    // public $top_youtube_title=[];
    // public $top_youtubes=[];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['status', 'updated_UID'], 'integer'],
            [['show_menu_1', 'show_limit_1', 'show_menu_2', 'show_limit_2', 'show_menu_3', 'updated_UID'], 'integer'],
            // [Yii::$app->config->getRequiredLanguageAttributes('content'), 'required'],
            // [['content_tw', 'content_cn', 'content_en', 'top_youtube'], 'string'],
            [['content_tw', 'content_cn', 'content_en'], 'string'],
            [['body_text_1', 'body_text_2', 'body_text_3', 'body_text_4', 'body_text_5', 'org_text_1', 'org_text_2'], 'string'],
            // [['youtube', 'created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            // [['top_youtube_id', 'top_youtube_title'], 'each', 'rule' => ['string']],
            [['image_file_name_1', 'image_file_name_2', 'image_file_name_3', 'image_file_name_4', 'image_file_name_5'], 'string'],
            [['image_file_1', 'image_file_2', 'image_file_3'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, JPG, jpeg, JPEG, PNG'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image_file_1' => '頭版圖片1',
            'image_file_2' => '頭版圖片2',
            'image_file_3' => '頭版圖片3',
            'image_file_4' => 'Organizer 1 Logo',
            'image_file_5' => 'Organizer 2 Logo',
            'image_file_name_1' => '頭版圖片1',
            'image_file_name_2' => '頭版圖片2',
            'image_file_name_3' => '頭版圖片3',
            'show_menu_1'  => '頭版顯示目錄 1',
            'show_limit_1' => '目錄 1 最多數目', 
            'show_menu_2'  => '頭版顯示目錄 2',
            'show_limit_2' => '目錄 2 最多數目', 
            'show_menu_3'  => '頭版顯示目錄 3',
            'content_tw' => Yii::t('app', 'Content').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'content_cn' => Yii::t('app', 'Content').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'content_en' => Yii::t('app', 'Content').' '.Yii::t('app', '(English Version)'),
            'org_text_1' => 'Organizer 1 Name',
            'org_text_2' => 'Organizer 2 Name',
            // 'top_youtube' => Yii::t('app', 'YouTube'),
            // 'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_UID' => Yii::t('app', 'Updated  Uid'),
        ];
    }

    // public function afterFind() {
    //     parent::afterFind();

    //     if (!empty($this->top_youtube)) {
    //         $this->top_youtubes = json_decode($this->top_youtube, true);
            
    //         $youtubes = [];
            
    //         foreach ($this->top_youtubes as $num => $data) {
    //             // $this->top_youtube_id[$num] = $data['id'];
    //             // $this->top_youtube_title[$num] = $data['title'];
    //             $youtubes[] = [
    //               'top_youtube_id' => $data['id'],
    //               'top_youtube_title' => $data['title'],
    //             ];
    //         }
            
    //         $this->youtube = $youtubes;
    //     }
    // }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->updated_at=date('Y-m-d H:i:s');
            if(isset(Yii::$app->user->id)){
              $this->updated_UID=Yii::$app->user->id;
            }
            return true;
        } else {
            return false;
        }
    }

    public function saveContent()
    {
        if ($this->validate() && $this->save()) {
            if ($this->image_file_1 != NULL)
                $this->image_file_name_1 = Config::MenuBannerImageDisplayPath().'1.'.$this->image_file_1->getExtension();
            if ($this->image_file_2 != NULL)
                $this->image_file_name_2 = Config::MenuBannerImageDisplayPath().'2.'.$this->image_file_2->getExtension();
            if ($this->image_file_3 != NULL)
                $this->image_file_name_3 = Config::MenuBannerImageDisplayPath().'3.'.$this->image_file_3->getExtension();
            if ($this->image_file_4 != NULL)
                $this->image_file_name_4 = Config::MenuBannerImageDisplayPath().'4.'.$this->image_file_4->getExtension();
            if ($this->image_file_5 != NULL)
                $this->image_file_name_5 = Config::MenuBannerImageDisplayPath().'5.'.$this->image_file_5->getExtension();

                //                 }
            $this->save();
            if ($this->image_file_1!=NULL) {
                $this->image_file_name_1 = '1.'.$this->image_file_1->getExtension();
                // $this->saveImage($this->image_file_name_1);
                $image_1 = Image::getImagine()->open($this->image_file_1->tempName);
                $image_1->save($this->imagePath.'/'.$this->image_file_name_1 , ['quality' => 100]);        
                // $this->save();
            }
            if ($this->image_file_2!=NULL) {
                $this->image_file_name_2 = '2.'.$this->image_file_2->getExtension();
                // $this->saveImage($this->image_file_name_2);
                $image_2 = Image::getImagine()->open($this->image_file_2->tempName);
                $image_2->save($this->imagePath.'/'.$this->image_file_name_2 , ['quality' => 100]);
                // $this->save();
            }
            if ($this->image_file_3!=NULL) {
                $this->image_file_name_3 = '3.'.$this->image_file_3->getExtension();
                // $this->saveImage($this->image_file_name_3);
                $image_3 = Image::getImagine()->open($this->image_file_3->tempName);
                $image_3->save($this->imagePath.'/'.$this->image_file_name_3 , ['quality' => 100]);
                // $this->save();
            }
            if ($this->image_file_4!=NULL) {
                $this->image_file_name_4 = '4.'.$this->image_file_4->getExtension();
                // $this->saveImage($this->image_file_name_3);
                $image_4 = Image::getImagine()->open($this->image_file_4->tempName);
                $image_4->save($this->imagePath.'/'.$this->image_file_name_4 , ['quality' => 100]);
                // $this->save();
            }
            if ($this->image_file_5!=NULL) {
                $this->image_file_name_5 = '5.'.$this->image_file_5->getExtension();
                // $this->saveImage($this->image_file_name_3);
                $image_5 = Image::getImagine()->open($this->image_file_5->tempName);
                $image_5->save($this->imagePath.'/'.$this->image_file_name_5 , ['quality' => 100]);
                // $this->save();
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function saveImage($filename)
    {
        $image = Image::getImagine()->open($this->image_file->tempName);
        $image->save($this->imagePath.'/'.$filename , ['quality' => 100]);
    }

    public function getImagePath(){
        return Config::MenuBannerImagePath();
    }

    public function getContent(){
        if (Yii::$app->language == 'en' && !empty($this->content_en)){
            return $this->content_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->content_cn)){
            return $this->content_cn;
        }
        return $this->content_tw;
    }

    public function getMenu1(){
        return $this->hasOne(Menu::className(), ['id' => 'show_menu_1']);
    }
    public function getMenu2(){
        return $this->hasOne(Menu::className(), ['id' => 'show_menu_2']);
    }
    public function getMenu3(){
        return $this->hasOne(Menu::className(), ['id' => 'show_menu_3']);
    }
    public function getMenu1PageType3(){
        return $this->hasMany(PageType3::className(), ['MID' => 'show_menu_1'])->where(['status' => 1])->orderby(['display_at' => SORT_DESC]);
    }
    public function getMenu1PageType6(){
        return $this->hasMany(PageType6::className(), ['MID' => 'show_menu_1'])->where(['status' => 1])->orderby(['display_at' => SORT_DESC]);
    }
    public function getMenu2PageType3(){
        return $this->hasMany(PageType3::className(), ['MID' => 'show_menu_2'])->where(['status' => 1])->orderby(['display_at' => SORT_DESC]);
    }
    public function getMenu2PageType6(){
        return $this->hasMany(PageType6::className(), ['MID' => 'show_menu_2'])->where(['status' => 1])->orderby(['display_at' => SORT_DESC]);
    }
    public function getMenu3PageType1(){
        return $this->hasOne(PageType1::className(), ['MID' => 'show_menu_3'])->where(['status' => 1]);
    }
}
