<?php

use yii\helpers\Html;

$model = \common\models\ContactUs::findOne(1);
$reg_text_model = common\models\RegistrationText::findOne(1);

$this->title = 'Thank you';
$this->params['page_header_title'] = 'Thank you';
$this->params['breadcrumbs'][] = 'Thank you';
$this->params['page_route'] = 'thank-you';

$script = <<<JS
    $('#progress-bar').find('.progress-bar').css({'width':'100%'}).find('span').empty().text('100%');
JS;
$this->registerJs($script);
?>
<style>
#progress-bar{display:block;}
</style>
<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <div class="col-lg-12 col-sm-12">
        <div><?= $reg_text_model->thanks ?></div>

        <div class="box-footer">
            <?= Html::a(Yii::t('app', 'Back'), ['/'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

