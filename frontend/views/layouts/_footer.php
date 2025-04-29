<?php

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use common\util\Html;
use common\models\Content;
use common\models\Configuration;
// use kartik\icons\Icon;
use common\models\General;
use common\models\ContactUs;
use common\models\Home;


/* @var $this \yii\web\View */
$model_general = General::findOne(1);
$model_contactus = ContactUs::findOne(1);
$home_model = Home::findOne(1);

$this->registerJs(<<<JS

JS
);

?>
<section class="elementor-section elementor-top-section elementor-element elementor-element-85386e0 elementor-section-full_width elementor-section-height-min-height elementor-section-items-top elementor-section-height-default" data-id="85386e0" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-20fb390" data-id="20fb390" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-a514060 elementor-widget elementor-widget-heading" data-id="a514060" data-element_type="widget" data-widget_type="heading.default">
    				<div class="elementor-widget-container">
			            <h4 class="elementor-heading-title elementor-size-default">ORGANIZERS</h4>
                    </div>
				</div>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-282aa4b elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="282aa4b" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
    					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ccfd2ef" data-id="ccfd2ef" data-element_type="column">
	                		<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-9ccb300 elementor-widget elementor-widget-image" data-id="9ccb300" data-element_type="widget" data-widget_type="image.default">
		                    		<div class="elementor-widget-container">
                                        <img width="298" height="411" src="<?= Yii::$app->request->hostinfo.$home_model->image_file_name_4 ?>" class="attachment-full size-full wp-image-3653" alt="" loading="lazy" srcset="<?= Yii::$app->request->hostinfo.$home_model->image_file_name_4 ?> 298w, <?= Yii::$app->request->hostinfo.$home_model->image_file_name_4 ?> 218w" sizes="(max-width: 298px) 100vw, 298px">
                                    </div>
                				</div>
				        	</div>
                		</div>
				        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-33c0bc0" data-id="33c0bc0" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-5f8389e elementor-widget elementor-widget-image" data-id="5f8389e" data-element_type="widget" data-widget_type="image.default">
				                    <div class="elementor-widget-container">
                                        <img width="500" height="451" src="<?= Yii::$app->request->hostinfo.$home_model->image_file_name_5 ?>" class="attachment-full size-full wp-image-3652" alt="" loading="lazy" srcset="<?= Yii::$app->request->hostinfo.$home_model->image_file_name_5 ?> 500w, <?= Yii::$app->request->hostinfo.$home_model->image_file_name_5 ?> 300w" sizes="(max-width: 500px) 100vw, 500px">
                                    </div>
                				</div>
				        	</div>
                		</div>
                    </div>
	        	</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-26a3579 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="26a3579" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
	    				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-cdcd7a0" data-id="cdcd7a0" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-6bfb50d elementor-widget elementor-widget-text-editor" data-id="6bfb50d" data-element_type="widget" data-widget_type="text-editor.default">
                    				<div class="elementor-widget-container">
					            		<p><strong><?= $home_model->org_text_1 ?></strong></p>
                                    </div>
                				</div>
				        	</div>
                		</div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-855fea4" data-id="855fea4" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-bf04f6f elementor-widget elementor-widget-text-editor" data-id="bf04f6f" data-element_type="widget" data-widget_type="text-editor.default">
				                    <div class="elementor-widget-container">
							            <p><strong><?= $home_model->org_text_2 ?></strong></p>
                                    </div>
                				</div>
				        	</div>
                		</div>
                    </div>
	        	</section>
                <div class="elementor-element elementor-element-6e349de elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="6e349de" data-element_type="widget" data-widget_type="divider.default">
    				<div class="elementor-widget-container">
	    				<div class="elementor-divider">
	                		<span class="elementor-divider-separator"></span>
                		</div>
				    </div>
				</div>
				<div class="elementor-element elementor-element-6036e20 elementor-widget elementor-widget-text-editor" data-id="6036e20" data-element_type="widget" data-widget_type="text-editor.default">
				    <div class="elementor-widget-container">
                        <p><?= $model_general->copyright ?></p>
                    </div>
				</div>
            </div>
		</div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-807c814" data-id="807c814" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-6e96226 elementor-widget elementor-widget-heading" data-id="6e96226" data-element_type="widget" data-widget_type="heading.default">
    				<div class="elementor-widget-container">
	            		<h4 class="elementor-heading-title elementor-size-default">CONTACT US</h4>
                    </div>
				</div>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-76bddd3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="76bddd3" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
    					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0df0f50" data-id="0df0f50" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-1df8b41 elementor-view-default elementor-widget elementor-widget-icon" data-id="1df8b41" data-element_type="widget" data-widget_type="icon.default">
                    				<div class="elementor-widget-container">
					                    <div class="elementor-icon-wrapper">
                                			<div class="elementor-icon">
			                                    <i aria-hidden="true" class="fa fa-bookmark-o"></i>
                                            </div>
                                		</div>
                    				</div>
                				</div>
				        	</div>
                		</div>
				        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f0b989b" data-id="f0b989b" data-element_type="column">
	                		<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-5d05673 elementor-widget elementor-widget-text-editor" data-id="5d05673" data-element_type="widget" data-widget_type="text-editor.default">
                    				<div class="elementor-widget-container">
					            		<p><strong><?= $model_contactus->title ?></strong></p>
                                    </div>
                				</div>
				        	</div>
                		</div>
                    </div>
	        	</section>
