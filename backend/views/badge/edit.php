<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Config;
use kartik\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use kartik\widgets\FileInput;
use common\models\Definitions;
// use bupy7\cropbox\CropboxWidget;

// $this->title = $model->menu->name.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$title_text = 'Registration Quick Check';

$this->title = 'Update';

$this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS

JS
);
?>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    // 'options' => ['enctype' => 'multipart/form-data']
]);
?>
<div class="box box-primary">
    <div class="box-body">
        <?= $form->field($model, 'registration_no')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'title')->dropDownList(Definitions::getPrefix(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'last_name')->textInput() ?>
        <?= $form->field($model, 'first_name')->textInput() ?>
        <?= $form->field($model, 'country')->dropDownList(Definitions::getCountry(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'dinner')->textInput(['type' => 'number','min' => 0]) ?>
        <?= $form->field($model, 'faculty_dinner')->dropDownList(Definitions::getFacultyDinner(), ['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'is_vip')->dropDownList(Definitions::getIsVip(),['prompt'=>'Please Select']) ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
