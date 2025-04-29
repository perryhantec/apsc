<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\Menu;
use common\models\Config;
use common\models\General;
use yii\helpers\ArrayHelper;
use common\components\UploadedFile;
use frontend\models\UploadForm;

use common\models\User;
use common\models\CallForAbstract;
use common\models\Definitions;
use frontend\models\UserContactForm;
use frontend\models\UserAccountForm;
use frontend\models\UserAbstractForm;

/**
 * Site controller
 */
class MyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
			            'class' => AccessRule::className(),
			        ],
                'rules' => [
                    [
                        'actions' => [
                                        'index', 'detail', 'upload', 'upload-detail',
                                        'application', 'application-view', 'application-update',
                                        'home', 'contact', 'abstract-form', 'check-form', 'upload-file', 'edit', 'account', 'delete',
                                    ],
                        'allow' => true,
                        'roles' => ['$'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'logout' => ['post'],
                ],
            ],
        ];
    }

    function init()
    {
        parent::init();
        // Config::RefreshSetting();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['home']);
        // return $this->render('index', [
        // ]);
    }

    public function actionHome()
    {
        return $this->render('home', []);
    }

    public function actionContact()
    {
        $model = UserContactForm::findOne(Yii::$app->user->id);

        if ($model == null)
            throw new \yii\web\HttpException(400, Yii::t('app', 'Error! Please try again.'));

        if ($model->load(Yii::$app->request->post()) && $model->submit()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully save changes.'));
            return $this->redirect(['/my/contact']);
        }

        if ($model->email == '') {
            $model->email = $model->username;
        } else {
            $model->re_email = $model->email;
        }
        if ($model->country == '') $model->country = $model::COUNTRY_HK;

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionAccount()
    {
        $model = UserAccountForm::findOne(Yii::$app->user->id);

        if ($model == null)
            throw new \yii\web\HttpException(400, Yii::t('app', 'Error! Please try again.'));

        if ($model->load(Yii::$app->request->post()) && $model->submit()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully save changes.'));
            // Yii::$app->session->setFlash('success', '資料已傳送，請等待管理員審批，成功批核將不會另行通知。如更改密碼則更改成功（毋須審批）');
            return $this->redirect(['/my/account']);
        }

        $model->old_password = null;
        $model->new_password = null;
        $model->re_new_password = null;

        return $this->render('account', [
            'model' => $model
        ]);
    }

    public function actionAbstractForm($id = false, $first = false)
    {
        if ($id) {
            $model = UserAbstractForm::findOne($id);

            if ($model->user_id != Yii::$app->user->id) {
                throw new \yii\web\HttpException(400, Yii::t('app', 'Error! Please try again.'));
            }

            if ($first) {
                $affiliations = [];
                $affiliations[0]['affiliation'] = $model->user->institution;
                $affiliations[0]['country'] = Definitions::getCountry($model->user->country);
    
                $model->affiliation = $affiliations;
    
                $authors = [];
                $authors[0]['tle'] = Definitions::getPrefix($model->user->title);
                $authors[0]['first_name'] = $model->user->first_name;
                $authors[0]['last_name'] = $model->user->last_name;
                $authors[0]['is_presenter'] = 1;
                $authors[0]['organization'] = $model->user->institution;
                $authors[0]['affiliations'] = 1;
    
                $model->author = $authors;
            }
            if ($model->abstract_status == $model::ABSTRACT_STATUS_SUBMITTED) {
                $model->terms = 1;
                $model->terms_2 = 1;
            }
        } else {
            $is_ab_editable = Definitions::getIsAbstractEditable();

            if ($is_ab_editable) {
                $abstract_model = new CallForAbstract();
                $abstract_model->user_id = Yii::$app->user->id;
                $abstract_model->abstract_status = $abstract_model::ABSTRACT_STATUS_DRAFT;
                $abstract_model->save();

                $abstract_model->abstract_no = Definitions::setCode($abstract_model::ABSTRACT_NO_PREFIX, $abstract_model::ABSTRACT_NO_LENGTH, $abstract_model->id);
                $abstract_model->updateAttributes(['abstract_no']);

                return $this->redirect(['/my/abstract-form', 'id' => $abstract_model->id, 'first' => 1]);
            } else {
                $model = new UserAbstractForm();
                $model->user_id = Yii::$app->user->id;
                $model->abstract_status = $model::ABSTRACT_STATUS_DRAFT;
            }
            /*
            $model = UserAbstractForm::findOne($abstract_model->id);
            $id = $abstract_model->id;

            $affiliations = [];
            $affiliations[0]['affiliation'] = $model->user->institution;
            $affiliations[0]['country'] = Definitions::getCountry($model->user->country);

            $model->affiliation = $affiliations;

            $authors = [];
            $authors[0]['tle'] = Definitions::getPrefix($model->user->title);
            $authors[0]['first_name'] = $model->user->first_name;
            $authors[0]['last_name'] = $model->user->last_name;
            $authors[0]['is_presenter'] = 1;
            $authors[0]['organization'] = $model->user->institution;
            $authors[0]['affiliations'] = 1;

            $model->author = $authors;
            */
        }

        if ($model == null)
            throw new \yii\web\HttpException(400, Yii::t('app', 'Error! Please try again.'));

        if ($model->load(Yii::$app->request->post())) {
            $model->file_name = \yii\web\UploadedFile::getInstance($model, 'file_name');

            // Definitions::dd($model->file_name, 1);

            if ($model->submit()) {
                return $this->redirect(['/my/edit']);
            }
        }

        return $this->render('abstract-form', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    public function actionCheckForm()
    {
        // $data = json_encode(Yii::$app->request->post('data'));
        // return $data;


        $rslt = [];
        $opers = ['','','','','','',''];

        $is_ab_editable = Definitions::getIsAbstractEditable();

        if (Yii::$app->request->post() && $is_ab_editable) {
            $datum = Yii::$app->request->post('data');

            foreach ($datum as $data) {
                $pos = strrpos($data['name'], '[') + 1;
                $name = substr($data['name'], $pos, -1);

                if ($name == 'title')              $title              = $data['value'];
                if ($name == 'present_type')       $present_type       = $data['value'];
                if ($name == 'keyword_1')          $keyword_1          = $data['value'];
                if ($name == 'keyword_2')          $keyword_2          = $data['value'];
                if ($name == 'keyword_3')          $keyword_3          = $data['value'];
                if ($name == 'theme')              $theme              = $data['value'];
                if ($name == 'affiliation_2')      $affiliation_2      = json_decode($data['value'], true);
                if ($name == 'author_2')           $author_2           = json_decode($data['value'], true);
                if ($name == 'content')            $content            = $data['value'];
                if ($name == 'file_remove')        $file_remove        = $data['value'];
                if ($name == 'is_young')           $is_young           = $data['value'];
                if ($name == 'terms')              $terms              = $data['value'];
                if ($name == 'is_registered')      $is_registered      = $data['value'];
                if ($name == 'terms_2')            $terms_2            = $data['value'];
                if ($name == 'id')                 $id                 = $data['value'];
                if ($name == 'title_word_count')   $title_word_count   = $data['value'];
                if ($name == 'content_word_count') $content_word_count = $data['value'];
            }

            $abstract_model = UserAbstractForm::findOne(['id' => $id, 'user_id' => Yii::$app->user->id]);

            if ($abstract_model) {   
                // $name = UploadedFile::getInstanceByName('AOASO.jpg');
                // $name = ArrayHelper::getValue(array_keys(UploadedFile::getFiles()), 0);
                // $abstract_model->file_name = UploadedFile::getInstanceByName($name);
                // // $name = json_encode(UploadedFile::getFiles());
                // // $name = ArrayHelper::getValue(array_keys(UploadedFile::getFiles()), 0);
                // // $_file_name =  \yii\web\UploadedFile::getInstance($abstract_model, 'file_name');
                // return $name;

                /**** Error case ****/
                $errors = [];
    
                if (!$title)                    $errors['title_1'] = 'Title required.';
                if ($title_word_count > 50)     $errors['title_2'] = 'Title exceed 50 words.';
                if (!$present_type)             $errors['ptype'] = 'Presentation Type required.';
                if (!$theme)                    $errors['theme'] = 'Theme required.';
                if (!$author_2)                 $errors['author_1'] = 'At least one author required.';
                if (!$content)                  $errors['content_1'] = 'Abstract required.';
                if ($content_word_count > 300)  $errors['content_2'] = 'Abstract exceed 300 words.';
                if (!$is_young)                 $errors['is_young'] = 'Young Investigator Award required.';
                if (!$terms)                    $errors['terms'] = 'Terms and Conditions required.';
                if (!$is_registered)            $errors['is_registered'] = 'Terms and Conditions (A) required.';

                // if (isset($is_registered) && !$is_registered || !isset($is_registered)) {
                //     $errors['is_registered'] = 'Terms and Conditions (A) required.';
                // }
                if (!$terms_2)                  $errors['terms_2'] = 'Terms and Conditions (B) required.';

                $miss_affiliation_list = [];

                $i = 1;
                foreach ($affiliation_2 as $affiliation) {
                    if (!$affiliation['affiliation']) {
                        $miss_affiliation_list[] = 'Affiliation '.$i;
                    }
    
                    $i++;
                }

                if ($miss_affiliation_list)     $errors['affl'] = 'Affiliation required for '.implode(', ',$miss_affiliation_list).'.';

                $miss_author_list = [];
                $invalid_author_list = [];
                $total_affiliation = count($affiliation_2);

                $i = 1;
                foreach ($author_2 as $author) {
                    if (!$author['last_name']) {
                        $miss_author_list[] = 'Author '.$i;
                    }

                    if ($author['affiliations'] && !($author['affiliations'] >= 1 && $author['affiliations'] <= $total_affiliation)) {
                        $invalid_author_list[] = 'Author '.$i;
                    }

                    $i++;
                }

                if ($miss_author_list)          $errors['author_2'] = 'Last Name required for '.implode(', ',$miss_author_list).'.';
                if ($invalid_author_list)       $errors['author_3'] = 'Invalid author affiliations number for '.implode(', ',$invalid_author_list).'.';

                /**** Tick and cross ****/
                if ($title || $present_type) {
                    if ($title) {
                        $opers[0] = !($title_word_count > 50) && $present_type ? 2 : 1;
                    }
                    if ($present_type) {
                        $opers[0] = !($title_word_count > 50) && $title ? 2 : 1;
                    }
                }

                if ($theme) {
                    $opers[1] = 2;
                }

                if ($author_2 && !$miss_affiliation_list && !$invalid_author_list && !$miss_author_list) {
                    $opers[2] = 2;
                } else {
                    $opers[2] = 1;
                }

                if ($content) {
                    $opers[3] = !($content_word_count > 300) ? 2 : 1;
                }

                if ($is_young) {
                    $opers[4] = 2;
                }

                if ($terms && $is_registered && $terms_2) {
                    $opers[5] = 2;
                }
    
                $abstract_model->title = $title;
                $abstract_model->present_type = $present_type;
                $abstract_model->keyword_1 = $keyword_1;
                $abstract_model->keyword_2 = $keyword_2;
                $abstract_model->keyword_3 = $keyword_3;
                $abstract_model->theme = $theme;

                /**** Save db and print review for affl and author ****/
                $affiliation_db = $affiliation_review_list = [];
                foreach ($affiliation_2 as $k => $arr) {
                    $key = $k + 1;
                    $affiliation_db["$key"] = $arr;

                    $affiliation_temp = [];
                    if ($arr['affiliation']) array_push($affiliation_temp, $arr['affiliation']);
                    if ($arr['city'])        array_push($affiliation_temp, $arr['city']);
                    if ($arr['state'])       array_push($affiliation_temp, $arr['state']);
                    if ($arr['country'])     array_push($affiliation_temp, $arr['country']);

                    if ($affiliation_temp) {
                        $affiliation_review_list[] = [
                            'row' =>  $key,
                            'data' => implode(', ',$affiliation_temp),
                        ];
                    }
                }

                $abstract_model->affiliation = $affiliation_db;

                $author_db = $author_review_list = [];
                foreach ($author_2 as $k => $arr2) {
                    $key = $k + 1;
                    $author_db["$key"] = $arr2;

                    $author_temp = [];
                    // if ($arr2['first_name'])  array_push($author_temp, strtoupper($arr2['first_name'][0]));
                    if ($arr2['first_name'])  array_push($author_temp, $arr2['first_name']);
                    if ($arr2['last_name'])   array_push($author_temp, $arr2['last_name']);

                    if ($author_temp) {
                        $author_review_list[] = [
                            'row' =>  $arr2['affiliations'],
                            'data' => implode(' ',$author_temp),
                        ];
                    }
                }

                $abstract_model->author = $author_db;

                $abstract_model->content = $content;

                /**** Remove file ****/
                if ($file_remove == 'true') {
                    $abstract_model->abstract_file_name = '';
                }

                $abstract_model->is_young = $is_young;
                $abstract_model->is_registered = $is_registered;

                $abstract_model->save();

                // $name = ArrayHelper::getValue(array_keys(UploadedFile::getFiles()), 0);
                // $name = array_keys(UploadedFile::getFiles());
                // $abstract_model->file_name = UploadedFile::getInstanceByName($name);
/*
                $abstract_model->file_name = \yii\web\UploadedFile::getInstance($file_name);

                if ($abstract_model->file_name != NULL) {
                    $_file_name = $abstract_model->file_name->baseName.'.'.$abstract_model->file_name->extension;
                    $abstract_model->abstract_file_name = $abstract_model->fileDisplayPath.$_file_name;
                }
    // //                 }
                $abstract_model->save();

                if ($abstract_model->file_name!=NULL) {
                    $abstract_model->abstract_file_name = $abstract_model->filePath.$_file_name;
                    $abstract_model->file_name->saveAs($abstract_model->abstract_file_name);
                    // $this->save();
                }
*/
                if (count($errors) > 0) {
                    if ($abstract_model->abstract_status == $abstract_model::ABSTRACT_STATUS_SUBMITTED) {
                        $abstract_model->abstract_status = $abstract_model::ABSTRACT_STATUS_DRAFT;
                        $abstract_model->save();                        
                    }

                    $rslt['code'] = -1;
                    $rslt['errors'] = $errors;
                } else {
                    $rslt['code'] = 1;
                    /**** Tick review on left nav only if no error ****/
                    $opers[6] = 2;
                }
            } else {
                $rslt['code'] = 0;
            }
        } else {
            $rslt['code'] = 0;
        }

        $rslt['opers'] = $opers;
        $rslt['tle'] = $title;
        $rslt['affls'] = $affiliation_review_list;
        $rslt['auts'] = $author_review_list;
        $rslt['abst'] = nl2br($content);
          
        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'rslt' => $rslt,
            ],
        ]);
    }

    public function actionUploadFile($id)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
      
            $name = ArrayHelper::getValue(array_keys(UploadedFile::getFiles()), 0);
      
            $abstract_model = UserAbstractForm::findOne(['id' => $id, 'user_id' => Yii::$app->user->id]);
            // $abstract_model->file_name = [UploadedFile::getInstanceByName($name)];
            $abstract_model->file_name = UploadedFile::getInstanceByName($name);

            if ($abstract_model->file_name != NULL) {
                $_file_name = $abstract_model->file_name->baseName.'.'.$abstract_model->file_name->extension;
                $abstract_model->abstract_file_name = $abstract_model->fileDisplayPath.$_file_name;
            }    

            $abstract_model->save();

            if ($abstract_model->file_name!=NULL) {
                $abstract_model->abstract_file_name = $abstract_model->filePath.$_file_name;
                $abstract_model->file_name->saveAs($abstract_model->abstract_file_name);
            }
        }
        return;
    }

    public function actionEdit()
    {
        $models = CallForAbstract::find()->where(['user_id' => Yii::$app->user->id])->orderby(['created_at' => SORT_DESC])->all();

        return $this->render('edit', [
            'models' => $models
        ]);
    }

    public function actionDelete($id)
    {

        $model = CallForAbstract::findOne($id);

        $is_ab_editable = Definitions::getIsAbstractEditable();

        if (!$is_ab_editable || $model->abstract_status == $model::ABSTRACT_STATUS_SUBMITTED) {
            return $this->redirect(['/my/edit']);
        }

        if ($model->user_id != Yii::$app->user->id) {
            throw new \yii\web\HttpException(400, Yii::t('app', 'Error! Please try again.'));
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record deleted successfully.');
        }

        return $this->redirect(['/my/edit']);
    }
}
