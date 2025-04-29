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
 * This is the model class for table "page_type1".
 */
class PageType5 extends \common\components\BaseActiveRecord
{
    // const HAVE_IMAGE_TUMB = true;
    const HAVE_IMAGE_TUMB = false;

    public $upload_files=[];
    public $old_file_names=[];

    // public $crop_info;

    // public $crop_width;
    // public $crop_height;

    // const CROP_WIDTH = 150;
    // const CROP_HEIGHT = 196;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_type5';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MID', 'status', 'updated_UID'], 'integer'],
            [Yii::$app->config->getRequiredLanguageAttributes('content'), 'required'],
            [['content_tw', 'content_cn', 'content_en'], 'string'],
            // [['upload_files', 'created_at', 'updated_at', 'old_file_names'], 'safe'],
            [['created_at', 'updated_at', 'old_file_names'], 'safe'],
            // [['upload_files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg' , 'maxFiles' => 5],
            [['MID'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['MID' => 'id']],

            // [['upload_files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,JPG,jpeg,JPEG,PNG'],
            // [['crop_width', 'crop_height'], 'integer'],
            // [['crop_info', 'file_names'], 'safe'],
            ['upload_files', 'checkFileType'],

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
            'content_tw' => Yii::t('app', 'Content').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'content_cn' => Yii::t('app', 'Content').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'content_en' => Yii::t('app', 'Content').' '.Yii::t('app', '(English Version)'),
            'file_names' => Yii::t('app', 'Images'),
            'upload_files' => Yii::t('app', 'Images'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_UID' => Yii::t('app', 'Updated  Uid'),
        ];
    }

    public function checkFileType($attribute, $params)
    {
        if($this->upload_files != NULL){
            $ufs = UploadedFile::getInstances($this, 'upload_files');

            $pass = true;
            $pass_list = ['png','PNG','jpg','JPG','jpeg','JPEG'];

            if (count($ufs) > 0) {
                foreach($ufs as $k=>$v){
                    if (!in_array($v->extension, $pass_list)) {
                        $pass = false;
                    }
                }    
            }

            if (!$pass) {
                $this->addError($attribute, '只能選擇 png, jpg 或 jpeg');
            }
            // echo $this->upload_files[0]['image']->crop_info;
            // echo 'abc';
            // exit();

            // if($ufs != NULL && Json::decode($this->crop_info)[0]==NULL){
            //     $this->addError($attribute, '請按裁剪');
            // }
        }
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        
        if ($this->isAttributeChanged('file_names')) {
            $this->file_names = $this->file_names ? $this->file_names : [];
            $this->file_names = json_encode($this->file_names, JSON_UNESCAPED_UNICODE);
        }

        return true;
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->file_names = json_decode($this->file_names, true);
        if (!is_array($this->file_names)) $this->file_names = [];

        if ($this->file_names) {

            $upload_files = [];
            $i = 0;

            foreach ($this->file_names as $file_name) {
                    $upload_files[$i]['title'] = $file_name['title'];

                    if (isset($file_name['detail']) && count($file_name['detail']) > 0) {
                        $j = 0;
                        foreach ($file_name['detail'] as $detail) {
                            $upload_files[$i]['detail'][$j]['name'] = $detail['name'];
                            $upload_files[$i]['detail'][$j]['show_image'] = $detail['image'] ? $this->fileDisplayPath.$detail['image'] : '';
                            $upload_files[$i]['detail'][$j]['old_image'] = $detail['image'] ? $detail['image'] : '';

                            $j++;
                        }
                    }

                    $i++;
            }

            $this->upload_files = $upload_files;
        }
    }

