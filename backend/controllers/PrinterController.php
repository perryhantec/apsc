<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use backend\models\PrinterSearch;
use common\models\Printer;
use common\models\Definitions;

class PrinterController extends Controller
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
                    'actions' => [
                        'index', 'create', 'update', 'delete'
                    ],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }

    public function actionIndex()
    {
      $searchModel = new PrinterSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
    }

    public function actionCreate()
    {
        $model = new Printer();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->saveContent()) {

              return $this->redirect(['index']);
            }
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    // public function actionView($id)
    // {
    //   $model = $this->findRegistration($id);

    //   return $this->render('view', [
    //       'model' => $model,
    //   ]);
    // }

    public function actionUpdate($id)
    {
        $model = $this->findPrinter($id);

        if ($model->load(Yii::$app->request->post())) {

            if ($model->saveContent()) {
              return $this->redirect(['index']);
            }
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
      $model = $this->findPrinter($id);
      $model->delete();

      return $this->redirect(['index']);
    }

    private function findPrinter($id) {
        $model = Printer::findOne($id);

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }
}
