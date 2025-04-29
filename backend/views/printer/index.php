<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\Definitions;
use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use kartik\editable\Editable;


$this->title = 'Printer Setting';
?>

<p>
    <?= Html::a('Create',['create'],['class' => 'btn btn-success']);?>
</p>

<?php Pjax::begin(['id'=>'printer-pjax']); ?>

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
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 20%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      // 'editableOptions'=> ['formOptions' => ['action' => ['pagetype4/edit_grid']]]

    ],

    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'location',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 35%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'ip',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 35%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'backend\components\ActionColumn',
      'template'=>'{update} {delete}',
      'headerOptions'=>['style'=>'width: 10%;'],

      'buttons' => [
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