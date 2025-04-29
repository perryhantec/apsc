<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\Definitions;
use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use kartik\editable\Editable;


$this->title = 'Abstracts Submission';
?>

<p>
    <?= Html::a('Create',['create'],['class' => 'btn btn-success']);?>
    &nbsp;
    <?= Html::a('Export',['export'],['class' => 'btn btn-info']);?>
    &nbsp;
    <?= Html::a('Send Confirmation Email',['send-email'],['class' => 'btn btn-danger']);?>
</p>

<?php Pjax::begin(['id'=>'call-for-abstract-pjax']); ?>

<?php
$gridColumns =
[
    /*[
      'class' => 'kartik\grid\SerialColumn',
      'contentOptions'=>['style'=>'width: 5%;'],
    ],*/

    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'updated_at',
      'filter' => DatePicker::widget([
                      'model'=>$searchModel,
                      'attribute'=>'updated_at',
                      'type' => DatePicker::TYPE_INPUT,
                      'pluginOptions' => [
                          'autoclose'=>true,
                          'format' => 'yyyy-mm-dd'
                      ]
                    ]),
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      // 'editableOptions'=> ['formOptions' => ['action' => ['pagetype4/edit_grid']]]

    ],
/*
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'author',
      'vAlign'=>'middle',
      'readonly' => false,
      'headerOptions'=>['class'=>'kv-sticky-column'],
      'contentOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'editableOptions'=> ['formOptions' => ['action' => ['pagetype4/edit_grid']]]

    ],
*/
    // [
    //   'class' => 'kartik\grid\EditableColumn',
    //   'attribute' => 'category_id',
    //   'format' => 'raw',
    //   'filter' => Definitions::getPageType4Category(false, $searchModel->MID, Yii::$app->language),
    //   'value' => function($model){
    //     return Definitions::getPageType4Category($model->category_id, $model->MID, Yii::$app->language);
    //   },
    //   'vAlign'=>'middle',
    //   'readonly' => true,
    //   'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 25%;'],
    //   'contentOptions'=>['class'=>'kv-sticky-column'],
    //   'editableOptions'=> [
    //     'inputType' => Editable::INPUT_DROPDOWN_LIST,
    //     'data' => Definitions::getPageType4Category(false, $searchModel->MID, Yii::$app->language),
    //     'formOptions' =>[
    //       'action' => [
    //         'pagetype4/edit_grid'
    //       ],
    //     ],
    //     ],
    //   'visible' => $searchModel::HAS_CATEGORY
    // ],
    [
      'attribute' => 'abstract_no',
      'vAlign'=>'middle',
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'attribute' => 'user_id',
      'vAlign'=>'middle',
      'filter' => Definitions::getUser(),
      'value' => function($model){
        return Definitions::getUser($model->user_id);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'attribute' => 'title',
      'vAlign'=>'middle',
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'abstract_file_name',
      'format'=>'raw',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'value' => function ($model) {
        // $url = Yii::$app->urlManager->createUrl($model->abstract_file_name);
        $html = '';
        if ($model->abstract_file_name) {
          $url = Yii::$app->request->hostinfo.$model->abstract_file_name;
          $html = Html::a('File', $url, ['target'=>'_blank', 'onclick' => 'reloadPage(event,"'.$url.'");']);
        }
        // $url = Yii::$app->urlManager->createUrl($model->abstract_file_name);
        return $html;
      },
    ],
    [
      'attribute' => 'abstract_status',
      'vAlign'=>'middle',
      'filter' => Definitions::getAbstractStatusNoIcon(),
      'value' => function($model){
        return Definitions::getAbstractStatusNoIcon($model->abstract_status);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'attribute' => 'result',
      'vAlign'=>'middle',
      'filter' => Definitions::getResult(),
      'value' => function($model){
        return Definitions::getResult($model->result);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'attribute' => 'accept_type',
      'vAlign'=>'middle',
      'filter' => Definitions::getAcceptType(),
      'value' => function($model){
        return Definitions::getAcceptType($model->accept_type);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'attribute' => 'check_is_registered',
      'vAlign'=>'middle',
      'filter' => Definitions::getCheckIsRegistered(),
      'value' => function($model){
        return Definitions::getCheckIsRegistered($model->check_is_registered);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'backend\components\ActionColumn',
      'template'=>'{update} {view} {delete}',
      'headerOptions'=>['style'=>'width: 10%;'],

      'buttons' => [
        /*
        'update' => function ($url, $model, $key) {
              return $model->status != 0 ? Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id'=>$model->id], ['title' => Yii::t('app', 'Update'),
                ]) : '';
          },
        'delete' => function($url, $model) {
          return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model['id']], [
                  'title' => Yii::t('app', 'Delete'), 'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'data-method' => 'post']);
          },
        */
      ],
      'visibleButtons' => [

      ]
    ],

]

?>

 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns'=>$gridColumns,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjax'=>false, // pjax is set to always true for this demo
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container',], 'enablePushState' => false],

        // set your toolbar
        'toolbar'=> [
            // ['content'=>
            //     Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'Create')])
            // ],
            //'{export}',
            //'{toggleData}',
        ],
        'export'=>[
           'fontAwesome'=>true
       ],
       // parameters from the demo form
       'bordered'=>true,
       'striped'=>false,
       'condensed'=>true,
       'responsive'=>true,
       'responsiveWrap' => false,
       'hover'=>true,
       //'showPageSummary'=>true,
       'panel'=>[
           'type'=>GridView::TYPE_PRIMARY,
           'heading'=> '',
       ],
       'persistResize'=>false,
       //'exportConfig'=>$exportConfig,


    ]); ?>
<?php Pjax::end(); ?>
<script>
  function reloadPage(e, url) {
    e.preventDefault();
    window.open(url);
  }
</script>