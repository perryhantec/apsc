<?php

use yii\helpers\Html;

$model = \common\models\PageType7::findOne(['MID'=>$MID]);

$files = [];
$files2 = [];

if ($model) {
    $files = $model->file_names;
    $files2 = $model->file_names2;
}

?>
<style>
#tabsNav {
    list-style-type:none;
    padding:0;
    margin:0 0 28px;
    overflow: auto;
    -webkit-overflow-scrolling: touch;
    white-space: nowrap;
    background: #f5f5f5;
}
#tabsNav:after {
    display: table;
    content: '';
    clear: both;
}
#tabsNav li {
    float: left;
    padding-bottom: 0;
}

#tabsNav li.active a {
    border-bottom: 3px solid #00AFCC;
    color: #333;
    background: #ededed;
}

@media screen and (min-width: 801px) {
    #tabsNav li a {
        font-size: 17px;
        padding: 10px 30px;
    }
}
@media screen and (max-width: 800px) {
    #tabsNav {
        /* margin: 0 -55px 28px; */
        margin: 0 -15px 28px;
    }
}
#tabsNav li a {
    display: block;
    border-bottom: 3px solid #f5f5f5;
    text-decoration: none;
    color: #888;
    text-align: center;
    padding: 10px 15px;
}
</style>
<ul id="tabsNav">
    <li class="active"><a data-toggle="tab" href="#pt7-content1"><?= $model->title ?></a></li>
    <li><a data-toggle="tab" href="#pt7-content2"><?= $model->title2 ?></a></li>
</ul>

<div class="tab-content">
    <div id="pt7-content1" class="tab-pane in active">
        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-12 col-sm-12">
                <?= $model == NULL || $model->content == "" ? Yii::t('app', '<i>Coming Soon</i>') : $model->content ?>
            </div>
        </div>
        <div>
<?php
    foreach ($files as $file) {
?>
    <div class="col-welcome">
        <div style="width:150px;height:196px;overflow:hidden;">
        <?php if ($file['image'] && file_exists($model->filePath.$file['image'])) { ?>
            <?= Html::img($model->fileDisplayPath.$file['image'], ['style' => 'width:100%;']) ?>
        <?php } ?>
        </div>
        <strong><?= $file['name'] ? $file['name'] : '&nbsp;' ?></strong>
        <div><?= $file['title'] ? $file['title'] : '&nbsp;' ?></div>
        <div><?= $file['organization'] ? $file['organization'] : '&nbsp;' ?></div>
    </div>
<?php
    }
?>
        </div>
    </div>
    <div id="pt7-content2" class="tab-pane">
        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-12 col-sm-12 text-justify">
                <?= $model == NULL || $model->content2 == "" ? Yii::t('app', '<i>Coming Soon</i>') : $model->content2 ?>
            </div>
        </div>
        <div>
<?php
    foreach ($files2 as $file2) {
?>
    <div class="col-welcome">
        <div style="width:150px;height:196px;overflow:hidden;">
        <?php if ($file2['image'] && file_exists($model->filePath.$file2['image'])) { ?>
            <?= Html::img($model->fileDisplayPath.$file2['image'], ['style' => 'width:100%;']) ?>
        <?php } ?>
        </div>
        <strong><?= $file2['name'] ? $file2['name'] : '&nbsp;' ?></strong>
        <div><?= $file2['title'] ? $file2['title'] : '&nbsp;' ?></div>
        <div><?= $file2['organization'] ? $file2['organization'] : '&nbsp;' ?></div>
    </div>
<?php
    }
?>
        </div>
    </div>


</div>

<p>&nbsp;</p>
