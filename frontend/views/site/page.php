<?php

/* @var $this yii\web\View */
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Html;
use common\models\Config;

$model_general = common\models\General::findOne(1);

$this->params['page_header_title'] = $model->name;
if ($model->menu != null) {
    $this->params['page_header_sub_title'] = $this->params['page_header_title'];
    $this->params['page_header_title'] = $model->menu->name;
    $this->params['breadcrumbs'][] = strip_tags($model->menu->name);
    if ($model->menu->banner_image_file_name != "")
        $this->params['page_header_img'] = $model->menu->banner_image_file_name;
    if ($model->menu->icon_file_name != "")
        $this->params['page_header_icon'] = $model->menu->iconDisplayPath;
}
if ($model->banner_image_file_name != "")
    $this->params['page_header_img'] = $model->banner_image_file_name;
if ($model->icon_file_name != "")
    $this->params['page_header_icon'] = $model->iconDisplayPath;

$this->title = strip_tags($model->name);

$this->params['breadcrumbs'][] = $this->title;

$this->params['page_route'] = $model->route;

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
    <?= Alert::widget() ?>
<?php if (0 && sizeof($model->subMenu) > 0) { ?>
        <div id="right-nav-btn">
            <div></div>
            <ul style="display: none;">
            <?php
                foreach ($model->subMenu as $menu) {
                    echo '<li'.($menu->route == $model->route ? ' class="active"' : '').'>'.Html::a($menu->name, ($menu->page_type === null ? 'javascript:void(0)' : $menu->aUrl), ['target' => ($menu->page_type == 0 && $menu->link_target == 1 ? '_blank' : '')]).'</li>';
                }
            ?>

                <!-- <li class="selected"><a href="congressWel.asp">Welcome Message</a></li>
                <li><a href="congressOrg.asp">Organizing Committee</a></li>
                <li><a href="congressGen.asp">General Info.</a></li> -->
            </ul>
        </div>
<?php } ?>

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
                <?= Alert::widget() ?>
                <div class="content content-<?= $model->route ?>">
                    <?php
                        $page_type = $model->page_type;
                        $MID = $model->id;
                        switch($page_type){
                            case 1:
                                echo $this->render('_page_type1',['MID'=>$MID]);
                                break;
                            case 2:
                                echo $this->render('_page_type2',['MID'=>$MID]);
                                break;
                            case 3:
                                echo $this->render('_page_type3',['MID'=>$MID]);
                                break;
                            case 4:
                                echo $this->render('_page_type4',['MID'=>$MID]);
                                break;
                            case 5:
                                echo $this->render('_page_type5',['MID'=>$MID]);
                                break;
                            case 6:
                                echo $this->render('_page_type6',['MID'=>$MID]);
                                break;
                            case 7:
                                echo $this->render('_page_type7',['MID'=>$MID]);
                                break;    
                        }
                    ?>
                </div>
            </div>
        </div>
<script>
</script>