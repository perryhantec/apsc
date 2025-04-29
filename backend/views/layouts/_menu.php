<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\components\AccessRule;

$lang = Yii::$app->language;

$url = \yii\helpers\Url::current();
$_url = explode("/", $url);

if (sizeof($_url) > 2)
    if ($_url[2] != 'admin') { // normal
      $base_name = $_url[2];
    } else { // xampp
      $base_name = $_url[3];
    }
else
    $base_name = basename(\yii\helpers\Url::current());
if (strpos($base_name, '?'))
    $base_name = substr($base_name, 0, strpos($base_name, '?'));

$call_for_abstract_menu = [
  ['model' => 'call-for-abstract', 'route' => 'call-for-abstract/index', 'name' => 'Abstracts Submission', 'visible'=>AccessRule::checkRole(['call-for-abstract'])],
  ['model' => 'call-for-abstract-text', 'route' => 'call-for-abstract-text/index', 'name' => 'Abstracts Text', 'visible'=>AccessRule::checkRole(['call-for-abstract'])],
  ['model' => 'user', 'route' => 'user/index', 'name' => 'Abstract 會員', 'visible'=>AccessRule::checkRole(['admin.user'])],
];

$registration_menu = [
  ['model' => 'registration', 'route' => 'registration/index', 'name' => 'Registration Submission', 'visible'=>AccessRule::checkRole(['registration'])],
  ['model' => 'badge', 'route' => 'badge/index', 'name' => 'Registration Quick Check', 'visible'=>AccessRule::checkRole(['registration'])],
  // ['model' => 'page/registration', 'route' => 'page/registration', 'name' => 'Registration Text', 'visible'=>AccessRule::checkRole(['admin.general'])],
  ['model' => 'registration-text', 'route' => 'registration-text/index', 'name' => 'Registration Text', 'visible'=>AccessRule::checkRole(['registration'])],
  // ['model' => 'booking', 'route' => 'booking/index', 'name' => Yii::t('booking', '服務登記表格'), 'visible'=>AccessRule::checkRole(['booking'])],
];

$staff_menu = [
  // ['model' => 'staff', 'route' => 'staff/index', 'name' => '登記職員', 'visible'=>AccessRule::checkRole(['admin.user'])],
];

$settings_menu = [
  ['model' => 'page/general', 'route' => 'page/general', 'name' => Yii::t('app','General'), 'visible'=>AccessRule::checkRole(['admin.general'])],
  ['model' => 'setting', 'route' => 'setting/index', 'name' => '設定', 'visible'=>AccessRule::checkRole(['admin.general'])],
  // ['model' => 'printer', 'route' => 'printer/index', 'name' => '打印機設定', 'visible'=>AccessRule::checkRole(['admin.general'])],
  ['model' => 'site/file-browser', 'route' => 'site/file-browser', 'name' => Yii::t('app','File Browser'), 'visible'=>AccessRule::checkRole(['fileBrowser'])],
  // ['model' => 'config', 'route' => 'config/index', 'name' => Yii::t('app','Config'), 'visible'=>AccessRule::checkRole(['config'])],
//   ['model' => 'logo', 'route' => 'logo/index', 'name' => Yii::t('app','Upload Logos'), 'visible'=>AccessRule::checkRole(['admin'])],
  // ['model' => 'banner', 'route' => 'banner/index', 'name' => Yii::t('app','Banners'), 'visible'=>AccessRule::checkRole(['admin.general'])],
  ['model' => 'menu', 'route' => 'menu/index', 'name' => Yii::t('app','Menu'), 'visible'=>AccessRule::checkRole(['admin.menu'])],
  ['model' => 'admin-user', 'route' => 'admin-user/index', 'name' => Yii::t('app','Admin User'), 'visible'=>AccessRule::checkRole(['admin.user'])],
];

?>

<ul class="sidebar-menu" data-widget="tree">

