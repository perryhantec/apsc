<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
// use yii\helpers\Json;
// use Imagine\Image\Box;
// use Imagine\Image\Point;
// use yii\imagine\Image;
// use yii\imagine\BaseImage;

/**
 * This is the model class for table "page_type4".
 */
class PageType2 extends \common\components\BaseActiveRecord
{
    // const HAS_CATEGORY = true;

    // public $top_media_type=self::TMT_IMAGE;

    // const TMT_IMAGE = 1;
    // const TMT_YOUTUBE = 2;

    // public $old_file_names=[];
    // public $upload_files=[];
    // public $image_file;
//     public $crop_info;

//     public $crop_width;
//     public $crop_height;

    // const CROP_WIDTH = 720;
    // const CROP_HEIGHT = 480;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_type2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_tw', 'title_cn', 'title_en'], 'trim'],
            // [['MID', 'category_id', 'view_counter', 'status', 'updated_UID'], 'integer'],
            [['MID', 'seq', 'status', 'updated_UID'], 'integer'],
//             [['crop_width', 'crop_height'], 'integer'],
            // [['image_file_name', 'file_names', 'old_file_names', 'display_at', 'created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            // [['display_at'], 'required'],
            [Yii::$app->config->getRequiredLanguageAttributes(['title', 'content']), 'required'],
            // [['content_tw', 'content_cn', 'content_en', 'image_file_name', 'file_names'], 'string'],
            [['content_tw', 'content_cn', 'content_en'], 'string'],
            // [['upload_files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,JPG,jpeg,JPEG,PNG' , 'maxFiles' => 20],
            // [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,JPG,jpeg,JPEG,PNG'],
            // [['author', 'title_tw', 'title_cn', 'title_en', 'youtube_id'], 'string', 'max' => 255],
            [['title_tw', 'title_cn', 'title_en'], 'string', 'max' => 255],
            // [['summary_tw', 'summary_cn', 'summary_en'], 'string'],
//             [['crop_info'], 'safe'],
            // [['top_media_type'], 'safe'],
//             ['image_file', 'checkClickCrop'],
            [['MID'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['MID' => 'id']],
            // [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageType4Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

/*
    public function checkClickCrop($attribute, $params)
    {
        if($this->image_file != NULL && $this->top_media_type == self::TMT_IMAGE && Json::decode($this->crop_info)==NULL){
            $this->addError($attribute, Yii::t('app', "Please click 'Crop'."));
        }
    }
*/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'MID' => Yii::t('app', 'Mid'),
            // 'display_at' => Yii::t('app', 'Display At'),
            // 'author' => Yii::t('app', 'Author'),
            // 'category_id' => Yii::t('app', 'Category'),
            // 'image_file' => Yii::t('app', 'Thumbnail'),
            // 'image_file_name' => Yii::t('app', 'Thumbnail'),
            // 'youtube_id' => Yii::t('app', 'YouTube ID'),
            // 'top_media_type' => Yii::t('app', 'Thumbnail Media Type'),
            'title' => Yii::t('app', 'Title'),
            'title_tw' => Yii::t('app', 'Title').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'title_cn' => Yii::t('app', 'Title').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'title_en' => Yii::t('app', 'Title').' '.Yii::t('app', '(English Version)'),
            // 'summary_tw' => Yii::t('app', 'Summary').' '.Yii::t('app', '(Traditional Chinese Version)'),
            // 'summary_cn' => Yii::t('app', 'Summary').' '.Yii::t('app', '(Simplified Chinese Version)'),
            // 'summary_en' => Yii::t('app', 'Summary').' '.Yii::t('app', '(English Version)'),
            'content_tw' => Yii::t('app', 'Content').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'content_cn' => Yii::t('app', 'Content').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'content_en' => Yii::t('app', 'Content').' '.Yii::t('app', '(English Version)'),
            // 'file_names' => Yii::t('app', 'Images'),
            // 'upload_files' => Yii::t('app', 'Images'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_UID' => Yii::t('app', 'Updated UID'),
        ];
    }

    // public function afterFind()
    // {
    //     parent::afterFind();

    //     if ($this->youtube_id != null)
    //         $this->top_media_type = self::TMT_YOUTUBE;

    // }

    // public function addViewCounter()
    // {
    //     $this->view_counter++;
    //     $this->save();
    // }

    public function saveContent()
    {
        // if ($this->upload_files!=NULL) {
        //     $this->upload_files = UploadedFile::getInstances($this, 'upload_files');
        // }

        if ($this->validate()) {

            // $file_names=$this->old_file_names;
            // if($this->upload_files!=NULL){
            //     foreach($this->upload_files as $k=>$v){
            //         $file_names[] = $v->baseName.'.'.$v->extension;
            //     }
            // }
            // $this->file_names = json_encode($file_names, JSON_UNESCAPED_UNICODE);

            if ($this->save()) {
//                 if ($this->top_media_type == self::TMT_YOUTUBE) {
//                     $this->image_file_name = null;
//                 } else if ($this->top_media_type == self::TMT_IMAGE) {
//                     $this->youtube_id = null;
//                     if ($this->image_file != NULL)
//                         $this->image_file_name = Config::PageType4ImageDisplayPath().$this->id.'.'.$this->image_file->getExtension().'?'.time();
//                 }
//                 $this->save();

//                 if ($this->top_media_type == self::TMT_IMAGE && $this->image_file!=NULL) {
//                     $this->image_file_name = $this->id.'.'.$this->image_file->getExtension();
//                     $this->saveImage($this->image_file_name);
//                     $this->image_file_name = Config::PageType4ImageDisplayPath().$this->image_file_name.('?'.time());
//                 }
//                 if ($this->upload_files!=NULL) {
//                     foreach($this->upload_files as $k=>$v){
//                         Image::thumbnail($v->tempName, null, 300)
//                             ->save($this->fileThumbPath.$v->baseName.'.'.$v->extension, ['quality' => 100]);

// /*
//                         $image = Image::getImagine()->open($v->tempName);
//                         $image->resize(new Box(2048, 1365))
//                             ->save($this->filePath.$v->baseName.'.'.$v->extension, ['quality' => 100]);
// */
// /*
//                         BaseImage::resize($v->tempName, 2048, 1365)
//                             ->save($this->filePath.$v->baseName.'.'.$v->extension, ['quality' => 100]);
// */
//                         $v->saveAs($this->filePath.$v->baseName.'.'.$v->extension);
//                     }
//                 }
            }
            return true;
        } else {
            return false;
        }
    }

    // public function saveImage($filename)
    // {
    //     Image::thumbnail($this->image_file->tempName, self::CROP_WIDTH, self::CROP_HEIGHT, \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET)
    //         ->save($this->imagePath.'/'.$filename , ['quality' => 100]);

