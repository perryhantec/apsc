<?php

use yii\helpers\Html;
use common\models\Config;
use kartik\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
// use kartik\widgets\FileInput;
use common\models\Definitions;
// use bupy7\cropbox\CropboxWidget;

$this->title = $model->menu->name.' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$this->params['breadcrumbs'][] = ['label' => $model->menu->name, 'url' => ['page/edit','id'=>$model->MID]];
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
    // $('.pagetype4-image_file-img')
    //     .popover({trigger: 'hover', placement: 'top'})
    //     .click(function() {
    //         $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
    //         $(this).parents('.form-group').remove();
    //         $('.field-pagetype4-image_file').show();
    //     });
    // $('.pagetype4-file_names-img')
    //     .popover({trigger: 'hover', placement: 'top'})
    //     .click(function() {
    //         $("#"+$(this).attr("aria-describedby")).remove();
    //         $(this).remove();
    //     });
    // $('[name="PageType4[top_media_type]"]').change(function() {
    //         $('.pt4-top_media_type-detail').hide();
    //         $('.pt4-top_media_type-detail-'+$(this).val()).show();
    //     });
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
        <?php // $form->field($model, 'author')->textInput() ?>

<?php if (0) { ?>
        <?= $model::HAS_CATEGORY ? $form->field($model, 'category_id')->dropDownList(Definitions::getPageType4Category(false,$model->MID,NULL),
            [
                'prompt'=>Yii::t('app', 'Please Select'),
            ]
        ) : '' ?>

        <?= $form->field($model, 'display_at')->widget(DateTimePicker::classname(), [
            'options' => [],
            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd hh:ii:00',
                'weekStart' => 0,
                'todayBtn' => true,
            ],
            'pluginEvents' => [
            ]
        ]); ?>
<?php } ?>
        <?php /*
$form->field($model, 'display_at')->widget(DatePicker::classname(), [
            'options' => [],
            'type' => 3,
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
    //            'startDate' => date('Y-m-d'),
                'todayBtn' => "linked",
            ]
        ]);
*/?>

        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('title') as $attr_name)
                echo $form->field($model, $attr_name)->textInput();
        ?>

        <hr />
<?php if (0) { ?>
        <?= $form->field($model, 'top_media_type')->dropDownList([$model::TMT_IMAGE => Yii::t('app', 'Image'), $model::TMT_YOUTUBE => Yii::t('app', 'YouTube')],
            [
            ]
        ) ?>

        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-<?= $model::TMT_IMAGE ?>"<?= $model->top_media_type != $model::TMT_IMAGE ? ' style="display:none"' : '' ?>>
            <?= $form->field($model, 'image_file_name')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->image_file_name)) { ?>
            <div class="form-group field-pagetype4-image_file_name">
                <label class="control-label" for="pagetype4-image_file_name"><?= $model->getAttributeLabel('image_file') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->urlManager->createUrl('../'.$model->image_file_name)), [
                            'class' => "image-remove-trigger pagetype4-image_file-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'PageType4[image_file_name]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file', ['options' => ['style' => ($model->image_file_name != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>

        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-<?= $model::TMT_YOUTUBE ?>" <?= $model->top_media_type != $model::TMT_YOUTUBE ? ' style="display:none"' : '' ?>>
            <?= $form->field($model, 'youtube_id', ['addon' => ['prepend' => ['content' => 'https://www.youtube.com/watch?v=']]])->textInput() ?>
        </div>

        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('summary') as $attr_name)
                echo $form->field($model, $attr_name)->textArea(['rows' => '2']);
        ?>

        <hr />
<?php } ?>
        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('content') as $attr_name)
                echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                      'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                    ]);
        ?>
<?php if (0) { ?>
        <div class="form-group">
            <label class="control-label" for="pagetype4-file_names"><?= Yii::t('app', 'Images') ?></label>
        </div>
        <?php if (sizeof($_file_names) > 0) { ?>
            <div class="form-group field-pagetype4-file_names">
                <div class="form-control-static">
            <?php foreach ($_file_names as $_file_name) { ?>
                    <?= Html::tag('span', Html::img(Config::PageType4FileDisplayThumbPath($model->id).$_file_name).Html::activeHiddenInput($model, 'old_file_names[]', ['value' => $_file_name]), [
                            'class' => "image-remove-trigger pagetype4-file_names-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
            <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?= $form->field($model, 'upload_files[]')->widget(FileInput::classname(), [
                'options' => ['multiple' => true],
                'pluginOptions' => [
                    'previewFileType' => 'any',
                    'showUpload' => false,
                ]
            ])->label(false);
        ?>
<?php } ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

</div>
 <?php ActiveForm::end(); ?>
