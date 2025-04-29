<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Config;
use common\models\Definitions;
use common\components\MultipleInput;
use unclead\multipleinput\TabularColumn;
use kartik\widgets\FileInput;

$cfa_text_model = common\models\CallForAbstractText::findOne(1);

$is_ab_editable = Definitions::getIsAbstractEditable();
$disabled = !$is_ab_editable;

$this->title = 'Edit Abstracts';

$this->params['page_header_title'] = $this->title;
$this->params['breadcrumbs'][] = $this->title;

$ajax_url = Url::to(["check-form"]);

$script = <<<JS

$("#ab-content").specialinput({
    language_chars: {
        'fr': {
            'lower': [
                'α', 'β', 'γ', 'δ', 'ε', 'ζ', 'η', 'θ', 'ι', 'κ', 'λ', 'μ', 'ν', 'ξ',
                'ο', 'π', 'ρ', 'σ', 'τ', 'υ', 'φ', 'χ', 'ψ', 'ω', '∑', 'ƒ', 'Å', '§',
                '™', '®', '©', '°', '‰', '¹', '²', '³', '⁴', '⁵', '⁶', '⁷', '⁸', '⁹',
                '⁰', '₁', '₂', '₃', '₄', '₅', '₆', '₇', '₈', '₉', '₀', '×', '÷', '√',
                '∷', '∞', '≠', '≃', '±', '∓', '⌀', '≤', '≥', '¬', '∫', 'ª',
            ],
            'upper': [
                'Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ',
                'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω', '∑', 'Ƒ', 'Å', '§',
                '™', '®', '©', '°', '‰', '¹', '²', '³', '⁴', '⁵', '⁶', '⁷', '⁸', '⁹',
                '⁰', '₁', '₂', '₃', '₄', '₅', '₆', '₇', '₈', '₉', '₀', '×', '÷', '√',
                '∷', '∞', '≠', '≃', '±', '∓', '⌀', '≤', '≥', '¬', '∫', 'ª',
            ]
        },
    },
    // keyboard_fix_position:true,
});

let triggerContinueBtn = triggerLeftBtn = startAccess = true;
let isUploadFile = clickSubmit = false;
let isAbstractEditable = '$is_ab_editable';

$('#left-nav a').on('click', function () {
    let currentNav = $(this).closest('li').index();
    let totalNav = $(this).closest('ul').children().length;

    if (currentNav + 1 == totalNav) {
        $('#continue-btn').hide();
    } else {
        $('#continue-btn').show();
    }

    if (triggerContinueBtn) {
        triggerLeftBtn = false;
        $('#continue-btn').trigger('click');
    } else {
        triggerContinueBtn = true;
    }
});

$('#file_name').on('change', function (e) {
    $('#file_remove').val('false');
    isUploadFile = true;
    // console.log('isUploadFile');
//     let f = e.target.files[0]; // FileList object
//     // let f = e.target; // FileList object


//     // let formData = new FormData();
//     // console.log('formData',formData);

//     let fileReader = new FileReader(); 
//         // fileReader.readAsText(f);
//         fileReader.readAsDataURL(f)
//         fileReader.onload = function() {
//         //   alert(fileReader.result);
//           console.log('fileReader.result',fileReader);
//     }; 
});

$('.general-image_file-img').popover({trigger: 'hover', placement: 'top'}).click(function() {
    $('input[name="'+$(this).attr("data-input-name")+'"]').val("");
    $(this).parents('.form-group').remove();
    $('.field-general-image_file').show();


    // let ahref = $('#abstract').find('.fileinput-upload-button').attr('href');
    // ahref += '&remove=1';
    
    // $('#abstract').find('.fileinput-upload-button').attr('href', ahref);
    $('#file_remove').val('true');

    // isUploadFile = true;
});

