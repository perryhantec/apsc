<?php

namespace common\models;

use Yii;

class Config extends \yii\db\ActiveRecord
{
    const TYPE_TEXT = 1;
    const TYPE_TEXTAREA = 2;
    const TYPE_HTML = 3;
    const TYPE_INT = 4;
    const TYPE_FLOAT = 5;

    public static function tableName()
    {
        return 'config';
    }

    public function rules()
    {
        return [
            [['value'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'key' => Yii::t('app', 'Key'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'remark' => Yii::t('app', 'Remark'),
            'backend_editable' => Yii::t('app', 'Backend Editable'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_UID' => Yii::t('app', 'Updated Uid'),
        ];
    }

    public function getValueAsInt()
    {
        return intval($this->value);
    }

    public function getValueAsFloat()
    {
        return floatval($this->value);
    }

    public function setValueByNumber($value)
    {
        $this->value = strval($value);
    }

    public static function getValueByKey($key, $defaultValue = null, $lockTable = false)
    {
        $db = Yii::$app->getDb();

        if ($lockTable)
            $db->createCommand('LOCK TABLES `config` WRITE')->execute();

        $model = self::findOne($key);
        if ($model == null && $defaultValue != null) {
            $model = new Config(['key' => $key, 'value' => $defaultValue]);
            $model->save();
        }

        if ($lockTable)
            $db->createCommand('UNLOCK TABLES')->execute();

        return $model != null ? $model->value : $defaultValue;
    }

    public static function getIncrementValueByKey($key, $defaultValue = null, $lockTable = false)
    {
        $db = Yii::$app->getDb();

        if ($lockTable)
            $db->createCommand('LOCK TABLES `config` WRITE')->execute();

        $model = self::findOne($key);

        if ($model == null)
            $model = new Config(['key' => $key, 'value' => strval($defaultValue)]);
        else
            $model->setValueByNumber($model->valueAsInt + 1);

        $successSave = $model->save();

        if ($lockTable)
            $db->createCommand('UNLOCK TABLES')->execute();

        return $successSave ? $model->valueAsInt : null;
    }

    // const LANG_DEFAULT = 'zh-TW'; // string only
    const LANG_DEFAULT = 'en'; // string only
    const LANG_SUPPORTED = ['zh-TW', 'zh-CN', 'en']; // must be an array

    //logo
    const LOGO_WIDTH = 1024;
    const LOGO_HEIGHT = 400;
    //icon
    const ICON_WIDTH = 100;
    const ICON_HEIGHT = 100;

    public static $fontSize = 's';

    public static function getLanguage() {
        if (!isset(Yii::$app->session['_lang']))
            return self::LANG_DEFAULT;
        else if (in_array(Yii::$app->session['_lang'], self::LANG_SUPPORTED))
            return Yii::$app->session['_lang'];
        return self::LANG_DEFAULT;
    }

    public static function refreshLanguageSetting() {
        if (isset($_GET['_lang']) && in_array($_GET['_lang'], self::LANG_SUPPORTED)) {
            Yii::$app->language = $_GET['_lang'];
            Yii::$app->session['lang'] = $_GET['_lang'];
        } else if (isset(Yii::$app->session['lang']) && in_array(Yii::$app->session['lang'], self::LANG_SUPPORTED)) {
            Yii::$app->language = Yii::$app->session['lang'];
        } else {
//             Yii::$app->language = Yii::$app->request->getPreferredLanguage(self::LANG_SUPPORTED);
            Yii::$app->language = Yii::$app->request->getPreferredLanguage(['zh-TW', 'zh-CN']);
        }
        return Yii::$app->language;
    }

    public static function getRequiredLanguageAttribute($attr_names) {
        if (self::LANG_DEFAULT == 'zh-TW')
            return $attr_names.'_tw';
        else if (self::LANG_DEFAULT == 'zh-CN')
            return $attr_names.'_cn';
        else if (self::LANG_DEFAULT == 'en')
            return $attr_names.'_en';
        return null;
    }

    public static function getRequiredLanguageAttributes($attr_names) {
        if (is_array($attr_names)) {
            $result = [];
            foreach ($attr_names as $attr_name) {
                $result = array_merge($result, self::getRequiredLanguageAttributes($attr_name));
            }
            return $result;

        } else {
            if (self::LANG_DEFAULT == 'zh-TW')
                return [$attr_names.'_tw'];
            else if (self::LANG_DEFAULT == 'zh-CN')
                return [$attr_names.'_cn'];
            else if (self::LANG_DEFAULT == 'en')
                return [$attr_names.'_en'];
            return [];
        }
    }

    public static function getAllLanguageAttributes($attr_names) {
        if (is_array($attr_names)) {
            $result = [];
            foreach ($attr_names as $attr_name) {
                $result = array_merge($result, self::getAllLanguageAttributes($attr_name));
            }
            return $result;

        } else {
            $result = self::getRequiredLanguageAttributes($attr_names);
            if (defined('self::LANG_SUPPORTED') && is_array(self::LANG_SUPPORTED)) {
                foreach (self::LANG_SUPPORTED as $lang) {
                    if ($lang == self::LANG_DEFAULT)
                        continue;

                    // if ($lang == self::LANG_DEFAULT)
                    //     continue;
                    // else if ($lang == 'zh-TW')
                    //     $result[] = $attr_names.'_tw';
                    // else if ($lang == 'zh-CN')
                    //     $result[] = $attr_names.'_cn';
                    // else if ($lang == 'en')
                    //     $result[] = $attr_names.'_en';
                }
            }
            return $result;
        }
    }

    public static function getNumberOfLanguage() {
        if (defined('self::LANG_SUPPORTED') && is_array(self::LANG_SUPPORTED)) {
            return sizeof(self::LANG_SUPPORTED);
        } else {
            return 0;
        }
    }

    public static function refreshFontSizeSetting() {
        if (isset($_GET['_fsize']) && in_array($_GET['_fsize'], ['s', 'm', 'l'])) {
            self::$fontSize = $_GET['_fsize'];
            Yii::$app->session['fsize'] = $_GET['_fsize'];
        } else if (isset(Yii::$app->session['fsize']) && in_array(Yii::$app->session['fsize'], ['s', 'm', 'l'])) {
            self::$fontSize = Yii::$app->session['fsize'];
        }
    }

    public static function checkLanguageSupported($lang) {
        if (in_array($lang, self::LANG_SUPPORTED))
            return true;
        return false;
    }

    public static function MenuBannerImagePath() {
        $path = Yii::getAlias('@content').'/title_banner/';
        self::checkFolderExist($path);
        return $path;
    }

    public static function MenuBannerImageDisplayPath() {
        $path = self::ContentDisplayPath().'title_banner/';
        //self::checkFolderExist($path);
        return $path;
    }

    public function MenuIconImagePath() {
        $path = Yii::getAlias('@content').'/menu/';
        self::checkFolderExist($path);
        return $path;
    }

    public function MenuIconImageDisplayPath() {
        $path = self::ContentDisplayPath().'menu/';
        //self::checkFolderExist($path);
        return $path;
    }

  //Path
  public static function PageType1FileThumbPath($id){
    $path = Yii::getAlias('@content').'/page/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType1FilePath($id){
    $path = Yii::getAlias('@content').'/page/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType1FileThumbDisplayPath($id){
    $path = self::ContentDisplayPath().'page/'.$id.'/thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType1FileDisplayPath($id){
    $path = self::ContentDisplayPath().'page/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType2FilePath($id){
    $path = Yii::getAlias('@content').'/video/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType2FileDisplayPath($id){
    $path = self::ContentDisplayPath().'video/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType2ImagePath(){
    $path = Yii::getAlias('@content').'/video/thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType2ImageDisplayPath(){
    $path = self::ContentDisplayPath().'video/thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType3FolderPath($id){
    $path = Yii::getAlias('@content').'/gallery/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType3FolderDisplayPath($id){
    $path = self::ContentDisplayPath().'gallery/'.$id.'/';
    return $path;
  }
  public static function PageType3ThumbFolderPath($id){
    $path = Yii::getAlias('@content').'/gallery/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType3ThumbFolderDisplayPath($id){
    $path = self::ContentDisplayPath().'gallery/'.$id.'/thumb/';
    return $path;
  }
  public static function PageType4FilePath($id){
    $path = Yii::getAlias('@content').'/organizer/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType4FileThumbPath($id){
    $path = Yii::getAlias('@content').'/organizer/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType4FileDisplayPath($id){
    $path = self::ContentDisplayPath().'organizer/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType4FileDisplayThumbPath($id){
    $path = self::ContentDisplayPath().'organizer/'.$id.'/thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType4ImagePath(){
    $path = Yii::getAlias('@content').'/organizer/image/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType4ImageDisplayPath(){
    $path = self::ContentDisplayPath().'organizer/image/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType5FilePath($id){
    $path = Yii::getAlias('@content').'/committee/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType5ThumbPath($id){
    $path = self::PageType5FilePath($id);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType5FileDisplayPath($id){
    $path = self::ContentDisplayPath().'committee/'.$id.'/';
    return $path;
  }
  public static function PageType5ThumbDisplayPath($id){
    $path = self::PageType5FileDisplayPath($id);
    $path .= 'thumb/';
    return $path;
  }

  public static function PageType6ImagePath(){
    $path = self::ContentPath().'banner_image/';
    self::checkFolderExist($path);
    return $path;
  }

  public static function PageType6ImageDisplayPath(){
    $path = self::ContentDisplayPath().'banner_image/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType7FileThumbPath($id){
    $path = Yii::getAlias('@content').'/president/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType7FilePath($id){
    $path = Yii::getAlias('@content').'/president/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function PageType7FileThumbDisplayPath($id){
    $path = self::ContentDisplayPath().'president/'.$id.'/thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function PageType7FileDisplayPath($id){
    $path = self::ContentDisplayPath().'president/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function checkFolderExist($path){
    if(!file_exists($path))
        if(!mkdir($path, 0777, true))
            throw new CHttpException(404, 'Directory create error!');
  }

  public static function chmodFile($path){
    if(file_exists($path))
        chmod($path, 0777);
    return true;
  }

  //content
  public static function ContentPath(){
    $path = Yii::getAlias('@content').'/';
    self::checkFolderExist($path);
    return $path;
  }

  public static function ContentDisplayPath(){
    $basename_temp = basename(Yii::getAlias('@web'));
    $name_array = ['admin'];
    if(in_array($basename_temp, $name_array)){
      if(dirname(Yii::getAlias('@web'))!='/'){
        $path = dirname(Yii::getAlias('@web')).'/'.basename(Yii::getAlias('@content')).'/';
      }else{
        $path = '/'.basename(Yii::getAlias('@content')).'/';
      }
    }else{
      $path = Yii::getAlias('@web').'/'.basename(Yii::getAlias('@content')).'/';
    }
    return $path;
  }
  //general
  public static function GeneralPath(){
    $path = self::ContentPath().'general/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function ContactUsPath(){
    $path = self::ContentPath().'contact_us/';
    self::checkFolderExist($path);
    return $path;
  }

  //banner
  public static function BannerPath(){
    $path = self::ContentPath().'banners/';
    self::checkFolderExist($path);
    return $path;
  }

  public static function BannerDisplayPath(){
    $path = self::ContentDisplayPath().'banners/';
    //self::checkFolderExist($path);
    return $path;
  }
  //logo
  public static function LogoPath(){
    $path = self::ContentPath().'logo/';
    self::checkFolderExist($path);
    return $path;
  }

  public static function LogoDisplayPath(){
    $path = self::ContentDisplayPath().'logo/';
    //self::checkFolderExist($path);
    return $path;
  }

  public static function ProductPicPath($id){
    $path = Yii::getAlias('@content').'/product/';
//     self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function ProductPicThumbPath($id){
    $path = self::ProductPicPath($id);
    $path .= 'pic_thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function ProductThumbFilePath($id){
    $path = self::ProductPicPath($id);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function ProductPicDisplayPath($id){
    $path = self::ContentDisplayPath().'product/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function ProductPicThumbDisplayPath($id){
    $path = self::ContentDisplayPath().'product/'.$id.'/pic_thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function ProductThumbDisplayThumbPath($id){
    $path = self::ContentDisplayPath().'product/'.$id.'/thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function MemberMessageFilePath($id){
    $path = Yii::getAlias('@content').'/message/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function MemberMessageFileThumbPath($id){
    $path = Yii::getAlias('@content').'/message/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    $path .= 'thumb/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function MemberMessageFileDisplayPath($id){
    $path = self::ContentDisplayPath().'message/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function MemberMessageFileDisplayThumbPath($id){
    $path = self::ContentDisplayPath().'message/'.$id.'/thumb/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function MemberMessageImagePath(){
    $path = Yii::getAlias('@content').'/message/image/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function MemberMessageImageDisplayPath(){
    $path = self::ContentDisplayPath().'message/image/';
    //self::checkFolderExist($path);
    return $path;
  }

  public static function HomeProductThumbFilePath($id){
    $path = Yii::getAlias('@content').'/home_product/';
//     self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function HomeProductThumbFileDisplayPath($id){
    $path = self::ContentDisplayPath().'home_product/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function CallForAbstractFilePath($id){
    $path = Yii::getAlias('@content').'/call_for_abstract/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function CallForAbstractFileDisplayPath($id){
    $path = self::ContentDisplayPath().'call_for_abstract/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }
  public static function RegistrationFilePath($id){
    $path = Yii::getAlias('@content').'/registration/';
    self::checkFolderExist($path);
    $path .= $id.'/';
    self::checkFolderExist($path);
    return $path;
  }
  public static function RegistrationFileDisplayPath($id){
    $path = self::ContentDisplayPath().'registration/'.$id.'/';
    //self::checkFolderExist($path);
    return $path;
  }

}
