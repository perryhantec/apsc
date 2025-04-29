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
$this->title = 'Abstracts Submission - '.(($model->isNewRecord)? 'Create' : 'Update');

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
// $('#affiliation .btn, #author .btn').on('click', function(e) {
//   $(this).removeClass('js-input-plus').removeClass('js-input-remove');
// });
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
<style>
textarea{resize:vertical;}
</style>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']
]);
?>
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">
        <?= $form->field($model, 'abstract_no')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'user_id')->dropDownList(Definitions::getUser(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'title')->textArea(['rows' => 3]) ?>
        <?= $form->field($model, 'present_type')->dropDownList(Definitions::getPresentationType(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'keyword_1')->textInput() ?>
        <?= $form->field($model, 'keyword_2')->textInput() ?>
        <?= $form->field($model, 'keyword_3')->textInput() ?>
        <?= $form->field($model, 'theme')->dropDownList(Definitions::getTheme(),['prompt'=>'Please Select']) ?>
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
                        ]
                    ],
                    [
                        'name'  => 'city',
                        'title' => 'City/Suburb/Town',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'state',
                        'title' => 'State',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'country',
                        'title' => 'Country',
                        'options' => [
                        ]
                    ],
                ]
            ]);
        ?>
        <?=
            $form->field($model, 'author', ['options' => ['id' => 'author']])->widget(MultipleInput::class, [
                'rendererClass' => \unclead\multipleinput\renderers\ListRenderer::className(),
                'sortable' => true,
                'columns' => [
                    [
                        'name'  => 'tle',
                        'type'  => TabularColumn::TYPE_DROPDOWN,
                        'title' => 'Title',
                        'items' => Definitions::getPrefix(),
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'first_name',
                        'title' => 'First Name',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'last_name',
                        'title' => 'Last Name',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'is_presenter',
                        'type'  => TabularColumn::TYPE_CHECKBOX,
                        'title' => 'Presenter',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'organization',
                        'title' => 'Organization',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'position',
                        'title' => 'Position',
                        'options' => [
                        ]
                    ],
                    [
                        'name'  => 'affiliations',
                        'title' => 'Affiliations',
                        'options' => [
                            'type' => 'number',
                            'min' => 1,
                            'placeholder' => 'Author Affiliation Row Number',
                        ]
                    ],
                ]
            ]);
        ?>
        <?= $form->field($model, 'content')->textArea(['rows' => 20]) ?>

        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-1">
            <?= $form->field($model, 'abstract_file_name')->hiddenInput()->label(false); ?>

            <?= $form->field($model, 'file_name')->widget(FileInput::classname(), [
                    'options' => ['multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>

            <?php
                if (!empty($model->abstract_file_name)) {
            ?>
            <div class="form-group field-general-image_file_name">
                <div class="form-control-static">
                <?php
                    $image_ext_list = ['jpg','jpeg','png','JPG','JPEG','PNG'];
                    $pos = strripos($model->abstract_file_name,'.') + 1;
                    $ext = substr($model->abstract_file_name, $pos);

                    if (in_array($ext, $image_ext_list)) { 
                ?>
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->abstract_file_name,['style' => 'border:1px solid #EEE;',]), [
                            'class' => "image-remove-trigger general-image_file-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'CallForAbstract[abstract_file_name]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                <?php
                    } else {
                        $temp = explode('/',$model->abstract_file_name);
                        $file_name = end($temp);
                ?>
                    <?= Html::tag('span', '<div><i class="fa fa-file"></i> '.$file_name.'</div>', [
                        'class' => "image-remove-trigger general-image_file-img thumbnail",
                        'title' => Yii::t('app', 'Remove'),
                        'data-input-name' => 'CallForAbstract[abstract_file_name]',
                        'data-toggle' => "popover",
                        'data-content' => Yii::t('app', 'Click to remove file'),
                    ]) ?>
                    <!-- <div><a href="<?= Yii::$app->request->hostinfo.$model->abstract_file_name ?>" target="_blank"><i class="fa fa-file"></i> <?= $file_name ?></a></div> -->
                <?php
                    }
                ?>

                </div>
            </div>

            <?php
                }
            ?>

        </div>

        <?= $form->field($model, 'is_young')->radioList(Definitions::getIsYoung()) ?>
        <?= $form->field($model, 'is_registered')->radioList(Definitions::getIsRegistered()) ?>
        <?= $form->field($model, 'abstract_status')->dropDownList(Definitions::getAbstractStatusNoIcon(),['prompt'=>'Please Select']) ?>

        <hr />

        <?= $form->field($model, 'result')->dropDownList(Definitions::getResult(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'accept_type')->dropDownList(Definitions::getAcceptType(),['prompt'=>'Please Select']) ?>
        <?= $form->field($model, 'check_is_registered')->dropDownList(Definitions::getCheckIsRegistered(), ['disabled' => true]) ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
