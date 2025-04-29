<?php

use yii\helpers\Html;

$pt6_model = \common\models\PageType6::find()->where(['MID'=>$MID, 'status' => 1])->orderby('display_at')->all();

$i = 1;
$second = 0.2;
?>

<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
<?php 
    foreach ($pt6_model as $model) {
        if ($i % 2 == 1) {
?>
            <div class="fadeInRight" data-wow-delay="<?= $second ?>s" data-wow-duration="2s">
                <div class="datebox borderleft">
                    <span class="datebox1"><?= $model->title ?></span>
                    <br>
                    <span class="datebox2"><?= date('j F Y', strtotime($model->display_at)) ?></span>
                </div>
            </div>
<?php
        } else {
?>
            <div class="fadeInRight" data-wow-delay="<?= $second ?>s" data-wow-duration="2s">
                <div class="datebox borderright text-right">
                    <span class="datebox1"><?= $model->title ?></span>
                    <br>
                    <span class="datebox2"><?= date('j F Y', strtotime($model->display_at)) ?></span>
                </div>
            </div>
<?php
        }
        $i++;
        $second += 0.4;
    } 
?>
</div>


