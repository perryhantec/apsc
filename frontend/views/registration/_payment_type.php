<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$setting_model = common\models\Setting::findOne(1);

$current_timestamp = time();
$reg_early_close_timestamp = strtotime($setting_model->reg_early_close);
$reg_regular_close_timestamp = strtotime($setting_model->reg_regular_close);

// echo $current_timestamp;
// echo '<br />';
// echo $reg_early_close_timestamp;
// echo '<br />';
// echo $reg_regular_close_timestamp;
// echo '<br />';
?>

<?php if ($current_timestamp < $reg_early_close_timestamp) { ?>

    <div><?= $reg_text_model->early2 ?></div>

<?php } else if ($current_timestamp < $reg_regular_close_timestamp) { ?>

    <div><?= $reg_text_model->regular2 ?></div>

<?php } else { ?>

    <div><?= $reg_text_model->late2 ?></div>

<?php } ?>


<div id="reg-payment_type" class="well radio-group">

<?php if ($current_timestamp < $reg_early_close_timestamp) { ?>

    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Low to Lower Middle Income Countries (Physician)',
                'labelOptions' => [
                    'for' => 'e1',
                    'class' => 'hide-error',
                ],
                'value' => 1,
                'id' => 'e1',
                'onclick' => 'setItem1(this, 300);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 300 / HK 2400</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Low to Lower Middle Income Countries (Non-physician)',
                'labelOptions' => [
                    'for' => 'e2',
                    'class' => 'hide-error',
                ],
                'value' => 2,
                'id' => 'e2',
                'onclick' => 'setItem1(this, 150);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 150 / HKD 1200</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Upper Middle to High Income Countries (Physician)',
                'labelOptions' => [
                    'for' => 'e3',
                    'class' => 'hide-error',
                ],
                'value' => 3,
                'id' => 'e3',
                'onclick' => 'setItem1(this, 450);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 450 / HKD 3600</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Upper Middle to High Income Countries (Non-physician)',
                'labelOptions' => [
                    'for' => 'e4',
                    'class' => 'hide-error',
                ],
                'value' => 4,
                'id' => 'e4',
                'onclick' => 'setItem1(this, 300);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 300 / HKD 2400</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Local Participant HKSS Member (Physician)',
                'labelOptions' => [
                    'for' => 'e5',
                    'class' => 'hide-error',
                ],
                'value' => 5,
                'id' => 'e5',
                'onclick' => 'setItem1(this, 150);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 150 / HKD 1200</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Local Participant HKSS Member (Non-physician)',
                'labelOptions' => [
                    'for' => 'e6',
                    'class' => 'hide-error',
                ],
                'value' => 6,
                'id' => 'e6',
                'onclick' => 'setItem1(this, 40);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 40 / HKD 320</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Local Participant Non-HKSS Member (Physician)',
                'labelOptions' => [
                    'for' => 'e7',
                    'class' => 'hide-error',
                ],
                'value' => 7,
                'id' => 'e7',
                'onclick' => 'setItem1(this, 200);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 200 / HKD 1600</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Early Bird - Local Participant Non-HKSS Member (Non-physician)',
                'labelOptions' => [
                    'for' => 'e8',
                    'class' => 'hide-error',
                ],
                'value' => 8,
                'id' => 'e8',
                'onclick' => 'setItem1(this, 60);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 60 / HKD 480</div>
        </div>
    </div>

<?php } else if ($current_timestamp < $reg_regular_close_timestamp) { ?>

    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Low to Lower Middle Income Countries (Physician)',
                'labelOptions' => [
                    'for' => 'r1',
                    'class' => 'hide-error',
                ],
                'value' => 9,
                'id' => 'r1',
                'onclick' => 'setItem1(this, 400);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 400 / HKD 3200</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Low to Lower Middle Income Countries (Non-physician)',
                'labelOptions' => [
                    'for' => 'r2',
                    'class' => 'hide-error',
                ],
                'value' => 10,
                'id' => 'r2',
                'onclick' => 'setItem1(this, 250);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 250 / HKD 2000</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Upper Middle to High Income Countries (Physician)',
                'labelOptions' => [
                    'for' => 'r3',
                    'class' => 'hide-error',
                ],
                'value' => 11,
                'id' => 'r3',
                'onclick' => 'setItem1(this, 500);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 500 / HKD 4000</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Upper Middle to High Income Countries (Non-physician)',
                'labelOptions' => [
                    'for' => 'r4',
                    'class' => 'hide-error',
                ],
                'value' => 12,
                'id' => 'r4',
                'onclick' => 'setItem1(this, 350);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 350 / HKD 2800</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Local Participant HKSS Member (Physician)',
                'labelOptions' => [
                    'for' => 'r5',
                    'class' => 'hide-error',
                ],
                'value' => 13,
                'id' => 'r5',
                'onclick' => 'setItem1(this, 200);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 200 / HKD 1600</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Local Participant HKSS Member (Non-physician)',
                'labelOptions' => [
                    'for' => 'r6',
                    'class' => 'hide-error',
                ],
                'value' => 14,
                'id' => 'r6',
                'onclick' => 'setItem1(this, 80);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 80 / HKD 640</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Local Participant Non-HKSS Member (Physician)',
                'labelOptions' => [
                    'for' => 'r7',
                    'class' => 'hide-error',
                ],
                'value' => 15,
                'id' => 'r7',
                'onclick' => 'setItem1(this, 250);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 250 / HKD 2000</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Regular - Local Participant Non-HKSS Member (Non-physician)',
                'labelOptions' => [
                    'for' => 'r8',
                    'class' => 'hide-error',
                ],
                'value' => 16,
                'id' => 'r8',
                'onclick' => 'setItem1(this, 100);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 100 / HKD 800</div>
        </div>
    </div>

<?php } else { ?>

    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Low to Lower Middle Income Countries (Physician)',
                'labelOptions' => [
                    'for' => 'o1',
                    'class' => 'hide-error',
                ],
                'value' => 17,
                'id' => 'o1',
                'onclick' => 'setItem1(this, 500);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 500 / HKD 4000</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Low to Lower Middle Income Countries (Non-physician)',
                'labelOptions' => [
                    'for' => 'o2',
                    'class' => 'hide-error',
                ],
                'value' => 18,
                'id' => 'o2',
                'onclick' => 'setItem1(this, 350);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 350 / HKD 2800</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Upper Middle to High Income Countries (Physician)',
                'labelOptions' => [
                    'for' => 'o3',
                    'class' => 'hide-error',
                ],
                'value' => 19,
                'id' => 'o3',
                'onclick' => 'setItem1(this, 600);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 600 / HKD 4800</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Upper Middle to High Income Countries (Non-physician)',
                'labelOptions' => [
                    'for' => 'o4',
                    'class' => 'hide-error',
                ],
                'value' => 20,
                'id' => 'o4',
                'onclick' => 'setItem1(this, 450);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 450 / HKD 3600</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Local Participant HKSS Member (Physician)',
                'labelOptions' => [
                    'for' => 'o5',
                    'class' => 'hide-error',
                ],
                'value' => 21,
                'id' => 'o5',
                'onclick' => 'setItem1(this, 250);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 250 / HKD 2000</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Local Participant HKSS Member (Non-physician)',
                'labelOptions' => [
                    'for' => 'o6',
                    'class' => 'hide-error',
                ],
                'value' => 22,
                'id' => 'o6',
                'onclick' => 'setItem1(this, 100);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 100 / HKD 800</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Local Participant Non-HKSS Member (Physician)',
                'labelOptions' => [
                    'for' => 'o7',
                    'class' => 'hide-error',
                ],
                'value' => 23,
                'id' => 'o7',
                'onclick' => 'setItem1(this, 300);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 300 / HKD 2400</div>
        </div>
    </div>
    <hr class="hr02" />
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'payment_type', ['enableClientValidation' => false])->radio([
                'label' => 'Late & Onsite - Local Participant Non-HKSS Member (Non-physician)',
                'labelOptions' => [
                    'for' => 'o8',
                    'class' => 'hide-error',
                ],
                'value' => 24,
                'id' => 'o8',
                'onclick' => 'setItem1(this, 120);',
                'uncheck' => null,
            ]) ?>
        </div>
        <div class="col-md-3 text-right">
            <div>USD 120 / HKD 960</div>
        </div>
    </div>

<?php } ?>
    <?= Html::decode(Html::error($model, 'payment_type', ['style' => 'color:#a94442;', 'class' => 'show-error'])); ?>
</div>