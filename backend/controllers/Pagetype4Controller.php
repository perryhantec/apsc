<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;
use backend\models\PageType4Search;
use backend\models\PageType4Reorder;
use common\models\PageType4;
// use common\models\PageType4Category;
// use backend\models\PageType4CategorySearch;
use common\models\Definitions;


class Pagetype4Controller extends Controller
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
                    // 'actions' => ['index', 'create', 'update', 'delete', 'category', 'category_create', 'category_update', 'category_delete', 'edit_grid'],
                    'actions' => ['index', 'create', 'update', 'delete', 'enabled', 'disabled', 'reorder'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
            ],
        ];
    }

    //editable config
    // public function actions()
    // {
    //   return ArrayHelper::merge(parent::actions(), [
    //       'edit_grid' => [                                       // identifier for your editable column action
    //           'class' => EditableColumnAction::className(),     // action class name
    //           'modelClass' => PageType4::className(),                // the model for the record being edited
    //           'outputValue' => function ($model, $attribute, $key, $index) {
    //             switch($attribute){
    //               case 'category_id':
    //                  return Definitions::getPageType4Category($model->category_id, $model->MID, Yii::$app->language);
    //                 break;
    //               default:
    //                 return $model->$attribute;
    //               }
    //           },
    //           'outputMessage' => function($model, $attribute, $key, $index) {
    //                 return '';                                  // any custom error to return after model save
    //           },
    //           'showModelErrors' => true,                        // show model validation errors after save
    //           'errorOptions' => ['header' => '']                // error summary HTML options
    //           // 'postOnly' => true,
    //           // 'ajaxOnly' => true,
    //           // 'findModel' => function($id, $action) {},
    //           // 'checkAccess' => function($action, $model) {}
    //       ],
    //       'pagetype4_category' => [
    //           'class' => EditableColumnAction::className(),
    //           'modelClass' => PageType4Category::className(),
    //           'outputValue' => function ($model, $attribute, $key, $index) {
    //             switch($attribute){
    //               default:
    //                 return $model->attribute;
    //               }
    //           },
    //           'outputMessage' => function($model, $attribute, $key, $index) {
    //                 return '';
    //           },
    //           'showModelErrors' => true,
    //           'errorOptions' => ['header' => '']

    //       ],
    //   ]);
    // }

//Page Type4
    public function actionIndex($id)
    {
      $menu_model = $this->findMenu($id);
      Yii::$app->params['MID'] = $menu_model->id;

      $searchModel = new PageType4Search();
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

      $model = new PageType4;
      $model->MID = $menu_model->id;

      if ($model->load(Yii::$app->request->post())) {
          $model->image_file = \yii\web\UploadedFile::getInstance($model, 'image_file');
          if ($model->saveContent())
              return $this->redirect(['index','id'=>$model->MID]);
      }
      return $this->render('edit', [
          'model' => $model,
      ]);

    }

    public function actionUpdate($id)
    {
      $model = $this->findPageType4($id);
      Yii::$app->params['MID'] = $model->MID;

      $MID = $model->MID;

      if ($model->load(Yii::$app->request->post())) {
          $model->image_file = \yii\web\UploadedFile::getInstance($model, 'image_file');
          if ($model->saveContent())
              return $this->redirect(['index','id'=>$model->MID]);
      }
      return $this->render('edit', [
            'model' => $model,
        ]);

    }

    public function actionDelete($id)
    {
      $model = $this->findPageType4($id);
      $MID = $model->MID;
      $model->delete();
      return $this->redirect(['index', 'id'=>$MID]);

    }

    public function actionEnabled($id)
    {
        $model = $this->findPageType4($id);

        $model->status = 1;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDisabled($id)
    {
        $model = $this->findPageType4($id);

        $model->status = 0;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer);
    }
    //category
    // public function actionCategory($id)
    // {
    //   $menu_model = $this->findMenu($id);
    //   Yii::$app->params['MID'] = $menu_model->id;

    //   $searchModel = new PageType4CategorySearch;
    //   $searchModel->MID = $menu_model->id;
    //   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //   return $this->render('category', [
    //       'searchModel' => $searchModel,
    //       'dataProvider' => $dataProvider,
    //   ]);

    // }
    // public function actionCategory_create($id)
    // {
    //   $menu_model = $this->findMenu($id);
    //   Yii::$app->params['MID'] = $menu_model->id;

    //   $model = new PageType4Category;
    //   $model->MID = $menu_model->id;

    //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //       return $this->redirect(['category','id'=>$id]);
    //   }
    //   return $this->render('category_edit', [
    //       'model' => $model,
    //   ]);
    // }

    // public function actionCategory_update($id)
    // {
    //   $model = $this->findPageType4Category($id);
    //   Yii::$app->params['MID'] = $model->MID;

    //   $MID = $model->MID;

    //   if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //       return $this->redirect(['category','id'=>$MID]);
    //   }
    //   return $this->render('category_edit', [
    //         'model' => $model,
    //     ]);
    // }

    // public function actionCategory_delete($id)
    // {
    //   $model = $this->findPageType4Category($id);

    //   $MID = $model->MID;
    //   $model->delete();
    //   return $this->redirect(['category', 'id'=>$MID]);

    // }

    public function actionReorder($id)
    {
      $menu_model = $this->findMenu($id);
      Yii::$app->params['MID'] = $menu_model->id;

      $model = new PageType4Reorder(['MID'=>$menu_model->id]);

      if ($model->load(Yii::$app->request->post())  && $model->saveContent()) {
          // Yii::$app->adminLog->insert(Yii::t('log', 'Update {record} of {model}', ['record' => Yii::t('log', 'Order'), 'model' => $menu_model->name.('[#'.$menu_model->id.']')]), $menu_model->id);
  
          return $this->redirect(['index','id'=>$id]);
      }else{
        return $this->renderAjax('reorder', [
            'model' => $model,
        ]);
      }
    }

    private function findMenu($id) {
        $model = \common\models\Menu::find()->where(['id' => $id, 'page_type' => 4])->one();

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }

    private function findPageType4($id) {
        $model = PageType4::findOne($id);

        if ($model == null)
            throw new \yii\web\NotFoundHttpException();

        return $model;
    }

    // private function findPageType4Category($id) {
    //     $model = PageType4Category::findOne($id);

    //     if ($model == null)
    //         throw new \yii\web\NotFoundHttpException();

    //     return $model;
    // }
}
