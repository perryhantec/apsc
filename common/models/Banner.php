<?php

namespace common\models;

use Yii;
use \common\models\Config;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * This is the model class for table "banner".
 */
class Banner extends \common\components\BaseActiveRecord
{
    public $image_file;
    public $crop_info;

    // const CROP_HEIGHT = 570;
    // const CROP_HEIGHT = 812;
    // const CROP_WIDTH = 1920;
    // const CROP_HEIGHT = 1084;
    const CROP_WIDTH = 1280;
    const CROP_HEIGHT = 960;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seq', 'updated_UID', 'url_target', 'status'], 'integer'],
            [['text', 'image_file_name', 'url'], 'string'],
            ['text', 'string', 'max' => 2000],
            [['image_file_name', 'created_at', 'updated_at'], 'safe'],
            [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,JPG,jpeg,JPEG,PNG'],
            ['crop_info', 'safe'],
            ['image_file', 'checkClickCrop'],
        ];
    }

    public function checkClickCrop($attribute, $params)
    {
      if($this->image_file != NULL && Json::decode($this->crop_info)==NULL){
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
            'seq' => Yii::t('app', 'Seq'),
            'image_file_name' => Yii::t('app', 'Banner'),
            'image_file' => Yii::t('app', 'Banner'),
            'text' => Yii::t('app', 'Text'),
            'url' => Yii::t('app', 'Website'),
            'url_target' => Yii::t('app', 'New Window'),
            'text' => Yii::t('app', 'Text'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated Dt'),
            'updated_UID' => Yii::t('app', 'Updated  Uid'),
        ];
    }

  public function saveContent(){
    if($this->save()){
      if($this->image_file!=NULL){
        $this->image_file_name = Config::BannerDisplayPath().$this->id.'.'.$this->image_file->getExtension().'?'.time();
        $this->save();
        $this->saveImage();
      }
      return true;
    }
    return false;
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
    $cropSizeImage = new Box(self::CROP_WIDTH, self::CROP_HEIGHT); //frame size of crop
    $cropPointImage = new Point($cropInfo['x'], $cropInfo['y']);
    $pathImage = Config::BannerPath()
        . '/'
        . $this->id
        . '.'
        . $this->image_file->getExtension();

    $image->resize($newSizeImage)
        ->crop($cropPointImage, $cropSizeImage)
        ->save($pathImage, ['quality' => 100]);
  }

  public function updateSeq(){
    $models =  Banner::find()
        ->orderBy('seq')
        ->all();
    $seq = 0;
    foreach($models as $model){
      $model->seq = $seq;
      $model->save();
      $seq++;
    }
  }
}
