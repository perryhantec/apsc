<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Definitions;
use common\models\CallForAbstract;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\components\MultipleInput;
use unclead\multipleinput\TabularColumn;

$title_text = 'Call For Abstract';
$title_text2 = 'Send Confirmation Email';

$this->title =  $title_text2;

$this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
$this->params['breadcrumbs'][] = $title_text2;

$all_abstracts = [];
// $all_users = Registration::find()->select('id,user_id')->where()->asArray()->all();
$all_abstracts = CallForAbstract::find()->select('id,abstract_no,user_id')->where(['abstract_status' => CallForAbstract::ABSTRACT_STATUS_SUBMITTED])->asArray()->all();

$abstracts_php = json_encode($all_abstracts);

// $bulk_email_types = Definitions::getpaymentEmailType();

$js = <<<JS
// $('#ingredients .confirm').each(function () {
//     if ($(this).closest('tr').find('.ingredient_id').val() > 0) {
//         // if ($(this).closest('tr').find('.dish_id').val() == $(this).closest('tr').find('.dish').val()) {
    
//         $(this).closest('tr').find('.ingredient').val($(this).closest('tr').find('.ingredient_id').val());
//         $(this).trigger('click');
//     }
// });

// hideUnselectedAbstract();
JS;

$this->registerJs($js);
?>
<br>
<style>
.form-control-static {
    padding-top: 0;
    padding-bottom: 0;
}
ul#result{list-style-type:none;margin:0;padding:0;}
ul#result:after,.abstracts:after{display:table;content:'';clear:both;}
ul#result li{float:left;width:33.3333%;}
.abstracts label{float:left;width:33.3333%;}
.abstract-checkbox{opacity:0;margin-left:-15px!important;}
input[type=checkbox],label{cursor:pointer;}

</style>
 <div class="modal-content">
   <div class="modal-body">
   <?php $form = ActiveForm::begin(); ?>

   <div class="form-group">
       <?= Html::button('選擇全部', ['class' => 'btn btn-success', 'onclick' => 'selectAll();']) ?>
       <?= Html::button('取消全部', ['class' => 'btn btn-warning', 'onclick' => 'unselectAll();']) ?>
   </div>

    <?= $form->field($model, 'abstract_ids')->checkboxList(Definitions::getSubmittedAbstract(), ['id' => 'abstract_ids', 'class' => 'abstracts']); ?>

   <div class="form-group">
       <?= Html::submitButton('Send Email', ['class' => 'btn btn-success']) ?>
       <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
   </div>

   <?php ActiveForm::end(); ?>
 </div>
</div><!-- /.modal-content -->
<script>
function selectAll() {
    $('#abstract_ids').children().each(function (i, v) {
        $(this).find('input[type=checkbox]').prop('checked', true).trigger('change');
    });

    return;
}

function unselectAll() {
    $('#abstract_ids').children().each(function (i, v) {
        $(this).find('input[type=checkbox]').prop('checked', false).trigger('change');
    });

    return;
}
</script>
