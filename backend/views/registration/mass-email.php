<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Definitions;
use common\models\Registration;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\components\MultipleInput;
use unclead\multipleinput\TabularColumn;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

$title_text = 'Registration';
$title_text2 = 'Mass Email';

$this->title =  $title_text2;

$this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
$this->params['breadcrumbs'][] = $title_text2;



// $bulk_email_types = Definitions::getBulkEmailType();

$js = <<<JS
// $('#ingredients .confirm').each(function () {
//     if ($(this).closest('tr').find('.ingredient_id').val() > 0) {
//         // if ($(this).closest('tr').find('.dish_id').val() == $(this).closest('tr').find('.dish').val()) {
    
//         $(this).closest('tr').find('.ingredient').val($(this).closest('tr').find('.ingredient_id').val());
//         $(this).trigger('click');
//     }
// });

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
ul#result:after,.regs:after{display:table;content:'';clear:both;}
ul#result li{float:left;width:33.3333%;}
.regs label{float:left;width:33.3333%;}
.reg-checkbox{opacity:0;margin-left:-15px!important;}
input[type=checkbox],label{cursor:pointer;}

</style>
 <div class="modal-content">
   <div class="modal-body">
   <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'mass_email_title')->textInput(); ?>

        <?= $form->field($model, 'mass_email_content')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
            ]);
        ?>
        <?= $form->field($model, 'reg_ids')->checkboxList(Definitions::getRegistration(), ['id' => 'reg_ids', 'class' => 'regs']); ?>

        <div class="form-group">
            <?= Html::button('選擇目前全部', ['class' => 'btn btn-success', 'onclick' => 'selectAll();']) ?>
            <?= Html::button('取消目前全部', ['class' => 'btn btn-warning', 'onclick' => 'unselectAll();']) ?>
        </div>

        <hr />

        <div class="form-group">
            <?= Html::submitButton('Send Email', ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </div>

   <?php ActiveForm::end(); ?>
 </div>
</div><!-- /.modal-content -->
<script>
function selectAll() {
    $('#reg_ids').children().each(function (i, v) {
        $(this).find('input[type=checkbox]').prop('checked', true);
    });

    return;
}

function unselectAll() {
    $('#reg_ids').children().each(function (i, v) {
        $(this).find('input[type=checkbox]').prop('checked', false);
    });

    return;
}
</script>