$('#abstract-form').on('beforeSubmit', function (e) {
    // console.log('def');
    if (!isAbstractEditable) {
        return false;
    }
    /**** Triggered when click left nav, continue button or submit button ****/
    if ($('#is_continue').val() === 'true') {

        $('#specialinput-keyboard-ab-content').find('.specialinput-close').trigger('click');

        getWordCount();

        /**** Upload abstract file ****/
        if (!clickSubmit && isUploadFile) {
            $('#abstract').find('.fileinput-upload-button').trigger('click');
        } else {
            isUploadFile = false;
        }

        let data = $(this).serializeArray();

        // let formData = new FormData(this);
        // console.log('formData',formData);

        // return false;
        // let fileName = $('#file_name');
        // console.log('fileName',fileName.file);

    //     let formData = new FormData(); 
    //    let aaa = formData.append("file", fileupload.files[0]);
    //    console.log('aaa',aaa);

        // return false;


        /**** Manual push affl and author to serializeArray ****/
        let afflAffiliations = $('#affiliation').find('.affl-affiliation');
        let afflCities = $('#affiliation').find('.affl-city');
        let afflStates = $('#affiliation').find('.affl-state');
        let afflCountries = $('#affiliation').find('.affl-country');
        let afflTotal = afflAffiliations.length;

        let authorTitle = $('#author').find('.author-title');
        let authorFirstName = $('#author').find('.author-first_name');
        let authorLastName = $('#author').find('.author-last_name');
        let authorIsPresenter = $('#author').find('.author-is_presenter');
        let authorOrganization = $('#author').find('.author-organization');
        let authorPosition = $('#author').find('.author-position');
        let authorAffiliations = $('#author').find('.author-affiliations');
        let authorTotal = authorTitle.length;

        // console.log('total', total);

        let afflArr = [];
        let authorArr = [];
        let afflStr = authorStr = '';

        for (let i = 0; i < afflTotal; i++) {
            afflArr[i] = {};
            afflAffiliations.each(function (j) {
                if (i == j) afflArr[i].affiliation = $(this).val();
            });
            afflCities.each(function (j) {
                if (i == j) afflArr[i].city = $(this).val();
            });
            afflStates.each(function (j) {
                if (i == j) afflArr[i].state = $(this).val();
            });
            afflCountries.each(function (j) {
                if (i == j) afflArr[i].country = $(this).val();
            });
        }

        for (let i = 0; i < authorTotal; i++) {
            authorArr[i] = {};
            authorTitle.each(function (j) {
                if (i == j) authorArr[i].tle = $(this).val();
            });
            authorFirstName.each(function (j) {
                if (i == j) authorArr[i].first_name = $(this).val();
            });
            authorLastName.each(function (j) {
                if (i == j) authorArr[i].last_name = $(this).val();
            });
            authorIsPresenter.each(function (j) {
                if (i == j) authorArr[i].is_presenter = $(this).val();
            });
            authorOrganization.each(function (j) {
                if (i == j) authorArr[i].organization = $(this).val();
            });
            authorPosition.each(function (j) {
                if (i == j) authorArr[i].position = $(this).val();
            });
            authorAffiliations.each(function (j) {
                if (i == j) authorArr[i].affiliations = $(this).val();
            });
        }

        // console.log('afflArr',afflArr);
        // console.log('authorArr',authorArr);

        afflStr = JSON.stringify(afflArr);
        authorStr = JSON.stringify(authorArr);

        // console.log('afflStr',afflStr);
        // console.log('authorStr',authorStr);

        data.push({ "name": "[affiliation_2]", "value": afflStr });
        data.push({ "name": "[author_2]", "value": authorStr });

        $.ajax({
            url: '$ajax_url',
            data: {data},
            method: 'post',
            beforeSend: function () {
                $('#ajaxLoader').show();
            },
            complete: function () {
                $('#ajaxLoader').hide();
            },
            error: function () {
                $('#ajaxLoader').hide();
            },
            timeout: function () {
                $('#ajaxLoader').hide();
            },
            success: function(rslt){
                console.log(rslt);

                if (startAccess) {
                    startAccess = false;
                } else {
                    /**** Click continue then go to next left nav ****/
                    if (!clickSubmit) {
                        let currentNav = $('#left-nav').find('.active').index();
                        let nextNav = currentNav + 1;
                        let totalNav = $('#left-nav').find('li').length;

                        if (currentNav + 1 < totalNav) {
                            if (triggerLeftBtn) {
                                triggerContinueBtn = false;
                                $('#left-nav').find('li').eq(nextNav).find('a').trigger('click');
                            } else {
                                triggerLeftBtn = true;
                            }
                        }
                    }
                }
// console.log(rslt['rslt']['opers']);

                /**** Left nav tick and cross case ****/
                for (let navIndex in rslt['rslt']['opers']) {
                    // console.log('navIndex',navIndex);
                    let _check = $('#left-nav').find('li').eq(navIndex).find('.fa-check');
                    let _times = $('#left-nav').find('li').eq(navIndex).find('.fa-times');
                    if (rslt['rslt']['opers'][navIndex] == 2) {
                        _check.removeClass('hidden');
                        _times.addClass('hidden');
                    } else if (rslt['rslt']['opers'][navIndex] == 1) {
                        _check.addClass('hidden');
                        _times.removeClass('hidden');
                    } else {
                        _check.addClass('hidden');
                        _times.addClass('hidden');
                    }
                }

                /**** Title ****/
                $('#tle').empty().html(rslt['rslt']['tle']);

                /**** Review content ****/
                let authorHtml = '';
                let autsTotal = rslt['rslt']['auts'].length;

                for (let i in rslt['rslt']['auts']) {
                    authorHtml += ' <span><strong>'+ rslt['rslt']['auts'][i]['data'] +'</strong></span>';

                    if (rslt['rslt']['auts'][i]['row']) {
                        authorHtml += ' <sup>'+ rslt['rslt']['auts'][i]['row'] +'</sup>';
                    }

                    if (i + 1 < autsTotal) {
                        authorHtml += ' <span>, </span>';
                    }
                }

                $('#auts').empty().html(authorHtml);

                let afflHtml = '';

                for (let i in rslt['rslt']['affls']) {
                    afflHtml += '<div>';
                    afflHtml += ' <sup>'+ rslt['rslt']['affls'][i]['row'] +'</sup>';
                    afflHtml += ' <span>'+ rslt['rslt']['affls'][i]['data'] +'</span>';
                    afflHtml += '</div>';
                }

                $('#affls').empty().html(afflHtml);

                $('#abst').empty().html(rslt['rslt']['abst']);

                /**** Retrieve file remove status ****/
                $('#file_remove').val('false');

                /**** Result process ****/
                if (rslt['rslt']['code'] == -1) {
                    let errorHtml = '';

                    for (let errorKey in rslt['rslt']['errors']) {
                        errorHtml += '<div>' + rslt['rslt']['errors'][errorKey] + '</div>';
                    }

                    errorHtml = '<div class="alert alert-danger">' + errorHtml + '</div>';

                    if (clickSubmit) {
                        triggerContinueBtn = false;
                        $('#left-nav').find('li').eq(6).find('a').trigger('click');
                        clickSubmit = false;
                    }

                    $('#errors').empty().html(errorHtml);
                    // $('#submit-btn').addClass('hidden');
                    $('#abstract-status').removeClass('btn-success').addClass('btn-danger').text('Draft');

                    return false;
                } else if (rslt['rslt']['code'] == 1) {
                    $('#errors').empty();
                    // $('#submit-btn').removeClass('hidden');

                    if (!clickSubmit) {
                        return false;
                    } else {
                        /**** No error and click submit ****/
                        setStatus(0, 0);
                        $('#abstract-form').trigger('submit');
                    }
                } else {
                    if (clickSubmit) {
                        triggerContinueBtn = false;
                        $('#left-nav').find('li').eq(6).find('a').trigger('click');
                        clickSubmit = false;
                    }

                    // $('#submit-btn').addClass('hidden');
                    $('#abstract-status').removeClass('btn-success').addClass('btn-danger').text('Draft');

                    return false;
                }
            }
        });

        return false;
        /*
        if (!clickSubmit) {
            return false;
        } else {
            if (clickSubmit) {
                console.log('1111');
            } else {
                console.log('2222');
            }

            return false;
        }
        */
    } else {
        /**** Click save as draft button ****/
        return true;
    }
});

