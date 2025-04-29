<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Registration;

/**
 * AdminGroup model
 *
 */
class MassEmailForm extends Registration
{
    // public $ingredients;
    public $mass_email_title;
    public $mass_email_content;
    public $reg_ids;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['mass_email_title', 'mass_email_content', 'reg_ids'], 'required'],
            [['mass_email_title'], 'string', 'max' => 255],
            [['mass_email_content'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'mass_email_title' => '電郵標題',
            'mass_email_content' => '電郵內容',
            'reg_ids' => '你的選擇',
        ]);
    }

    public function submitMassEmail()
    {
        // Definitions::dd($this->main_vendor_id);
        // Definitions::dd($this->sub_vendor_id);
        // Definitions::dd($this->ingredients,1);
        // $this->name = 'abc';

        if ($this->validate()) {
            // Definitions::dd($this->ingredients,1);
            $reg_ids = [];

            // if ($this->ingredients) {
            //     foreach ($this->ingredients as $ingredients) {
            //         $ingredient_ids[] = $ingredients['id'];
            //     }    
            // }

            if ($this->reg_ids) {
                foreach ($this->reg_ids as $reg_id) {
                    $reg_ids[] = $reg_id;
                }
            }

            if ($reg_ids) {
                $models = Registration::find()->where(['in', 'id', $reg_ids])->all();

                foreach ($models as $model) {
                    $model->sendMassEmail($this->mass_email_title, $this->mass_email_content);
                }
                // Ingredient::updateAll(['main_vendor_id' => $this->main_vendor_id, 'sub_vendor_id' => $this->sub_vendor_id], ['in', 'id', $ingredient_ids]);
            }

            return true;
        }
        // Definitions::dd($this->ingredients,1);

        return false;
    }
}
