<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Config;
use common\models\Definitions;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$this->title = 'Contact Information';

$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

// Yii::$app->params['page_header_title'] = $this->title;
// Yii::$app->params['breadcrumbs'][] = $this->title;


$this->registerJs(<<<JS
JS
);

?>
<?= $this->render('../layouts/_user_header', ['page' => 'contact']) ?>
<?= Alert::widget() ?>
<div class="page-my">
    <div class="content">
    <?php $form = ActiveForm::begin([
        'id' => 'contact-form',
        // 'enableAjaxValidation' => false,
        'validateOnSubmit' => false,
    ]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->widget(Select2::classname(), [
                    'data' => ArrayHelper::htmlEncode(Definitions::getPrefix()),
                    'options' => [
                        // 'multiple' => true
                        'prompt' => '',
                    ],
                    'pluginOptions' => [
                    ],
                ]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'first_name')->textInput(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'last_name')->textInput(); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'department')->textInput(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'institution')->textInput(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => ""]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 're_email')->textInput()->input('email', ['placeholder' => ""]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'other_email')->textArea(['rows' => 2]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'mobile')->textInput(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'work_mobile')->textInput(); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'country')->widget(Select2::classname(), [
                    'data' => ArrayHelper::htmlEncode(Definitions::getCountry()),
                    'options' => [
                        // 'multiple' => true
                        'prompt' => '',
                    ],
                    'pluginOptions' => [
                    ],
                ]); ?>
            </div>
        </div>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
