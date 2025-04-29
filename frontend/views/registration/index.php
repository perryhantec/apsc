<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use common\models\Menu;
use common\models\Definitions;
use Da\QrCode\QrCode;

$url = Url::to(['/register/form'], true);

$qrCodeImg = (new QrCode($url))
    ->setSize(150)
    ->setMargin(5)
    ->useForegroundColor(0, 0, 0);


$menu_model = Menu::findOne(['url' => 'registration']);
$reg_text_model = common\models\RegistrationText::findOne(1);

if ($menu_model != null) {
    $this->params['page_route'] = $menu_model->route;

    $this->title = strip_tags($menu_model->name);
    $this->params['page_header_title'] = $menu_model->name;

    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <br />
    <p class="text-center">
        <?= Html::a('Register HERE', ['form'], ['class' => 'btn2', 'target' => '_blank']) ?>
    </p>
<?php if (0) { ?>
    <div class="row form-group">
        <div class="col-lg-2 col-5 text-center">
            <?= Html::img($qrCodeImg->writeDataUri()) ?>
        </div>
        <div class="col-lg-10 ">
<?php if (0) { ?>
            <p class="text01">
                Registration is available only through the Online Registration System.<br>
                Scan the QR code or click <a href="registration/form" target="_blank" class="btn01"><strong>Register here</strong></a>
            </p>
<?php } ?>
            <p class="text01">
                Registration is available only through the Online Registration System.<br>
                Scan the QR code or click <a href="javascript:void(0);" target="_blank" class="btn01" data-toggle="modal" data-target="#myModal"><strong>Register here</strong></a>
            </p>
        </div>
    </div>
<?php } ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12 text-justify">
            <?= $reg_text_model->intro ?>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
            <p><i>Coming Soon</i></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>
