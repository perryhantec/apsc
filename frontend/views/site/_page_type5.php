<?php

use yii\helpers\Html;

$model = \common\models\PageType5::findOne(['MID'=>$MID]);

$files = [];

if ($model) {
    $files = $model->file_names;
}

?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">       
    <div class="col-lg-12 col-sm-12">
        <p class="subheader1"><?= $model->content ?></p>
<?php 
    foreach ($files as $file) {
?>
        <p><strong><?= $file['title'] ? $file['title'] : '&nbsp;' ?></strong></p>
<?php 
        if (isset($file['detail'])) {
            foreach ($file['detail'] as $detail) {
?>
        <div class="committee">
            <div style="width:158px;height:200px;overflow:hidden;margin:0 auto;">
            <?php if ($detail['image'] && file_exists($model->filePath.$detail['image'])) { ?>
                <?= Html::img($model->fileDisplayPath.$detail['image']) ?>
            <?php } ?>
            </div>
            <div style="margin-top:-4px;"><?= $detail['name'] ? $detail['name'] : '&nbsp;' ?></div>
        </div>
<?php
            }
        }
    } 
?>
    </div>
</div>