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
class PageType1 extends \common\components\BaseActiveRecord
{
    // const HAVE_IMAGE_TUMB = true;
    // const HAVE_IMAGE_TUMB = false;

    public $old_pic;
    public $upload_files=[];
    public $picture_file_names=[];

    const SORTABLE_DELIMITER = "||||||||||";

    // public $upload_files=[];
    // public $old_file_names=[];

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
        return 'page_type1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MID', 'status', 'updated_UID'], 'integer'],
            [Yii::$app->config->getRequiredLanguageAttributes('content'), 'required'],
            [['file_names', 'summary_tw', 'summary_cn', 'summary_en', 'content_tw', 'content_cn', 'content_en'], 'string'],
            // [['upload_files', 'created_at', 'updated_at', 'old_file_names'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            // [['upload_files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg' , 'maxFiles' => 5],
            [['MID'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['MID' => 'id']],

            // [['upload_files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,JPG,jpeg,JPEG,PNG'],
            // [['crop_width', 'crop_height'], 'integer'],
            // [['crop_info', 'file_names'], 'safe'],
            // ['upload_files', 'checkFileType'],
            [['picture_file_names', 'old_pic'], 'safe'],
            [['upload_files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif' , 'maxFiles' => 4],


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
            'summary_tw' => '摘要 '.Yii::t('app', '(Traditional Chinese Version)'),
            'summary_cn' => '摘要 '.Yii::t('app', '(Simplified Chinese Version)'),
            'summary_en' => '摘要 '.Yii::t('app', '(English Version)'),
            'content_tw' => Yii::t('app', 'Content').' '.Yii::t('app', '(Traditional Chinese Version)'),
            'content_cn' => Yii::t('app', 'Content').' '.Yii::t('app', '(Simplified Chinese Version)'),
            'content_en' => Yii::t('app', 'Content').' '.Yii::t('app', '(English Version)'),
            // 'pic' => Yii::t('app', 'Images'),
            // 'upload_files' => Yii::t('app', 'Images'),
            // 'old_pic' => Yii::t('app', 'Picture'),
            'file_names' => Yii::t('app', 'Picture'),
            'upload_files' => Yii::t('app', 'Picture'),

            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_UID' => Yii::t('app', 'Updated  Uid'),
        ];
    }

    // public function checkFileType($attribute, $params)
    // {
    //     if($this->upload_files != NULL){
    //         $ufs = UploadedFile::getInstances($this, 'upload_files');

    //         $pass = true;
    //         $pass_list = ['png','PNG','jpg','JPG','jpeg','JPEG'];

    //         if (count($ufs) > 0) {
    //             foreach($ufs as $k=>$v){
    //                 if (!in_array($v->extension, $pass_list)) {
    //                     $pass = false;
    //                 }
    //             }    
    //         }

    //         if (!$pass) {
    //             $this->addError($attribute, '只能選擇 png, jpg 或 jpeg');
    //         }
    //         // echo $this->upload_files[0]['image']->crop_info;
    //         // echo 'abc';
    //         // exit();

    //         // if($ufs != NULL && Json::decode($this->crop_info)[0]==NULL){
    //         //     $this->addError($attribute, '請按裁剪');
    //         // }
    //     }
    // }

    // public function beforeSave($insert)
    // {
    //     if (!parent::beforeSave($insert)) {
    //         return false;
    //     }
        
    //     // if ($this->isAttributeChanged('file_names')) {
    //     //     $this->file_names = $this->file_names ? $this->file_names : [];
    //     //     $this->file_names = json_encode($this->file_names, JSON_UNESCAPED_UNICODE);
    //     // }

    //     return true;
    // }

    public function afterFind()
    {
        parent::afterFind();

        if (!empty($this->file_names)) {
            $this->picture_file_names = json_decode($this->file_names, true);
            // $this->old_pic = $this->picture_file_names;
        }
        /*
        $this->file_names = json_decode($this->file_names, true);
        if (!is_array($this->file_names)) $this->file_names = [];

        if ($this->file_names) {

            $upload_files = [];
            $i = 0;

            foreach ($this->file_names as $file_name) {
                    $upload_files[$i]['name'] = $file_name['name'];
                    $upload_files[$i]['title'] = $file_name['title'];
                    $upload_files[$i]['organization'] = $file_name['organization'];
                    // $upload_files[$i]['has_image'] = $file_name['has_image'];
                    // $upload_files[$i]['image'] = 'http://localhost/apsc/content/page/1/'.$file_name['image'];


                    $upload_files[$i]['show_image'] = $file_name['image'] ? $this->fileDisplayPath.$file_name['image'] : '';
                    $upload_files[$i]['old_image'] = $file_name['image'] ? $file_name['image'] : '';

                    $i++;
            }

            $this->upload_files = $upload_files;
        }
        */
    }

    public function saveContent()
    {
        if ($this->upload_files!=NULL) {
            // $ufs = UploadedFile::getInstances($this, 'upload_files');
            $this->upload_files = UploadedFile::getInstances($this, 'upload_files');
        }
        // $this->pic_upload = UploadedFile::getInstances($this, 'pic_upload');

        // Definitions::dd($ups);
        // Definitions::dd($this->upload_files,1);

        // if ($this->upload_files!=NULL) {
        //     $this->upload_files = UploadedFile::getInstances($this, 'upload_files');
        // }

        if ($this->validate()) {

            $file_names=[];
            // Definitions::dd($this->picture_file_names,1);
            foreach ($this->picture_file_names as $file_name) {
                if ($file_name != "")
                    $file_names[] = $file_name;
            }
                // $this->file_names = json_encode($file_names, JSON_UNESCAPED_UNICODE);
            // foreach ($this->old_file_names as $file_name) {
            //     if ($file_name != "")
            //         $file_names[] = $file_name;
            // };
            $this->file_names = json_encode($file_names, JSON_UNESCAPED_UNICODE);
            // $this->file_names = json_encode($file_names);

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
                    foreach($this->upload_files as $k=>$v){
                        $_filename = Yii::$app->security->generateRandomString(32) . '_' . time().'.'.$v->extension;
                        $v->saveAs($this->filePath.$_filename);

                        // $v->saveAs(Config::ProductPicPath($this->id).$v->name);
                        // $_pic[] = $v->name;
                        $file_names[] = $_filename;
                    }

                    $this->file_names = json_encode($file_names, JSON_UNESCAPED_UNICODE);
                    // $this->file_names = json_encode($file_names);

                    $this->save(false);
                }

                /*
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
*
                        $file_names[] = $_filename;
                    }

                    $i = 0;
                    foreach ($this->upload_files as $k => $upload_file) {
                        if ($upload_file['new_image']) {
                            $this->upload_files[$k]['image'] = $file_names[$i];

                            $i++;
                        } else {
                            if ($upload_file['delete_image']) {
                                $this->upload_files[$k]['image'] = '';
                            } else {
                                if ($upload_file['old_image']) {
                                    $this->upload_files[$k]['image'] = $upload_file['old_image'];
                                } else {
                                    $this->upload_files[$k]['image'] = '';
                                }
                            }
                        }
                        unset($this->upload_files[$k]['new_image']);
                        unset($this->upload_files[$k]['delete_image']);
                        unset($this->upload_files[$k]['old_image']);
                    }

                    // $this->file_names = json_encode($this->upload_files, JSON_UNESCAPED_UNICODE);
                    $this->file_names = $this->upload_files;

                    $this->save(false);
                }
                */
            }
            return true;
        } else {
            return false;
        }
    }

    public function getFileThumbPath(){
        return Config::PageType1FileThumbPath($this->id);
    }

    public function getFileThumbDisplayPath(){
        return Config::PageType1FileThumbDisplayPath($this->id);
    }

    public function getFilePath(){
        return Config::PageType1FilePath($this->id);
    }

    public function getFileDisplayPath(){
        return Config::PageType1FileDisplayPath($this->id);
    }

    public function getFiles(){
        return $this->hasMany(PageType4File::className(), ['MID' => 'id']);
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'MID']);
    }

    public function getSummary(){
        if (Yii::$app->language == 'en' && !empty($this->summary_en)){
            return $this->summary_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->summary_cn)){
            return $this->summary_cn;
        }
        return $this->summary_tw;
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
