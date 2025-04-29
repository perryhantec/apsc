<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = Yii::t('app','Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= $this->title?></h1>

    <p><?= Yii::t('app','Please fill out the following fields to login:');?></p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [ 'enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['value' => 'efaith_adm']) ?>

    <?= $form->field($model, 'password')->passwordInput(['value' => 'sgs4aPArfDRJQEE']) ?>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-8">{input}</div></div>',
    ]) ?>
    
    <div class="form-group">
      <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
      <?= Html::a(Yii::t('app', 'Forgot Password'), ['site/requestpasswordreset'], ['class' => 'btn'])?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