$('#specialinput-toggler-ab-content').addClass('btn btn-success').empty().text('Special Character Keyboard');
$('#abstract-form').trigger('beforeSubmit');

JS;
$this->registerJs($script);
?>
<style>
.has-error .form-control {border-color: inherit;}
.tab-content {position: relative;}
.abstract-status {position:absolute;top:0;right:0;}
</style>
<?= $this->render('../layouts/_user_header', ['page' => 'abstract-form']) ?>
<?= Alert::widget() ?>
<div class="page-my">
    <div class="content">
        <div>
            <?= $cfa_text_model->abIntro ?>
        </div>
    <?php $form = ActiveForm::begin([
        'id' => 'abstract-form',
        // 'enableAjaxValidation' => false,
        // 'validateOnSubmit' => false,
    ]); ?>
        <div class="row">
            <div class="col-md-3">
                <div id="left-nav">
                    <ul class="page-left-menu-nav">
                        <li class="active"><a data-toggle="tab" href="#title"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Title and Presentation Type</a></li>
                        <li><a data-toggle="tab" href="#theme"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Themes</a></li>
                        <li><a data-toggle="tab" href="#authors"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Authors and Affiliations</a></li>
                        <li><a data-toggle="tab" href="#abstract"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Abstract</a></li>
                        <li><a data-toggle="tab" href="#young"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Young Investigator Award</a></li>
                        <li><a data-toggle="tab" href="#submit"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Terms and Conditions</a></li>
                        <li><a data-toggle="tab" href="#review"><i class="fa fa-check hidden"></i><i class="fa fa-times hidden"></i> Review</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
