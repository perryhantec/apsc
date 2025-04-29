<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use common\components\AccessRule;
use common\models\Banner;
use backend\models\BannerSearch;
use backend\models\LogoUploadForm;
use backend\models\IconUploadForm;
/**
 * BannarController
 */
class BannerController extends Controller
{
  public $enableCsrfValidation = false;

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
                        'actions' => ['index', 'enabled', 'disabled', 'create', 'update', 'reorder', 'update_url_target', 'delete', 'edit_grid'],
                        'allow' => true,
                        'roles' => ['banner'],
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
    //editable config
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'edit_grid' => [                                       // identifier for your editable column action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => Banner::className(),                // the model for the record being edited
                'outputValue' => function ($model, $attribute, $key, $index) {
                      return $model->$attribute;      // return any custom output value if desired
                },
                'outputMessage' => function($model, $attribute, $key, $index) {
                      return '';                                  // any custom error to return after model save
                },
                'showModelErrors' => true,                        // show model validation errors after save
                'errorOptions' => ['header' => '']                // error summary HTML options
                // 'postOnly' => true,
                // 'ajaxOnly' => true,
                // 'findModel' => function($id, $action) {},
                // 'checkAccess' => function($action, $model) {}
            ],
        ]);
    }

//Banners
    public function actionIndex()
    {
      $searchModel = new BannerSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      if ($searchModel->load(Yii::$app->request->post()) && $searchModel->saveContent()) {
          return $this->redirect(['edit','id'=>$id]);
      }else{
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
      }
    }

    public function actionCreate()
    {
        $model = new Banner();
        $model->status = 1;

        if ($model->load(Yii::$app->request->post())) {
          $model->image_file = \yii\web\UploadedFile::getInstance($model, 'image_file');

          if ($model->saveContent()) {
            $this->redirect('index');
          }
        }

        return $this->render('edit', ['model' => $model]);

    }

    public function actionEnabled($id)
    {
        $model = $this->findBannerModel($id);

        $model->status = 1;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDisabled($id)
    {
        $model = $this->findBannerModel($id);

        $model->status = 0;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUpdate($id)
    {
        $model = $this->findBannerModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $model->image_file = \yii\web\UploadedFile::getInstance($model, 'image_file');

          if ($model->saveContent()) {
            $this->redirect('index');
          }
        }

        return $this->render('edit', ['model' => $model]);

    }

    public function actionReorder()
    {
      $model = new \backend\models\BannerReorder;

      if ($model->load(Yii::$app->request->post())  && $model->saveContent()) {
          return $this->redirect(['index']);
      }else{
        return $this->renderAjax('reorder', [
            'model' => $model,
        ]);
      }
    }

    public function actionDelete($id)
    {
        $model = $this->findBannerModel($id);
        $model->delete();

        Banner::updateSeq();

        return $this->redirect(['index']);
    }

    public function actionUpdate_url_target($id)
    {
        $model = Banner::findOne(['id' => $id]);
        if($model->url_target == 1) $model->url_target = 0;
        else $model->url_target = 1;
        $model->save();
        echo 'true';
    }


    public function actionDeleteitem($path)
    {
      return \common\models\Banner::deleteImage($path);
    }

    protected function findBannerModel($id)
    {
        if (($model = \common\models\Banner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
