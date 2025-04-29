<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\NavBar;
use yii\bootstrap\Carousel;
use yii\bootstrap\ActiveForm;
use kartik\nav\NavX;
use common\util\Html;
use common\models\Config;
use common\models\Banner;
use common\models\ContactUs;
use common\models\General;
use common\models\Home;

$this->registerJs(
<<<JS
    // jQuery('.banner-item-youtubeLink')
    //     .fancybox({
    // 		afterClose: function( instance, slide ) {
    //             jQuery("#headerBanner").carousel("cycle");
    // 		}
    //     })
    //     .click(function() {
    //         jQuery("#headerBanner").carousel("pause");
    //     });
    $('a.dropdown-toggle').attr('data-toggle','');
JS
);

$this->registerCss('.vjs-tech { object-fit: cover; }');

// $login_form_model = new \frontend\models\LoginForm();
$contact_model = ContactUs::findOne(1);
// echo newerton\fancybox3\FancyBox::widget();

$model_general = General::findOne(1);
$home_model = Home::findOne(1);

?>
<header>
<?php
if (
    strpos($this->context->route, 'my/') === false
    && strpos($this->context->route, 'registration/form') === false
    && strpos($this->context->route, 'registration/thank-you') === false
) { ?>
    <div class="top-nav-nonXs <?= ($this->context->route == 'site/index' || $this->context->route == 'site/index2') ? 'index-top-nav-nonXs ' : '' ?>hidden-xs">
        <div class="header-nav header-nav-topNav">
            <div class="header-logo text-center">
                <div class="elementor-background-overlay elementor-element-header"></div>
                <?= Html::a(Html::img(Yii::$app->request->hostinfo.$model_general->banner_image_file_name), ['/']) ?>
                <div class="text-center" style="color:#FFF;font-size: 1.4rem;font-family: Helvetica, Sans-serif;"><strong><?= Html::a('HOME', ['/'], ['style' => 'color:#FFF;']) ?></strong></div>
            </div>
            <div class="header-nav-topNav-bottom">
                <!-- <div class="container"> -->
                    <?php
                        $_nav_items = $nav_items;
                        // if (Yii::$app->user->isGuest)
                        //     $_nav_items[] =
                        //         ['label' => Yii::t('app', 'Login'), 'options' => ['class' => 'header-nav-login'], 'linkOptions' => ['class' => 'btn'], 'url' => ['/site/login']];
                            
                        echo NavX::widget([
                            'options' => ['class' => 'navbar-nav'],
                            'items' => $_nav_items,
                            'activateParents' => true,
                            'encodeLabels' => false
                        ]); ?>
                <!-- </div> -->
            </div>
        </div>
        <div class="header-nav header-nav-fixed" style="display: none;">
            <?php NavBar::begin(); ?>
            <div class="row">
                <div class="col-sm-12 header-nav-fixed-nav">
                    <?= NavX::widget([
                            'options' => ['class' => 'navbar-nav'],
                            'items' => $nav_items,
                            'activateParents' => true,
                            'encodeLabels' => false
                        ]); ?>
                </div>
            </div>
            <?php NavBar::end(); ?>
        </div>
    </div>

    <div class="xs-header visible-xs-block">
        <?php NavBar::begin(); ?>
        <?= NavX::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $xs_nav_items,
                'activateParents' => true,
                'encodeLabels' => false
            ]); ?>
        <?php NavBar::end(); ?>
    </div>
<?php } ?>

