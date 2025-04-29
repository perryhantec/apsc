<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use common\models\Definitions;

$title_text = 'Abstract 會員';

$this->title = $title_text.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
if (!$model->isNewRecord)
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = (($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$this->registerJs(<<<JS

JS
);

if ($model->isNewRecord) {
    $model->status = $model::STATUS_ACTIVE;
}
?>
<br>
 <div class="modal-content">
   <div class="modal-body">
   <?php $form = ActiveForm::begin(); ?>
   
     <?= $form->field($model, 'title')->dropDownList(Definitions::getPrefix(),['prompt'=>Yii::t('app', 'Please Select')]) ?>
     <?= $form->field($model, 'first_name')->textInput() ?>
     <?= $form->field($model, 'last_name')->textInput() ?>
     <?= $form->field($model, 'department')->textInput() ?>
     <?= $form->field($model, 'institution')->textInput() ?>
     <?= $form->field($model, 'email')->textInput() ?>
     <?= $form->field($model, 'other_email')->textArea(['rows' => 5]) ?>
     <?= $form->field($model, 'mobile')->textInput() ?>
     <?= $form->field($model, 'work_mobile')->textInput() ?>
     <?= $form->field($model, 'country')->dropDownList(Definitions::getCountry(),['prompt'=>Yii::t('app', 'Please Select')]) ?>
     <?= $form->field($model, 'username')->textInput() ?>
     <?= $form->field($model, 'new_password')->textInput(['type' => 'password']) ?>
<?php if (0) { ?>
     <?= $form->field($model, 'status')->dropDownList(Definitions::getStatus(),['prompt'=>Yii::t('app', 'Please Select')]) ?>
<?php } ?>

   <div class="form-group">
       <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
       <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
   </div>

   <?php ActiveForm::end(); ?>
 </div>
</div><!-- /.modal-content -->
