<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Definitions;
use common\models\Registration;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use common\components\MultipleInput;
use unclead\multipleinput\TabularColumn;

$title_text = 'Registration';
$title_text2 = 'Payment Email';

$this->title =  $title_text2;

$this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
$this->params['breadcrumbs'][] = $title_text2;

$all_regs = [];
// $all_users = Registration::find()->select('id,user_id')->where()->asArray()->all();
$all_regs = Registration::find()->select('id,title,last_name,first_name,status,is_vip')->asArray()->all();

$regs_php = json_encode($all_regs);

// $bulk_email_types = Definitions::getpaymentEmailType();

$js = <<<JS
// $('#ingredients .confirm').each(function () {
//     if ($(this).closest('tr').find('.ingredient_id').val() > 0) {
//         // if ($(this).closest('tr').find('.dish_id').val() == $(this).closest('tr').find('.dish').val()) {
    
//         $(this).closest('tr').find('.ingredient').val($(this).closest('tr').find('.ingredient_id').val());
//         $(this).trigger('click');
//     }
// });

hideUnselectedReg();
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

   <div class="form-group">
        <div class="row">
            <div class="col-md-4">
<?php if (0) { ?>
                <!-- <label for="payment-email-type">電郵種類</label>
                <select id="payment-email-type" class="form-control">
                    <option value=""></option>
                    <?php foreach ($bulk_email_types as $k => $v) { ?>
                        <option value="<?= $k ?>"><?= $v ?></option>
                    <?php } ?>
                </select> -->
<?php } ?>
                <?= $form->field($model, 'payment_email_type')->dropDownList(Definitions::getPaymentEmailType(),['id' => 'payment-email-type', 'prompt'=>'', 'onchange'=>'unselectAllSelected();']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
       <?= Html::button('搜尋', ['class' => 'btn btn-info', 'onclick' => 'getResult();']) ?>
       <?= Html::button('隱藏搜尋', ['class' => 'btn btn-danger', 'onclick' => 'hideResult();']) ?>
       <?= Html::button('選擇目前全部', ['class' => 'btn btn-success', 'onclick' => 'selectAll();']) ?>
       <?= Html::button('取消目前全部', ['class' => 'btn btn-warning', 'onclick' => 'unselectAll();']) ?>
   </div>

   <div class="row">
        <div class="col-md-12">
            <ul id="result">
<?php foreach ($all_regs as $reg) { ?>
                <li data-id="<?= $reg['id'] ?>" class="hidden">
                    <input id="r<?= $reg['id'] ?>" type="checkbox" value="<?= $reg['id'] ?>" onchange="setRegIds(this);">
                    <label for="r<?= $reg['id'] ?>"><?= $reg['title'].' '.$reg['first_name'].' '.$reg['last_name'] ?></label>
                </li>
<?php } ?>
            </ul>
        </div>
    </div>

    <hr />
    <?= $form->field($model, 'reg_ids')->checkboxList(Definitions::getRegistration(), ['id' => 'reg_ids', 'class' => 'regs', 'onclick' => 'return false;', 'itemOptions' => ['class' => 'reg-checkbox']]); ?>

   <div class="form-group">
       <?= Html::submitButton('Send Email', ['class' => 'btn btn-success']) ?>
       <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
   </div>

   <?php ActiveForm::end(); ?>
 </div>
</div><!-- /.modal-content -->
<script>
let regs = <?= $regs_php ?>;
let statusConfirmed = '<?= Registration::STATUS_CONFIRMED ?>';

let html = initOption = '';
let initIndex = [];

function getResult() {
    let paymentEmailType = $('#payment-email-type').val();
    let id = '';
    let ids = [];

    $.each(regs, function (i, v) {
        if (paymentEmailType == 3) {
            if (v.status == statusConfirmed && v.is_vip == 1) {
                ids.push(v.id);
            }
        } else if  (paymentEmailType == 2) {
            if (v.status == statusConfirmed && v.is_vip != 1) {
                ids.push(v.id);
            }
        } else if  (paymentEmailType == 1) {
            if (v.status != statusConfirmed) {
                ids.push(v.id);
            }
        }
    });

    $('#result').children().each(function (i, v) {
        $(this).addClass('hidden');

        id = $(this).data('id');
        id = id.toString();
        if (ids.includes(id)) {
            $(this).removeClass('hidden');
        }
    });

    return;
}

function hideResult() {
    $('#result').children().each(function (i, v) {
        $(this).addClass('hidden');
    });

    return;
}
// function setRegIds() {
//     let _this, result;
//     $('#result input[type=checkbox]').each(function (i, v) {
//         _this = this;

//         $('#ingredient_ids').children().each(function (i, v) {
//             $(this).removeClass('hidden');
//             if($(this).children().val() == $(_this).val()) {
//                 result = $(_this).prop('checked');
//                 $(this).children().prop('checked', result);
//             }
//         });
//     });

//     hideUnselectedReg();
// }
function setRegIds(_this) {
    let result;

    $('#reg_ids').children().each(function (i, v) {
        $(this).removeClass('hidden');
        if($(this).children().val() == $(_this).val()) {
            result = $(_this).prop('checked');
            $(this).children().prop('checked', result);
        }
    });

    hideUnselectedReg();

    return;
}

function hideUnselectedReg() {
    $('#reg_ids').children().each(function (i, v) {
        if($(this).children().prop('checked') == false) {
            $(this).addClass('hidden');
        }
    });

    return;
}

function selectAll() {
    $('#result').children().each(function (i, v) {
        if(!$(this).hasClass('hidden')) {
            $(this).find('input[type=checkbox]').prop('checked', true).trigger('change');
        }
    });

    return;
}

function unselectAll() {
    $('#result').children().each(function (i, v) {
        if(!$(this).hasClass('hidden')) {
            $(this).find('input[type=checkbox]').prop('checked', false).trigger('change');
        }
    });

    return;
}

function unselectAllSelected() {
    $('#result').children().each(function (i, v) {
        $(this).find('input[type=checkbox]').prop('checked', false).trigger('change');
    });

    hideResult();

    return;
}
</script>
