<?php

use yii\helpers\Html;

$model = \common\models\PageType1::findOne(['MID'=>$MID]);

// $files = [];

// if ($model) {
//     $files = json_decode($model->pic);
// }

$script = <<<JS
const swiper = new Swiper('.swiper', {
    autoplay: {
        delay: 5000,
    },
    // Optional parameters
    // direction: 'vertical',
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },
});

JS;
$this->registerJs($script);
?>
<style>
.swiper-button-next:after, .swiper-button-prev:after {
    color: #9C9C9C;
}
.elementor-widget-image-carousel .swiper-container{position:static}.elementor-widget-image-carousel .swiper-container .swiper-slide figure{line-height:inherit}.elementor-widget-image-carousel .swiper-slide{text-align:center}.elementor-image-carousel-wrapper:not(.swiper-container-initialized) .swiper-slide{max-width:calc(100% / var(--e-image-carousel-slides-to-show, 3))}
</style>
<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
    <div class="col-lg-12 col-sm-12 text-justify">
        <?= $model == NULL || $model->content == "" ? Yii::t('app', '<i>Coming Soon</i>') : $model->content ?>
    </div>
</div>

<p>&nbsp;</p>

<?php if (0) { ?>
<div class="col-welcome-group">
<?php
if ($files) {
    foreach ($files as $file) {
?>
    <div class="col-welcome">
        <div>
        <?php if ($file && file_exists($model->filePath.$file)) { ?>
            <?= Html::img($model->fileDisplayPath.$file, ['style' => 'width:100%;']) ?>
        <?php } ?>
        </div>
    </div>
<?php
    }
}
?>
<?php } ?>

<!-- <div class="swiper"> -->
  <!-- Additional required wrapper -->
  <!-- <div class="swiper-wrapper"> -->
    <!-- Slides -->

<?php if (0) { ?>
<div class="elementor-element elementor-element-04a7223 elementor-arrows-position-outside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel e-widget-swiper" data-id="04a7223" data-element_type="widget" data-settings="{&quot;slides_to_show&quot;:&quot;1&quot;,&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;speed&quot;:500}" data-widget_type="image-carousel.default">
    <div class="elementor-widget-container">
        <div class="elementor-image-carousel-wrapper swiper swiper-container swiper-container-initialized swiper-container-horizontal" dir="ltr">
            <div class="elementor-image-carousel swiper-wrapper">

<?php
if (isset($model->picture_file_names) && $model->picture_file_names) {
    foreach ($model->picture_file_names as $file) {
?>
                <div class="swiper-slide">
                    <?php if ($file && file_exists($model->filePath.$file)) { ?>
                        <?= Html::img($model->fileDisplayPath.$file, ['style' => 'width:100%;']) ?>
                    <?php } ?>
                </div>
<?php
    }
}
?>
            </div>
  <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

<!-- If we need scrollbar -->
<!-- <div class="swiper-scrollbar"></div> -->
        </div>
    </div>
</div>
<?php } ?>