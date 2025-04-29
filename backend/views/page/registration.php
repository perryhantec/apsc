<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use bupy7\cropbox\CropboxWidget;
use kartik\widgets\FileInput;
use common\models\Definitions;

$this->title = 'Registration Text';

// $crop_width = $model::CROP_WIDTH;
// $crop_height = $model::CROP_HEIGHT;

$this->registerJs(<<<JS

JS
);
?>
<?php $form = ActiveForm::begin();
?>
<div class="box box-primary">
    <div class="box-body">
        <?php
            foreach (Yii::$app->config->getAllLanguageAttributes('registration') as $attr_name)
                echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                      'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                ]);
        ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