<?php if ($this->context->route == 'site/index' || $this->context->route == 'site/index2') { ?>


    <!-- <div style="position:relative;">
        <?= Html::img(Yii::$app->request->hostinfo.$home_model->image_file_name_1, ['width' => '100%']) ?>
        <div class="elementor-shape elementor-shape-bottom" data-negative="false">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            	<path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
	c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
	c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
            </svg>		
        </div>
        <div class="home-large-btn-group home-large-btn-group-1" style="position:absolute;bottom:0;right:10%;">
            <ul style="list-style-type:none;margin:0 0 40px;padding:0;font-size:30px;font-weight:bold;">
                <li style="margin-bottom:20px;"><a href="registration" class="home-large-btn" style="background-color:#00BDC6;">Register Now</a></li>
                <li style="margin-bottom:20px;"><a href="call-for-abstract" class="home-large-btn" style="background-color:#925CCC;">Submit Abstract</a></li>
                <li style="margin-bottom:20px;"><a href="programme" class="home-large-btn" style="background-color:#5E6ECC;">Scientific Programme</a></li>
            </ul>
        </div>
    </div>
    <div class="home-large-btn-group home-large-btn-group-2" style="padding:20px;">
        <ul style="list-style-type:none;margin:0;padding:0;font-size:30px;font-weight:bold;">
            <li style=""><a href="registration" class="home-large-btn" style="background-color:#00BDC6;">Register Now</a></li>
            <li style="margin-top:20px;"><a href="call-for-abstract" class="home-large-btn" style="background-color:#925CCC;">Submit Abstract</a></li>
            <li style="margin-top:20px;"><a href="programme" class="home-large-btn" style="background-color:#5E6ECC;">Scientific Programme</a></li>
        </ul>
    </div> -->

    <section style="background-image: url(<?= Yii::$app->request->hostinfo.$home_model->image_file_name_1 ?>);" class="elementor-section elementor-top-section elementor-element elementor-element-9ee86c7 elementor-element-body elementor-section-full_width elementor-section-height-min-height elementor-section-items-top elementor-section-height-default" data-id="9ee86c7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;waves&quot;}">
		<div class="elementor-background-overlay"></div>
		<div class="elementor-shape elementor-shape-bottom" data-negative="false">
		    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
	            <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
	c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
	c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
            </svg>
        </div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e1e8c13" data-id="e1e8c13" data-element_type="column">
    			<div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-c3b9985 elementor-widget elementor-widget-heading" data-id="c3b9985" data-element_type="widget" data-widget_type="heading.default">
        				<div class="elementor-widget-container elementor-widget-container-type-1">
		    	            <h1 class="elementor-heading-title elementor-heading-title-type-1 elementor-size-default"><?= $home_model->body_text_1 ?></h1>
                        </div>
				    </div>
				    <div class="elementor-element elementor-element-bb41b1d elementor-widget elementor-widget-heading" data-id="bb41b1d" data-element_type="widget" data-widget_type="heading.default">
				        <div class="elementor-widget-container elementor-widget-container-type-2">
			                <h1 class="elementor-heading-title elementor-heading-title-type-2 elementor-size-default"><?= $home_model->body_text_2 ?></h1>
                        </div>
				    </div>
				    <div class="elementor-element elementor-element-f0bf501 elementor-widget elementor-widget-heading" data-id="f0bf501" data-element_type="widget" data-widget_type="heading.default">
				        <div class="elementor-widget-container elementor-widget-container-type-2">
			                <h1 class="elementor-heading-title elementor-heading-title-type-3 elementor-size-default"><?= $home_model->body_text_3 ?></h1>
                        </div>
    				</div>
	    			<div class="elementor-element elementor-element-68bb4db elementor-widget elementor-widget-heading" data-id="68bb4db" data-element_type="widget" data-widget_type="heading.default">
        				<div class="elementor-widget-container elementor-widget-container-type-3">
			                <h1 class="elementor-heading-title elementor-heading-title-type-4 elementor-size-default"><?= $home_model->body_text_4 ?></h1>
                        </div>
    				</div>
	    			<section class="elementor-section elementor-inner-section elementor-element elementor-element-19e5569 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="19e5569" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
        					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-51411a6" data-id="51411a6" data-element_type="column">
			                    <div class="elementor-widget-wrap elementor-element-populated">
    								<div class="elementor-element elementor-element-6d337c9 elementor-widget elementor-widget-heading text-center" data-id="6d337c9" data-element_type="widget" data-widget_type="heading.default">
                        				<div class="elementor-widget-container">
			                                <h1 class="elementor-heading-title elementor-heading-title-type-5 elementor-size-default"><?= $home_model->body_text_5 ?></h1>
                                        </div>
                    				</div>
					            </div>
		                    </div>
				            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-e1ecba5" data-id="e1ecba5" data-element_type="column">
			                    <div class="elementor-widget-wrap elementor-element-populated">
								    <div class="elementor-element elementor-element-aa52436 elementor-align-center elementor-widget elementor-widget-button" data-id="aa52436" data-element_type="widget" data-widget_type="button.default">
				                        <div class="elementor-widget-container elementor-widget-container-2 btn-type-1">
					                        <div class="elementor-button-wrapper">
			                                    <a href="registration" class="elementor-button-link elementor-button elementor-size-xl" role="button">
						                            <span class="elementor-button-content-wrapper">
						                                <span class="elementor-button-text">Register Now</span>
		                                            </span>
                            					</a>
                                    		</div>
                        				</div>
                    				</div>
                    				<div class="elementor-element elementor-element-fa88945 elementor-align-center elementor-widget elementor-widget-button" data-id="fa88945" data-element_type="widget" data-widget_type="button.default">
				                        <div class="elementor-widget-container elementor-widget-container-2 btn-type-2">
					                        <div class="elementor-button-wrapper">
			                                    <a href="call-for-abstract" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text">Submit Abstract</span>
                                                    </span>
                                                </a>
                                    		</div>
                        				</div>
                    				</div>
                                    <div class="elementor-element elementor-element-9b4c188 elementor-align-center elementor-widget elementor-widget-button" data-id="9b4c188" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container elementor-widget-container-2 btn-type-3">
                                            <div class="elementor-button-wrapper">
                                                <a href="programme" class="elementor-button-link elementor-button elementor-size-xl" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text">Scientific Programme</span>
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

<?php } else { ?>
<?php if (0) { ?>
    <?= Html::img(Yii::$app->urlManager->createUrl('/content/banners/1.png'), ['width' => '100%']) ?>
<?php } ?>
<?php if (0) { ?>
    <?= Html::img(Yii::$app->request->hostinfo.$home_model->image_file_name_1, ['width' => '100%']) ?>
<?php } ?>
<?php } ?>
</header>
