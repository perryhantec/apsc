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
$this->title = 'Printer Setting - '.(($model->isNewRecord)? 'Create' : 'Update');

$this->params['breadcrumbs'][] = ['label' => 'Printer Setting', 'url' => ['index']];
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
        <?= $form->field($model, 'location')->textInput() ?>
        <?= $form->field($model, 'ip')->textInput() ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
