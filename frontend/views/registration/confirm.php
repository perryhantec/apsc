<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
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
<style>
#confirm td {width:50%;text-align:right;}
#confirm td + td {text-align:left;}
</style>
<?= Alert::widget() ?>
<?php $form = ActiveForm::begin(); ?>
    <table id="confirm" class="table table-striped">
        <tr>
            <td class="control-label">Prefix</td>
            <td><?= $model->prefix ?></td>
        </tr>
        <tr>
            <td class="control-label">Firstname</td>
            <td><?= $model->firstname ?></td>
        </tr>
        <tr>
            <td class="control-label">Lastname</td>
            <td><?= $model->lastname ?></td>
        </tr>
        <tr>
            <td class="control-label">Email</td>
            <td><?= $model->email ?></td>
        </tr>
        <tr>
            <td class="control-label">Phone</td>
            <td><?= $model->phone ?></td>
        </tr>
        <tr>
            <td class="control-label">Payment Method</td>
            <td>Paypal</td>
        </tr>
        <tr>
            <td class="control-label">Registration Fee</td>
            <td><?= 'HKD $'.$model::REGISTRATION_FEE ?></td>
        </tr>
    </table>
    <?= $form->field($model, 'prefix')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'firstname')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'lastname')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'phone')->hiddenInput()->label(false) ?>

    <div class="box-footer text-center">
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton(Yii::t('app', 'Payment'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>