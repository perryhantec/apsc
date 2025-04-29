<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\captcha\Captcha;
use common\widgets\Alert;
use common\models\Config;

$cfa_text_model = common\models\CallForAbstractText::findOne(1);

$this->title = Yii::t('app', "Login");

$this->params['page_header_title'] = $this->title;
$this->params['page_header_icon'] = Url::to('@web/images/page_header_icon-my.png');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
JS
);
?>
<?php if (0) { ?>
<?= $this->render('../layouts/_user_header') ?>
<?php } ?>
        <?= Alert::widget() ?>
        <div class="login-content">
            <?= $cfa_text_model->login ?>
    
            <hr />

            <div class="row">
                <div class="col-sm-6">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'enableAjaxValidation' => false
                    ]); ?>

                    <?= $form->field($login_model, 'username')->textInput(['value' => 'hong.wong@efaith.com.hk']); ?>

                    <?= $form->field($login_model, 'password')->passwordInput()->input('password', ['placeholder' => "", 'value' => '12345678']); ?>

                    <?= $form->field($login_model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-xs-5 text-center">{image}</div><div class="col-xs-7">{input}</div></div>',
                        'options' => ['placeholder' => $login_model->getAttributeLabel('verifyCode'), 'class' => 'form-control'],
                    ])->label(false); ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-lg', 'name' => 'login-button']) ?>
                        <?php // $form->field($login_model, 'rememberMe')->checkbox() ?>
                    </div>

                    <!--<a data-fancybox data-type="ajax" data-options='{ "src":"<?= Url::to(['/login/forget-password']) ?>","clickOutside":false }' href="javascript:;"><?= Yii::t('app', 'Lost your password?') ?></a>-->

                    <?php ActiveForm::end(); ?>

                    <p style="text-align: center">
<?php if (0) { ?>
                        <?= Html::a(Yii::t('app', 'Forget Password'), ['/forget-password']) ?>
<?php } ?>
                        <?= Html::a('Create New Account', ['/signup'], ['style' => 'margin-left:15px;']) ?>
                    </p>
                </div>
            </div>
        </div>
