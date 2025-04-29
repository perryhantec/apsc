<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use \common\models\Config;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;
use bupy7\cropbox\CropboxWidget;


$this->title = ($model->isNewRecord)? Yii::t('app', 'Create {modelClass}',['modelClass'=>Yii::t('app', 'Banner')]):Yii::t('app', 'Update {modelClass}',['modelClass'=>Yii::t('app', 'Banner')]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banners'), 'url' => ['banner/index']];
$this->params['breadcrumbs'][] = $this->title;

$banner_dir_path = Config::BannerPath();
$banner_display_path = Config::BannerDisplayPath();

$this->registerJs(<<<JS
    $(document).ready(function() {
        $('.banner-image_file-img')
            .popover({trigger: 'hover', placement: 'top'})
            .click(function() {
                $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
                $(this).parents('.form-group').remove();
                $('.field-banner-image_file').show();
            });
    });
JS
);
$this->registerCss('
.cropbox .workarea-cropbox {
    transform: scale(0.5);
    transform-origin: top left;
    margin-bottom: -'.abs((($model::CROP_HEIGHT+100)/2)-20).'px;
}
.workarea-cropbox, .bg-cropbox {
    width: '.($model::CROP_WIDTH+100).'px;
    height: '.($model::CROP_HEIGHT+100).'px;
}
');
?>
<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']]);
?>
<div class="box <?= ($model->isNewRecord) ? 'box-success' : 'box-primary' ?>">
    <div class="box-body">
        <?= $form->field($model, 'image_file_name')->hiddenInput()->label(false); ?>
        <?php if (!empty($model->image_file_name)) { ?>
        <div class="form-group field-banner-image_file_name">
            <label class="control-label" for="banner-image_file_name">Banner</label>
            <div class="form-control-static">
                <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->image_file_name), [
                        'class' => "image-remove-trigger banner-image_file-img thumbnail",
                        'title' => Yii::t('app', 'Remove'),
                        'data-input-name' => 'Banner[image_file_name]',
                        'data-toggle' => "popover",
                        'data-content' => Yii::t('app', 'Click to remove image'),
                    ]) ?>
            </div>
        </div>
        <?php } ?>

        <span class="field-banner-image_file"<?= ($model->image_file_name != "" ? ' style="display: none;"' : '') ?>>(<?= Yii::t('app', 'Please remember to click \'Crop\'');?>)</span>
       <?=
        $form->field($model, 'image_file', ['options' => ['style' => ($model->image_file_name != "" ? 'display: none;' : '')]])->widget(CropboxWidget::className(), [
            'croppedDataAttribute' => 'crop_info',
            'pluginOptions' => [
                'variants' => [
                    [
                        'width' => $model::CROP_WIDTH,
                        'height' => $model::CROP_HEIGHT

                    ],

                ],
            ],

        ]);
        ?>
        <?php // $form->field($model, 'text')->textArea(['rows' => '2']); ?>
        <hr />
        <?= $form->field($model, 'url')->textInput() ?>
        <?= $form->field($model, 'url_target')->checkBox() ?>

        <div class="box-footer">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
