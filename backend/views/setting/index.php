<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Definitions;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\DateTimePicker;

$title_text = '設定';

$this->title =  $title_text.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

// $this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
// if (!$model->isNewRecord)
//     $this->params['breadcrumbs'][] = ['label' => $model->temp_no, 'url' => ['update', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = (($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$js = <<<JS

JS;

$this->registerJs($js);

?>
<br>
 <div class="modal-content">
   <div class="modal-body">
   <?php if (Yii::$app->session->hasFlash('saved')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('saved') ?>
        </div>
    <?php endif; ?>
   <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'ab_close')->widget(DateTimePicker::classname(), [
        'pluginOptions' => [
            // 'showSeconds' => true,
            'defaultTime' => false,
            'showMeridian' => false,
            'minuteStep' => 1,
            // 'secondStep' => 5,
        ]
    ]);?>

    <?= $form->field($model, 'reg_early_close')->widget(DateTimePicker::classname(), [
        'pluginOptions' => [
            // 'showSeconds' => true,
            'defaultTime' => false,
            'showMeridian' => false,
            'minuteStep' => 1,
            // 'secondStep' => 5,
        ]
    ]);?>

    <?= $form->field($model, 'reg_regular_close')->widget(DateTimePicker::classname(), [
        'pluginOptions' => [
            // 'showSeconds' => true,
            'defaultTime' => false,
            'showMeridian' => false,
            'minuteStep' => 1,
            // 'secondStep' => 5,
        ]
    ]);?>


   <div class="form-group">
       <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
   </div>

   <?php ActiveForm::end(); ?>
 </div>
</div><!-- /.modal-content -->
