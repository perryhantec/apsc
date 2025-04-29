<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use common\models\Definitions;

$title_text = '登記職員';

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
   
     <?= $form->field($model, 'name')->textInput() ?>
     <?= $form->field($model, 'username')->textInput() ?>
     <?= $form->field($model, 'new_password')->textInput(['type' => 'password']) ?>
     <?= $form->field($model, 'status')->dropDownList(Definitions::getStatus(),['prompt'=>Yii::t('app', 'Please Select')]) ?>

   <div class="form-group">
       <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
       <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
   </div>

   <?php ActiveForm::end(); ?>
 </div>
</div><!-- /.modal-content -->
