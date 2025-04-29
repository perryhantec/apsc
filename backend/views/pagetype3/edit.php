<?php

use yii\helpers\Html;
use common\models\Config;
use kartik\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use common\models\Definitions;

$this->title = $model->menu->name.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$this->params['breadcrumbs'][] = ['label' => $model->menu->name, 'url' => ['page/edit','id'=>$model->MID]];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS

JS
);

?>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
]);
?>
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">

        <?= $form->field($model, 'display_at')->widget(DateTimePicker::classname(), [
            'options' => [],
            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd hh:ii:00',
                'weekStart' => 0,
                'todayBtn' => true,
            ],
            'pluginEvents' => [
            ]
        ]); ?>

        <hr />

        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('content') as $attr_name)
                echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                      'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                    ]);
        ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
