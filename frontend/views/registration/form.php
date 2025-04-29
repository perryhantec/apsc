<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Config;
use common\models\Definitions;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\FileInput;


$this->title = 'Online Registration Form';

$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$ajax_url = Url::to(["check-form"]);

// Yii::$app->params['page_header_title'] = $this->title;
// Yii::$app->params['breadcrumbs'][] = $this->title;

$reg_text_model = common\models\RegistrationText::findOne(1);

$setting_model = common\models\Setting::findOne(1);

$current_timestamp = time();
$reg_early_close_timestamp = strtotime($setting_model->reg_early_close);
$reg_regular_close_timestamp = strtotime($setting_model->reg_regular_close);

$current = $model->current;

$script = <<<JS
    let current = $current;

    setCurrentPage(current);

    $('#registration-form').find('.hide-error').on('click', function () {
        // $(this).closest('.required').removeClass('has-error').addClass('has-success').siblings('.required').removeClass('has-error').addClass('has-success').siblings('.show-error').empty();
        $(this).closest('.radio-group').find('.required').each(function () {
            $(this).removeClass('has-error').addClass('has-success');
        }).closest('.radio-group').find('.show-error').empty();
    });
JS;

$this->registerJs($script);
?>
<style>
#progress-bar{display:block;}
#hidden-nav{position:absolute;left:-9999px;opacity:0;}
.reg-deadline{margin-top:-30px;}
.reg-deadline p{text-align:center;}
.reg-contact p{margin-bottom:0;}
.summary h4{color:#000!important;margin-bottom:0;}
.hide-error+p{display:none;}
.box-footer{margin-top:15px;}
</style>
<?= Alert::widget() ?>
<div class="page-my">

    <div id="hidden-nav">
        <ul>
            <li><a id="s1" data-toggle="tab" href="#step1">Step 1</a></li>
            <li><a id="s2" data-toggle="tab" href="#step2">Step 2</a></li>
            <li><a id="s3" data-toggle="tab" href="#step3">Step 3</a></li>
            <li><a id="s4" data-toggle="tab" href="#step4">Step 4</a></li>
        </ul>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'registration-form',
        // 'enableClientValidation'=> false,
        // 'enableAjaxValidation' => false,
        'validateOnSubmit' => false,
    ]); ?>


    <div class="tab-content">
        <div id="step1" class="tab-pane">
