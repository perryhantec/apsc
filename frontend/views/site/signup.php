<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\captcha\Captcha;
use common\widgets\Alert;
use common\models\Config;
use common\models\Definitions;

$cfa_text_model = common\models\CallForAbstractText::findOne(1);

$this->title = 'Create Account';
$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Alert::widget() ?>
        <div class="registration-content content">
            <?= $cfa_text_model->signup ?>

            <hr />
            <div class="row">
                <div class="col-md-6">
                    <?php $form = ActiveForm::begin([
                        'id' => 'registration-form',
                        // 'enableAjaxValidation' => false,
                        'validateOnSubmit' => false,
                    ]); ?>

                    <?= $form->field($registration_model, 'username')->textInput()->input('email', ['placeholder' => ""]); ?>
                    <?= $form->field($registration_model, 're_username')->textInput()->input('email', ['placeholder' => ""]); ?>
<?php if (0) { ?>
                    <?= $form->field($registration_model, 'username')->textInput()->input('email', ['placeholder' => ""]); ?>

                    <hr />

                    <?= $form->field($registration_model, 'verifyCode', ['inputOptions' => ['autocomplete' => 'off']])->widget(Captcha::className(), [
                        'template' => '<div class="row"><div id="captcha-image" class="col-xs-5 text-center">{image}</div><div class="col-xs-7">{input}</div></div>',
                        'options' => ['placeholder' => $registration_model->getAttributeLabel('verifyCode'), 'class' => 'form-control'],
                    ])->label(false); ?>
<?php } ?>
                    <!-- <div class="pull-right"><i class="fa fa-eye-slash" style="color:#888;" onclick="showPassword(this);"></i></div> -->
                    <?= $form->field($registration_model, 'new_password')->passwordInput(); ?>
                    <!-- <div class="pull-right"><i class="fa fa-eye-slash" style="color:#888;" onclick="showPassword(this);"></i></div> -->
                    <?= $form->field($registration_model, 're_new_password')->passwordInput(); ?>


                    
                    <div class="form-group">
                      <?= Html::submitButton('Create New Account', ['class' => 'btn btn-primary', 'name' => 'registration-button']) ?>
                      <?= Html::a('Back To Sign In', 'login', ['class' => 'btn btn-primary']) ?>
<?php if (0) { ?>
                      <?= Html::button('Refresh Image', ['class' => 'btn btn-primary', 'name' => 'login-button', 'onclick' => 'refreshImage();']) ?>
<?php } ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
<script>
// function refreshImage() {
//     let captchaImage = $('#userregistrationform-verifycode-image').attr('src');
//     let newCaptchaImage = '<img id="userregistrationform-verifycode-image" src="' + captchaImage + '" alt />';

//     $('#captcha-image').empty().html(newCaptchaImage);
// };
// function showPassword(_this){
//   if ($(_this).hasClass('fa-eye-slash')) {
//     $(_this).removeClass('fa-eye-slash').addClass('fa-eye').closest('div').next().find('input[type="password"]').attr('type','text');
//   } else if ($(_this).hasClass('fa-eye')) {
//     $(_this).removeClass('fa-eye').addClass('fa-eye-slash').closest('div').next().find('input[type="text"]').attr('type','password');
//   }
// }
</script>
