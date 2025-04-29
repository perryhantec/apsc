<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use common\models\ContactUs;
use common\models\PageType1;
use common\models\Home;


class PageController extends Controller
{
  public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['post'],
                ],
            ],
            'access' => [
              'class' => \yii\filters\AccessControl::className(),
              'ruleConfig' => [
			            'class' => AccessRule::className(),
			        ],
              'rules' => [
                  [
                    // 'actions' => ['general', 'edit', 'home', 'contact-us', 'call-for-abstract', 'registration'],
                    'actions' => ['general', 'edit', 'home', 'contact-us', 'registration'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }


    public function actionGeneral()
    {
      $model = \common\models\General::findOne(['id'=>1]);
      if($model==NUll){
        $model = new \common\models\General;
        $model->id = 1;
        // $model->lang = 'zh-TW';
        $model->lang = 'en';
      }

      if(Yii::$app->request->post()){
        if ($model->load(Yii::$app->request->post())) {
          $model->image_file = \yii\web\UploadedFile::getInstance($model, 'image_file');
          if ($model->saveContent())
              return $this->refresh();
            //return $this->redirect(['edit','id'=>$id]);
        }
      }
      return $this->render('general', [
          'model' => $model,
      ]);
    }

    public function actionEdit($id)
    {
       $model = \common\models\Menu::findOne($id);
       $page_type = $model->page_type;

      switch($page_type){
        case 1:
          $this->redirect(['pagetype1/index', 'id' => $id]);
          break;
        case 2:
          $this->redirect(['pagetype2/index', 'id' => $id]);
          break;
        case 3:
          $this->redirect(['pagetype3/index', 'id' => $id]);
          break;
        case 4:
          $this->redirect(['pagetype4/index', 'id' => $id]);
          break;
        case 5:
          $this->redirect(['pagetype5/index', 'id' => $id]);
          break;
        case 6:
          $this->redirect(['pagetype6/index', 'id' => $id]);
          break;
        case 7:
          $this->redirect(['pagetype7/index', 'id' => $id]);
          break;
        default:
          return $this->render('error', [
              'model' => $model,
          ]);
      }
    }

    //Home
    public function actionHome()
    {
      $model = Home::findOne(1);
      // if($model==NULL){
      //   $model = new PageType1;
      //   $model->id = $id;
      // }
      // Yii::$app->params['HID'] = $id;

      // if ($model->load(Yii::$app->request->post()) && $model->save()) {
      //     return $this->redirect(['home']);
      // }else{

        if(Yii::$app->request->post()){
          if ($model->load(Yii::$app->request->post())) {
            $model->image_file_1 = \yii\web\UploadedFile::getInstance($model, 'image_file_1');
            $model->image_file_2 = \yii\web\UploadedFile::getInstance($model, 'image_file_2');
            $model->image_file_3 = \yii\web\UploadedFile::getInstance($model, 'image_file_3');
            $model->image_file_4 = \yii\web\UploadedFile::getInstance($model, 'image_file_4');
            $model->image_file_5 = \yii\web\UploadedFile::getInstance($model, 'image_file_5');
            if ($model->saveContent())
                return $this->refresh();
              //return $this->redirect(['edit','id'=>$id]);
          }
        }
        return $this->render('home', [
            'model' => $model,
        ]);
      // }
    }

//contact us
    public function actionContactUs()
    {
      $model = ContactUs::findOne(['id'=>1]);
      if($model==NUll){
        $model = new ContactUs;
        $model->id = 1;
      }
      if(Yii::$app->request->post()){

        if ($model->load(Yii::$app->request->post())  && $model->save()) {
            return $this->redirect(['contact-us']);
        }
        return $this->refresh();
      }
      return $this->render('contact_us', [
          'model' => $model,
      ]);

    }

    // public function actionCallForAbstract()
    // {
    //   $model = \common\models\General::findOne(['id'=>1]);
    //   if($model==NUll){
    //     $model = new \common\models\General;
    //     $model->id = 1;
    //     // $model->lang = 'zh-TW';
    //     $model->lang = 'en';
    //   }

    //   if(Yii::$app->request->post()){
    //     if ($model->load(Yii::$app->request->post())) {
    //       if ($model->save())
    //           return $this->refresh();
    //         //return $this->redirect(['edit','id'=>$id]);
    //     }
    //   }
    //   return $this->render('call-for-abstract', [
    //       'model' => $model,
    //   ]);
    // }

    public function actionRegistration()
    {
      $model = \common\models\General::findOne(['id'=>1]);
      if($model==NUll){
        $model = new \common\models\General;
        $model->id = 1;
        // $model->lang = 'zh-TW';
        $model->lang = 'en';
      }

      if(Yii::$app->request->post()){
        if ($model->load(Yii::$app->request->post())) {
          if ($model->save())
              return $this->refresh();
            //return $this->redirect(['edit','id'=>$id]);
        }
      }
      return $this->render('registration', [
          'model' => $model,
      ]);
    }
}
