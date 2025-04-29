<?php

use yii\helpers\Html;

$pt2_model = \common\models\PageType2::find()->where(['MID'=>$MID, 'status' => 1])->orderby('seq')->all();

?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
<?php foreach ($pt2_model as $model) { ?>
    <div class="col-lg-4 col-sm-12">
        <p class="subheader2"><?= $model->title ?></p>
    </div>
    <div class="col-lg-8 col-sm-12">
        <?= $model->content ?>
    </div>
    <div class="col-lg-12 pt-4 pb-3"><hr class="hr01"></div>
<?php } ?>
</div>


