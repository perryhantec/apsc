<?php

use yii\helpers\Html;
use common\models\User;

// if (Yii::$app->layout != "app") {
$model = User::findOne(Yii::$app->user->id);

$home = $contact = $abstract_form = $edit = $account = '';
switch ($page) {
    case 'home':
        $home = 'active';
        break;
    case 'contact':
        $contact = 'active';
        break;
    case 'abstract-form':
        $abstract_form = 'active';
        break;
    case 'edit':
        $edit = 'active';
        break;
    case 'account':
        $account = 'active';
        break;
}

?>
<div class="row">
    <div class="col-xs-12">
        <div class="navbar2 navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle2 collapsed" data-toggle="collapse" data-target=".navbar-collapse2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse2 collapse" style="height: 1px;">
                    <ul class="nav2 navbar-nav2">
                        <li class="<?= $home ?>"><?= Html::a('Home', ['home']) ?></li>
                        <li class="<?= $contact ?>"><?= Html::a('Contact Information', ['contact']) ?></li>
<?php if ($model->title) { ?>
                        <li class="<?= $abstract_form ?>"><?= Html::a('Abstract Submission', ['abstract-form']) ?></li>
                        <li class="<?= $edit ?>"><?= Html::a('Edit Abstracts', ['edit']) ?></li>
<?php } ?>
                    </ul>
                    <ul class="nav2 navbar-nav2 navbar-right">
                        <li class="<?= $account ?>"><?= Html::a('<i class="fa fa-user"></i> '.$model->name, ['account']) ?></li>
                        <li><?= Html::a('Sign out', ['/logout']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
// }
?>