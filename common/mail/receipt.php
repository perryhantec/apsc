<?php

use yii\helpers\Html;
use yii\helpers\Url;
use Da\QrCode\QrCode;
use common\models\Definitions;

$home_model = common\models\Home::findOne(1);
$reg_text_model = common\models\RegistrationText::findOne(1);

// $url = Url::to(['/registration/attend', 'id' => $model->id], true);

// $qrCodeImg = (new QrCode($url))
$qrCodeImg = (new QrCode($model->registration_no))
    ->setSize(200)
    ->setMargin(5)
    ->useForegroundColor(0, 0, 0);
?>
<div style="padding:20px;">
    <?php if (0 && $home_model->image_file_name_1) { ?>
        <?= Html::img(Yii::$app->request->hostinfo.$home_model->image_file_name_1, ['width' => '100%']) ?>
    <?php } ?>

    <div style="margin:20px 0 40px;font-size:13pt;">
        <div><?= $reg_text_model->email1 ?></div>

        <p style="margin-bottom:20px;"><strong>Registration No.: <?= $model->registration_no ?></strong></p>

        <div>Name: <?= $model->name ?></div>
        <div>Organization: <?= $model->institution ?></div>
        <div>Country / Region: <?= Definitions::getCountry($model->country) ?></div>
        <div>Email: <a href="mailto:<?= $model->email ?>"><?= $model->email ?></a></div>
        <br />

        <div style="margin-bottom:20px;">Dear <?= $model->title ?> <?= $model->last_name ?>：</div>
        <div>
            <?= Html::img($qrCodeImg->writeDataUri()) ?>
        </div>

        <div style="margin-bottom:30px;"><?= $reg_text_model->email2 ?></div>

<?php
        $payment_total_usd = 0;

        $registration_fee = Definitions::getRegistrationFeeAmount($model->payment_type);

        $payment_total_usd += $registration_fee;

        if ($model->dinner > 0) {
            $one_gala_dinner_price = 80;
            $total_gala_dinner_price_usd = $model->dinner * $one_gala_dinner_price;
            $total_gala_dinner_price_hkd = $total_gala_dinner_price_usd * 8;
            $total_gala_dinner_price_usd = number_format((float)$total_gala_dinner_price_usd, 2, '.', '');
            $total_gala_dinner_price_hkd = number_format((float)$total_gala_dinner_price_hkd, 2, '.', '');

            $payment_total_usd += $total_gala_dinner_price_usd;
        }

        $payment_total_hkd = $payment_total_usd * 8;

        $payment_total_usd = number_format((float)$payment_total_usd, 2, '.', '');
        $payment_total_hkd = number_format((float)$payment_total_hkd, 2, '.', '');
?>
        <h3 style="color:#518780;font-size:20px;">Payment Details</h3>
        <table class="table" style="font-size:14.6667px;margin-bottom:30px;">
            <tr>
                <td style="padding:5px;width:50%;"></td>
                <td style="padding:5px;width:25%;">US Dollar</td>
                <td style="padding:5px;width:25%;">Hong Kong Dollar</td>
            </tr>
            <tr>
                <td style="padding:5px;">
                    <div><strong style="color:#518780;">Registration Fee:</strong></div>
                    <div><?= Definitions::getRegistrationFeeLabel($model->payment_type) ?></div>
                </td>
<?php
    $reg_amount_usd = Definitions::getRegistrationFeeAmount($model->payment_type);
    $reg_amount_hkd = $reg_amount_usd * 8;

    $reg_amount_usd = number_format((float)$reg_amount_usd, 2, '.', '');
    $reg_amount_hkd = number_format((float)$reg_amount_hkd, 2, '.', '');
?>
                <td style="padding:5px;"><?= $reg_amount_usd ?></td>
                <td style="padding:5px;"><?= $reg_amount_hkd ?></td>
            </tr>

<?php if ($model->dinner > 0) { ?>
            <tr>
                <td style="padding:5px;font-weight:bold;color:#518780;">Gala Dinner * <?= $model->dinner ?></td>
                <td style="padding:5px;"><?= $total_gala_dinner_price_usd ?></td>
                <td style="padding:5px;"><?= $total_gala_dinner_price_hkd ?></td>
            </tr>
<?php } ?>

<?php if ($model->payment_method == $model::PAYMENT_METHOD_PAYPAL) { ?>
            <tr>
                <td style="padding:5px;font-weight:bold;color:#518780;">Total Amount Outstanding</td>
                <td style="padding:5px;">0.00 (Paid)</td>
                <td style="padding:5px;">0.00 (Paid)</td>
            </tr>
<?php } else if ($model->payment_method == $model::PAYMENT_METHOD_CHEQUE || $model->payment_method == $model::PAYMENT_METHOD_BANK) { ?>
            <tr>
                <td style="padding:5px;font-weight:bold;color:#518780;">Total Amount Outstanding</td>
                <td style="padding:5px;"><?= $payment_total_usd ?></td>
                <td style="padding:5px;"><?= $payment_total_hkd ?></td>
            </tr>
<?php } ?>

    </table>
<?php if ($model->hotel) { ?>
    <div style="margin-bottom:30px;">
        <div><strong style="color:rgb(5, 1, 1);font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14pt;"><u>Accommodation</u></strong></div>
        <?php if ($model->hotel == 1) { ?>
            <p style="font-size:14.6667px;">You have indicated that you prefer to stay at Hyatt Regency Hong Kong, Sha Tin. Enclosed please find the official reservation link:</p>
            <div style="font-size:14.6667px;"><b>Room Only</b></div>
            <div style="font-size:14.6667px;"><b><a href="https://www.hyatt.com/en-US/group-booking/SHAHR/G-MHU6">https://www.hyatt.com/en-US/group-booking/SHAHR/G-MHU6</a></b></div>
            <div style="font-size:14.6667px;"><b>Room with Breakfast</b></div>
            <div style="font-size:14.6667px;"><b><a href="https://www.hyatt.com/en-US/group-booking/SHAHR/G-HMAS">https://www.hyatt.com/en-US/group-booking/SHAHR/G-HMAS</a></b></div>
        <?php } else if ($model->hotel == 4) { ?>
            <p style="font-size:14.6667px;">You have indicated that you will choose other hotels / accommodations during my stay</p>
        <?php } ?>
    </div>
<?php } ?>

<?php if ($model->payment_method == $model::PAYMENT_METHOD_PAYPAL) { ?>
    <div style="margin-bottom:30px;"><?= $reg_text_model->email3Paypal ?></div>
<?php } else if ($model->payment_method == $model::PAYMENT_METHOD_CHEQUE) { ?>
    <div style="margin-bottom:30px;"><?= $reg_text_model->email3Cheque ?></div>
<?php } else if ($model->payment_method == $model::PAYMENT_METHOD_BANK) { ?>
    <div style="margin-bottom:30px;"><?= $reg_text_model->email3Bank ?></div>
<?php } ?>
        <div style="margin-bottom:30px;"><?= $reg_text_model->email4 ?></div>
    </div>
</div>