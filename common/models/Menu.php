<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\imagine\Image;

/**
 * This is the model class for table "menu".
 */
 class Menu extends \common\components\BaseActiveRecord
{
    public $image_file;
    public $crop_info;

    public $crop_width;
    public $crop_height;

    public $icon_file;

    const CROP_WIDTH = 260;
    const CROP_HEIGHT = 90;
    const TOP_BANNER = false;
    const HAVE_ICON = false;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [Yii::$app->config->getAllLanguageAttributes('name'), 'trim'],
            [['type', 'MID', 'seq', 'home_seq', 'page_type', 'link_target', 'display_home', 'status', 'updated_UID'], 'integer'],
            [Yii::$app->config->getAllLanguageAttributes('name'), 'required'],
            [['url', 'page_type'], 'required'],
            [['link'], 'string'],
            [['url', 'name_tw', 'name_cn', 'name_en', 'banner_image_file_name', 'icon_file_name'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
            [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
            [['icon_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 1],
            ['crop_info', 'safe'],
            [['crop_width', 'crop_height'], 'integer'],
            ['image_file', 'checkClickCrop'],
        ];
    }

    public function checkClickCrop($attribute, $params)
    {
        if ($this->image_file != NULL && Json::decode($this->crop_info)==NULL) {
            $this->addError($attribute, "Please click 'Crop'.");
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'MID' => Yii::t('app', 'Belong to'),
            'name_tw' => Yii::t('app', 'Name').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'name_cn' => Yii::t('app', 'Name').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'name_en' => Yii::t('app', 'Name').' '.Yii::t('app', '(English Version)'),
            'url' => Yii::t('app', 'URL'),
            'page_type' => Yii::t('app', 'Page Type'),
            'link' => Yii::t('app', 'Link'),
            'link_target' => Yii::t('app', 'New Window'),
            'display_member' => Yii::t('app', 'For Member Only'),
            'display_home' => Yii::t('app', 'Show In Home Page'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated Dt'),
            'updated_UID' => Yii::t('app', 'Updated UID'),
            'image_file' => Yii::t('app', 'Banner'),
            'banner_image_file_name' => Yii::t('app', 'Banner'),
            'icon_file' => Yii::t('app', 'Icon'),
        ];
    }

    public function updateSeq($type, $MID=NULL) {
        $models = Menu::find()
            ->where(['type' => $type, 'MID'=>$MID, 'status' => 1])
            ->orderBy('seq')
            ->all();
        $seq = 0;
        foreach ($models as $model) {
            $model->seq = $seq;
            $model->save();
            $seq++;
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $type=$this->type;
            $MID = NULL;
            if ($this->MID!=NULL) {
              $model = Menu::findOne($this->MID);
              if ($model!=NULL) $this->type=$model->type+1;
            } else {
              $this->type=1;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (parent::afterSave($insert, $changedAttributes)) {
            self::updateSeq($this->type, $this->MID);
            return true;
        } else {
            return false;
        }
    }

    public function saveContent()
    {
        $this->image_file = UploadedFile::getInstance($this, 'image_file');
        $this->icon_file = UploadedFile::getInstance($this, 'icon_file');

        if (Yii::$app->config->checkLanguageSupported('en'))
            $this->url = $this->name_en;
        $this->url = strtolower(preg_replace('/\s+/', '-', preg_replace("/[^A-Za-z0-9 -]/", '', strip_tags($this->url))));

        if ($this->url == "" && !$this->isNewRecord)
            $this->url = strval($this->id);

        if ($this->validate() && $this->save()) {
            if ($this->icon_file!=NULL) {
                $this->icon_file_name = $this->id.'.'.$this->icon_file->extension;
                $this->icon_file->saveAs($this->iconImagePath.$this->icon_file_name);
                $this->icon_file = null;
                $this->save(false);
            }
            if ($this->image_file!=NULL) {
                $this->banner_image_file_name = Config::MenuBannerImageDisplayPath().$this->id.'.'.$this->image_file->getExtension();
                $this->saveImage();
                $this->save(false);
            }
            return true;
        } else {
            return false;
        }
    }

    public function saveImage()
    {
        // open image
        $image = Image::getImagine()->open($this->image_file->tempName);

        // rendering information about crop of ONE option
        $cropInfo = Json::decode($this->crop_info)[0];
        $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
        $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
        $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
        $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y

        //saving the image
        $newSizeImage = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
        $cropSizeImage = new Box($this->crop_width, $this->crop_height); //frame size of crop
        $cropPointImage = new Point($cropInfo['x'], $cropInfo['y']);
        $pathImage = $this->imagePath . $this->id . '.' . $this->image_file->getExtension();

        $image->resize($newSizeImage)
            ->crop($cropPointImage, $cropSizeImage)
            ->save($pathImage, ['quality' => 100]);
    }

    public function getIconImagePath(){
        return Config::MenuIconImagePath();
    }
    public function getImagePath(){
        return Config::MenuBannerImagePath();
    }

    public function getIconDisplayPath(){
        if ($this->icon_file_name != "")
            return Config::MenuIconImageDisplayPath().$this->icon_file_name;
    }

    public static function getMenuNumbers($type, $MID){
        $count = count(Menu::findAll(['type'=>$type, 'MID'=>$MID, 'status' => 1]));
        return $count;
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'MID']);
    }

    public function getSubMenu(){
        $mid = $this->MID;
        if (!$mid)
            $mid = $this->id;
        return Menu::find()->where(['MID'=> $mid, 'type'=>2, 'status' => 1])->orderBy('seq ASC')->all();
    }

    public function getName() {
        return $this->name_en;

        if (Yii::$app->language == 'en')
          return $this->name_en;
        else if (Yii::$app->language == 'zh-CN')
          return $this->name_cn;
        else
          return $this->name_tw;
    }

    public function getAllLanguageName() {
        $result = [];
        foreach (Yii::$app->config->getAllLanguageAttributes('name') as $attr) {
            $result[] = $this->{$attr};
        }
        return implode(' ', $result);
    }

    public function getRoute() {
        return $this->url;
    }
    public function getAUrl() {
        return $this->page_type == 0 ? ($this->link == '' ? "javascript:;" : $this->link) : ['/'.$this->url];
    }
}
