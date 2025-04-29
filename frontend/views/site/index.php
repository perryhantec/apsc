<?php

use yii\bootstrap\Carousel;
use common\util\Html;
use common\models\General;
use common\models\Home;
use common\models\Banner;

$model_general = General::findOne(1);
$this->title = $model_general->name;

$home_model = Home::findOne(1);

$model_1 = $model_2 = $temp_model_1 = $temp_model_2 = [];
$count_1 = $count_2 = 1;

if ($home_model->menu1PageType3) {
    foreach ($home_model->menu1PageType3 as $model) {
        if ($count_1 <= $home_model->show_limit_1) {
            $temp_model_1[] = $model;
        }
        $count_1++;
    }

    $model_1 = [
        'model' => $temp_model_1,
        'type'  => 1,
    ];
} else if ($home_model->menu1PageType6) {
    foreach ($home_model->menu1PageType6 as $model) {
        if ($count_1 <= $home_model->show_limit_1) {
            $temp_model_1[] = $model;        
        }
        $count_1++;
    }

    $model_1 = [
        'model' => array_reverse($temp_model_1),
        'type'  => 2,
    ];
}

if ($home_model->menu2PageType3) {
    foreach ($home_model->menu2PageType3 as $model) {
        if ($count_2 <= $home_model->show_limit_2) {
            $temp_model_2[] = $model;        
        }
        $count_2++;
    }

    $model_2 = [
        'model' => $temp_model_2,
        'type'  => 1,
    ];
} else if ($home_model->menu2PageType6) {
    foreach ($home_model->menu2PageType6 as $model) {
        if ($count_2 <= $home_model->show_limit_2) {
            $temp_model_2[] = $model;        
        }
        $count_2++;
    }

    $model_2 = [
        'model' => array_reverse($temp_model_2),
        'type'  => 2,
    ];
}

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
<?php if (0) { ?>
    <div class="row">
        <div class="col-md-5">
            <div style="position:relative;padding:20px 10px;">
                <div class="elementor-background-overlay-2"></div>
                <div class="text-center">
                    <?= Html::img(Yii::$app->request->hostinfo.$home_model->image_file_name_2, ['style' => 'width:70%;border-radius: 40% 10% 40% 10%;']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div style="position:relative;padding:20px 10px;">
                <?= $home_model->content ?>
            </div>
            <!-- <div class="home-large-btn-group home-large-btn-group-3" style="padding:20px 0;">
                <ul style="list-style-type:none;margin:0;padding:0;font-weight:bold;">
                    <li><a href="message" class="home-large-btn" style="background-color:#2C83D1;">About the Conference</a></li>
                    <li><a href="about" class="home-large-btn" style="background-color:#CE3D2E;">About Hong Kong</a></li>
                </ul>
            </div> -->

            <section class="elementor-section elementor-inner-section elementor-element elementor-element-9f5dde5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9f5dde5" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-29b4257" data-id="29b4257" data-element_type="column">
            			<div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-2195e72 elementor-align-center elementor-widget elementor-widget-button" data-id="2195e72" data-element_type="widget" data-widget_type="button.default">
                               <div class="elementor-widget-container elementor-widget-container-2 btn-type-1">
					                <div class="elementor-button-wrapper">
                            			<a href="message" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                    						<span class="elementor-button-content-wrapper">
					                        	<span class="elementor-button-text">About the Conference</span>
                                    		</span>
                    					</a>
                            		</div>
                				</div>
				            </div>
					    </div>
            		</div>
                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-bedb616" data-id="bedb616" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-3bdef74 elementor-align-center elementor-widget elementor-widget-button" data-id="3bdef74" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container elementor-widget-container-2 btn-type-1">
                                    <div class="elementor-button-wrapper">
                                        <a href="about" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text">About Hong Kong</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php if (0) { ?>
        <div class="col-lg-12 col-md-12 text-center">
            <?= Html::img(Yii::$app->urlManager->createUrl($home_model->image_file_name), ['style' => 'max-width:100%;']) ?>
        </div>
        <?php } ?>
    </div>
<?php } ?>

    <section class="elementor-section elementor-top-section elementor-element elementor-element-0751e56 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="0751e56" data-element_type="section">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-59af4fd" data-id="59af4fd" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    			<div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-cc95172 elementor-widget elementor-widget-image" data-id="cc95172" data-element_type="widget" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <!-- <img width="1280" height="960" src="https://hkmss.org/wordpress/wp-content/uploads/2023/02/Cover_GoldenEgg.jpg" class="attachment-full size-full wp-image-3820" alt="" loading="lazy" srcset="https://hkmss.org/wordpress/wp-content/uploads/2023/02/Cover_GoldenEgg.jpg 1280w, https://hkmss.org/wordpress/wp-content/uploads/2023/02/Cover_GoldenEgg-300x225.jpg 300w, https://hkmss.org/wordpress/wp-content/uploads/2023/02/Cover_GoldenEgg-1024x768.jpg 1024w, https://hkmss.org/wordpress/wp-content/uploads/2023/02/Cover_GoldenEgg-768x576.jpg 768w" sizes="(max-width: 1280px) 100vw, 1280px"> -->
                            <?= Html::img(Yii::$app->request->hostinfo.$home_model->image_file_name_2, ['style' => 'width:70%;border-radius: 40% 10% 40% 10%;']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-bc4ce25" data-id="bc4ce25" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-0aa97ef elementor-widget elementor-widget-text-editor" data-id="0aa97ef" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <style>/*! elementor - v3.10.0 - 09-01-2023 */
                                    .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#818a91;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#818a91;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}
                            </style>
                            <?= $home_model->content ?>
                        </div>
                    </div>
				    <section class="elementor-section elementor-inner-section elementor-element elementor-element-9f5dde5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="9f5dde5" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-29b4257" data-id="29b4257" data-element_type="column">
			                    <div class="elementor-widget-wrap elementor-element-populated">
								    <div class="elementor-element elementor-element-2195e72 elementor-align-center elementor-widget elementor-widget-button" data-id="2195e72" data-element_type="widget" data-widget_type="button.default">
                        				<div class="elementor-widget-container elementor-widget-container-2 btn-type-4">
					                        <div class="elementor-button-wrapper">
			                                    <a href="message" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                            						<span class="elementor-button-content-wrapper">
                                						<span class="elementor-button-text">About the Conference</span>
                                            		</span>
                            					</a>
                                    		</div>
                        				</div>
                    				</div>
					            </div>
                    		</div>
            				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-bedb616" data-id="bedb616" data-element_type="column">
			                    <div class="elementor-widget-wrap elementor-element-populated">
								    <div class="elementor-element elementor-element-3bdef74 elementor-align-center elementor-widget elementor-widget-button" data-id="3bdef74" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container elementor-widget-container-2 btn-type-5">
                                            <div class="elementor-button-wrapper">
                                                <a href="about" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text">About Hong Kong</span>
                                            		</span>
                                                </a>
                                    		</div>
                        				</div>
                    				</div>
					            </div>
                    		</div>
                        </div>
	            	</section>
                </div>
	    	</div>
        </div>
    </section>
  
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
<?php 
    if ($model_1) {
?>
            <div class="section-title aos-init aos-animate" data-aos="fade-up">
                <h2><span><?= $home_model->menu1->name ?></span></h2>
            </div> 
<?php
        if ($model_1['type'] == 1) {
            foreach ($model_1['model'] as $model) {
?>
            <p class="subheader2"><?= date('j F Y', strtotime($model->display_at)) ?></p>
            <?= $model->content ?>
            <hr />
<?php
            }
        } else if ($model_1['type'] == 2) {
            $i = 1;
            $second = 0.2;
            foreach ($model_1['model'] as $model) {
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
                <div class="datebox borderleft">
                <!-- <div class="datebox borderright text-right"> -->
                    <span class="datebox1"><?= $model->title ?></span>
                    <br>
                    <span class="datebox2"><?= date('j F Y', strtotime($model->display_at)) ?></span>
                </div>
            </div>
<?php
                }
                $second += 0.4;
                $i++;
            }
        }
    }