<?php if (AccessRule::checkRole(['web.content'])) { ?>
  <li class="header">PAGE EDITOR</li>
<?php /*
  <li class="treeview <?= ($this->context->route=='page/home')? 'active':NULL?>">
      <a href="#">
        <span><?= Yii::t('app','Home') ?></span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">
        <li class="<?= ($this->context->route=='page/home' && Yii::$app->params['HID']==1)? 'active':NULL?>">
          <?= Html::a("左邊", ['/page/home', 'id' => 1], ['class'=>'fa']); ?>
        </li>
      </ul>
  </li>
*/ ?>
  <?php
    if (AccessRule::checkRole(['home'])) {
    ?>
<li class="treeview <?= ($this->context->route=='page/home' || $base_name=='home')? 'active':NULL?>">
  <a href="#">
    <span><?= Yii::t('app', 'Home') ?></span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>

  <ul class="treeview-menu">
    <li class="<?= ($this->context->route=='page/home' || $base_name=='home')? 'active':NULL?>">
      <?= Html::a('頭版', ['page/home'], ['class'=>'fa']); ?>
    </li>
  </ul>
</li>
    <?php
    }
    
    $menus = \backend\models\PageEditor::generate_menus();
        
    foreach($menus as $menu):
      $lv2menus = \backend\models\PageEditor::generate_menus_lv2($menu->id);
      $lv2count=count($lv2menus);
      $array_MID = \frontend\models\CreatePageMenu::listMenuLv2MID($menu->id);
  ?>
      <?php if($lv2count>0):?>
        <li class="treeview <?= (isset(Yii::$app->params['MID']) && in_array(Yii::$app->params['MID'],$array_MID))? 'active':NULL?>">
          <a href="#">
            <span><?= $menu->name ?></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>

          <ul class="treeview-menu">
          <?php foreach($lv2menus as $lv2menu):?>
            <li class="<?= (isset(Yii::$app->params['MID']) && Yii::$app->params['MID']==$lv2menu->id)? 'active':NULL?>">
              <?= Html::a($lv2menu->name, ['/page/edit', 'id' => $lv2menu->id], ['class'=>'fa']); ?>
            </li>
          <?php endforeach;?>
          </ul>
        </li>
      <?php elseif ($menu->page_type != 0):?>
        <?php //if(\common\models\PageType::getPageType($menu->id)!=NULL):?>
          <li class="<?= (isset(Yii::$app->params['MID']) && Yii::$app->params['MID']==$menu->id)? 'active':NULL?>">
            <?= Html::a($menu->name, ['/page/edit', 'id' => $menu->id], ['class'=>'fa']); ?>
          </li>
        <?php //endif?>
      <?php endif?>
  <?php endforeach;?>

  <li class="<?= ($this->context->route=='page/contact-us')? 'active':NULL?>">
    <?= Html::a(Yii::t('app', 'Contact Us'), ['/page/contact-us'], ['class'=>'fa']);?>
  </li>
<?php } ?>

<?php if (in_array(true, ArrayHelper::getColumn($call_for_abstract_menu, 'visible'))) { ?>
  <li class="header">CALL FOR ABSTARCTS</li>

<?php foreach($call_for_abstract_menu as $m):?>
  <?php if(isset($m['visible']) && $m['visible']):?>
    <li class="<?= ($this->context->route==$m['route'] || $base_name==$m['model'])? 'active':NULL?>">
      <?= Html::a($m['name'], [$m['route']], ['class'=>'fa']) ?>
    </li>
  <?php endif?>
<?php endforeach;?>
<?php } ?>

<?php if (in_array(true, ArrayHelper::getColumn($registration_menu, 'visible'))) { ?>
  <li class="header">REGISTRATION</li>

<?php foreach($registration_menu as $m):?>
  <?php if(isset($m['visible']) && $m['visible']):?>
    <li class="<?= ($this->context->route==$m['route'] || $base_name==$m['model'])? 'active':NULL?>">
      <?= Html::a($m['name'], [$m['route']], ['class'=>'fa']) ?>
    </li>
  <?php endif?>
<?php endforeach;?>
<?php } ?>

<?php if (in_array(true, ArrayHelper::getColumn($staff_menu, 'visible'))) { ?>
  <li class="header">STAFF</li>

<?php foreach($staff_menu as $m):?>
  <?php if(isset($m['visible']) && $m['visible']):?>
    <li class="<?= ($this->context->route==$m['route'] || $base_name==$m['model'])? 'active':NULL?>">
      <?= Html::a($m['name'], [$m['route']], ['class'=>'fa']) ?>
    </li>
  <?php endif?>
<?php endforeach;?>
<?php } ?>

<?php if (in_array(true, ArrayHelper::getColumn($settings_menu, 'visible'))) { ?>
  <li class="header">SETTINGS</li>

<?php foreach($settings_menu as $m):?>
  <?php if(isset($m['visible']) && $m['visible']):?>
    <li class="<?= ($this->context->route==$m['route'] || $base_name==$m['model'])? 'active':NULL?>">
      <?= Html::a($m['name'], [$m['route']], ['class'=>'fa']) ?>
    </li>
  <?php endif?>
<?php endforeach;?>
<?php } ?>

</ul>
