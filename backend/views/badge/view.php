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
use common\models\Printer;
// use bupy7\cropbox\CropboxWidget;
use backend\assets\StarWebPrintAsset;

StarWebPrintAsset::register($this);
// $this->title = $model->menu->name.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));
$title_text = 'Registration Quick Check';

$this->title = Yii::t('app', 'View');

$this->params['breadcrumbs'][] = ['label' => $title_text, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$printers = Printer::find()->orderBy("id")->all();

$this->registerJs(<<<JS

JS
);

?>
<style>
.d-flex{display:flex!important;}
.mt-4, .my-4 {
    margin-top: 1.5rem!important;
}
#preview-modal #label-view-container #label-view {
    aspect-ratio: 530 / 162;
}
</style>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    // 'options' => ['enctype' => 'multipart/form-data']
]);
?>
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">基本資料</h3>
                    </div>
                    <div class="box-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'template' => '<tr><th style="width: 20%; text-align: right; vertical-align: top;"{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
                            'attributes' => [
                                [
                                    'attribute' => 'is_attend',
                                    'value' => Definitions::getIsAttend($model->is_attend),
                                ],
                                'registration_no',
                                'title',
                                'first_name',
                                'last_name',
                                [
                                    'attribute' => 'status',
                                    'value' => Definitions::getRegistrationStatus($model->status),
                                ],
                                [
                                    'attribute' => 'country',
                                    'value' => Definitions::getCountry($model->country),
                                ],                                
                                [
                                    'attribute' => 'abstract_code',
                                    'value' => function($model) {
                                        $abstract_code = 'NIL';

                                        if ($model->user) {
                                            if (isset($model->user->callForAbstract)) {
                                                $abstract_code = $model->user->callForAbstract->abstract_no;
                                            }
                                        }

                                        return $abstract_code;
                                    },
                                ],
                                'dinner',
                                [
                                    'attribute' => 'faculty_dinner',
                                    'value' => Definitions::getFacultyDinner($model->faculty_dinner),
                                ],
                                [
                                    'attribute' => 'is_vip',
                                    'value' => Definitions::getIsVip($model->is_vip),
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if ($model->is_attend != $model::IS_ATTEND_YES) { ?>
        <?= Html::a('Confirm', ['is-attend-yes', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php } else { ?>
            <?= Html::a('Unconfirm', ['is-attend-no', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?php } ?>
<?php if (0) { ?>
        <?= Html::a('Print', [''],                     [
                        'title' => Yii::t('app', '預覧標籤'),
                        'data-toggle' => 'modal',
                        'data-target' => '#preview-modal',
                        'class' => 'btn btn-danger',
                    ]) ?>
<?php } ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>
</div>
 <?php ActiveForm::end(); ?>


     <!-- Modal -->
     <div class="modal fade" id="preview-modal">
        <div class="modal-dialog">
            <div class="modal-content loader-lg">
                <div class="modal-header">
                    <h5 class="modal-title"><?= Yii::t('app', '預覧標籤') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="print">
                   <div id="label-view-container">
                       <div id="label-view" class="d-flex">
                           <div class="phms-id">
                               <?= $model->registration_no ?>
                           </div>

                           <div class="member-info d-flex flex-column justify-content-around">
                                <table>
                                    <tr>
                                        <td>Full Name</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= $model->title.' '.$model->first_name.' '.$model->last_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= Definitions::getCountry($model->country) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Abstract Code</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>
                                        <?php
                                            $abstract_code = 'NIL';

                                            if ($model->user) {
                                                if (isset($model->user->callForAbstract)) {
                                                    $abstract_code = $model->user->callForAbstract->abstract_no;
                                                }
                                            }
                                            
                                            echo $abstract_code;
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gala Dinner</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= $model->dinner ?></td>
                                    </tr>
                                    <tr>
                                        <td>Faculty Dinner</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= Definitions::getFacultyDinner($model->faculty_dinner) ?></td>
                                    </tr>
                                    <tr>
                                        <td>VIP</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?= Definitions::getIsVip($model->is_vip) ?></td>
                                    </tr>
                                </table>
                           </div>

                           <div class="qr-code">
                               <img id="phm-qr-code" src="" data-phm-id="<?= $model->registration_no ?>"/>
                           </div>
                       </div>
                   </div>

                    <div class="mt-4">
                        <select class="form-control" id="select-printer">
                            <option value=""><?= Yii::t('app', '--- 請選擇打印機 ---') ?></option>
                            <?php
                            foreach ($printers as $printer) {
                                echo "<option value='$printer->ip'>$printer->location</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?= Yii::t('app', '關閉') ?></button>
                    <button type="button" class="btn btn-primary"
                            id="btn-print-label"><?= Yii::t('app', '列印') ?></button>
                </div>
            </div>
        </div>
    </div>