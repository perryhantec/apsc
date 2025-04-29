<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use bupy7\cropbox\CropboxWidget;
use kartik\widgets\FileInput;
use common\models\Definitions;

$this->title = Yii::t('app', 'General');

// $crop_width = $model::CROP_WIDTH;
// $crop_height = $model::CROP_HEIGHT;

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
// $path1 = dirname(Yii::getAlias('@web')).'/'.basename(Yii::getAlias('@content')).'/';
// $path2 = '/'.basename(Yii::getAlias('@content')).'/';
// $path3 = Yii::getAlias('@web').'/'.basename(Yii::getAlias('@content')).'/';
// $path4 = dirname(Yii::getAlias('@web')).'/';
// $path5 = Yii::getAlias('@web').'/';
// $path6 = Yii::getAlias('@content');

// echo $path1.'<br />';
// echo $path2.'<br />';
// echo $path3.'<br />';
// echo $path4.'<br />';
// echo $path5.'<br />';
// echo $path6.'<br />';
?>
<?php $form = ActiveForm::begin([
    //'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']]);
?>
<div class="box box-primary">
    <div class="box-body">

        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('web_name') as $attr_name)
                echo $form->field($model, $attr_name)->textInput();
        ?>
        <?= $form->field($model, 'description')->textArea() ?>
        <?= $form->field($model, 'keywords')->textArea() ?>
<?php if (0) { ?>
        <hr />
        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-1">
            <?= $form->field($model, 'banner_image_file_name')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->banner_image_file_name)) { ?>
            <div class="form-group field-general-image_file_name">
                <label class="control-label" for="general-image_file_name"><?= $model->getAttributeLabel('image_file') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->banner_image_file_name), [
                            'class' => "image-remove-trigger general-image_file-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'general[banner_image_file_name]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                            'style' => 'background: #EEE',
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file', ['options' => ['style' => ($model->banner_image_file_name != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>
<?php } ?>

<?php if (0) { ?>
       (<?= Yii::t('app', 'Please remember to click \'Crop\'');?>)
       <?=
        $form->field($model, 'image_file')->widget(CropboxWidget::className(), [
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

        <hr />
<?php } ?>

        <?php
            // foreach (Yii::$app->config->getAllLanguageAttributes('copyright') as $attr_name)
            //     echo $form->field($model, $attr_name)->textInput();

            foreach (Yii::$app->config->getAllLanguageAttributes('copyright') as $attr_name)
                echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                      'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                ]);
        ?>
<?php if (0) { ?>
        <?php
            if ($model::HAVE_COPYRIGHT_NOTICE) {
                foreach (Yii::$app->config->getAllLanguageAttributes('copyright_notice') as $attr_name)
                    echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                          'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                    ]);
            }

            if ($model::HAVE_DISCLAIMER) {
                echo '<hr />';
                foreach (Yii::$app->config->getAllLanguageAttributes('disclaimer') as $attr_name)
                    echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                          'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                    ]);
            }

            if ($model::HAVE_PRIVACY_STATEMENT) {
                echo '<hr />';
                foreach (Yii::$app->config->getAllLanguageAttributes('privacy_statement') as $attr_name)
                    echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                          'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                    ]);
            }
        ?>
        
        <hr />
             
        <?= $form->field($model, 'delivery_fas_code_id')->dropDownList(Definitions::getFasCode(false), ['prompt' => '']); ?>
        
        <hr />
        
        <?= $form->field($model, 'site_counter')->textInput(['type' => 'number']); ?>
<?php } ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
