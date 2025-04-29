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

$is_ab_editable = Definitions::getIsAbstractEditable();

$this->title = 'Edit Abstracts';

$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
JS
);
?>
<style>
thead{background:#0066CC;color:#FFF;}
thead th{width:25%;}
</style>
<?= $this->render('../layouts/_user_header', ['page' => 'edit']) ?>
<?= Alert::widget() ?>
<div class="page-my">
    <div class="content">
        <?= $cfa_text_model->edit ?>

        <div>Remarks:</div>
        <table class="table table-bordered">
            <tr>
                <td>Submitted <i class='fa fa-exclamation-triangle'></i></td>
                <td>Submitted and editable until deadline</td>
            </tr>
            <tr>
                <td>Submitted</td>
                <td>Submitted and unable to edit</td>
            </tr>
            <tr>
                <td>Draft</td>
                <td>Draft submission, not yet submitted</td>
            </tr>
        </table>

        <div>To edit your abstract, Please click "Edit".</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Document</th>
                    <th></th>
                </tr>
            </thead>
<?php
    foreach ($models as $model) {
        $title = $model->title ? $model->title : 'Untitled';
?>
            <tr>
                <td><?= $title ?></td>
                <td><?= Definitions::getAbstractStatus($model->abstract_status) ?></td>
                <td>
                <?php if ($model->abstract_file_name) { ?>
                    <div>
                        <?= Html::a('File', Yii::$app->request->hostinfo.$model->abstract_file_name, ['target'=>'_blank']) ?>
                    </div>
                <?php } ?>
                </td>
                <td>
                    <?= Html::a('Edit', ['abstract-form', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php if ($model->abstract_status == $model::ABSTRACT_STATUS_DRAFT && $is_ab_editable) { ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php } ?>
                </td>
            </tr>
<?php
    }
?>
        </table>

    </div>
</div>
