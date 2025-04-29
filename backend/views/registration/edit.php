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
$this->title = 'Registration Submission - '.(($model->isNewRecord)? 'Create' : 'Update');

$this->params['breadcrumbs'][] = ['label' => 'Registration Submission', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$grid = $model->payment_method == $model::PAYMENT_METHOD_PAYPAL ? 6 : 12;

// $crop_width = $model::CROP_WIDTH;
// $crop_height = $model::CROP_HEIGHT;

// $_file_names = [];
// if (!empty($model->file_names))
//     $_file_names = json_decode($model->file_names);

// if ($model->menu->route == "our-sharing") {
//     $crop_width = 490;
//     $crop_height = 285;
// }

$this->registerJs(<<<JS
    $('.general-image_file-img')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-general-image_file').show();
        });
JS
);
// $this->registerCss('
// .cropbox .workarea-cropbox {
//     transform: scale(0.5);
//     transform-origin: top left;
//     margin-bottom: -'.abs((($crop_height+100)/2)-20).'px;
// }
// .workarea-cropbox, .bg-cropbox {
//     width: '.($crop_width+100).'px;
//     height: '.($crop_height+100).'px;
// }
// ');
?>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    // 'options' => ['enctype' => 'multipart/form-data']
]);
?>
<div class="box box-primary">
    <div class="box-body">
        <?= $form->field($model, 'title')->dropDownList(Definitions::getPrefix(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'last_name')->textInput() ?>
        <?= $form->field($model, 'first_name')->textInput() ?>
        <?= $form->field($model, 'department')->textInput() ?>
        <?= $form->field($model, 'institution')->textInput() ?>
        <?= $form->field($model, 'country')->dropDownList(Definitions::getCountry(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'other_email')->textArea(['rows' => 2]) ?>
        <?= $form->field($model, 'country_code')->textInput() ?>
        <?= $form->field($model, 'mobile')->textInput() ?>
        <?= $form->field($model, 'office_phone')->textInput() ?>
        <?= $form->field($model, 'professions')->dropDownList(Definitions::getProfessions(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'other_pro')->textInput() ?>
        <?= $form->field($model, 'specialty')->dropDownList(Definitions::getSpecialty(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'dietary')->dropDownList(Definitions::getDietary(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'statement')->radioList(Definitions::getStatement()) ?>
        <?= $form->field($model, 'is_refund')->radioList(Definitions::getIsRefund()) ?>

        <?= $form->field($model, 'student_file_name')->hiddenInput()->label(false); ?>

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
        <?php
            if (!empty($model->student_file_name)) {
        ?>
        <div class="form-group field-general-image_file_name">
            <div class="form-control-static">
            <?php
                    $temp = explode('/',$model->student_file_name);
                    $file_name = end($temp);
            ?>
                <?= Html::tag('span', '<div><i class="fa fa-file"></i> '.$file_name.'</div>', [
                    'class' => "image-remove-trigger general-image_file-img thumbnail",
                    'title' => Yii::t('app', 'Remove'),
                    'data-input-name' => 'Registration[student_file_name]',
                    'data-toggle' => "popover",
                    'data-content' => Yii::t('app', 'Click to remove file'),
                ]) ?>
                <!-- <div><a href="<?= Yii::$app->request->hostinfo.$model->student_file_name ?>" target="_blank"><i class="fa fa-file"></i> <?= $file_name ?></a></div> -->

            </div>
        </div>

        <?php
            }
        ?>

        <?= $form->field($model, 'hotel')->radioList(Definitions::getHotel()) ?>
        <?= $form->field($model, 'payment_type')->radioList(Definitions::getRegistrationFeeLabel(),[
                                'item' => function($index, $label, $name, $checked, $value) {
                                    $amounts = Definitions::getRegistrationFeeAmount();
                                    $usd = $amounts[$value];
                                    $hkd = $usd * 8;
                                    $checked = $checked ? 'checked' : '';

                                    $return =   '<div class="radio">
                                                    <label>
                                                        <input type="radio" id="registration-payment-type--'.$index.'" name="Registration[payment_type]" value="'.$value.'" data-index="'.$index.'" '.$checked.'>
                                                         '.$label.' - USD '.$usd.' / HKD '.$hkd.'
                                                    </label>
                                                </div>';

                                    return $return;
                                }
                            ]) ?>

        <?= $form->field($model, 'dinner')->textInput(['type' => 'number','min' => 0]) ?>
        <?= $form->field($model, 'payment_method')->radioList(Definitions::getPaymentMethodDetail()) ?>

        <hr />

        <?= $form->field($model, 'is_attend')->dropDownList(Definitions::getIsAttend(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'is_vip')->dropDownList(Definitions::getIsVip(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'check_is_abstracted')->dropDownList(Definitions::getCheckIsAbstracted(), ['disabled' => true]) ?>
        <?= $form->field($model, 'faculty_dinner')->dropDownList(Definitions::getFacultyDinner(), ['prompt'=>'Please Select']) ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
