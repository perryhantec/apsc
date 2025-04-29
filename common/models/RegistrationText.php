<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general".
 */
class RegistrationText extends \common\components\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registration_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'intro_tw',         'intro_cn',         'intro_en',
                'early1_tw',        'early1_cn',        'early1_en',
                'regular1_tw',      'regular1_cn',      'regular1_en',
                'late1_tw',         'late1_cn',         'late1_en',
                'contact_tw',       'contact_cn',       'contact_en',
                'special_tw',       'special_cn',       'special_en',
                'early2_tw',        'early2_cn',        'early2_en',
                'regular2_tw',      'regular2_cn',      'regular2_en',
                'late2_tw',         'late2_cn',         'late2_en',
                'dinner_tw',        'dinner_cn',        'dinner_en',
                'rules_tw',         'rules_cn',         'rules_en',
                'thanks_tw',        'thanks_cn',        'thanks_en',
                'email1_tw',        'email1_cn',        'email1_en',
                'email2_tw',        'email2_cn',        'email2_en',
                'email3_paypal_tw', 'email3_paypal_cn', 'email3_paypal_en',
                'email3_cheque_tw', 'email3_cheque_cn', 'email3_cheque_en',
                'email3_bank_tw',   'email3_bank_cn',   'email3_bank_en',
                'email4_tw',        'email4_cn',        'email4_en',
            ], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'intro_tw'         => 'Introduction '.Yii::t('app', '(Traditional Chinese Version)'),
            'intro_cn'         => 'Introduction '.Yii::t('app', '(Simplified Chinese Version)'),
            'intro_en'         => 'Introduction '.Yii::t('app', '(English Version)'),
            'early1_tw'        => 'Form Title - Early Bird '.Yii::t('app', '(Traditional Chinese Version)'),
            'early1_cn'        => 'Form Title - Early Bird '.Yii::t('app', '(Simplified Chinese Version)'),
            'early1_en'        => 'Form Title - Early Bird '.Yii::t('app', '(English Version)'),
            'regular1_tw'      => 'Form Title - Regular '.Yii::t('app', '(Traditional Chinese Version)'),
            'regular1_cn'      => 'Form Title - Regular '.Yii::t('app', '(Simplified Chinese Version)'),
            'regular1_en'      => 'Form Title - Regular '.Yii::t('app', '(English Version)'),
            'late1_tw'         => 'Form Title - Late & Onsite '.Yii::t('app', '(Traditional Chinese Version)'),
            'late1_cn'         => 'Form Title - Late & Onsite '.Yii::t('app', '(Simplified Chinese Version)'),
            'late1_en'         => 'Form Title - Late & Onsite '.Yii::t('app', '(English Version)'),
            'contact_tw'       => 'Contact '.Yii::t('app', '(Traditional Chinese Version)'),
            'contact_cn'       => 'Contact '.Yii::t('app', '(Simplified Chinese Version)'),
            'contact_en'       => 'Contact '.Yii::t('app', '(English Version)'),
            'special_tw'       => 'Special Dietary Requirement '.Yii::t('app', '(Traditional Chinese Version)'),
            'special_cn'       => 'Special Dietary Requirement '.Yii::t('app', '(Simplified Chinese Version)'),
            'special_en'       => 'Special Dietary Requirement '.Yii::t('app', '(English Version)'),
            'early2_tw'        => 'Registration Category - Early Bird '.Yii::t('app', '(Traditional Chinese Version)'),
            'early2_cn'        => 'Registration Category - Early Bird '.Yii::t('app', '(Simplified Chinese Version)'),
            'early2_en'        => 'Registration Category - Early Bird '.Yii::t('app', '(English Version)'),
            'regular2_tw'      => 'Registration Category - Regular '.Yii::t('app', '(Traditional Chinese Version)'),
            'regular2_cn'      => 'Registration Category - Regular '.Yii::t('app', '(Simplified Chinese Version)'),
            'regular2_en'      => 'Registration Category - Regular '.Yii::t('app', '(English Version)'),
            'late2_tw'         => 'Registration Category - Late & Onsite '.Yii::t('app', '(Traditional Chinese Version)'),
            'late2_cn'         => 'Registration Category - Late & Onsite '.Yii::t('app', '(Simplified Chinese Version)'),
            'late2_en'         => 'Registration Category - Late & Onsite '.Yii::t('app', '(English Version)'),
            'dinner_tw'        => 'Gala Dinner '.Yii::t('app', '(Traditional Chinese Version)'),
            'dinner_cn'        => 'Gala Dinner '.Yii::t('app', '(Simplified Chinese Version)'),
            'dinner_en'        => 'Gala Dinner '.Yii::t('app', '(English Version)'),
            'rules_tw'         => 'Rules '.Yii::t('app', '(Traditional Chinese Version)'),
            'rules_cn'         => 'Rules '.Yii::t('app', '(Simplified Chinese Version)'),
            'rules_en'         => 'Rules '.Yii::t('app', '(English Version)'),
            'thanks_tw'        => 'Thank You page '.Yii::t('app', '(Traditional Chinese Version)'),
            'thanks_cn'        => 'Thank You page '.Yii::t('app', '(Simplified Chinese Version)'),
            'thanks_en'        => 'Thank You page '.Yii::t('app', '(English Version)'),
            'email1_tw'        => 'Email 1 '.Yii::t('app', '(Traditional Chinese Version)'),
            'email1_cn'        => 'Email 1 '.Yii::t('app', '(Simplified Chinese Version)'),
            'email1_en'        => 'Email 1 '.Yii::t('app', '(English Version)'),
            'email2_tw'        => 'Email 2 '.Yii::t('app', '(Traditional Chinese Version)'),
            'email2_cn'        => 'Email 2 '.Yii::t('app', '(Simplified Chinese Version)'),
            'email2_en'        => 'Email 2 '.Yii::t('app', '(English Version)'),
            'email3_paypal_tw' => 'Email 3 Paypal '.Yii::t('app', '(Traditional Chinese Version)'),
            'email3_paypal_cn' => 'Email 3 Paypal'.Yii::t('app', '(Simplified Chinese Version)'),
            'email3_paypal_en' => 'Email 3 Paypal '.Yii::t('app', '(English Version)'),
            'email3_cheque_tw' => 'Email 3 Cheque '.Yii::t('app', '(Traditional Chinese Version)'),
            'email3_cheque_cn' => 'Email 3 Cheque '.Yii::t('app', '(Simplified Chinese Version)'),
            'email3_cheque_en' => 'Email 3 Cheque '.Yii::t('app', '(English Version)'),
            'email3_bank_tw'   => 'Email 3 Bank Transfer '.Yii::t('app', '(Traditional Chinese Version)'),
            'email3_bank_cn'   => 'Email 3 Bank Transfer '.Yii::t('app', '(Simplified Chinese Version)'),
            'email3_bank_en'   => 'Email 3 Bank Transfer '.Yii::t('app', '(English Version)'),
            'email4_tw'        => 'Email 4 '.Yii::t('app', '(Traditional Chinese Version)'),
            'email4_cn'        => 'Email 4 '.Yii::t('app', '(Simplified Chinese Version)'),
            'email4_en'        => 'Email 4 '.Yii::t('app', '(English Version)'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated Dt'),
            'updated_UID' => Yii::t('app', 'Updated  Uid'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->updated_at=date('Y-m-d H:i:s');
            if(isset(Yii::$app->user->id)){
              $this->updated_UID=Yii::$app->user->id;
            }
            return true;
        } else {
            return false;
        }
    }

    // public function submit()
    // {
    //     if ($this->validate()) {
    //         $this->save();

    //         return true;
    //     }
    //     return false;
    // }

    public function getIntro() {
        if (Yii::$app->language == 'en' && !empty($this->intro_en)) {
            return $this->intro_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->intro_cn)) {
            return $this->intro_cn;
        }
        return $this->intro_tw;
    }

    public function getEarly1() {
        if (Yii::$app->language == 'en' && !empty($this->early1_en)) {
            return $this->early1_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->early1_cn)) {
            return $this->early1_cn;
        }
        return $this->early1_tw;
    }

    public function getRegular1() {
        if (Yii::$app->language == 'en' && !empty($this->regular1_en)) {
            return $this->regular1_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->regular1_cn)) {
            return $this->regular1_cn;
        }
        return $this->regular1_tw;
    }

    public function getLate1() {
        if (Yii::$app->language == 'en' && !empty($this->late1_en)) {
            return $this->late1_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->late1_cn)) {
            return $this->late1_cn;
        }
        return $this->late1_tw;
    }

    public function getContact() {
        if (Yii::$app->language == 'en' && !empty($this->contact_en)) {
            return $this->contact_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->contact_cn)) {
            return $this->contact_cn;
        }
        return $this->contact_tw;
    }

    public function getSpecial() {
        if (Yii::$app->language == 'en' && !empty($this->special_en)) {
            return $this->special_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->special_cn)) {
            return $this->special_cn;
        }
        return $this->special_tw;
    }

    public function getEarly2() {
        if (Yii::$app->language == 'en' && !empty($this->early2_en)) {
            return $this->early2_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->early2_cn)) {
            return $this->early2_cn;
        }
        return $this->early2_tw;
    }

    public function getRegular2() {
        if (Yii::$app->language == 'en' && !empty($this->regular2_en)) {
            return $this->regular2_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->regular2_cn)) {
            return $this->regular2_cn;
        }
        return $this->regular2_tw;
    }

    public function getLate2() {
        if (Yii::$app->language == 'en' && !empty($this->late2_en)) {
            return $this->late2_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->late2_cn)) {
            return $this->late2_cn;
        }
        return $this->late2_tw;
    }

    public function getDinner() {
        if (Yii::$app->language == 'en' && !empty($this->dinner_en)) {
            return $this->dinner_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->dinner_cn)) {
            return $this->dinner_cn;
        }
        return $this->dinner_tw;
    }

    public function getRules() {
        if (Yii::$app->language == 'en' && !empty($this->rules_en)) {
            return $this->rules_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->rules_cn)) {
            return $this->rules_cn;
        }
        return $this->rules_tw;
    }

    public function getThanks() {
        if (Yii::$app->language == 'en' && !empty($this->thanks_en)) {
            return $this->thanks_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->thanks_cn)) {
            return $this->thanks_cn;
        }
        return $this->thanks_tw;
    }

    public function getEmail1() {
        if (Yii::$app->language == 'en' && !empty($this->email1_en)) {
            return $this->email1_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->email1_cn)) {
            return $this->email1_cn;
        }
        return $this->email1_tw;
    }

    public function getEmail2() {
        if (Yii::$app->language == 'en' && !empty($this->email2_en)) {
            return $this->email2_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->email2_cn)) {
            return $this->email2_cn;
        }
        return $this->email2_tw;
    }

    public function getEmail3Paypal() {
        if (Yii::$app->language == 'en' && !empty($this->email3_paypal_en)) {
            return $this->email3_paypal_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->email3_paypal_cn)) {
            return $this->email3_paypal_cn;
        }
        return $this->email3_paypal_tw;
    }

    public function getEmail3Cheque() {
        if (Yii::$app->language == 'en' && !empty($this->email3_cheque_en)) {
            return $this->email3_cheque_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->email3_cheque_cn)) {
            return $this->email3_cheque_cn;
        }
        return $this->email3_cheque_tw;
    }

    public function getEmail3Bank() {
        if (Yii::$app->language == 'en' && !empty($this->email3_bank_en)) {
            return $this->email3_bank_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->email3_bank_cn)) {
            return $this->email3_bank_cn;
        }
        return $this->email3_bank_tw;
    }

    public function getEmail4() {
        if (Yii::$app->language == 'en' && !empty($this->email4_en)) {
            return $this->email4_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->email4_cn)) {
            return $this->email4_cn;
        }
        return $this->email4_tw;
    }
}
