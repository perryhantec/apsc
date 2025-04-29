<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Config;
use common\models\Definitions;
use common\models\User;

$this->title = 'Account Details';

$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
JS
);
?>
<?= $this->render('../layouts/_user_header', ['page' => 'account']) ?>
<?= Alert::widget() ?>
<div class="page-my-account">
    <div class="content">
        <?php $form = ActiveForm::begin([
                'id' => 'account-form',
                // 'enableAjaxValidation' => false,
                'validateOnSubmit' => false,
        ]); ?>

            <?= $form->field($model, 'username')->textInput()->input('email', ['placeholder' => ""]); ?>
            <?= $form->field($model, 'old_password')->textInput(['type'=>"password"]); ?>
            <?= $form->field($model, 'new_password')->textInput(['type'=>"password"]); ?>
            <?= $form->field($model, 're_new_password')->textInput(['type'=>"password"]); ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>