<?php if ($model_contactus->address) { ?>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-805009f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="805009f" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
	    				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6406239" data-id="6406239" data-element_type="column">
		                	<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-12df39e elementor-view-default elementor-widget elementor-widget-icon" data-id="12df39e" data-element_type="widget" data-widget_type="icon.default">
				                    <div class="elementor-widget-container">
					                    <div class="elementor-icon-wrapper">
                                			<div class="elementor-icon">
			                                    <i aria-hidden="true" class="fa fa-building-o"></i>
                                            </div>
                                		</div>
                    				</div>
                				</div>
				        	</div>
                		</div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1c6976d" data-id="1c6976d" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-e428c9d elementor-widget elementor-widget-text-editor" data-id="e428c9d" data-element_type="widget" data-widget_type="text-editor.default">
				                    <div class="elementor-widget-container">
							            <p><?= $model_contactus->address ?></p>
                                    </div>
                				</div>
				        	</div>
                		</div>
                    </div>
	        	</section>
<?php }  ?>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-bfe03e6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bfe03e6" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
					    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-191d66f" data-id="191d66f" data-element_type="column">
			                <div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-b17e482 elementor-view-default elementor-widget elementor-widget-icon" data-id="b17e482" data-element_type="widget" data-widget_type="icon.default">
                    				<div class="elementor-widget-container">
					                    <div class="elementor-icon-wrapper">
                                			<div class="elementor-icon">
                                    			<i aria-hidden="true" class="fa fa-phone"></i>
                                            </div>
                                		</div>
                    				</div>
                				</div>
				        	</div>
                		</div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-91b92c7" data-id="91b92c7" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-3c8dc23 elementor-widget elementor-widget-text-editor" data-id="3c8dc23" data-element_type="widget" data-widget_type="text-editor.default">
				                    <div class="elementor-widget-container">
							            <p><?= $model_contactus->phone ?></p>
                                    </div>
                				</div>
				        	</div>
                		</div>
                    </div>
	        	</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-c03b515 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c03b515" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
					    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5204115" data-id="5204115" data-element_type="column">
		                	<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-d38d408 elementor-view-default elementor-widget elementor-widget-icon" data-id="d38d408" data-element_type="widget" data-widget_type="icon.default">
				                    <div class="elementor-widget-container">
					                    <div class="elementor-icon-wrapper">
                                			<div class="elementor-icon">
			                                    <i aria-hidden="true" class="fa fa-fax"></i>
                                            </div>
                                		</div>
                    				</div>
				                </div>
        					</div>
		                </div>
				        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0da0e71" data-id="0da0e71" data-element_type="column">
                			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-e0b8c87 elementor-widget elementor-widget-text-editor" data-id="e0b8c87" data-element_type="widget" data-widget_type="text-editor.default">
				                    <div class="elementor-widget-container">
							            <p><?= $model_contactus->fax ?></p>
                                    </div>
                				</div>
				        	</div>
                		</div>
                    </div>
	        	</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-3463555 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3463555" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
					    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-64fabfe" data-id="64fabfe" data-element_type="column">
			                <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-10f4128 elementor-view-default elementor-widget elementor-widget-icon" data-id="10f4128" data-element_type="widget" data-widget_type="icon.default">
				                    <div class="elementor-widget-container">
					                    <div class="elementor-icon-wrapper">
                                			<div class="elementor-icon">
	                                    		<i aria-hidden="true" class="fa fa fa-envelope"></i>
                                            </div>
                                		</div>
                    				</div>
				                </div>
        					</div>
		                </div>
        				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-172e5ec" data-id="172e5ec" data-element_type="column">
		                	<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-17bcf62 elementor-widget elementor-widget-text-editor" data-id="17bcf62" data-element_type="widget" data-widget_type="text-editor.default">
				                    <div class="elementor-widget-container">
					            		<p><?= $model_contactus->email ?></p>
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

<?php if (0) { ?>
<!-- <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>ORGANIZERS</h3>
                <div class="text-left">
                    <?= Html::img(Yii::$app->request->hostinfo.$home_model->image_file_name_3, ['style' => 'width: 100%;']) ?>
                </div>
                <div class="footer-copyright">
                    <?= $model_general->copyright ?>
                </div>
            </div>
            <div class="col-md-6">
                <h3>CONTACT US</h3>
                <?= $model_contactus == NULL || $model_contactus->content == "" ? Yii::t('app', '<i>Coming Soon</i>') : $model_contactus->content ?>
            </div>
        </div>
    </div>
</footer> -->
<?php } ?>
<a id="fix-back-to-top" href="#" class="btn btn-primary btn-lg fix-back-to-top hidden-xs" role="button" style="display:none;"><span class="glyphicon glyphicon-chevron-up"></span></a>
