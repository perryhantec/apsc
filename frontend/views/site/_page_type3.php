<?php

use yii\helpers\Html;

$pt3_model = \common\models\PageType3::find()->where(['MID'=>$MID, 'status' => 1])->orderby(['display_at' => SORT_DESC])->all();

?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
<?php foreach ($pt3_model as $model) { ?>
    <div class="col-lg-12 col-sm-12">
        <p class="subheader2"><?= date('j F Y', strtotime($model->display_at)) ?></p>
        <?= $model->content ?>
        <hr class="hr01">
    </div>
<?php } ?>
</div>


