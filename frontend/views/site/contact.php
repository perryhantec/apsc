<?php

$model = \common\models\ContactUs::findOne(1);

$this->title = 'Contact Us';
$this->params['page_header_title'] = 'Contact Us';
$this->params['breadcrumbs'][] = 'Contact Us';
$this->params['page_route'] = 'contact';

?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <div class="col-lg-12 col-sm-12">
        <?= $model == NULL || $model->content == "" ? Yii::t('app', '<i>Coming Soon</i>') : $model->content ?>
    </div>
</div>

