<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use backend\models\PageType6Search;
use common\models\PageType6;
use common\models\Definitions;

class Pagetype6Controller extends Controller
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
                    'actions' => ['index', 'create', 'update', 'delete', 'enabled', 'disabled'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }

    public function actionIndex($id)
    {
      $menu_model = $this->findMenu($id);
      Yii::$app->params['MID'] = $menu_model->id;

      $searchModel = new PageType6Search();
      $searchModel->MID = $menu_model->id;
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      if ($searchModel->load(Yii::$app->request->post()) && $searchModel->saveContent()) {
          return $this->redirect(['index','id'=>$id]);
      }
      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionCreate($id)
    {
      $menu_model = $this->findMenu($id);
      Yii::$app->params['MID'] = $menu_model->id;

      $model = new PageType6;
      $model->MID = $menu_model->id;

      if ($model->load(Yii::$app->request->post())) {
          if ($model->saveContent())
              return $this->redirect(['index','id'=>$model->MID]);
      }
      return $this->render('edit', [
          'model' => $model,
      ]);

    }

    public function actionUpdate($id)
    {
      $model = $this->findPageType6($id);
      Yii::$app->params['MID'] = $model->MID;

      $MID = $model->MID;

      if ($model->load(Yii::$app->request->post())) {
          if ($model->saveContent())
              return $this->redirect(['index','id'=>$model->MID]);
      }
      return $this->render('edit', [
            'model' => $model,
        ]);

    }

    public function actionDelete($id)
    {
      $model = $this->findPageType6($id);
      $MID = $model->MID;
      $model->delete();

      return $this->redirect(['index', 'id'=>$MID]);
    }

    public function actionEnabled($id)
    {
        $model = $this->findPageType6($id);

        $model->status = 1;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDisabled($id)
    {
        $model = $this->findPageType6($id);

        $model->status = 0;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    private function findMenu($id) {
        $model = \common\models\Menu::find()->where(['id' => $id, 'page_type' => 6])->one();

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }

    private function findPageType6($id) {
        $model = PageType6::findOne($id);

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }
}
