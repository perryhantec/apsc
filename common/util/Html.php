<?php

namespace common\util;

use Yii;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

class Html extends \yii\helpers\Html {

    public static function multilingualTextInput($form, $model, $attribute, $options = []) {
        $output = '<div class="multilang">';
        $dropdown = [];

        $label = ArrayHelper::getValue($options, 'label', true);
        if (!is_string($label)) {
            $label = $label ? ArrayHelper::getValue($model->attributeLabels(), $attribute) : false;
        }
        foreach (Yii::$app->params['languages'] as $key => $item) {
            $dropdown[] = ['label' => $item, 'url' => 'javascript:hideOtherLanguage("'.$key.'");'];
        }
        foreach (Yii::$app->params['languages'] as $key => $item) {
            $output .=$form->field($model, $attribute.(Yii::$app->language === $key ? '' : ('_'.$key)), [
                'addon' => [
                    'append' => [
                        'content' => \yii\bootstrap\ButtonDropdown::widget([
                            'label' => $item,
                            'dropdown' => [
                                'items' => $dropdown,
                                'options' => ['class' => 'lang-btn-menu']
                            ],
                            'options' => ['class' => 'btn-default'],
                        ]),
                        'asButton' => true
                    ]
                ],
                'options' => ['class' => 'form-group translatable-field lang-'.$key]
            ])->textInput(array_merge(['data-attribute' => $attribute], $options))->label($label);
        }
        $output .='</div>';
        return $output;
    }

    public static function multilingualTextArea($form, $model, $attribute, $options = []) {
        $output = '<div class="multilang">';
        $dropdown = [];

        $label = ArrayHelper::getValue($options, 'label', true);
        if (!is_string($label)) {
            $label = $label ? ArrayHelper::getValue($model->attributeLabels(), $attribute) : false;
        }
        foreach (Yii::$app->params['languages'] as $key => $item) {
            $dropdown[] = ['label' => $item, 'url' => 'javascript:hideOtherLanguage("'.$key.'");'];
        }
        foreach (Yii::$app->params['languages'] as $key => $item) {
            $output .=$form->field($model, $attribute.(Yii::$app->language === $key ? '' : ('_'.$key)), [
                'addon' => [
                    'append' => [
                        'content' => \yii\bootstrap\ButtonDropdown::widget([
                            'label' => $item,
                            'dropdown' => [
                                'items' => $dropdown,
                                'options' => ['class' => 'lang-btn-menu']
                            ],
                            'options' => ['class' => 'btn-default'],
                        ]),
                        'asButton' => true
                    ]
                ],
                'options' => ['class' => 'form-group translatable-field lang-'.$key]
            ])->textArea(array_merge(['data-attribute' => $attribute], $options))->label($label);
        }
        $output .='</div>';
        return $output;
    }

    public static function multilingualCKEditor($form, $model, $attribute, $options = []) {
        $output = '<div class="form-group">';
        $dropdown = [];
        foreach (Yii::$app->params['languages'] as $key => $item) {
            $dropdown[] = ['label' => $item, 'url' => 'javascript:hideOtherLanguage("'.$key.'");'];
        }
        foreach (Yii::$app->params['languages'] as $key => $item) {
            $output.=$form->field($model, $attribute.(Yii::$app->language === $key ? '' : ('_'.$key)), [
                'addon' => [
                    'append' => [
                        'content' => \yii\bootstrap\ButtonDropdown::widget([
                            'label' => $item,
                            'dropdown' => [
                                'items' => $dropdown,
                            ],
                            'options' => ['class' => 'btn-default']
                        ]),
                        'asButton' => true
                    ]
                ],
                'options' => ['class' => 'translatable-field lang-'.$key]
            ])->widget(CKEditor::className(), [
                'editorOptions' => $options,
            ])->label(ArrayHelper::getValue($model->attributeLabels(), $attribute));
        }
        return $output.'</div>';
    }

}