    public function saveContent()
    {
        if ($this->upload_files!=NULL) {
            $ufs = UploadedFile::getInstances($this, 'upload_files');
        }

        // Definitions::dd($ups);
        // Definitions::dd($this->upload_files,1);

        // if ($this->upload_files!=NULL) {
        //     $this->upload_files = UploadedFile::getInstances($this, 'upload_files');
        // }

        if ($this->validate()) {

            $file_names=[];
            // foreach ($this->old_file_names as $file_name) {
            //     if ($file_name != "")
            //         $file_names[] = $file_name;
            // };

            // $this->file_names = json_encode($file_names, JSON_UNESCAPED_UNICODE);

/*
            if($this->upload_files!=NULL){
                foreach($this->upload_files as $k=>$v){
                    $file_names[] = $v->baseName.'.'.$v->extension;
                }
            }
            $this->file_names = json_encode($file_names, JSON_UNESCAPED_UNICODE);
*/

            if ($this->save()) {
                if ($this->upload_files!=NULL) {
                    foreach($ufs as $k=>$v){
                        $_filename = Yii::$app->security->generateRandomString(32) . '_' . time().'.'.$v->extension;

                        // Image::thumbnail($v->tempName, 740, null)
                        //     ->save($this->fileThumbPath.$_filename, ['quality' => 100]);

                        $v->saveAs($this->filePath.$_filename);
/*
                        $image = Image::getImagine()->open($v->tempName);

                        // rendering information about crop of ONE option
                        $cropInfo = Json::decode($this->crop_info)[$k];

                        Definitions::dd($cropInfo,1);

                        $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
                        $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
                        $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
                        $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y
                
                        //saving the image
                        $newSizeImage = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
                        $cropSizeImage = new Box($this->crop_width, $this->crop_height); //frame size of crop
                        $cropPointImage = new Point($cropInfo['x'], $cropInfo['y']);
                        // $pathImage = $this->imagePath . '0.' . $this->image_file->getExtension();
                
                        $image->resize($newSizeImage)
                            ->crop($cropPointImage, $cropSizeImage)
                            // ->save($pathImage, ['quality' => 100]);
                            ->save($_filename, ['quality' => 100]);
*/
                        $file_names[] = $_filename;
                    }

                    $i = 0;
                    foreach ($this->upload_files as $j => $upload_files) {
                        if (isset($upload_files['detail']) && count($upload_files['detail']) > 0) {
                            foreach ($upload_files['detail'] as $k => $upload_file) {
                                if ($upload_file['new_image']) {
                                    $this->upload_files[$j]['detail'][$k]['image'] = $file_names[$i];
    
                                    $i++;
                                } else {
                                    if ($upload_file['delete_image']) {
                                        $this->upload_files[$j]['detail'][$k]['image'] = '';
                                    } else {
                                        if ($upload_file['old_image']) {
                                            $this->upload_files[$j]['detail'][$k]['image'] = $upload_file['old_image'];
                                        } else {
                                            $this->upload_files[$j]['detail'][$k]['image'] = '';
                                        }
                                    }
                                }
                                unset($this->upload_files[$j]['detail'][$k]['new_image']);
                                unset($this->upload_files[$j]['detail'][$k]['delete_image']);
                                unset($this->upload_files[$j]['detail'][$k]['old_image']);
                            }    
                        }
                    }

                    // $this->file_names = json_encode($this->upload_files, JSON_UNESCAPED_UNICODE);
                    $this->file_names = $this->upload_files;

                    $this->save(false);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function getFileThumbPath(){
        return Config::PageType5FileThumbPath($this->id);
    }

    public function getFileThumbDisplayPath(){
        return Config::PageType5FileThumbDisplayPath($this->id);
    }

    public function getFilePath(){
        return Config::PageType5FilePath($this->id);
    }

    public function getFileDisplayPath(){
        return Config::PageType5FileDisplayPath($this->id);
    }

    public function getFiles(){
        return $this->hasMany(PageType4File::className(), ['MID' => 'id']);
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'MID']);
    }

    public function getContent(){
        if (Yii::$app->language == 'en' && !empty($this->content_en)){
            return $this->content_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->content_cn)){
            return $this->content_cn;
        }
        return $this->content_tw;
    }
}
