<?php

use yii\helpers\Html;
use yii\helpers\Url;
// use Da\QrCode\QrCode;
use common\models\Definitions;

// $home_model = common\models\Home::findOne(1);
// $reg_text_model = common\models\RegistrationText::findOne(1);

// $url = Url::to(['/registration/attend', 'id' => $model->id], true);

// $qrCodeImg = (new QrCode($url))
//     ->setSize(200)
//     ->setMargin(5)
//     ->useForegroundColor(0, 0, 0);
?>
<div style="padding:20px;">
    <div style="margin:20px 0 40px;font-size:13pt;">
        <div style="margin-bottom:20px;">Dear <?= $model->title ?> <?= $model->last_name ?>：</div>

        <div style="margin-bottom:30px;">Reminder Payment</div>
    </div>
</div>