<?php if ($current_timestamp < $reg_early_close_timestamp) { ?>
            <div class="reg-deadline"><?= $reg_text_model->early1 ?></div>
<?php } else if ($current_timestamp < $reg_regular_close_timestamp) { ?>
            <div class="reg-deadline"><?= $reg_text_model->regular1 ?></div>
<?php } else { ?>
            <div class="reg-deadline"><?= $reg_text_model->late1 ?></div>
<?php } ?>

            <div class="reg-contact"><?= $reg_text_model->contact ?></div>
            <em><span style="font-size:10pt;color:#b20000;">* Mandatory Items</span></em>
            <div class="well content">
                <h3>Personal Information</h3>
                <p>Please enter your <b><u>full name</u></b> (same as your official identity record) as your registration details will be used for the issuance of E-certificate of Attendance after the Conference.</p>

                <?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'title')->widget(Select2::classname(), [
                            'data' => ArrayHelper::htmlEncode(Definitions::getPrefix()),
                            'options' => [
                                // 'multiple' => true
                                'prompt' => '',
                                'id' => 'reg-title',
                                // 'onchange' => 'getSummary();',
                            ],
                        ]); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'last_name')->textInput(['id' => 'reg-last_name']); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'first_name')->textInput(['id' => 'reg-first_name']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'department')->textInput(['id' => 'reg-department']); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'institution')->textInput(['id' => 'reg-institution']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'country')->widget(Select2::classname(), [
                            // 'data' => ArrayHelper::htmlEncode(Definitions::getCountry()),
                            'data' => Definitions::getCountry(),
                            'options' => [
                                // 'multiple' => true
                                'prompt' => '',
                                'id' => 'reg-country',
                            ],
                            'pluginOptions' => [
                            ],
                        ]); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => "", 'id' => 'reg-email']); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 're_email')->textInput()->input('email', ['placeholder' => "", 'id' => 'reg-re_email']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'other_email')->textArea(['id' => 'reg-other_email', 'rows' => 2]); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'country_code')->textInput(['id' => 'reg-country_code']); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'mobile')->textInput(['id' => 'reg-mobile']); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'office_phone')->textInput(['id' => 'reg-office_phone']); ?>
                    </div>
                </div>

                <h3>Profession and Specialty</h3>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'professions')->widget(Select2::classname(), [
                            'data' => ArrayHelper::htmlEncode(Definitions::getProfessions()),
                            'options' => [
                                'prompt' => '',
                                'id' => 'reg-professions',
                            ],
                        ]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'other_pro')->textInput(); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'specialty')->widget(Select2::classname(), [
                            // 'data' => ArrayHelper::htmlEncode(Definitions::getSpecialty()),
                            'data' => Definitions::getSpecialty(),
                            'options' => [
                                'prompt' => '',
                                'id' => 'reg-specialty',
                            ],
                        ]); ?>
                    </div>
                </div>

                <h3>Special Dietary Requirement</h3>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'dietary')->widget(Select2::classname(), [
                            'data' => ArrayHelper::htmlEncode(Definitions::getDietary()),
                            'options' => [
                                'prompt' => '',
                                'id' => 'reg-dietary',
                            ],
                        ])->label(false); ?>
                    </div>
                </div>

                <div><?= $reg_text_model->special ?></div>

                <h3 class="title-required">Personal Statement</h3>

                <?= $form->field($model, 'statement')->radioList(Definitions::getStatement(),['id' => 'reg-statement'])->label(false) ?>
        <?php if (0) { ?>
                <?= $form->field($model, 'is_refund')->radioList(Definitions::getIsRefund()) ?>
        <?php } ?>

                <div id="reg-is_refund" class="radio-group">
                    <label class="required control-label">Application for Registration Fee Refund (Only eligible to student aged 40 or below from Hong Kong / LIC / LMIC)</label>
                    <?= $form->field($model, 'is_refund', ['enableClientValidation' => false])->radio([
                        'label' => 'I wish to apply for Registration Fee Refund at the conference venue during the conference. I confirm that I am a student participant from Hong Kong SAR, or Lower Income Country (LIC), or Lower Middle Income Country (LMIC) who submitted an abstract to APSC 2023. I understand that only participants whose abstract is being accepted will be considered for a Registration Fee Refund, and the decision of the Organizers on the refund arrangements shall be final and conclusive. I confirm that I am 40 years old or below during the time when the conference takes place. Please upload your proof of student status issued by qualified institution (e.g. Student ID Card / confirmation letter) below.',
                        'value' => 1,
                        'id' => 'is_refund_1',
                        'labelOptions' => [
                            'for' => 'is_refund_1',
                            'class' => 'hide-error',
                        ],
                        'uncheck'      => null
                    ]) ?>

                    <?= $form->field($model, 'file_name')->widget(FileInput::classname(), [
                        'options' => ['multiple' => false, 'id' => 'file_name'],
                        // 'options' => ['multiple' => false],
                        'pluginOptions' => [
                            'showPreview' => false,
                            'previewFileType' => 'any',
                            // 'showRemove' => false,
                            'showUpload' => false,
                        ]
                    ]); ?>

                    <?= $form->field($model, 'is_refund', ['enableClientValidation' => false])->radio([
                        'label' => 'I am NOT eligible for the Registration Fee Refund.',
                        'value' => 2,
                        'id' => 'is_refund_2',
                        'labelOptions' => [
                            'for' => 'is_refund_2',
                            'class' => 'hide-error',
                        ],
                        'uncheck'      => null
                    ]) ?>

                    <?= Html::decode(Html::error($model, 'is_refund', ['style' => 'color:#a94442;', 'class' => 'show-error'])); ?>
                </div>

                <?= $form->field($model, 'hotel')->radioList(Definitions::getHotel(),['id' => 'reg-hotel']) ?>
            </div>

            <div class="clearfix box-footer text-center">
                <div class="pull-right">
                    <?= Html::button('Return to summary', ['type' => 'button', 'class' => 'btn btn-primary btn-lg return-to-summary-btn hidden', 'onclick' => 'setPage(1, 1, 0, 1);']) ?>
                    <?= Html::button('Next', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(1, 1, 0, 0);']) ?>
                </div>
            </div>
        </div>
        <div id="step2" class="tab-pane">

            <h3>Registration Category</h3>

            <?= $this->render('_payment_type', ['reg_text_model' => $reg_text_model, 'form' => $form, 'model' => $model]) ?>
            
            <div class="well">
                <h3>Gala Dinner on 2 Dec 2023 (Sat), 7pm Hong Kong SAR Time</h3>

                <div><?= $reg_text_model->dinner ?></div>
            
                <div class="row">
                    <div class="col-md-9">
                        <?= $form->field($model, 'dinner', ['template' => '
                            <button type="button" class="pull-left" onclick="setDinner(\'plus\');"><i class="fa fa-plus"></i></button>
                            {input}
                            <button type="button" class="pull-left" onclick="setDinner(\'minus\');"><i class="fa fa-minus"></i></button>
                            <div class="pull-left"><strong>&nbsp;Gala Dinner</strong></div>
                            <div class="clearfix"></div>
                        '])->textInput([
                            'type' => 'number',
                            'min' => 0,
                            'style' => 'width:50px;',
                            'id' => 'reg-dinner',
                            'class' => 'pull-left text-center',
                        ])->label(false) ?>
                    </div>
                    <div class="col-md-3 text-right">
                        <div>USD 80 / HKD 640</div>
                    </div>
                </div>
            </div>

            <div id="your-item" class="well hidden">
                <h3>Item(s)</h3>
            
                <div class="row">
                    <table class="table">
                        <tr id="item1" class="hidden">
                            <td></td>
                            <td class="text-right" style="white-space:nowrap;"></td>
                        </tr>
                        <tr id="item2" class="hidden">
                            <td></td>
                            <td class="text-right" style="white-space:nowrap;"></td>
                        </tr>
                        <tr id="item-total">
                            <td colspan="2" class="text-right"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="clearfix box-footer text-center">
                <div class="pull-left">
                    <?= Html::button('Back', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(1, 0, 0, 0);']) ?>
                </div>

                <div class="pull-right">
                    <?= Html::button('Return to summary', ['type' => 'button', 'class' => 'btn btn-primary btn-lg return-to-summary-btn hidden', 'onclick' => 'setPage(2, 1, 0, 1);']) ?>
                    <?= Html::button('Next', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(2, 1, 0, 0);']) ?>
                </div>
            </div>
        </div>
        <div id="step3" class="tab-pane">

            <div class="well summary">
                <h3 style="color:#b20000;">Please check if the below information is correct</h3>

                <div>
                    <label class="control-label green-title">Personal Information</label>
                    <?= Html::button('Edit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg pull-right', 'onclick' => 'setPage(1, 0, 1, 0);']) ?>
                    <div class="clearfix"></div>
                    <hr class="hr02">
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Title</h4>
                        <div id="summary-reg-title"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Last Name</h4>
                        <div id="summary-reg-last_name"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <h4>First Name</h4>
                        <div id="summary-reg-first_name"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Department</h4>
                        <div id="summary-reg-department"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <h4>Institution / Hospital</h4>
                        <div id="summary-reg-institution"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Country</h4>
                        <div id="summary-reg-country"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <h4>Email Address</h4>
                        <div id="summary-reg-email"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Other Email Address</h4>
                        <div id="summary-reg-other_email"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Country Code</h4>
                        <div id="summary-reg-country_code"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <h4>Mobile Phone No.</h4>
                        <div id="summary-reg-mobile"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Office Phone No.</h4>
                        <div id="summary-reg-office_phone"></div>
                    </div>
                </div>

                <div>
                    <label class="control-label green-title">Profession and Specialty</label>
                    <?= Html::button('Edit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg pull-right', 'onclick' => 'setPage(1, 0, 1, 0);']) ?>
                    <div class="clearfix"></div>
                    <hr class="hr02">
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <h4>Profession</h4>
                        <div id="summary-reg-professions"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <h4>Specialty</h4>
                        <div id="summary-reg-specialty"></div>
                    </div>
                </div>

                <div>
                    <label class="control-label green-title">Special Dietary Requirement</label>
                    <?= Html::button('Edit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg pull-right', 'onclick' => 'setPage(1, 0, 1, 0);']) ?>
                    <div class="clearfix"></div>
                    <hr class="hr02">
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <div id="summary-reg-dietary"></div>
                    </div>
                </div>

                <div>
                    <label class="control-label green-title">Personal Statement</label>
                    <?= Html::button('Edit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg pull-right', 'onclick' => 'setPage(1, 0, 1, 0);']) ?>
                    <div class="clearfix"></div>
                    <hr class="hr02">
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <div id="summary-reg-statement"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <h4>Application for Registration Fee Refund</h4>
                        <div id="summary-reg-is_refund"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <h4>Accommodation Arrangements</h4>
                        <div id="summary-reg-hotel"></div>
                    </div>
                </div>

                <div>
                    <label class="control-label green-title">Registration Category</label>
                    <?= Html::button('Edit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg pull-right', 'onclick' => 'setPage(2, 0, 1, 0);']) ?>
                    <div class="clearfix"></div>
                    <hr class="hr02">
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <div id="summary-reg-payment_type"></div>
                    </div>
                </div>

                <div class="hidden">
                    <label class="control-label green-title">Gala Dinner on 2 Dec 2023 (Sat), 7pm Hong Kong SAR Time</label>
                    <?= Html::button('Edit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg pull-right', 'onclick' => 'setPage(2, 0, 1, 0);']) ?>
                    <div class="clearfix"></div>
                    <hr class="hr02">
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <div id="summary-reg-dinner"></div>
                    </div>
                </div>
            </div>

            <div class="well">
                <div><?= $reg_text_model->rules ?></div>
                <?= $form->field($model, 'terms')->checkbox([
                    'id' => 'reg-terms',
                    'value' => 1,
                    'uncheck' => null
                ]) ?>
            </div>

            <div class="clearfix box-footer text-center">
                <div class="pull-left">
                    <?= Html::button('Back', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(2, 0, 0, 0);']) ?>
                </div>

                <div class="pull-right">
                    <?= Html::button('Next', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(3, 1, 0, 0);']) ?>
                </div>
            </div>
        </div>
        <div id="step4" class="tab-pane">
            <div class="well">
                <h3>Payment</h3>

                <div class="panel panel-default">
                    <table class="table">
                        <tr id="reg-total">
                            <td>Registration Total</td>
                            <td class="text-right" style="white-space:nowrap;"></td>
                        </tr>
                        <tr id="amt-payable">
                            <td><strong>Amount Payable</strong></td>
                            <td class="text-right" style="white-space:nowrap;"></td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'payment_method')->radioList(Definitions::getPaymentMethodDetailNoPaypal(),['id' => 'reg-payment_method']) ?>
                    </div>
                </div>
            </div>

<?php if (0) { ?>
            <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha3::className(),
                [
                    'action' => 'registration'
                ]
            )->label(false) ?>
<?php } ?>

            <div class="clearfix box-footer text-center">
                <?= $form->field($model, 'current')->hiddenInput(['id' => 'current'])->label(false) ?>
