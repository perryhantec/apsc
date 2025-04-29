<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use common\models\Registration;
use common\models\Definitions;
use backend\models\BadgeForm;

class BadgeController extends Controller
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
                        'index', 'update', 'view', 'is-attend-yes', 'is-attend-no',
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
        $model = new BadgeForm;

        if ($model->load(Yii::$app->request->post())) {
            if ($rid = $model->checkRegistration()) {
              return $this->redirect(['view', 'id' => $rid]);
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
      $model = $this->findRegistration($id);

      return $this->render('view', [
          'model' => $model,
      ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findRegistration($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->saveContent()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionIsAttendYes($id)
    {
        $model = $this->findRegistration($id);

        $model->is_attend = 1;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionIsAttendNo($id)
    {
        $model = $this->findRegistration($id);

        $model->is_attend = 0;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    private function findRegistration($id) {
        $model = Registration::findOne($id);

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }
}
