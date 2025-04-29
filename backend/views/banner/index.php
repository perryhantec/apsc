<?php
use yii\helpers\Html;
use \common\models\Config;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\Definitions;
use \common\models\Banner;
use kartik\grid\GridView;
use kartik\editable\Editable;

$this->title = Yii::t('app','Banners');
$this->params['breadcrumbs'][] = $this->title;

?>
<p>
<?= Html::a(Yii::t('app', 'Create {modelClass}',['modelClass'=>Yii::t('app', 'Banner')]),['banner/create'],
      ['class' => 'btn btn-success']);
            ?>
&nbsp;
<?= Html::a(Yii::t('app', 'Reorder'),['banner/reorder'],
      ['class' => 'popupModal btn btn-default']);
?>
</p>


<?php Pjax::begin(['id'=>'bannerlogo-pjax']); ?>

<?php
$gridColumns =
[
/*
    [
      'class' => 'kartik\grid\SerialColumn',
      'contentOptions'=>['style'=>'width: 1%;'],
    ],
*/
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'image_file_name',
      'vAlign'=>'middle',
      'width' => '300px',
      'readonly' => true,
      'filter' => false,
      'value' => function($model){
        // return Html::img(Yii::$app->urlManager->createUrl('../'.$model->image_file_name), ['width'=>'100%']);
        return Html::img(Yii::$app->request->hostinfo.$model->image_file_name, ['width'=>'100%']);
      },
      'format' => 'raw',
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 20%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
/*
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'text',
      'vAlign'=>'middle',
      'readonly' => true,
      'format' => 'ntext',
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 35%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'editableOptions'=> [
        'size'=>'md',
        'formOptions' =>[
          'action' => [
            'bannerlogo/edit_grid'
          ],
        ],
        'inputType'=> \kartik\editable\Editable::INPUT_TEXTAREA,
        ],
    ],
*/
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'url',
      'format' => 'raw',
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 25%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'editableOptions'=> [
        'formOptions' =>[
          'action' => [
            'bannerlogo/edit_grid'
          ],
        ],
      ],
    ],
    [
      'class' => 'kartik\grid\EditableColumn',
      'attribute' => 'url_target',
      'format' => 'raw',
      'filter' => Definitions::getMenuDisplay(),
      'vAlign'=>'middle',
      'readonly' => true,
      'headerOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 10%;'],
      'contentOptions'=>['class'=>'kv-sticky-column'],
      'value' => function($model){
            return Definitions::getBooleanDescription($model->url_target);
/*
        $value = $model->url_target;

        return Html::checkBox($value, $value,
          ['onchange'=>"js:
                      $.ajax({
                        url: '". \Yii::$app->getUrlManager()->createUrl('bannerlogo/update_url_target?id='.$model->id) ."',
                        success: function (data) {
                            $('#bannerlogo-pjax').load(document.URL +  ' #bannerlogo-pjax');
                          }
                      });"
        ]);
*/
      },
      'editableOptions'=> [
        'formOptions' =>[
          'action' => [
            'bannerlogo/edit_grid'
          ],
        ],
      ],

    ],
      [
        'class' => 'kartik\grid\EditableColumn',
          'attribute' => 'status',
          'vAlign'=>'middle',
          'readonly' => true,
          'filter' => Definitions::getStatus(),
          'value' => function($model){
              return Definitions::getStatus($model->status);
          },
          'headerOptions'=>['class'=>'kv-sticky-column'],
          'contentOptions'=>['class'=>'kv-sticky-column', 'style'=>'width: 5%;'],
      ],
    [
      'class' => 'backend\components\ActionColumn',
      'template'=>'{update} {enabled} {disabled} {delete}',
      'buttons' => [
          'banner_upload' => function ($url, $model, $key) {
              return Html::a(Yii::t('app', 'Update'), $url, ['class' => 'btn btn-primary btn-xs']);
          },
      ],
      'visibleButtons' => [
          'enabled' => function ($model) { return $model->status == 0; },
          'disabled' => function ($model) { return $model->status != 0; },
          ],
      'contentOptions'=>['style'=>['width'=>'10%','white-space' => 'nowrap']]
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
        'pjax'=>true, // pjax is set to always true for this demo
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
<?php Pjax::end(); ?></div>
