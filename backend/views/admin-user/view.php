<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use common\models\Definitions;
use common\models\UserDelivery;
use common\models\Order;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = Yii::t('app', '{0}: {1}', [Yii::t('app', 'Admin User'), $model->nameWithEmail]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nameWithEmail;

?>
<?= \newerton\fancybox3\FancyBox::widget([
		    'target' => '.fancybox',
		    'config' => []
		]); ?>
<div class="order-view">

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('app', 'Personal Information') ?></h3>
                    <div class="box-tools pull-right">
                        <?= $model->id != Yii::$app->user->identity->id ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary pull-right']) : '' ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 20%; text-align: right; vertical-align: top;"{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
                        'attributes' => [
                            [
                                'attribute' => 'name',
                            ],
                            // [
                            //     'attribute' => 'phone',
                            //     'value' => function($model) {
                            //         return $model->phone ?: '-';
                            //     }
                            // ],
                            'email',
/*
                            [
                                'attribute' => 'oAuth_user',
                                'label' => Yii::t('app', 'Login with facebook'),
                                'value' => Definitions::getBooleanDescription($model->oAuth_user),
                            ],
*/
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('app', 'Login Information') ?></h3>
                    <div class="box-tools pull-right">
                        <?= $model->id != Yii::$app->user->identity->id ? Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary pull-right']) : '' ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th style="width: 20%; text-align: right; vertical-align: top;"{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
                        'attributes' => [
                            [
                                'attribute' => 'role',
                                'value' => Definitions::getAdminRole($model->role),
                            ],
                            [
                                'attribute' => 'status',
                                'value' => Definitions::getStatus($model->status),
                            ],
                            [
                                'attribute' => 'created_at',
                                'value' => function($model) {
                                    return (strtotime($model->created_at) > 1533052800) ? $model->created_at : '-'; // 1533052800 => strtotime("2018-08-01 00:00:00")
                                }
                            ],
                            'last_login_at',
/*
                            [
                                'attribute' => 'lang',
                                'value' => Definitions::getLanguage($model->lang),
                            ],
*/
/*
                            [
                                'attribute' => 'optout_of_marketing',
                                'value' => function($model) {
                                    return Definitions::getBooleanDescription($model->optout_of_marketing);
                                }
                            ],
*/
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('app', 'Audit Log') ?></h3>
        </div>
        <div class="box-body">
           <?= GridView::widget([
                  'dataProvider' => new ActiveDataProvider([
                        'query' => $model->getAuditLogs(),
                        'sort'=> ['defaultOrder' => ['created_at' => SORT_DESC]],
                        'pagination' => [
                            'defaultPageSize' => 20,
                            'pageParam' => 'order-page',
                            'pageSizeParam' => 'order-pageSize'
                        ],
                    ]),
                  'persistResize' => true,
                  'responsiveWrap' => false,
                  'columns' => [
                      'created_at:datetime',
                      'msg:text',
                      'ip'
                    ]
              ]); ?>
        </div>
    </div>

</div>
