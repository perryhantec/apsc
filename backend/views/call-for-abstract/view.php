<?php

use yii\helpers\Html;
use common\models\Config;
use kartik\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use kartik\widgets\FileInput;
use common\models\Definitions;
use common\components\MultipleInput;
use unclead\multipleinput\TabularColumn;

// use bupy7\cropbox\CropboxWidget;

// $this->title = $model->menu->name.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));
$this->title = 'Abstracts Submission - '.Yii::t('app', 'View');

$this->params['breadcrumbs'][] = ['label' => 'Call For Abstracts Submission', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
$('#affiliation .btn, #author .btn').on('click', function(e) {
  $(this).removeClass('js-input-plus').removeClass('js-input-remove');
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
<style>
textarea{resize:vertical;}
</style>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    // 'options' => ['enctype' => 'multipart/form-data']
]);
?>
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">
        <?= $form->field($model, 'abstract_status')->dropDownList(Definitions::getAbstractStatusNoIcon(), ['disabled' => true]) ?>
        <?= $form->field($model, 'abstract_no')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'abstract_user')->textInput(['value' => $model->user->name, 'disabled' => true]) ?>
        <?= 
            $form->field($model, 'created_at')->widget(DatePicker::classname(), [
                'options' => [],
                'type' => 3,
                'disabled' => true,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd',
        //            'startDate' => date('Y-m-d'),
                    'todayBtn' => "linked",
                ]
            ]);
        ?>

        <?= $form->field($model, 'title')->textArea(['rows' => 3, 'disabled' => true]) ?>
        <?= $form->field($model, 'present_type')->dropDownList(Definitions::getPresentationType(), ['disabled' => true]) ?>
        <?= $form->field($model, 'keyword_1')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'keyword_2')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'keyword_3')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'theme')->dropDownList(Definitions::getTheme(), ['disabled' => true]) ?>
        <?=
            $form->field($model, 'affiliation', ['options' => ['id' => 'affiliation']])->widget(MultipleInput::class, [
                'rendererClass' => \unclead\multipleinput\renderers\ListRenderer::className(),
                'columns' => [
                    [
                        'name'  => 'row',
                        'title' => 'Row',
                        'type'  => 'static',
                        'value' => function($data, $arr) {
                            $temp = explode('-', $arr['id']);
                            $total = count($temp);
                            $row = $temp[$total - 2];

                            return $row;
                        },
                    ],
                    [
                        'name'  => 'affiliation',
                        'title' => 'Affiliation',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'city',
                        'title' => 'City/Suburb/Town',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'state',
                        'title' => 'State',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'country',
                        'title' => 'Country',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                ]
            ]);
        ?>
        <?=
            $form->field($model, 'author', ['options' => ['id' => 'author']])->widget(MultipleInput::class, [
                'rendererClass' => \unclead\multipleinput\renderers\ListRenderer::className(),
                'columns' => [
                    [
                        'name'  => 'tle',
                        'type'  => TabularColumn::TYPE_DROPDOWN,
                        'title' => 'Title',
                        'items' => Definitions::getPrefix(),
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'first_name',
                        'title' => 'First Name',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'last_name',
                        'title' => 'Last Name',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'is_presenter',
                        'type'  => TabularColumn::TYPE_CHECKBOX,
                        'title' => 'Presenter',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'organization',
                        'title' => 'Organization',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'position',
                        'title' => 'Position',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                    [
                        'name'  => 'affiliations',
                        'title' => 'Affiliations',
                        'options' => [
                            'disabled' => true,
                        ]
                    ],
                ]
            ]);
        ?>
        <?= $form->field($model, 'content')->textArea(['rows' => 20, 'disabled' => true]) ?>

        <div class="form-group">
            <label>Table / Graphic / Representative Figure</label>
            <div>
            <?php if ($model->abstract_file_name) { ?>
                <?= Html::a('File', Yii::$app->request->hostinfo.$model->abstract_file_name, ['target'=>'_blank']) ?>
            <?php } else { ?>
                Nil
            <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <label>Young Investigator Award</label>
<?php if (0) { ?>
            <?= $form->field($model, 'is_young')->checkbox(['label' => 'Eligible', 'disabled' => true]) ?>
<?php } ?>
            <?= $form->field($model, 'is_young')->radioList(Definitions::getIsYoung(), ['itemOptions' => ['disabled' => true]]) ?>
        </div>

        <?= $form->field($model, 'is_registered')->radioList(Definitions::getIsRegistered(), ['itemOptions' => ['disabled' => true]]) ?>

        <hr />

        <?= $form->field($model, 'result')->dropDownList(Definitions::getResult(),['prompt'=>'Please Select','disabled' => true]) ?>
        <?= $form->field($model, 'accept_type')->dropDownList(Definitions::getAcceptType(),['prompt'=>'Please Select','disabled' => true]) ?>
        <?= $form->field($model, 'check_is_registered')->dropDownList(Definitions::getCheckIsRegistered(), ['disabled' => true]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
