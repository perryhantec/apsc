<?php

use yii\helpers\Html;
use common\models\Config;
use common\models\Definitions;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
// use kartik\sortinput\SortableInput;
use kartik\sortable\Sortable;
use kartik\widgets\FileInput;
use common\components\MultipleInput;
use unclead\multipleinput\TabularColumn;
// use bupy7\cropbox\CropboxWidget;

$this->title = $model->menu->allLanguageName;

// Definitions::dd($model->picture_file_names,1);

// $crop_width = $model::CROP_WIDTH;
// $crop_height = $model::CROP_HEIGHT;

// $_file_names = [];
// if (!empty($model->file_names))
//     $_file_names = $model->file_names;
    // $_file_names = json_decode($model->file_names);

/*
if ($model::HAVE_IMAGE_TUMB)
    $this->registerJs(<<<JS
        $('.pagetype1-file_names-img')
            .popover({trigger: 'hover', placement: 'top'})
            .click(function() {
                $("#"+$(this).attr("aria-describedby")).remove();
                $(this).remove();
            });
JS
);
*/

$js = <<<JS
        // $('.banner-image_file-img')
        // $('.productform-pic-img')
        //     .popover({trigger: 'hover', placement: 'top'})
        //     .click(function() {
        //         $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
        //         $(this).closest('tr').find('.delete-image').val(1);
        //         $(this).parent().remove();
        //         // $('.field-banner-image_file').show();
        //     });

        $('.pagetype1-picture_file_names-remove')
            .popover({trigger: 'hover', placement: 'top'})
            .click(function() {
                $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
                // $(this).closest('tr').find('.delete-image').val(1);
                $(this).parents('li').remove();
                // $('.field-banner-image_file').show();
            });
// $('#upload-files .btn-reset').on('click', function () {
//     $(this).closest('tr').find('.has-image').val(0);
// });

// $('#upload-files .btn-crop').on('click', function () {
//     if ($(this).closest('td').find('.workarea-cropbox').is(':visible')) {
//         $(this).closest('tr').find('.has-image').val(1);
//     }
// });


JS;

$this->registerJs($js);
?>

<div class="page-type-1-form">

    <?php $form = ActiveForm::begin([
       //'enableAjaxValidation' => true,
       'options' => ['enctype' => 'multipart/form-data']]);
    ?>

    <?php
        foreach (Yii::$app->config->getAllLanguageAttributes('summary') as $attr_name)
            echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                  'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                ]);
    ?>

    <?php
        foreach (Yii::$app->config->getAllLanguageAttributes('content') as $attr_name)
            echo $form->field($model, $attr_name)->widget(CKEditor::className(), [
                  'editorOptions' => ElFinder::ckeditorOptions('elfinder', ['preset' => 'full', 'contentsCss' => Yii::$app->params['ckeditorOptionsContentsCss'], 'bodyClass' => 'content', 'allowedContent' => true]),
                ]);
    ?>

<div class="form-group">
        <label class="control-label" for="productform-pic_upload"><?= Yii::t('app', 'Picture') ?></label>
    </div>
    <?php if (sizeof($model->picture_file_names) > 0) { ?>
        <div class="form-group field-pagetype1-file_names">
            <div class="form-control-static">
<?php
                echo $form->field($model, 'picture_file_names[]')->hiddenInput()->label(false);

    $_picture_file_names_items = [];

    // echo $form->field($model, 'pic[]')->hiddenInput()->label(false);

    foreach ($model->picture_file_names as $_file_name) {
        // $_picture_file_names_items[] = [
        //         'content' => Html::tag('span', Html::img($model->fileDisplayPath.$_file_name), [
        //                     'class' => "image-remove-trigger pagetype1-picture_file_names-remove",
        //                     'title' => Yii::t('app', 'Remove'),
        //                     'data-toggle' => "popover",
        //                     'data-content' => Yii::t('app', 'Click to remove image'),
        //                 ])
        //     ];
        
        $_picture_file_names_items[] = [
            'content' => '<div class="grid-item">'.Html::img($model->fileDisplayPath.$_file_name, [
                'style' => 'width:200px;', 
                'class' => 'pagetype1-picture_file_names-remove',
                'title' => Yii::t('app', 'Remove'),
                'data-toggle' => "popover",
                'data-content' => Yii::t('app', 'Click to remove image'),
            ]).$form->field($model, 'picture_file_names[]')->hiddenInput(['value' => $_file_name])->label(false).'</div>'
        ];
    }
    // Definitions::dd($model->file_names);
    // Definitions::dd($model->picture_file_names);
    // Definitions::dd($_picture_file_names_items);
    // echo SortableInput::widget([
    echo Sortable::widget([
        // 'name' => 'abc',
        //  'model' => $model,
        //  'attribute' => 'old_pic',
        //  'hideInput' => true,
        //  'delimiter' => $model::SORTABLE_DELIMITER,
        'type'=>'grid',
         'items' => $_picture_file_names_items,
        //  'sortableOptions' => ['type'=>'grid']
     ]);
?>
            </div>
        </div>
    <?php } ?>
    <?= $form->field($model, 'upload_files[]')->widget(FileInput::classname(), [
              'options' => ['multiple' => true],
              'pluginOptions' => [
                  'previewFileType' => 'any',
                  'showUpload' => false,
              ]
          ])->label(false);
    ?>


