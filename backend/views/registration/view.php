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
$this->title = 'Registration Submission - '.Yii::t('app', 'View');

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
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">
        <div class="row">
            <div class="col-md-<?= $grid ?>">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">基本資料</h3>
                    </div>
                    <div class="box-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 20%; text-align: right; vertical-align: top;"{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
                            'attributes' => [
                                'created_at',
                                [
                                    'attribute' => 'is_attend',
                                    'value' => Definitions::getIsAttend($model->is_attend),
                                ],
                                'registration_no',
                                'title',
                                'first_name',
                                'last_name',
                                'department',
                                'institution',
                                [
                                    'attribute' => 'country',
                                    'value' => Definitions::getCountry($model->country),
                                ],
                                'email',
                                'other_email',
                                'country_code',
                                'mobile',
                                'office_phone',
                                [
                                    'attribute' => 'professions',
                                    'value' => Definitions::getProfessions($model->professions),
                                ],
                                'other_pro',
                                [
                                    'attribute' => 'specialty',
                                    'value' => Definitions::getSpecialty($model->specialty),
                                ],
                                [
                                    'attribute' => 'dietary',
                                    'value' => Definitions::getDietary($model->dietary),
                                ],
                                [
                                    'attribute' => 'statement',
                                    'value' => Definitions::getStatement($model->statement),
                                ],
                                [
                                    'attribute' => 'is_refund',
                                    'value' => Definitions::getIsRefund($model->is_refund),
                                ],
                                [
                                    'attribute' => 'student_file_name',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        $html = '';
                                        if ($model->student_file_name) {
                                            $html = Html::a('File', Yii::$app->request->hostinfo.$model->student_file_name, ['target' => '_blank']);
                                        }
                                        return $html;
                                    },
                                ],
                                [
                                    'attribute' => 'hotel',
                                    'value' => Definitions::getHotel($model->hotel),
                                ],
                                [
                                    'attribute' => 'payment_type',
                                    'value' => Definitions::getRegistrationFeeLabel($model->payment_type).' (USD '.Definitions::getRegistrationFeeAmount($model->payment_type).')',
                                ],
                                'dinner',
                                [
                                    'attribute' => 'payment_method',
                                    'value' => Definitions::getPaymentMethod($model->payment_method),
                                ],
                                [
                                    'attribute' => 'status',
                                    'value' => Definitions::getRegistrationStatus($model->status),
                                ],
                                [
                                    'attribute' => 'is_vip',
                                    'value' => Definitions::getIsVip($model->is_vip),
                                ],
                                [
                                    'attribute' => 'check_is_abstracted',
                                    'value' => Definitions::getCheckIsAbstracted($model->check_is_abstracted),
                                ],
                                [
                                    'attribute' => 'faculty_dinner',
                                    'value' => Definitions::getFacultyDinner($model->faculty_dinner),
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
<?php if ($model->payment_method == $model::PAYMENT_METHOD_PAYPAL) { ?>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paypal 付款資料</h3>
                    </div>
                    <div class="box-body">
                        <?php
                            // Definitions::dd($model->payment->note_array);
                        ?>
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 20%; text-align: right; vertical-align: top;"{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
                            'attributes' => [
                                [
                                    'attribute' => 'status',
                                    'value' => Definitions::getPaymentStatus($model->payment->status),
                                ],
                                [
                                    'attribute' => 'Id',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['id'];
                                    },
                                ],
                                [
                                    'attribute' => 'State',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['state'];
                                    },
                                ],
                                [
                                    'attribute' => 'Reference Code',
                                    'value' => $model->payment->refCode,
                                ],
                                [
                                    'attribute' => '交易時間',
                                    'value' => function ($model) {
                                        // $note_array = json_decode($model->payment->note, true);
                                        // Definitions::dd($model->payment->note_array);
                                        // Definitions::dd($note_array);
                                        return $model->payment->note_array[0]['datetime'];   
                                    },
                                ],
                                [
                                    'attribute' => 'Payer Email',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['payer']['payer_info']['email'];
                                    },
                                ],
                                [
                                    'attribute' => 'Payer First Name',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['payer']['payer_info']['first_name'];
                                    },
                                ],
                                [
                                    'attribute' => 'Payer Last Name',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['payer']['payer_info']['last_name'];
                                    },
                                ],
                                [
                                    'attribute' => 'Payer ID',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['payer']['payer_info']['payer_id'];
                                    },
                                ],
                                [
                                    'attribute' => 'Payer Country Code',
                                    'value' => function ($model) {
                                        return $model->payment->note_array[0]['data']['payer']['payer_info']['country_code'];
                                    },
                                ],
                                // [
                                //     'attribute' => 'Payer Business Name',
                                //     'value' => function ($model) {
                                //         return $model->payment->note_array[0]['data']['payer']['payer_info']['business_name'];
                                //     },
                                // ],
                                [
                                    'attribute' => 'Total',
                                    'value' => function ($model) {
                                        // return $model->payment->note_array[0]['data']['transactions'][0]['item_list']['items'][0]['price'];
                                        return $model->payment->note_array[0]['data']['transactions'][0]['amount']['total'];
                                    },
                                ],
                                [
                                    'attribute' => 'Currency',
                                    'value' => function ($model) {
                                        // return $model->payment->note_array[0]['data']['transactions'][0]['item_list']['items'][0]['currency'];
                                        return $model->payment->note_array[0]['data']['transactions'][0]['amount']['currency'];
                                    },
                                ],
                                [
                                    'attribute' => 'Payee Merchant ID',
                                    'value' => function ($model) {
                                        // return $model->payment->note_array[0]['data']['transactions'][0]['item_list']['items'][0]['price'];
                                        return $model->payment->note_array[0]['data']['transactions'][0]['payee']['merchant_id'];
                                    },
                                ],
                                [
                                    'attribute' => 'Payee Email',
                                    'value' => function ($model) {
                                        // return $model->payment->note_array[0]['data']['transactions'][0]['item_list']['items'][0]['price'];
                                        return $model->payment->note_array[0]['data']['transactions'][0]['payee']['email'];
                                    },
                                ],
                                [
                                    'attribute' => 'Item List',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        // return $model->payment->note_array[0]['data']['transactions'][0]['item_list']['items'][0]['price'];
                                        $html = '';
                                        $items = $model->payment->note_array[0]['data']['transactions'][0]['item_list']['items'];
                                        $total = $items ? count($items) : 0;
                                        $i = 1;

                                        if ($items) {
                                          foreach ($items as $item) {
                                              if ($total > 1) {
                                                  $html .= '<h4><u>Item '.$i.'</u></h4>';
                                              }
                                              $html .= '<div>Name : '.$item['name'].'</div>';
                                              $html .= '<div>Price : '.$item['price'].'</div>';
                                              $html .= '<div>Currency : '.$item['currency'].'</div>';
                                              $html .= '<div>Quantity : '.$item['quantity'].'</div>';
                                              if ($i < $total) {
                                                  $html .= '<br />';
                                              }

                                              $i++;
                                          }
                                        }

                                        return $html;
                                    },
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
<?php } ?>
        </div>
    </div>

    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
