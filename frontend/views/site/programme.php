<?php

use yii\helpers\Html;

use common\models\Menu;
use common\models\Definitions;

$model = Menu::findOne(['url' => 'programme']);

if ($model != null) {
    $this->params['page_route'] = $model->route;

    $this->title = strip_tags($model->name);
    $this->params['page_header_title'] = $model->name;

    $this->params['breadcrumbs'][] = $this->title;
}

$js = <<<JS
	window.scrollTo(0,1);
	var menu = $("#right-nav-btn > div");
	var submenu = $("#right-nav-btn > ul");
	var win = $(window);
	var content = $("#right,h1");
	
	menu.on("click",open);
	
	function open(){
		submenu.toggle(200);
		content.on("click",close);
		menu.toggleClass("gray");
		win.on("scroll",close);
		}
	function close(){
		submenu.fadeOut(200);
		content.off("click");
		menu.removeClass("gray");
		win.off("scroll");
    }
JS;

$this->registerJs($js);
?>

<div class="row">
<?php if (sizeof($model->subMenu) > 0) { ?>
            <div class="col-sm-3 hidden-xs">
                <div class="page-left-menu">
                    <?php
                        echo '<ul class="sub-nav">';
                        foreach ($model->subMenu as $menu) {
                            echo '<li'.($menu->route == $model->route ? ' class="active"' : '').'>'.Html::a($menu->name, ($menu->page_type === null ? 'javascript:void(0)' : $menu->aUrl), ['target' => ($menu->page_type == 0 && $menu->link_target == 1 ? '_blank' : '')]).'</li>';
                        }
                        echo '</ul>';
                    ?>
                </div>
            </div>
            <div class="col-sm-9 has-sub-nav">
<?php } else { ?>
            <div class="col-sm-12">
<?php } ?>
                <p style="margin-bottom:1rem;"><em>*The programme is subject to change without prior notice.</em></p>
                <p style="margin-bottom:1rem;"><em><a href="/content/files/V2-APSC%202023%20Program%20at%20a%20glance.pdf" target="_blank">Press HERE to download the PDF version</a></em><a href="/content/files/V2-APSC%202023%20Program%20at%20a%20glance.pdf"><em>&nbsp;program at a glance</em></a></p>
                <p style="margin-bottom:1rem;"><a href="/content/files/website_detailed_rundown_20230818_V3.pdf" target="_blank"><em>Press HERE to download the PDF version detailed rundown with latest speaker and topics</em></a></p>
                <p style="margin-bottom:1rem;"><a href="/content/files/APSC_2023_Poster_Presentation_Schedule_V10.pdf" target="_blank"><em>Poster Presentation</em></a></p>

                <p>&nbsp;</p>
                <?= $this->render('_programme_1'); ?>
                <?= $this->render('_programme_2'); ?>
                <?= $this->render('_programme_3'); ?>

                <div>&nbsp;</div>
    </div>
            </div>
        </div>

