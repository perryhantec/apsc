<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Security;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use common\components\AccessRule;
// use common\models\Config;
// use frontend\models\CallForAbstractForm;

/**
 * Checkout controller
 */
class CallForAbstractController extends \common\components\BaseController
{
//     public $layout = 'blank';

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
                        'actions' => ['index'],
                        'allow' => true,
                        // 'roles' => ['$'],
                        'roles' => [],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                     'payment' => ['POST'],
                ],
            ],
        ];
    }

    // function init()
    // {
    //     parent::init();
    //     Config::RefreshLanguageSetting();
    //     Config::refreshFontSizeSetting();
    // }

    // public function beforeAction($action)
    // {
    //     if ($action->id == 'payment') {
    //         $this->enableCsrfValidation = false;
    //     }

    //     return parent::beforeAction($action);
    // }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        // $model = new CallForAbstractForm;

        // if ($model->load(Yii::$app->request->post())) {
        //     $model->file_name = \yii\web\UploadedFile::getInstance($model, 'file_name');
        //     if ($model->saveContent()) {
        //         Yii::$app->session->setFlash('success', Yii::t('app', 'Abstract Submitted.'));

        //         return $this->redirect(['index']);
        //     }
        // }

        return $this->render('index', [
            // 'model' => $model
        ]);
    }
}
