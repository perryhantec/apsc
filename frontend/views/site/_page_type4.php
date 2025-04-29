<?php

use yii\helpers\Html;

$pt4_model = \common\models\PageType4::find()->where(['MID'=>$MID, 'status' => 1])->orderby('seq')->all();

?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">       
<?php foreach ($pt4_model as $model) { ?>
    <div class="col-lg-6 col-sm-12">
        <p><?= Html::img(Yii::$app->urlManager->createUrl($model->image_file_name), ['style' => 'max-width:100%;']) ?></p>
        <p style="color:#3C8980;"><strong><?= $model->title ?></strong></p>
        <?= $model->content ?>
    </div>
<?php } ?>
</div>