<?php if (0) { ?>
    <?php if ($model::HAVE_IMAGE_TUMB) {
        echo Html::activeHiddenInput($model, 'old_file_names[]', ['value' => '']);
    ?>
        <div class="form-group">
            <label class="control-label" for="pagetype1-file_names"><?= Yii::t('app', 'Images') ?></label>
        </div>
        <?php if (sizeof($_file_names) > 0) { ?>
            <div class="form-group field-pagetype1-file_names">
                <div class="form-control-static">
            <?php foreach ($_file_names as $_file_name) { ?>
                    <?= Html::tag('span', Html::img(Config::PageType1FileThumbDisplayPath($model->id).$_file_name).Html::activeHiddenInput($model, 'old_file_names[]', ['value' => $_file_name]), [
                            'class' => "image-remove-trigger pagetype1-file_names-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]) ?>
            <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?= $form->field($model, 'upload_files[]')->widget(FileInput::classname(), [
                'options' => ['multiple' => true],
                'pluginOptions' => [
                    'previewFileType' => 'any',
                    'showUpload' => false,
                ]
            ])->label(false);
        ?>
    <?php } ?>
<?php } ?>

<?php if (0) { ?>
    <?php echo $form->errorSummary($model); ?>

<?=
    $form->field($model, 'upload_files')->widget(MultipleInput::class, [
        'id' => 'upload-files',
        'columns' => [
            [
                'name' => 'name',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'title' => '名稱',
            ],
            [
                'name'  => 'title',
                'type'  => TabularColumn::TYPE_TEXT_INPUT,
                'title' => '職位',
            ],
            [
                'name'  => 'organization',
                'type'  => TabularColumn::TYPE_TEXT_INPUT,
                'title' => '組織',
            ],
            // , [
            //     'name' => 'image',
            //     // 'type' => FileInput::class,
            //     'type' => CropboxWidget::class,
            //     'title' => '上傳',
            //     // 'options' => ['multiple' => false],
            //     'options' => [
            //         'croppedDataAttribute' => 'crop_info',
            //         'pluginOptions' => [
            //             // 'previewFileType' => 'any',
            //             // // 'showPreview' => false,
            //             // 'showUpload' => false,
            //             'variants' => [
            //                 [
            //                     'width' => $crop_width,
            //                     'height' => $crop_height
            //                 ],
            //             ],
            //         ],
            //     ],
            // ], [
            //     'name'  => 'has_image',
            //     'type'  => TabularColumn::TYPE_HIDDEN_INPUT,
            //     'defaultValue' => 0,
            //     'options' => [
            //         'class' => 'has-image',
            //     ]
            // ]
            [
                'name'  => 'show_image',
                'type'  => 'static',
                'title' => '你的檔案',
                'options' => [
                    'style' => 'width:150px',
                ],
                'value' => function($data) {
                    $html = '';

                    if (isset($data['show_image']) && $data['show_image']) {
                        $html = Html::tag('span', Html::img($data['show_image']), [
                            'style' => 'width:150px',
                            'class' => "image-remove-trigger banner-image_file-img thumbnail",
                            'title' => Yii::t('app', 'Remove'),
                            'data-input-name' => 'Banner[image_file_name]',
                            'data-toggle' => "popover",
                            'data-content' => Yii::t('app', 'Click to remove image'),
                        ]);
                    }

                    return $html;
                },
            ],
            [
                'name' => 'image',
                'type' => FileInput::class,
                'title' => '選擇檔案',
                'options' => [
                    'pluginOptions' => [
                        'previewFileType' => 'any',
                        'showUpload' => false,
                    ],
                    'options' => ['accept' => 'image/*'],
                    'pluginEvents' => [
                        'filebatchselected' => 'function() { $(this).closest("tr").find(".new-image").val(1); }',
                        'fileclear' => 'function() { $(this).closest("tr").find(".new-image").val(0); }',
                    ],
                ],
            ],
            [
                'name'  => 'new_image',
                'type'  => TabularColumn::TYPE_HIDDEN_INPUT,
                'defaultValue' => 0,
                'options' => [
                    'class' => 'new-image',
                ]
            ],
            [
                'name'  => 'delete_image',
                'type'  => TabularColumn::TYPE_HIDDEN_INPUT,
                'defaultValue' => 0,
                'options' => [
                    'class' => 'delete-image',
                ]
            ],
            [
                'name'  => 'old_image',
                'type'  => TabularColumn::TYPE_HIDDEN_INPUT,
            ],
        ]
    ])->label(false)->hint('建議上傳尺寸 150px * 196px 或相同比例的圖片, 以達致最佳效果');
?>

    <?= $form->field($model, 'crop_width')->hiddenInput(['value'=> $crop_width])->label(false); ?>
    <?= $form->field($model, 'crop_height')->hiddenInput(['value'=> $crop_height])->label(false); ?>
<?php } ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
