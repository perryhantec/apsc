<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use common\widgets\Alert;
use common\models\Menu;
use common\models\Definitions;
use common\models\General;


$menu_model = Menu::findOne(['url' => 'registration']);
$general_model = General::findOne(1);

if ($menu_model != null) {
    $this->params['page_route'] = $menu_model->route;

    $this->title = strip_tags($menu_model->name);
    $this->params['page_header_title'] = $menu_model->name;

    $this->params['breadcrumbs'][] = $this->title;
}
?>

<?= Alert::widget() ?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'prefix')->dropDownList(Definitions::getPrefix(), ['prompt' => Yii::t('app', 'Please Select')]) ?>
    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Confirm'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>

<hr />

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <div class="col-lg-12 col-sm-12 text-justify">
        <?= $general_model->registration ?>
    </div>
</div>
