<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\Definitions;
use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use kartik\editable\Editable;


$this->title = $searchModel->menu->allLanguageName;
?>

<p>
<?= Html::a(Yii::t('app', "Create"),['create', 'id' => $searchModel->MID],
      ['class' => 'btn btn-success',

            ]);
            ?>
&nbsp;
</p>

<?php Pjax::begin(['id'=>'pagetype6-pjax']); ?>

<?php
$gridColumns =
[
    /*[
      'class' => 'kartik\grid\SerialColumn',
      'contentOptions'=>['style'=>'width: 5%;'],
    ],*/

    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'display_at',
      'filter' => DatePicker::widget([
                      'model'=>$searchModel,
                      'attribute'=>'display_at',
                      'type' => DatePicker::TYPE_INPUT,
                      'pluginOptions' => [
                          'autoclose'=>true,
                          'format' => 'yyyy-mm-dd'
                      ]
                    ]),
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 15%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      // 'editableOptions'=> ['formOptions' => ['action' => ['pagetype4/edit_grid']]]

    ],
    /*
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => Yii::$app->config->getRequiredLanguageAttribute('title'),
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 60%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      // 'editableOptions'=> [
      //   'size'=>'md',
      //   'inputType' => Editable::INPUT_TEXTAREA,
      //   'formOptions' => ['action' =>
      //     ['pagetype4/edit_grid']
      //   ]
      // ]

    ],
    */
    [
      'class' => 'kartik\grid\EditableColumn',
      // 'attribute' => 'content',
      'attribute' => Yii::$app->config->getRequiredLanguageAttribute('title'),
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 60%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      // 'editableOptions'=> ['formOptions' => ['action' => ['pagetype4/edit_grid']]]

    ],
    [
      'attribute' => 'status',
      'vAlign'=>'middle',
      'filter' => Definitions::getStatus(),
      'value' => function($model){
          return Definitions::getStatus($model->status);
      },
      // 'width' => '10%',
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'backend\components\ActionColumn',
      'template'=>'{update} {enabled} {disabled} {delete}',
      'headerOptions'=>['style'=>'width: 15%;'],

      'visibleButtons' => [
        'enabled' => function ($model) { return $model->status == 0; },
        'disabled' => function ($model) { return $model->status != 0; },
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
