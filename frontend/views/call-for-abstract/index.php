<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use common\widgets\Alert;
use common\models\Menu;
use common\models\Definitions;

$menu_model = Menu::findOne(['url' => 'call-for-abstracts']);
$cfa_text_model = common\models\CallForAbstractText::findOne(1);

if ($menu_model != null) {
    $this->params['page_route'] = $menu_model->route;

    $this->title = strip_tags($menu_model->name);
    $this->params['page_header_title'] = $menu_model->name;

    $this->params['breadcrumbs'][] = $this->title;
}
?>

<?php if (0) { ?>
<?= Alert::widget() ?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'prefix')->dropDownList(Definitions::getPrefix(), ['prompt' => Yii::t('app', 'Please Select')]) ?>
    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_name')->widget(FileInput::classname(), [
            'options' => ['multiple' => false],
            'pluginOptions' => [
                'previewFileType' => 'any',
                'showUpload' => false,
            ]
        ]);
    ?>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
<hr />
<?php } ?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <div class="col-lg-12 col-sm-12 text-justify">
<?php if (0) { ?>
        <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17.6px; background-color: rgb(255, 255, 255);">
            The Organizing Committee cordially invites you to submit your abstract for&nbsp;<span style="box-sizing: border-box; font-weight: bolder;">Oral or Poster Presentations</span>. Abstracts must be submitted through the online Abstract Submission Portal.
        </p>
        <p class="text-center">
            <?= Html::a('Abstract Submission Portal', 'login', ['class' => 'btn2', 'target' => '_blank']) ?>
<?php if (0) { ?>
            <?= Html::a('Abstract Submission Portal', 'javascript:void(0);', ['class' => 'btn2', 'data-toggle' => 'modal', 'data-target' => '#myModal']) ?>
<?php } ?>
        </p>
<?php } ?>
        <?= $cfa_text_model->intro ?>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
            <p><i>Coming Soon</i></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>