?>
        </div>
    
        <div class="col-lg-6 col-md-6 col-sm-12">
<?php 
    if ($model_2) {
?>
            <div class="section-title aos-init aos-animate" data-aos="fade-up">
                <h2><span><?= $home_model->menu2->name ?></span></h2>
            </div>
<?php
        if ($model_2['type'] == 1) {
            foreach ($model_2['model'] as $model) {
?>
            <p class="subheader2"><?= date('j F Y', strtotime($model->display_at)) ?></p>
            <?= $model->content ?>
            <hr />
<?php
            }
        } else if ($model_2['type'] == 2) {
            $i = 1;
            $second = 0.2;
            foreach ($model_2['model'] as $model) {
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
                <!-- <div class="datebox borderright text-right"> -->
                <div class="datebox borderleft">
                    <span class="datebox1"><?= $model->title ?></span>
                    <br>
                    <span class="datebox2"><?= date('j F Y', strtotime($model->display_at)) ?></span>
                </div>
            </div>
<?php
                }
                $second += 0.4;
                $i++;
            }
        }
    }
?>

        </div>
        <!-- <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
            <hr class="hr01">
            <?= $home_model->content ?>
        </div> -->
    </div>
</div>

<?php if (0) { ?>
<div class="banner">
<?php
    $banners = Banner::find()->where(['status' => 1])->orderBy(['seq'=>'ASC'])->all();

//                     $banner_items = [Html::tag('div', Html::img(Yii::getAlias('@web').'/content/banners/0.jpg', ['class' => '']), ['class' => 'banner-item'])];
    foreach ($banners as $banner) {
        // $_banner_content = (Html::img(\Yii::$app->request->getBaseUrl() . $banner->image_file_name));
        $_banner_content = (Html::img(Yii::$app->request->hostinfo.$banner->image_file_name));
        if ($banner->url != "")
            $banner_items[] = Html::a($_banner_content, $banner->url, ['class' => 'banner-item'.($banner->url_target == 2 ? ' banner-item-youtubeLink' : null), 'target' => ($banner->url_target == 1 ? '_blank' : null)]);
        else
            $banner_items[] = Html::tag('div', $_banner_content, ['class' => 'banner-item']);
    }

    if (sizeof($banner_items) > 0) {
        echo Carousel::widget([
            'id' => 'headerBanner',
            'items' => $banner_items,
            'options'=> ['class'=>'carousel slide']
        ]);
    }
?>
</div>
<?php } ?>

