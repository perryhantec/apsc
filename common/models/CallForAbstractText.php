<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general".
 */
class CallForAbstractText extends \common\components\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'call_for_abstract_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'intro_tw',      'intro_cn',      'intro_en',
                'login_tw',      'login_cn',      'login_en',
                'signup_tw',     'signup_cn',     'signup_en',
                'home_tw',       'home_cn',       'home_en',
                'ab_intro_tw',   'ab_intro_cn',   'ab_intro_en',
                'ab_title_tw',   'ab_title_cn',   'ab_title_en',
                'ab_ptype_tw',   'ab_ptype_cn',   'ab_ptype_en',
                'ab_keyword_tw', 'ab_keyword_cn', 'ab_keyword_en',
                'ab_theme_tw',   'ab_theme_cn',   'ab_theme_en',
                'ab_affl_tw',    'ab_affl_cn',    'ab_affl_en',
                'ab_author_tw',  'ab_author_cn',  'ab_author_en',
                'ab_content_tw', 'ab_content_cn', 'ab_content_en',
                'ab_table_tw',   'ab_table_cn',   'ab_table_en',
                'ab_young_tw',   'ab_young_cn',   'ab_young_en',
                'ab_review_tw',  'ab_review_cn',  'ab_review_en',
                'ab_submit_tw',  'ab_submit_cn',  'ab_submit_en',
                'ab_terms_tw',   'ab_terms_cn',   'ab_terms_en',
                'edit_tw',       'edit_cn',       'edit_en',    
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
            'intro_tw'  => 'Introduction '.Yii::t('app', '(Traditional Chinese Version)'),
            'intro_cn'  => 'Introduction '.Yii::t('app', '(Simplified Chinese Version)'),
            'intro_en'  => 'Introduction '.Yii::t('app', '(English Version)'),
            'login_tw'      => 'Login '.Yii::t('app', '(Traditional Chinese Version)'),
            'login_cn'      => 'Login '.Yii::t('app', '(Simplified Chinese Version)'),
            'login_en'      => 'Login '.Yii::t('app', '(English Version)'),
            'signup_tw'     => 'Signup '.Yii::t('app', '(Traditional Chinese Version)'),
            'signup_cn'     => 'Signup '.Yii::t('app', '(Simplified Chinese Version)'),
            'signup_en'     => 'Signup '.Yii::t('app', '(English Version)'),
            'home_tw'       => 'Home '.Yii::t('app', '(Traditional Chinese Version)'),
            'home_cn'       => 'Home '.Yii::t('app', '(Simplified Chinese Version)'),
            'home_en'       => 'Home '.Yii::t('app', '(English Version)'),
            'ab_intro_tw'   => 'Abstract Submission - Introduction '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_intro_cn'   => 'Abstract Submission - Introduction '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_intro_en'   => 'Abstract Submission - Introduction '.Yii::t('app', '(English Version)'),
            'ab_title_tw'   => 'Abstract Submission - Title '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_title_cn'   => 'Abstract Submission - Title '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_title_en'   => 'Abstract Submission - Title '.Yii::t('app', '(English Version)'),
            'ab_ptype_tw'   => 'Abstract Submission - Presentation Type '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_ptype_cn'   => 'Abstract Submission - Presentation Type '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_ptype_en'   => 'Abstract Submission - Presentation Type '.Yii::t('app', '(English Version)'),
            'ab_keyword_tw' => 'Abstract Submission - Keyword '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_keyword_cn' => 'Abstract Submission - Keyword '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_keyword_en' => 'Abstract Submission - Keyword '.Yii::t('app', '(English Version)'),
            'ab_theme_tw'   => 'Abstract Submission - Themes '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_theme_cn'   => 'Abstract Submission - Themes '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_theme_en'   => 'Abstract Submission - Themes '.Yii::t('app', '(English Version)'),
            'ab_affl_tw'    => 'Abstract Submission - Affiliations '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_affl_cn'    => 'Abstract Submission - Affiliations '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_affl_en'    => 'Abstract Submission - Affiliations '.Yii::t('app', '(English Version)'),
            'ab_author_tw'  => 'Abstract Submission - Authors '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_author_cn'  => 'Abstract Submission - Authors '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_author_en'  => 'Abstract Submission - Authors '.Yii::t('app', '(English Version)'),
            'ab_content_tw' => 'Abstract Submission - Content '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_content_cn' => 'Abstract Submission - Content '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_content_en' => 'Abstract Submission - Content '.Yii::t('app', '(English Version)'),
            'ab_table_tw'   => 'Abstract Submission - Table / Graphic / Representative Figure '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_table_cn'   => 'Abstract Submission - Table / Graphic / Representative Figure '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_table_en'   => 'Abstract Submission - Table / Graphic / Representative Figure '.Yii::t('app', '(English Version)'),
            'ab_young_tw'   => 'Abstract Submission - Young Investigator Award '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_young_cn'   => 'Abstract Submission - Young Investigator Award '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_young_en'   => 'Abstract Submission - Young Investigator Award '.Yii::t('app', '(English Version)'),
            'ab_review_tw'  => 'Abstract Submission - Review '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_review_cn'  => 'Abstract Submission - Review '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_review_en'  => 'Abstract Submission - Review '.Yii::t('app', '(English Version)'),
            'ab_submit_tw'  => 'Abstract Submission - Submit Introduction '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_submit_cn'  => 'Abstract Submission - Submit Introduction '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_submit_en'  => 'Abstract Submission - Submit Introduction '.Yii::t('app', '(English Version)'),        
            'ab_terms_tw'   => 'Abstract Submission - Terms and Conditions '.Yii::t('app', '(Traditional Chinese Version)'),
            'ab_terms_cn'   => 'Abstract Submission - Terms and Conditions '.Yii::t('app', '(Simplified Chinese Version)'),
            'ab_terms_en'   => 'Abstract Submission - Terms and Conditions '.Yii::t('app', '(English Version)'),
            'edit_tw'       => 'Edit Abstract '.Yii::t('app', '(Traditional Chinese Version)'),
            'edit_cn'       => 'Edit Abstract '.Yii::t('app', '(Simplified Chinese Version)'),
            'edit_en'       => 'Edit Abstract '.Yii::t('app', '(English Version)'),
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

    public function getLogin() {
        if (Yii::$app->language == 'en' && !empty($this->login_en)) {
            return $this->login_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->login_cn)) {
            return $this->login_cn;
        }
        return $this->login_tw;
    }

    public function getSignup() {
        if (Yii::$app->language == 'en' && !empty($this->signup_en)) {
            return $this->signup_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->signup_cn)) {
            return $this->signup_cn;
        }
        return $this->signup_tw;
    }

    public function getHome() {
        if (Yii::$app->language == 'en' && !empty($this->home_en)) {
            return $this->home_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->home_cn)) {
            return $this->home_cn;
        }
        return $this->home_tw;
    }

    public function getAbIntro() {
        if (Yii::$app->language == 'en' && !empty($this->ab_intro_en)) {
            return $this->ab_intro_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_intro_cn)) {
            return $this->ab_intro_cn;
        }
        return $this->ab_intro_tw;
    }

    public function getAbTitle() {
        if (Yii::$app->language == 'en' && !empty($this->ab_title_en)) {
            return $this->ab_title_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_title_cn)) {
            return $this->ab_title_cn;
        }
        return $this->ab_title_tw;
    }

    public function getAbPtype() {
        if (Yii::$app->language == 'en' && !empty($this->ab_ptype_en)) {
            return $this->ab_ptype_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_ptype_cn)) {
            return $this->ab_ptype_cn;
        }
        return $this->ab_ptype_tw;
    }

    public function getAbKeyword() {
        if (Yii::$app->language == 'en' && !empty($this->ab_keyword_en)) {
            return $this->ab_keyword_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_keyword_cn)) {
            return $this->ab_keyword_cn;
        }
        return $this->ab_keyword_tw;
    }

    public function getAbTheme() {
        if (Yii::$app->language == 'en' && !empty($this->ab_theme_en)) {
            return $this->ab_theme_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_theme_cn)) {
            return $this->ab_theme_cn;
        }
        return $this->ab_theme_tw;
    }

    public function getAbAffl() {
        if (Yii::$app->language == 'en' && !empty($this->ab_affl_en)) {
            return $this->ab_affl_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_affl_cn)) {
            return $this->ab_affl_cn;
        }
        return $this->ab_affl_tw;
    }

    public function getAbAuthor() {
        if (Yii::$app->language == 'en' && !empty($this->ab_author_en)) {
            return $this->ab_author_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_author_cn)) {
            return $this->ab_author_cn;
        }
        return $this->ab_author_tw;
    }

    public function getAbTable() {
        if (Yii::$app->language == 'en' && !empty($this->ab_table_en)) {
            return $this->ab_table_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_table_cn)) {
            return $this->ab_table_cn;
        }
        return $this->ab_table_tw;
    }

    public function getAbYoung() {
        if (Yii::$app->language == 'en' && !empty($this->ab_young_en)) {
            return $this->ab_young_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_young_cn)) {
            return $this->ab_young_cn;
        }
        return $this->ab_young_tw;
    }

    public function getAbReview() {
        if (Yii::$app->language == 'en' && !empty($this->ab_review_en)) {
            return $this->ab_review_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_review_cn)) {
            return $this->ab_review_cn;
        }
        return $this->ab_review_tw;
    }

    public function getAbSubmit() {
        if (Yii::$app->language == 'en' && !empty($this->ab_submit_en)) {
            return $this->ab_submit_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_submit_cn)) {
            return $this->ab_submit_cn;
        }
        return $this->ab_submit_tw;
    }

    public function getAbContent() {
        if (Yii::$app->language == 'en' && !empty($this->ab_content_en)) {
            return $this->ab_content_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_content_cn)) {
            return $this->ab_content_cn;
        }
        return $this->ab_content_tw;
    }

    public function getAbTerms() {
        if (Yii::$app->language == 'en' && !empty($this->ab_terms_en)) {
            return $this->ab_terms_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->ab_terms_cn)) {
            return $this->ab_terms_cn;
        }
        return $this->ab_terms_tw;
    }

    public function getEdit() {
        if (Yii::$app->language == 'en' && !empty($this->edit_en)) {
            return $this->edit_en;
        } else if (Yii::$app->language == 'zh-CN' && !empty($this->edit_cn)) {
            return $this->edit_cn;
        }
        return $this->edit_tw;
    }
}
