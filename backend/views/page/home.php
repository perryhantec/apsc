<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\widgets\FileInput;
use common\models\Definitions;

$this->title = Yii::t('app', 'Home');

$this->registerJs(<<<JS
    $('.home-image_file-img_1')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-home-image_file_1').show();
        });
    $('.home-image_file-img_2')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-home-image_file_2').show();
        });
    $('.home-image_file-img_3')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-home-image_file_3').show();
        });
    $('.home-image_file-img_4')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-home-image_file_4').show();
        });
    $('.home-image_file-img_5')
        .popover({trigger: 'hover', placement: 'top'})
        .click(function() {
            $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
            $(this).parents('.form-group').remove();
            $('.field-home-image_file_5').show();
        });
JS
);
?>

<div class="index-right-form">

  <div class="index-right-form">

      <?php $form = ActiveForm::begin([
        //'enableAjaxValidation' => true,
        'options' => ['enctype' => 'multipart/form-data']]);
      ?>

        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-1">
            <?= $form->field($model, 'image_file_name_1')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->image_file_name_1)) { ?>
            <div class="form-group field-home-image_file_name">
                <label class="control-label" for="home-image_file_name_1"><?= $model->getAttributeLabel('image_file_1') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->image_file_name_1), [
                            'class' => "image-remove-trigger home-image_file-img_1 thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'home[image_file_name_1]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file_1', ['options' => ['style' => ($model->image_file_name_1 != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>

        <?= $form->field($model, 'body_text_1')->textInput(); ?>
        <?= $form->field($model, 'body_text_2')->textInput(); ?>
        <?= $form->field($model, 'body_text_3')->textInput(); ?>
        <?= $form->field($model, 'body_text_4')->textInput(); ?>
        <?= $form->field($model, 'body_text_5')->textInput(); ?>

        <hr />
        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-1">
            <?= $form->field($model, 'image_file_name_2')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->image_file_name_2)) { ?>
            <div class="form-group field-home-image_file_name">
                <label class="control-label" for="home-image_file_name_2"><?= $model->getAttributeLabel('image_file_2') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->image_file_name_2), [
                            'class' => "image-remove-trigger home-image_file-img_2 thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'home[image_file_name_2]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file_2', ['options' => ['style' => ($model->image_file_name_2 != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>
        <hr />
        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('content') as $attr_name)
                echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                      'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => (' content-index content'), 'allowedContent' => true]),
                    ]);
        ?>
        <hr />
<?php
  $limit_array = [
    1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5,
  ];
?>
        <div class="row">
          <div class="col-md-6">
            <?= $form->field($model, 'show_menu_1')->dropDownList(Definitions::getHomeMenuList()); ?>
            <?= $form->field($model, 'show_limit_1')->dropDownList($limit_array); ?>
          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'show_menu_2')->dropDownList(Definitions::getHomeMenuList()); ?>
            <?= $form->field($model, 'show_limit_2')->dropDownList($limit_array); ?>
          </div>
        </div>
        <hr />
        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-1">
            <?= $form->field($model, 'image_file_name_3')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->image_file_name_3)) { ?>
            <div class="form-group field-home-image_file_name">
                <label class="control-label" for="home-image_file_name_3"><?= $model->getAttributeLabel('image_file_3') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->image_file_name_3), [
                            'class' => "image-remove-trigger home-image_file-img_3 thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'home[image_file_name_3]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file_3', ['options' => ['style' => ($model->image_file_name_3 != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>

        <?= $form->field($model, 'show_menu_3')->dropDownList(Definitions::getHomeMenuType1List()); ?>
        <hr />

        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-4">
            <?= $form->field($model, 'image_file_name_4')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->image_file_name_4)) { ?>
            <div class="form-group field-home-image_file_name">
                <label class="control-label" for="home-image_file_name_4"><?= $model->getAttributeLabel('image_file_4') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->image_file_name_4), [
                            'class' => "image-remove-trigger home-image_file-img_4 thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'home[image_file_name_4]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file_4', ['options' => ['style' => ($model->image_file_name_4 != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>

        <?= $form->field($model, 'org_text_1')->textInput(); ?>
        <hr />

        <div class="pt4-top_media_type-detail pt4-top_media_type-detail-1">
            <?= $form->field($model, 'image_file_name_5')->hiddenInput()->label(false); ?>
            <?php if (!empty($model->image_file_name_5)) { ?>
            <div class="form-group field-home-image_file_name">
                <label class="control-label" for="home-image_file_name_5"><?= $model->getAttributeLabel('image_file_5') ?></label>
                <div class="form-control-static">
                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->image_file_name_5), [
                            'class' => "image-remove-trigger home-image_file-img_5 thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'home[image_file_name_5]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
                </div>
            </div>
            <?php } ?>

            <?= $form->field($model, 'image_file_5', ['options' => ['style' => ($model->image_file_name_5 != "" ? 'display: none;' : '')]])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ]
                ]);
            ?>
        </div>

        <?= $form->field($model, 'org_text_2')->textInput(); ?>

      <div class="form-group">
          <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
      </div>

      <?php ActiveForm::end(); ?>

  </div>


</div>
