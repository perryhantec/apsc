<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\CallForAbstract;

/**
 * AdminGroup model
 *
 */
class CallForAbstractSendEmail extends CallForAbstract
{
    // public $ingredients;
    public $abstract_ids;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['abstract_ids'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'abstract_ids' => 'Select Submitted Abstract',
        ]);
    }

    public function submitEmail()
    {
        // Definitions::dd($this->main_vendor_id);
        // Definitions::dd($this->sub_vendor_id);
        // Definitions::dd($this->ingredients,1);
        // $this->name = 'abc';

        if ($this->validate()) {
            // Definitions::dd($this->ingredients,1);
            $abstract_ids = [];

            // if ($this->ingredients) {
            //     foreach ($this->ingredients as $ingredients) {
            //         $ingredient_ids[] = $ingredients['id'];
            //     }    
            // }

            if ($this->abstract_ids) {
                foreach ($this->abstract_ids as $abstract_id) {
                    $abstract_ids[] = $abstract_id;
                }
            }

            if ($abstract_ids) {
                $models = CallForAbstract::find()->where(['in', 'id', $abstract_ids])->all();

                foreach ($models as $model) {
                    $model->sendConfirmAbstractEmail();
                }
                // Ingredient::updateAll(['main_vendor_id' => $this->main_vendor_id, 'sub_vendor_id' => $this->sub_vendor_id], ['in', 'id', $ingredient_ids]);
            }

            return true;
        }
        // Definitions::dd($this->ingredients,1);

        return false;
    }
}