<?php
    $abstract_status_btn = $model->abstract_status == $model::ABSTRACT_STATUS_SUBMITTED ? 'success' : 'danger';
?>
                    <div class="abstract-status">
                        <div id="abstract-status" class="btn btn-<?= $abstract_status_btn ?>"><?= Definitions::getAbstractStatus($model->abstract_status) ?></div>
                    </div>
                    <div id="title" class="tab-pane in active">
                        <div class="well">
                            <?= $form->field($model, 'title', ['template' => '
                                {label}
                                <div>'.$cfa_text_model->abTitle.'</div>
                                {input}
                                '
                            ])->textArea(['rows' => 3, 'id' => 'ab-title', 'oninput' => 'getWordCount();', 'disabled' => $disabled]); ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="alert alert-info text-center" role="alert" style="">
                                        <label>Word Limit</label>
                                        <span class="wordcount-limit">50</span>
                                    </div>
                                </div>
                                <div class="col-sm-offset-6 col-sm-3">
                                    <div class="alert alert-success text-center" role="alert" style="">
                                        <label>Word Count</label>
                                        <span class="current-wordcount">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="well">
                            <?= $form->field($model, 'present_type', ['template' => '
                                {label}
                                <div>'.$cfa_text_model->abPtype.'</div>
                                {input}
                                '
                            ])->dropDownList(Definitions::getPresentationType(),['prompt' => '', 'disabled' => $disabled]) ?>
                        </div>
                        <div class="well">
                            <div><?= $cfa_text_model->abKeyword ?></div>
                            <?= $form->field($model, 'keyword_1')->textInput(['id' => 'ab-keyword_1', 'disabled' => $disabled]); ?>
                            <?= $form->field($model, 'keyword_2')->textInput(['id' => 'ab-keyword_2', 'disabled' => $disabled]); ?>
                            <?= $form->field($model, 'keyword_3')->textInput(['id' => 'ab-keyword_3', 'disabled' => $disabled]); ?>
                        </div>
                    </div>
                    <div id="theme" class="tab-pane">
                        <div class="well">
                            <?= $form->field($model, 'theme', ['template' => '
                                {label}
                                <div>'.$cfa_text_model->abTheme.'</div>
                                {input}
                                '
                            ])->dropDownList(Definitions::getTheme(),['prompt' => '', 'disabled' => $disabled]) ?>
                        </div>
                    </div>
                    <div id="authors" class="tab-pane">
                        <div class="well">
                            <?=
                                $form->field($model, 'affiliation', ['options' => ['id' => 'affiliation'], 'template' => '
                                    {label}
                                    <div>'.$cfa_text_model->abAffl.'</div>
                                    {input}
                                    '
                                ])->widget(MultipleInput::class, [
                                    'rendererClass' => \unclead\multipleinput\renderers\ListRenderer::className(),
                                    'addButtonOptions' => [
                                        'class' => 'btn btn-primary',
                                        'label' => '<i class="fa fa-plus-circle"></i> Add Affiliation' // also you can use html code
                                    ],
                                    'columns' => [
                                        [
                                            'name'  => 'row',
                                            'title' => 'Row',
                                            'type'  => 'static',
                                            'value' => function($data, $arr) {
                                                $temp = explode('-', $arr['id']);
                                                $total = count($temp);
                                                $row = $temp[$total - 2];

                                                return $row;
                                                // $html = '<div>'.Definitions::dd($arr).'</div>';
                                                // $html = '<div>'.$arr['id'].'</div>';
                                                // return $html;
                                            },
                                            // 'headerOptions' => [
                                            //     'style' => 'width: 70px;',
                                            // ]
                                        ],
                                        [
                                            'name'  => 'affiliation',
                                            'title' => 'Affiliation',
                                            'options' => [
                                                'class' => 'affl-affiliation',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'city',
                                            'title' => 'City/Suburb/Town',
                                            'options' => [
                                                'class' => 'affl-city',
                                                'disabled' => $disabled,
                                            ],
                                            'columnOptions' => [
                                                'style' => 'font-size: 15px;',
                                            ]
                                        ],
                                        [
                                            'name'  => 'state',
                                            'title' => 'State',
                                            'options' => [
                                                'class' => 'affl-state',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'country',
                                            // 'type'  => TabularColumn::TYPE_DROPDOWN,
                                            'title' => 'Country',
                                            // 'items' => Definitions::getCountry(),
                                            // 'options' => [
                                            //     'prompt' => '',
                                            // ]
                                            'options' => [
                                                'class' => 'affl-country',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                    ]
                                ]);
                            ?>
                        </div>
                        <div class="well">
                            <?=
                                $form->field($model, 'author', ['options' => ['id' => 'author'], 'template' => '
                                    {label}
                                    <div>'.$cfa_text_model->abAuthor.'</div>
                                    {input}
                                    '
                                ])->widget(MultipleInput::class, [
                                    'rendererClass' => \unclead\multipleinput\renderers\ListRenderer::className(),
                                    'addButtonOptions' => [
                                        'class' => 'btn btn-primary',
                                        'label' => '<i class="fa fa-plus-circle"></i> Add Author' // also you can use html code
                                    ],
                                    'sortable' => true,
                                    'columns' => [
                                        [
                                            'name'  => 'tle',
                                            'type'  => TabularColumn::TYPE_DROPDOWN,
                                            'title' => 'Title',
                                            'items' => Definitions::getPrefix(),
                                            // 'headerOptions' => [
                                            //     'style' => 'white-space:nowrap;',
                                            // ],
                                            'options' => [
                                                'prompt' => '',
                                                'class' => 'author-title',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'first_name',
                                            'title' => 'First Name',
                                            'options' => [
                                                'class' => 'author-first_name',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'last_name',
                                            'title' => 'Last Name',
                                            'options' => [
                                                'class' => 'author-last_name',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'is_presenter',
                                            'type'  => TabularColumn::TYPE_CHECKBOX,
                                            'title' => 'Presenter',
                                            'options' => [
                                                'class' => 'author-is_presenter',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'organization',
                                            'title' => 'Organization',
                                            'options' => [
                                                'class' => 'author-organization',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'position',
                                            'title' => 'Position',
                                            'options' => [
                                                'class' => 'author-position',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                        [
                                            'name'  => 'affiliations',
                                            'title' => 'Affiliations',
                                            'options' => [
                                                'class' => 'author-affiliations',
                                                'type' => 'number',
                                                'min' => 1,
                                                'placeholder' => 'Author Affiliation Row Number',
                                                'disabled' => $disabled,
                                            ]
                                        ],
                                    ]
                                ]);
                            ?>
                        </div>
                    </div>
                    <div id="abstract" class="tab-pane">
                        <div class="well">
                            <?= $form->field($model, 'content', ['template' => '
                                {label}
                                <div>'.$cfa_text_model->abContent.'</div>
                                {input}
                                '
                            ])->textArea(['rows' => 20, 'id' => 'ab-content', 'oninput' => 'getWordCount();', 'disabled' => $disabled]); ?>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="alert alert-info text-center" role="alert" style="">
                                        <label>Word Limit</label>
                                        <span class="wordcount-limit">300</span>
                                    </div>
                                </div>
                                <div class="col-sm-offset-6 col-sm-3">
                                    <div class="alert alert-success text-center" role="alert" style="">
                                        <label>Word Count</label>
                                        <span class="current-wordcount">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="well">
                            <?= $form->field($model, 'abstract_file_name')->hiddenInput()->label(false); ?>

                            <?= $form->field($model, 'file_name', ['template' => '
                                {label}
                                <div>'.$cfa_text_model->abTable.'</div>
                                {input}
                                '
                            ])->widget(FileInput::classname(), [
                                'options' => ['multiple' => false, 'id' => 'file_name', 'disabled' => $disabled],
                                // 'options' => ['multiple' => false],
                                'pluginOptions' => [
                                    'showPreview' => false,
                                    'previewFileType' => 'any',
                                    'showRemove' => false,
                                    // 'showUpload' => false,
                                    'uploadUrl' => Url::to(['/my/upload-file', 'id' => $id]),
                                ]
                            ]); ?>
                            <?php
                                if (!empty($model->abstract_file_name)) {
                            ?>
                            <div class="form-group field-general-image_file_name">
                                <div class="form-control-static">
                                <?php
                                    $image_ext_list = ['jpg','jpeg','png','JPG','JPEG','PNG'];
                                    $pos = strripos($model->abstract_file_name,'.') + 1;
                                    $ext = substr($model->abstract_file_name, $pos);

                                    if (in_array($ext, $image_ext_list)) { 
                                ?>
                                    <?= Html::tag('span', Html::img(Yii::$app->request->hostinfo.$model->abstract_file_name,['style' => 'border:1px solid #EEE;',]), [
                                            'class' => "image-remove-trigger general-image_file-img thumbnail",
                                            'title' => Yii::t('app', 'Remove'),
                                            'data-input-name' => 'UserAbstractForm[abstract_file_name]',
                                            'data-toggle' => "popover",
                                            'data-content' => Yii::t('app', 'Click to remove image'),
                                        ]) ?>
                                <?php
                                    } else {
                                        $temp = explode('/',$model->abstract_file_name);
                                        $file_name = end($temp);
                                ?>
                                    <?= Html::tag('span', '<div><i class="fa fa-file"></i> '.$file_name.'</div>', [
                                        'class' => "image-remove-trigger general-image_file-img thumbnail",
                                        'title' => Yii::t('app', 'Remove'),
                                        'data-input-name' => 'UserAbstractForm[abstract_file_name]',
                                        'data-toggle' => "popover",
                                        'data-content' => Yii::t('app', 'Click to remove file'),
                                    ]) ?>
                                    <!-- <div><a href="<?= Yii::$app->request->hostinfo.$model->abstract_file_name ?>" target="_blank"><i class="fa fa-file"></i> <?= $file_name ?></a></div> -->
                                <?php
                                    }
                                ?>

                                </div>
                            </div>
    
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div id="young" class="tab-pane">
                        <label class="control-label">Young Investigator Award</label>
                        <div class="well">
                            <div><?= $cfa_text_model->abYoung ?></div>
<?php if (0) { ?>
                            <?= $form->field($model, 'is_young')->checkbox([
                                'label' => 'Eligible',
                                'value' => 1,
                                'disabled' => $disabled
                            ]) ?>
<?php } ?>
                            <?= $form->field($model, 'is_young')->radioList(Definitions::getIsYoung(),['itemOptions' => ['disabled' => $disabled]])->label(false) ?>
                        </div>
                    </div>
                    <div id="submit" class="tab-pane">
                        <label class="control-label">Abstract Submission</label>
                        <div><?= $cfa_text_model->abSubmit ?></div>
                        <div class="well">
                            <div>
                                <h3 style="color:#000;">Terms and Conditions</h3>
                                <?= $cfa_text_model->abTerms ?>
                            </div>
                            <?= $form->field($model, 'terms')->checkbox([
                                'value' => 1,
                                'disabled' => $disabled
                            ]) ?>
                        </div>
                        <div class="well">
                            <div>(A) Please choose ONE of the below:</div>
                            <?= $form->field($model, 'is_registered')->radioList(Definitions::getIsRegistered(),['itemOptions' => ['disabled' => $disabled]])->label(false) ?>

                            <div>(B)</div>
                            <?= $form->field($model, 'terms_2')->checkbox([
                                'value' => 1,
                                'disabled' => $disabled
                            ]) ?>
                        </div>
                    </div>
                    <div id="review" class="tab-pane">
                        <label class="control-label">Review Submission</label>
                        <div><?= $cfa_text_model->abReview ?></div>
                        <div id="tle"></div>
                        <div id="auts"></div>
                        <div id="affls"></div>
                        <br />
                        <p id="abst"></p>
                        <div id="errors"></div>
                    </div>
                </div>

<?php if (0) { ?>
                <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha3::className(),
                    [
                        'action' => 'abstract'
                    ]
                )->label(false) ?>
<?php } ?>

                <div class="form-group text-right">
                    <?= $form->field($model, 'id')->hiddenInput(['value' => $id])->label(false); ?>
                    <?= $form->field($model, 'file_remove')->hiddenInput(['id' => 'file_remove', 'value' => 'false'])->label(false); ?>
                    <?= $form->field($model, 'title_word_count')->hiddenInput(['id' => 'title_word_count', 'value' => 0])->label(false); ?>
                    <?= $form->field($model, 'content_word_count')->hiddenInput(['id' => 'content_word_count', 'value' => 0])->label(false); ?>
                    <?= $form->field($model, 'is_draft')->hiddenInput(['id' => 'is_draft', 'value' => 'true'])->label(false); ?>
                    <?= $form->field($model, 'is_continue')->hiddenInput(['id' => 'is_continue', 'value' => 'true'])->label(false); ?>

<?php if ($is_ab_editable) { ?>
                <?php if ($model->abstract_status == $model::ABSTRACT_STATUS_DRAFT) { ?>
                    <?= Html::submitButton('Save As Draft', ['class' => 'btn btn-primary', 'onclick' => 'setStatus(1, 0);']) ?>
                <?php } ?>

                    <?= Html::submitButton('Continue', ['id' => 'continue-btn', 'class' => 'btn btn-primary', 'onclick' => 'setStatus(1, 1);']) ?>
                    <?= Html::submitButton('Submit', ['id' => 'submit-btn', 'class' => 'btn btn-primary', 'onclick' => 'clickSubmit=true;setStatus(0, 1);']) ?>
<?php } ?>
                </div>

            </div>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<script>
function getWordCount() {
    let titleStr = $('#ab-title').val(), titleCount;
    let contentStr = $('#ab-content').val(), contentCount;
    titleCount = titleStr ? titleStr.trim().split(/\s+/).length : 0;
    contentCount = contentStr ? contentStr.trim().split(/\s+/).length : 0;

    $('#ab-title').closest('.well').find('.current-wordcount').text(titleCount);
    $('#ab-content').closest('.well').find('.current-wordcount').text(contentCount);

    $('#title_word_count').val(titleCount);
    $('#content_word_count').val(contentCount);
}

function setStatus(isDraft, isContinue) {
    // console.log('abc');
    $('#is_draft').val(!!isDraft);
    $('#is_continue').val(!!isContinue);
    return true;
}
</script>