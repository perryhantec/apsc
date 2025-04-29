<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\util\Html;
use common\widgets\Alert;
use common\models\General;
use common\models\Config;
use common\models\Home;

frontend\assets\AppAsset::register($this);
frontend\assets\AosAsset::register($this);

$model_general = General::findOne(1);

if ($this->title != $model_general->name)
    $this->title = $this->title.' - '.$model_general->name;

$base_name = explode('?', basename(\yii\helpers\Url::current([null])), 2)[0];
// $current_MID = \frontend\models\CreatePageMenu::getMID($base_name);
$nav_items = [];

// $nav_items[] = ['label' => Yii::t('web', 'Home'), 'url' => ['/'],  'active' => ($this->context->route == 'site/index'), 'options' => ['style' => []]];

$menus = \common\models\Menu::find()->where(['type'=>1, 'status' => 1])->orderBy('seq ASC')->all();

foreach($menus as $menu){
  $MID = $menu->id;
  $item = ['label' => $menu->name, 'url' => ($menu->page_type === null ? 'javascript:void(0)' : $menu->aUrl), 'linkOptions' => ($menu->page_type == 0 && $menu->link_target == 1 ? ['target' => '_blank'] : []), 'active' => ((isset($this->params['page_route']) && $menu->route == $this->params['page_route']) || ($menu->page_type == 0 && $menu->link == Yii::$app->request->url)), 'options' => ['style' => []]];
//   $item = ['label' => $menu->name, 'url' => $menu->aUrl, 'linkOptions' => ($menu->page_type == 0 && $menu->link_target == 1 ? ['target' => '_blank'] : []), 'active' => ((isset($this->params['page_route']) && $menu->route == $this->params['page_route']) || ($menu->page_type == 0 && $menu->link == Yii::$app->request->url)), 'options' => ['style' => []]];
//   $item = ['label' => $name, 'url' => "#", 'active' => ($this->context->route == 'site/page' && $current_MID==$MID)];

  //submenu
$lv2menus = \common\models\Menu::find()->where(['type'=>2, 'MID'=> $MID, 'status' => 1])->orderBy('seq ASC')->all();
  $lv2item = [];
  $i = 0;
  foreach($lv2menus as $lv2menu){
    $lv2MID = $lv2menu->id;

    $lv2item[] = ['label' => $lv2menu->name, 'url' => ($lv2menu->page_type === null ? 'javascript:void(0)' : $lv2menu->aUrl), 'linkOptions' => ($lv2menu->page_type == 0 && $lv2menu->link_target == 1 ? ['target' => '_blank'] : []), 'active' => ((isset($this->params['page_route']) && $lv2menu->route == $this->params['page_route']) || ($lv2menu->page_type == 0 && $lv2menu->link == Yii::$app->request->url))];
//     $lv2item[] = ['label' => $lv2menu->name, 'url' => $lv2menu->aUrl, 'linkOptions' => ($lv2menu->page_type == 0 && $lv2menu->link_target == 1 ? ['target' => '_blank'] : []), 'active' => ((isset($this->params['page_route']) && $lv2menu->route == $this->params['page_route']) || ($lv2menu->page_type == 0 && $lv2menu->link == Yii::$app->request->url))];
//     $lv2item[] = ['label' => $lv2name, 'url' => "#", 'active' => ($this->context->route == 'site/page' && $current_MID==$lv2MID)];
    if($i == 0) $tempUrl = $lv2menu->aUrl;
    $i++;
  }

  if($lv2item!=NULL){
    // $item['url'] = 'javascript:void(0)';
    $item['url'] = $tempUrl;
    $item['items'] = $lv2item;
  }
  $nav_items[] = $item;
}

// $nav_items[] = ['label' => Yii::t('web', 'Contact Us'), 'url' => ['/contact'],  'active' => ($this->context->route == 'site/contact'), 'options' => ['style' => []]];

$xs_nav_items = $nav_items;

$home_model = Home::findOne(1);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="<?= $model_general->description ?>">
    <meta name="keywords" content="<?= $model_general->keywords ?>">
    <title><?= Html::encode($this->title) ?></title>
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"> -->
    <link rel="manifest" href="/site.webmanifest">
    <!-- <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#219069"> -->
    <meta name="msapplication-TileColor" content="#219069">
    <meta name="theme-color" content="#ffffff">
    <meta name="format-detection" content="telephone=no">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B6DPXR6C22"></script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-B6DPXR6C22');
    </script>
    <?php $this->head() ?>
</head>
<body class="font-<?= Config::$fontSize ?> lang-<?= Yii::$app->language ?>">
        <?php $this->beginBody() ?>
        <?= $this->render('_header', ['nav_items' => $nav_items, 'xs_nav_items' => $xs_nav_items]) ?>

        <?php if ($this->context->route == "site/index") { ?>
            <?= $content ?>
<?php } else { ?>
<?php /*
        <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => Yii::t('app','Home'),
                'url' => Yii::$app->homeUrl,
                'encode' => false
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        </div>
*/ ?>
        <!-- <div class="page-header page-header-<?= isset($this->params['page_header_class']) ? $this->params['page_header_class'] : null ?>">
            <div class="container" style="<?= isset($this->params['page_header_icon']) && $this->params['page_header_icon'] != "" ? ('background-image: url('.$this->params['page_header_icon'].')') : '' ?>">
                <div class="headline">
                    <h2 class="title"><?= $this->params['page_header_title'] ?></h2>
                </div>
            </div>
        </div> -->

        <section id="section">
            <!-- <div class="section-title aos-init aos-animate" data-aos="fade-up">
                <h2><?= isset($this->params['page_header_sub_title']) ? $this->params['page_header_sub_title'] : $this->params['page_header_title'] ?></h2>
            </div> -->

            <section style="background-image:url(<?= Yii::$app->request->hostinfo.$home_model->image_file_name_1 ?>);" class="elementor-section elementor-top-section elementor-element elementor-element-e33670a elementor-section-full_width elementor-section-height-min-height elementor-section-items-top elementor-section-height-default" data-id="e33670a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;waves&quot;}">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                        c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                        c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                    </svg>
                </div>
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-536e3f5" data-id="536e3f5" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-8342d66 elementor-widget elementor-widget-heading" data-id="8342d66" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h1 class="elementor-heading-title elementor-size-default"><?= isset($this->params['page_header_sub_title']) ? $this->params['page_header_sub_title'] : $this->params['page_header_title'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	    	</section>

            <div id="progress-bar" class="container">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="main-content">
                    <?= $content ?>
                </div>
            </div>
        </section>
<?php
$js = <<<JS
    // $('html, body').animate({
    //     scrollTop: $('#section').offset().top
    // }, 1000);
JS;

$this->registerJs($js);
?>
<?php } ?>
        <?= $this->render('_footer', ['nav_items' => $nav_items])?>
        <div id="ajaxLoader" class="loader" style="display: none;">
            <img src="<?= Yii::getAlias('@web') ?>/images/loader-large.gif" alt="loading" class="loader-img">
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
