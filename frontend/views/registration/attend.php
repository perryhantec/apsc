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

$label = $model->is_attend == 1 ? 'success' : 'warning';
?>
<style>
#confirm td {width:50%;text-align:right;}
#confirm td + td {text-align:left;}
</style>
<?= Alert::widget() ?>
<?php $form = ActiveForm::begin(); ?>
    <table id="confirm" class="table table-striped">
        <tr>
            <td class="control-label">Registration No.</td>
            <td><?= $model->registration_no ?></td>
        </tr>
        <tr>
            <td class="control-label">Attendance</td>
            <td><span class="label label-<?= $label ?>"><?= Definitions::getIsAttend($model->is_attend) ?></span></td>
        </tr>
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
    </table>
    <?= $form->field($model, 'is_attend')->hiddenInput(['value' => 1])->label(false) ?>

    <div class="box-footer text-center">
        <div class="pull-left">
            <?= Html::a('Back', ['/'], ['class' => 'btn btn-primary']) ?>
        </div>

        <?php if ($model->is_attend != 1) { ?>
            <?= Html::submitButton('Confirm Attend', ['class' => 'btn btn-success']) ?>
        <?php } ?>

        <div class="pull-right">
            <?= Html::a('Logout', ['/logout'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>