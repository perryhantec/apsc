<?php

use yii\helpers\Html;

$model = \common\models\ContactUs::findOne(1);

$this->title = 'Thank you';
$this->params['page_header_title'] = 'Thank you';
$this->params['breadcrumbs'][] = 'Thank you';
$this->params['page_route'] = 'thank-you';

?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <div class="col-lg-12 col-sm-12">
        <p>Thank you for your registration. Please check email for detail.</p>

        <div class="box-footer">
            <?= Html::a(Yii::t('app', 'Back'), ['/'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