<section style="background-image: url(<?= Yii::$app->request->hostinfo.$home_model->image_file_name_3 ?>);" class="elementor-section elementor-top-section elementor-element elementor-element-f9f66ae elementor-section-full_width elementor-section-height-min-height elementor-section-content-middle elementor-section-height-default elementor-section-items-middle" data-id="f9f66ae" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_top&quot;:&quot;tilt&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-shape elementor-shape-top" data-negative="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path class="elementor-shape-fill" d="M0,6V0h1000v100L0,6z"></path>
        </svg>
    </div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f0dc17e" data-id="f0dc17e" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1c307f5 elementor-widget elementor-widget-text-editor" data-id="1c307f5" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?= $home_model->menu3PageType1->summary ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-67d1220" data-id="67d1220" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated e-swiper-container">
                <div class="elementor-element elementor-element-04a7223 elementor-arrows-position-outside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel e-widget-swiper" data-id="04a7223" data-element_type="widget" data-settings="{&quot;slides_to_show&quot;:&quot;1&quot;,&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;speed&quot;:500}" data-widget_type="image-carousel.default">
                    <div class="elementor-widget-container">
                        <style>/*! elementor - v3.10.0 - 09-01-2023 */
                            .elementor-widget-image-carousel .swiper-container{position:static}.elementor-widget-image-carousel .swiper-container .swiper-slide figure{line-height:inherit}.elementor-widget-image-carousel .swiper-slide{text-align:center;border: 3px solid #FFF;}.elementor-image-carousel-wrapper:not(.swiper-container-initialized) .swiper-slide{max-width:calc(100% / var(--e-image-carousel-slides-to-show, 3))}
                        </style>
                        <div class="elementor-image-carousel-wrapper swiper swiper-container swiper-container-initialized swiper-container-horizontal" dir="ltr">
                            <div class="elementor-image-carousel swiper-wrapper">
<?php
$files = [];

if ($home_model->menu3PageType1->file_names) {
    $files = json_decode($home_model->menu3PageType1->file_names);
}

if ($files) {
    foreach ($files as $file) {
?>
    <div class="swiper-slide">
        <?= Html::img($home_model->menu3PageType1->fileDisplayPath.$file, ['style' => 'width:100%;']) ?>
    </div>
<?php
    }
}
?>
                            </div>
                            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                            <div class="elementor-swiper-button elementor-swiper-button-prev swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                            <div class="elementor-swiper-button elementor-swiper-button-next swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
<?php if (0) { ?>
                <div class="elementor-element elementor-element-166e9d2 elementor-align-center elementor-widget elementor-widget-button" data-id="166e9d2" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a href="<?= $home_model->menu3PageType1->menu->url ?>" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">Learn more</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div>
        </div>
    </div>
</section>