/*
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
        $pathImage = $this->imagePath . '/' . $this->id . '.' . $this->image_file->getExtension();

        $image->resize($newSizeImage)
            ->crop($cropPointImage, $cropSizeImage)
            ->save($pathImage, ['quality' => 100]);
*/
    // }

    // public function getFilePath(){
    //     return Config::PageType4FilePath($this->id);
    // }

    // public function getFileThumbPath(){
    //     return Config::PageType4FileThumbPath($this->id);
    // }

    // public function getImagePath(){
    //     return Config::PageType4ImagePath();
    // }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'MID']);
    }

    public function getTitle(){
        return $this->title_en;
        // if (Yii::$app->language == 'en' && !empty($this->title_en))
        //     return $this->title_en;
        // else if (Yii::$app->language == 'zh-CN' && !empty($this->title_cn))
        //     return $this->title_cn;
        // return $this->title_tw;
    }
    // public function getSummary(){
    //     if (Yii::$app->language == 'en' && !empty($this->summary_en))
    //         return $this->summary_en;
    //     else if (Yii::$app->language == 'zh-CN' && !empty($this->summary_cn))
    //         return $this->summary_cn;
    //     return $this->summary_tw;
    // }
    public function getContent(){
        return $this->content_en;
        // if (Yii::$app->language == 'en' && !empty($this->content_en))
        //     return $this->content_en;
        // else if (Yii::$app->language == 'zh-CN' && !empty($this->content_cn))
        //     return $this->content_cn;
        // return $this->content_tw;
    }

}
