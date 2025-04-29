<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Config;
use common\models\Definitions;

$cfa_text_model = common\models\CallForAbstractText::findOne(1);

$this->title = 'Home';

$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
JS
);

?>
<?= $this->render('../layouts/_user_header', ['page' => 'home']) ?>
<?= Alert::widget() ?>
    <div class="page-my">
        <div class="content">
            <?= $cfa_text_model->home ?>
        </div>
    </div>
