<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\Definitions;
use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use kartik\editable\Editable;


$this->title = 'Registration Submission';
?>

<p>
    <?= Html::a('Create',['create'],['class' => 'btn btn-success']);?>
    &nbsp;
    <?= Html::a('Export',['export'],['class' => 'btn btn-info']);?>
    &nbsp;
    <?= Html::a('Export 2',['export-2'],['class' => 'btn btn-danger']);?>
    &nbsp;
    <?= Html::a('Payment Email',['payment-email'],['class' => 'btn btn-primary']);?>
    &nbsp;
    <?= Html::a('Mass Email',['mass-email'],['class' => 'btn btn-warning']);?>
</p>

<?php Pjax::begin(['id'=>'registration-pjax']); ?>

<?php
$gridColumns =
[
    /*[
      'class' => 'kartik\grid\SerialColumn',
      'contentOptions'=>['style'=>'width: 5%;'],
    ],*/

    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'created_at',
      'filter' => DatePicker::widget([
                      'model'=>$searchModel,
                      'attribute'=>'created_at',
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
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'is_attend',
      'vAlign'=>'middle',
      'filter' => Definitions::getIsAttend(),
      'format'=>'raw',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 8%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'value' => function ($model) {
        $label = $model->is_attend == 1 ? 'success' : 'warning';
        
        return '<span class="label label-'.$label.'">'.Definitions::getIsAttend($model->is_attend).'</span>';
      },
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'registration_no',
      'vAlign'=>'middle',
      'format'=>'raw',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 12%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'value' => function ($model) {
        $html = '';

        if ($model->registration_no) {
          $html .= '<span id="r'.$model->id.'">'.$model->registration_no.'</span> <button class="label label-default" onclick="copyRegistrationNo('.$model->id.');">Copy</button>';
        }

        return $html;
      }
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'title',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 8%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'first_name',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 8%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'last_name',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 8%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'email',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'mobile',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'payment_method',
      'vAlign'=>'middle',
      // 'filter' => Definitions::getRegistrationStatus(false, \common\models\Registration::STATUS_ONLINE_PAYMENT_FAILED),
      'filter' => Definitions::getPaymentMethod(),
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'value' => function ($model) {
        return Definitions::getPaymentMethod($model->payment_method);
      },
    ],

    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'status',
      'vAlign'=>'middle',
      // 'filter' => Definitions::getRegistrationStatus(false, \common\models\Registration::STATUS_ONLINE_PAYMENT_FAILED),
      'filter' => Definitions::getRegistrationStatus(),
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'value' => function ($model) {
        return Definitions::getRegistrationStatus($model->status);
      },
    ],
    [
      'attribute' => 'is_vip',
      'vAlign'=>'middle',
      'filter' => Definitions::getIsVip(),
      'value' => function($model){
        return Definitions::getIsVip($model->is_vip);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'attribute' => 'check_is_abstracted',
      'vAlign'=>'middle',
      'filter' => Definitions::getCheckIsAbstracted(),
      'value' => function($model){
        return Definitions::getCheckIsAbstracted($model->check_is_abstracted);
      },
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
      'class' => 'backend\components\ActionColumn',
      'template'=>'{update} {view} {confirm-payment-yes} {confirm-payment-no} {is-attend-yes} {is-attend-no} {delete}',
      'headerOptions'=>['style'=>'width: 10%;'],

      'buttons' => [
        'confirm-payment-yes' => function ($url, $model, $key) {
          return Html::a('確認付款', $url, ['class' => 'btn btn-xs btn-success']);
        },
        'confirm-payment-no' => function ($url, $model, $key) {
          return Html::a('未確認付款', $url, ['class' => 'btn btn-xs btn-warning']);
        },
        'is-attend-yes' => function ($url, $model, $key) {
          return Html::a('已取掛牌', $url, ['class' => 'btn btn-xs btn-success']);
        },
        'is-attend-no' => function ($url, $model, $key) {
          return Html::a('未取掛牌', $url, ['class' => 'btn btn-xs btn-warning']);
        },
      ],

      'visibleButtons' => [
        'confirm-payment-yes' => function ($model) { return $model->is_attend == 0 && $model->payment_method != $model::PAYMENT_METHOD_PAYPAL && $model->status != $model::STATUS_CONFIRMED; },
        'confirm-payment-no' => function ($model) { return $model->is_attend == 0 && $model->payment_method != $model::PAYMENT_METHOD_PAYPAL && $model->status == $model::STATUS_CONFIRMED; },
        'is-attend-yes' => function ($model) { return $model->is_attend == 0 && $model->status == $model::STATUS_CONFIRMED; },
        'is-attend-no' => function ($model) { return $model->is_attend != 0 && $model->status == $model::STATUS_CONFIRMED; },
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
  function copyRegistrationNo(id) {
    navigator.clipboard.writeText($('#r' + id).text());
  }
  function reloadPage(e, url) {
    e.preventDefault();
    window.open(url);
  }
</script>