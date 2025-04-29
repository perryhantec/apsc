<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use kartik\widgets\FileInput;
use yii\web\JsExpression;
use common\models\Definitions;
use bupy7\cropbox\CropboxWidget;

$this->title =  Yii::t('app','Menu').' - '.(($model->isNewRecord)? Yii::t('app', 'Create'):Yii::t('app', 'Update'));

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$crop_width = $model::CROP_WIDTH;
$crop_height = $model::CROP_HEIGHT;

$this->registerJs(<<<JS
    $('.menu-image_file-img')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-menu-image_file').show();
        });
    $('#menu-page_type')
        .change(function() {
            if ($(this).val() == 0) {
                $("#menu-page_type-link").show();
                $("#menu-page_type-non_link").hide();
            } else {
                $("#menu-page_type-link").hide();
                $("#menu-page_type-non_link").show();
            }
        });
JS
);
?>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']]);
?>
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">

        <?= $form->field($model, 'MID')->dropDownList(Definitions::getMenuList(false, $model->id),
                [
                    'prompt'=>Yii::t('app', 'Please Select'),
                ]
            ); ?>

        <?php
            $attr_names = Yii::$app->config->getAllLanguageAttributes('name');
            foreach ($attr_names as $attr_name)
                echo $form->field($model, $attr_name)->textInput();

            if (!in_array('name_en', $attr_names))
                echo $form->field($model, 'url')->textInput();
        ?>

        <?= $form->field($model, 'icon_file', ['options' => ['class' => 'form-group ', 'style' => ($model->icon_file_name == "" ? "":"display:none")]])->widget(FileInput::classname(), [
                'options' => ['multiple' => false],
                'pluginOptions' => [
                    'previewFileType' => 'any',
                    'showUpload' => false,
                ]
            ]);
        ?>

        <?= $form->field($model, 'page_type')->dropDownList(Definitions::getPageType()); ?>

        <div id="menu-page_type-link" <?= $model->page_type == 0 ? '' : 'style="display:none"' ?>>
            <?= $form->field($model, 'link')->textInput() ?>
            <?= $form->field($model, 'link_target')->checkBox() ?>
        </div>

         <div>
            <?= $form->field($model, 'banner_image_file_name')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->banner_image_file_name)) { ?>
            <div class="form-group field-menu-banner_image_file_name">
                <label class="control-label" for="menu-banner_image_file_name">Banner</label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->urlManager->createUrl('../'.$model->banner_image_file_name)), [
                            'class' => "image-remove-trigger menu-image_file-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'Menu[banner_image_file_name]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <span class="field-menu-image_file"<?= ($model->banner_image_file_name != "" ? ' style="display: none;"' : '') ?>>(<?= Yii::t('app', 'Please remember to click \'Crop\'');?>)</span>
            <?=
                $form->field($model, 'image_file', ['options' => ['style' => ($model->banner_image_file_name != "" ? 'display: none;' : '')]])->widget(CropboxWidget::className(), [
                    'croppedDataAttribute' => 'crop_info',
                    'pluginOptions' => [
                        'variants' => [
                            [
                                'width' => $crop_width,
                                'height' => $crop_height
                            ],

                        ],
                    ],

                ]);
            ?>

            <?= $form->field($model, 'crop_width')->hiddenInput(['value'=> $crop_width])->label(false); ?>
            <?= $form->field($model, 'crop_height')->hiddenInput(['value'=> $crop_height])->label(false); ?>
        </div>

        <hr />
<?php
if ($model->isNewRecord) $model->status = 1;
?>
        <?= $form->field($model, 'status')->checkbox(['label' => Yii::t('app', 'Show In Menu')]); ?>

        <?php // $form->field($model, 'display_home')->checkbox(['checked'=>'checked']); ?>

    </div>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
