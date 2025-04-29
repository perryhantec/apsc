<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use common\models\RegistrationText;

class RegistrationTextController extends Controller
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
                    'actions' => ['index'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }

    public function actionIndex()
    {
      $model = RegistrationText::findOne(1);
      if($model==NUll){
        $model = new RegistrationText;
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
      return $this->render('index', [
          'model' => $model,
      ]);
    }
}
