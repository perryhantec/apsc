<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use common\models\PageType5;


class Pagetype5Controller extends Controller
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


    //Page Type1
    public function actionIndex($id)
    {
      $menu_model = $this->findMenu($id);
      Yii::$app->params['MID'] = $menu_model->id;

      $model = PageType5::findOne(['MID'=>$menu_model->id]);
      if($model==NULL){
        $model = new PageType5;
        $model->MID = $id;
      }

      if ($model->load(Yii::$app->request->post()) && $model->saveContent()) {
          return $this->redirect(['index','id'=>$id]);
      }else{
        return $this->render('index', [
            'model' => $model,
        ]);
      }
    }

    private function findMenu($id) {
        $model = \common\models\Menu::find()->where(['id' => $id])->andWhere(['or', ['page_type' => 5], ['id' => 6]])->one();

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }

}
