<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Registration;

/**
 * AdminGroup model
 *
 */
class PaymentEmailForm extends Registration
{
    // public $ingredients;
    public $payment_email_type;
    public $reg_ids;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['payment_email_type', 'reg_ids'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'payment_email_type' => '電郵種類',
            'reg_ids' => '你的選擇',
        ]);
    }

    public function submitPaymentEmail()
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
                    if ($this->payment_email_type == 3) {
                        $model->sendConfirmVipEmail();
                    } else if ($this->payment_email_type == 2) {
                        $model->sendConfirmEmail();                    
                    } else if ($this->payment_email_type == 1) {
                        $model->sendReminderEmail();
                    }
                }
                // Ingredient::updateAll(['main_vendor_id' => $this->main_vendor_id, 'sub_vendor_id' => $this->sub_vendor_id], ['in', 'id', $ingredient_ids]);
            }

            return true;
        }
        // Definitions::dd($this->ingredients,1);

        return false;
    }
}
