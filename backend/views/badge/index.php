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
$this->title = 'Registration Quick Check';

// $this->params['breadcrumbs'][] = ['label' => 'Registration Submission', 'url' => ['index']];
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
        <?= $form->field($model, 'registration_no')->textInput(['onkeyup' => 'submitForm();', 'autofocus' => true]) ?>
    </div>

    <div class="box-footer hidden">
        <?= Html::submitButton('Submit', ['id' => 'badge-submit', 'class' => 'btn btn-success']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
 <script>
function submitForm() {
    $('#badge-submit').trigger('click');
}
</script>