<?php if (0) { ?>
                <?= $form->field($model, 'is_check')->hiddenInput(['id' => 'is_check'])->label(false) ?>
                <?= $form->field($model, 'show_back_summary_btn')->hiddenInput(['id' => 'show_back_summary_btn'])->label(false) ?>
                <?= $form->field($model, 'return_to_summary')->hiddenInput(['id' => 'return_to_summary'])->label(false) ?>
<?php } ?>

                <div class="pull-left">
                    <?= Html::button('Back', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(3, 0, 0, 0);']) ?>
                </div>

                <div class="pull-right">
                <?php if (0) { ?>
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                <?php } ?>
                    <?= Html::button('Submit', ['type' => 'button', 'class' => 'btn btn-primary btn-lg', 'onclick' => 'setPage(4, 1, 0, 0);']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
let price1 = price2 = total = hkPrice1 = hkPrice2 = hkTotal = 0;

function setCurrentPage(current) {
    let bar = (current - 1) * 25;

    bar = bar + '%';

    if (current == 3) {
        getSummary();
    } else if (current == 4) {
        getItemTotal();
    }
    $('#s' + current).trigger('click');
    $('#progress-bar').find('.progress-bar').css({'width':bar}).find('span').empty().text(bar);
}

function setDinner(action) {
    let val = $('#reg-dinner').val();
    if (action == 'plus') {
        val++;
    } else if (action == 'minus') {
        if (val > 0) {
            val--;
        }
    }

    $('#reg-dinner').val(val);
    setItem2();
}
function setItem1(_this, price) {
    let text = $(_this).closest('label').text();
    price1 = price;
    hkPrice1 = price1 * 8;

    $('#your-item').removeClass('hidden');
    $('#item1').removeClass('hidden').find('td').eq(0).text(text).next().text('USD ' + price1 + ' / HKD '+ hkPrice1);

    setItemTotal();
}
function setItem2() {
    let val = $('#reg-dinner').val();

    if (val > 0) {
        price2 = val * 80;
        hkPrice2 = price2 * 8;

        $('#your-item').removeClass('hidden');
        $('#item2').removeClass('hidden').find('td').eq(0).text(val + ' * Gala Dinner').next().text('USD ' + price2 + ' / HKD '+ hkPrice2);
    } else {
        price2 = 0;
        $('#item2').addClass('hidden');

        if ($('#item1').hasClass('hidden')) {
            $('#your-item').addClass('hidden');
        }
    }

    setItemTotal();
}
function setItemTotal() {
    total = price1 + price2;
    hkTotal = total * 8;

    $('#item-total').find('td').empty().html('<strong>Total: <span style="border-bottom:3px double #000;">USD ' + total + ' / HKD '+ hkTotal + '</span></strong>');
}
function getSummary() {
    $('#summary-reg-title').empty().html($('#reg-title').val() || '&nbsp;');
    $('#summary-reg-last_name').empty().html($('#reg-last_name').val() || '&nbsp;');
    $('#summary-reg-first_name').empty().html($('#reg-first_name').val() || '&nbsp;');
    $('#summary-reg-department').empty().html($('#reg-department').val() || '&nbsp;');
    $('#summary-reg-institution').empty().html($('#reg-institution').val() || '&nbsp;');
    $('#summary-reg-country').empty().html($('#reg-country').find(":selected").text() || '&nbsp;');
    $('#summary-reg-email').empty().html($('#reg-email').val() || '&nbsp;');
    $('#summary-reg-other_email').empty().html($('#reg-other_email').val() || '&nbsp;');
    $('#summary-reg-country_code').empty().html($('#reg-country_code').val() || '&nbsp;');
    $('#summary-reg-mobile').empty().html($('#reg-mobile').val() || '&nbsp;');
    $('#summary-reg-office_phone').empty().html($('#reg-office_phone').val() || '&nbsp;');
    $('#summary-reg-professions').empty().html($('#reg-professions').find(":selected").text() || '&nbsp;');
    $('#summary-reg-other_pro').empty().html($('#reg-other_pro').val() || '&nbsp;');
    $('#summary-reg-specialty').empty().html($('#reg-specialty').find(":selected").text() || '&nbsp;');
    $('#summary-reg-dietary').empty().html($('#reg-dietary').find(":selected").text() || '&nbsp;');
    $('#summary-reg-statement').empty().html($('#reg-statement').find('input[type="radio"]:checked').closest('label').text() || '&nbsp;');
    $('#summary-reg-is_refund').empty().html($('#reg-is_refund').find('input[type="radio"]:checked').closest('label').text() || '&nbsp;');
    $('#summary-reg-hotel').empty().html($('#reg-hotel').find('input[type="radio"]:checked').closest('label').text() || '&nbsp;');
    $('#summary-reg-payment_type').empty().html($('#reg-payment_type').find('input[type="radio"]:checked').closest('label').text() || '&nbsp;');
    $('#summary-reg-dinner').empty().html($('#reg-dinner').val() > 0 ? 'Gala Dinner' : '&nbsp;');
}
function getItemTotal() {
    $('#reg-payment_type').find('input[type="radio"]:checked').trigger('click');
    setItem2();

    $('#reg-total').find('td').eq(1).empty().html('USD ' + total + ' / HKD '+ hkTotal);
    $('#amt-payable').find('td').eq(1).empty().html('<strong><span style="border-bottom:3px double #000;">USD ' + total + ' / HKD '+ hkTotal + '</span></strong>');
}
function setPage(page, isCheck, showBackSummaryBtn, returnToSummary) {
    // $('#current').val(page);
    // $('#is_check').val(isCheck);
    // $('#show_back_summary_btn').val(showBackSummaryBtn);
    // $('#return_to_summary').val(returnToSummary);

    // $('#registration-form').trigger('submit');

    if (isCheck) {
        let data = $('#registration-form').serializeArray(), nextPage, firstError;

        $('#registration-form').find('.required').each(function () {
            $(this).removeClass('has-error').find('p.help-block-error').empty().addBack().siblings('.show-error').empty();
            $(this).parent().find('.show-error').empty();
        });

        if ($('#file_name').val() && $('#file_name').closest('.form-group').hasClass('has-error')) {
            data.push({ "name": "[file_name]", "value": "invalid" });
        }

        $.ajax({
            url: '<?= $ajax_url ?>',
            data: {data},
            method: 'post',
            beforeSend: function () {
                $('#ajaxLoader').show();
            },
            complete: function () {
                $('#ajaxLoader').hide();
            },
            error: function () {
                $('#ajaxLoader').hide();
            },
            timeout: function () {
                $('#ajaxLoader').hide();
            },
            success: function(rslt){
                console.log(rslt);
                /**** Result process ****/
                if (rslt['rslt']['code'] == -1) {

                    for (let errorKey in rslt['rslt']['errors']) {

                        if (errorKey == 'file_name') {
                            if (!firstError) firstError = '#file_name';
                        } else if (!(errorKey == 'is_refund' || errorKey == 'payment_type')) {
                            $('#reg-' + errorKey).closest('.form-group').removeClass('has-success').addClass('has-error').find('p.help-block-error').text(rslt['rslt']['errors'][errorKey]);

                            if (!firstError) firstError = '#reg-' + errorKey;
                        } else {
                            $('#reg-' + errorKey).find('.show-error').text(rslt['rslt']['errors'][errorKey]);
                            $('#reg-' + errorKey).find('.hide-error').each(function () { $(this).closest('.form-group').addClass('has-error'); });

                            if (!firstError) firstError = '#reg-' + errorKey;
                        }
                    }

                    // console.log('firstError',firstError);
                    $('html, body').animate({
                        // scrollTop: $('#s' + page).offset().top
                        scrollTop: $(firstError).offset().top
                    }, 0);
                } else if (rslt['rslt']['code'] == 1) {
                    if (returnToSummary) {
                        nextPage = 3;
                    } else {
                        nextPage = page + 1;
                    }

                    $('#current').val(nextPage);

                    $('#registration-form').find('.return-to-summary-btn').each(function () {
                        if (showBackSummaryBtn) {
                            $(this).removeClass('hidden');
                        } else {
                            $(this).addClass('hidden');
                        }
                    });

                    if (nextPage > 4) {
                        $('#registration-form').trigger('submit');
                    } else {
                        setCurrentPage(nextPage);

                        $('html, body').animate({
                            // scrollTop: $('#s' + page).offset().top
                            scrollTop: $('#progress-bar').offset().top
                        }, 0);
                    }
                } else {
                    return;
                }
            }
        });
    } else {
        $('#current').val(page);

        $('#registration-form').find('.return-to-summary-btn').each(function () {
            if (showBackSummaryBtn) {
                $(this).removeClass('hidden');
            } else {
                $(this).addClass('hidden');
            }
        });

        setCurrentPage(page);

        $('html, body').animate({
            // scrollTop: $('#s' + page).offset().top
            scrollTop: $('#progress-bar').offset().top
        }, 0);
    }

}
</script>
