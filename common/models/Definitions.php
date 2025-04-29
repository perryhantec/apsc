<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Definitions {

    public static function dd($data, $is_exit = false) {
      echo '<pre>';
      \yii\helpers\VarDumper::dump($data);
      echo '</pre>';

      if ($is_exit) exit();
    }
    public static function getBooleanDescription($index = false) {
      $array = [
          '1' => Yii::t('definitions','Yes'),
          '0' => Yii::t('definitions','No'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getCanCannotDescription($index = false) {
      $array = [
          '1' => Yii::t('definitions','Can'),
          '0' => Yii::t('definitions','Cannot'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getAllowNotAllowedDescription($index = false) {
      $array = [
          '1' => Yii::t('definitions','Allow'),
          '0' => Yii::t('definitions','Not Allowed'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    //status
    public static function getStatus($index = false) {
      $array = [
          1 => Yii::t('definitions','Active'),
          0 => Yii::t('definitions','Deactivate'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    //status
    public static function getCountry($index = false) {
      $array = [
        'AF' => Yii::t('country', 'Afghanistan'),
        'AX' => Yii::t('country', 'Åland Islands'),
        'AL' => Yii::t('country', 'Albania'),
        'DZ' => Yii::t('country', 'Algeria'),
        'AS' => Yii::t('country', 'American Samoa'),
        'AD' => Yii::t('country', 'Andorra'),
        'AO' => Yii::t('country', 'Angola'),
        'AI' => Yii::t('country', 'Anguilla'),
        'AQ' => Yii::t('country', 'Antarctica'),
        'AG' => Yii::t('country', 'Antigua and Barbuda'),
        'AR' => Yii::t('country', 'Argentina'),
        'AM' => Yii::t('country', 'Armenia'),
        'AW' => Yii::t('country', 'Aruba'),
        'AU' => Yii::t('country', 'Australia'),
        'AT' => Yii::t('country', 'Austria'),
        'AZ' => Yii::t('country', 'Azerbaijan'),
        'BS' => Yii::t('country', 'Bahamas'),
        'BH' => Yii::t('country', 'Bahrain'),
        'BD' => Yii::t('country', 'Bangladesh'),
        'BB' => Yii::t('country', 'Barbados'),
        'BY' => Yii::t('country', 'Belarus'),
        'BE' => Yii::t('country', 'Belgium'),
        'BZ' => Yii::t('country', 'Belize'),
        'BJ' => Yii::t('country', 'Benin'),
        'BM' => Yii::t('country', 'Bermuda'),
        'BT' => Yii::t('country', 'Bhutan'),
        'BO' => Yii::t('country', 'Bolivia, Plurinational State of'),
        'BQ' => Yii::t('country', 'Bonaire, Sint Eustatius and Saba'),
        'BA' => Yii::t('country', 'Bosnia and Herzegovina'),
        'BW' => Yii::t('country', 'Botswana'),
        'BV' => Yii::t('country', 'Bouvet Island'),
        'BR' => Yii::t('country', 'Brazil'),
        'IO' => Yii::t('country', 'British Indian Ocean Territory'),
        'BN' => Yii::t('country', 'Brunei Darussalam'),
        'BG' => Yii::t('country', 'Bulgaria'),
        'BF' => Yii::t('country', 'Burkina Faso'),
        'BI' => Yii::t('country', 'Burundi'),
        'CV' => Yii::t('country', 'Cabo Verde'),
        'KH' => Yii::t('country', 'Cambodia'),
        'CM' => Yii::t('country', 'Cameroon'),
        'CA' => Yii::t('country', 'Canada'),
        'KY' => Yii::t('country', 'Cayman Islands'),
        'CF' => Yii::t('country', 'Central African Republic'),
        'TD' => Yii::t('country', 'Chad'),
        'CL' => Yii::t('country', 'Chile'),
        'CN' => Yii::t('country', 'China'),
        'CX' => Yii::t('country', 'Christmas Island'),
        'CC' => Yii::t('country', 'Cocos (Keeling) Islands'),
        'CO' => Yii::t('country', 'Colombia'),
        'KM' => Yii::t('country', 'Comoros'),
        'CG' => Yii::t('country', 'Congo'),
        'CD' => Yii::t('country', 'Congo, the Democratic Republic of the'),
        'CK' => Yii::t('country', 'Cook Islands'),
        'CR' => Yii::t('country', 'Costa Rica'),
        'CI' => Yii::t('country', 'Côte d\'Ivoire'),
        'HR' => Yii::t('country', 'Croatia'),
        'CU' => Yii::t('country', 'Cuba'),
        'CW' => Yii::t('country', 'Curaçao'),
        'CY' => Yii::t('country', 'Cyprus'),
        'CZ' => Yii::t('country', 'Czechia'),
        'DK' => Yii::t('country', 'Denmark'),
        'DJ' => Yii::t('country', 'Djibouti'),
        'DM' => Yii::t('country', 'Dominica'),
        'DO' => Yii::t('country', 'Dominican Republic'),
        'EC' => Yii::t('country', 'Ecuador'),
        'EG' => Yii::t('country', 'Egypt'),
        'SV' => Yii::t('country', 'El Salvador'),
        'GQ' => Yii::t('country', 'Equatorial Guinea'),
        'ER' => Yii::t('country', 'Eritrea'),
        'EE' => Yii::t('country', 'Estonia'),
        'SZ' => Yii::t('country', 'Eswatini'),
        'ET' => Yii::t('country', 'Ethiopia'),
        'FK' => Yii::t('country', 'Falkland Islands (Malvinas)'),
        'FO' => Yii::t('country', 'Faroe Islands'),
        'FJ' => Yii::t('country', 'Fiji'),
        'FI' => Yii::t('country', 'Finland'),
        'FR' => Yii::t('country', 'France'),
        'GF' => Yii::t('country', 'French Guiana'),
        'PF' => Yii::t('country', 'French Polynesia'),
        'TF' => Yii::t('country', 'French Southern Territories'),
        'GA' => Yii::t('country', 'Gabon'),
        'GM' => Yii::t('country', 'Gambia'),
        'GE' => Yii::t('country', 'Georgia'),
        'DE' => Yii::t('country', 'Germany'),
        'GH' => Yii::t('country', 'Ghana'),
        'GI' => Yii::t('country', 'Gibraltar'),
        'GR' => Yii::t('country', 'Greece'),
        'GL' => Yii::t('country', 'Greenland'),
        'GD' => Yii::t('country', 'Grenada'),
        'GP' => Yii::t('country', 'Guadeloupe'),
        'GU' => Yii::t('country', 'Guam'),
        'GT' => Yii::t('country', 'Guatemala'),
        'GG' => Yii::t('country', 'Guernsey'),
        'GN' => Yii::t('country', 'Guinea'),
        'GW' => Yii::t('country', 'Guinea-Bissau'),
        'GY' => Yii::t('country', 'Guyana'),
        'HT' => Yii::t('country', 'Haiti'),
        'HM' => Yii::t('country', 'Heard Island and McDonald Islands'),
        'VA' => Yii::t('country', 'Holy See'),
        'HN' => Yii::t('country', 'Honduras'),
        'HK' => Yii::t('country', 'Hong Kong'),
        'HU' => Yii::t('country', 'Hungary'),
        'IS' => Yii::t('country', 'Iceland'),
        'IN' => Yii::t('country', 'India'),
        'ID' => Yii::t('country', 'Indonesia'),
        'IR' => Yii::t('country', 'Iran, Islamic Republic of'),
        'IQ' => Yii::t('country', 'Iraq'),
        'IE' => Yii::t('country', 'Ireland'),
        'IM' => Yii::t('country', 'Isle of Man'),
        'IL' => Yii::t('country', 'Israel'),
        'IT' => Yii::t('country', 'Italy'),
        'JM' => Yii::t('country', 'Jamaica'),
        'JP' => Yii::t('country', 'Japan'),
        'JE' => Yii::t('country', 'Jersey'),
        'JO' => Yii::t('country', 'Jordan'),
        'KZ' => Yii::t('country', 'Kazakhstan'),
        'KE' => Yii::t('country', 'Kenya'),
        'KI' => Yii::t('country', 'Kiribati'),
        'KP' => Yii::t('country', 'Korea, Democratic People\'s Republic of'),
        'KR' => Yii::t('country', 'Korea, Republic of'),
        'KW' => Yii::t('country', 'Kuwait'),
        'KG' => Yii::t('country', 'Kyrgyzstan'),
        'LA' => Yii::t('country', 'Lao People\'s Democratic Republic'),
        'LV' => Yii::t('country', 'Latvia'),
        'LB' => Yii::t('country', 'Lebanon'),
        'LS' => Yii::t('country', 'Lesotho'),
        'LR' => Yii::t('country', 'Liberia'),
        'LY' => Yii::t('country', 'Libya'),
        'LI' => Yii::t('country', 'Liechtenstein'),
        'LT' => Yii::t('country', 'Lithuania'),
        'LU' => Yii::t('country', 'Luxembourg'),
        'MO' => Yii::t('country', 'Macao'),
        'MG' => Yii::t('country', 'Madagascar'),
        'MW' => Yii::t('country', 'Malawi'),
        'MY' => Yii::t('country', 'Malaysia'),
        'MV' => Yii::t('country', 'Maldives'),
        'ML' => Yii::t('country', 'Mali'),
        'MT' => Yii::t('country', 'Malta'),
        'MH' => Yii::t('country', 'Marshall Islands'),
        'MQ' => Yii::t('country', 'Martinique'),
        'MR' => Yii::t('country', 'Mauritania'),
        'MU' => Yii::t('country', 'Mauritius'),
        'YT' => Yii::t('country', 'Mayotte'),
        'MX' => Yii::t('country', 'Mexico'),
        'FM' => Yii::t('country', 'Micronesia, Federated States of'),
        'MD' => Yii::t('country', 'Moldova, Republic of'),
        'MC' => Yii::t('country', 'Monaco'),
        'MN' => Yii::t('country', 'Mongolia'),
        'ME' => Yii::t('country', 'Montenegro'),
        'MS' => Yii::t('country', 'Montserrat'),
        'MA' => Yii::t('country', 'Morocco'),
        'MZ' => Yii::t('country', 'Mozambique'),
        'MM' => Yii::t('country', 'Myanmar'),
        'NA' => Yii::t('country', 'Namibia'),
        'NR' => Yii::t('country', 'Nauru'),
        'NP' => Yii::t('country', 'Nepal'),
        'NL' => Yii::t('country', 'Netherlands'),
        'NC' => Yii::t('country', 'New Caledonia'),
        'NZ' => Yii::t('country', 'New Zealand'),
        'NI' => Yii::t('country', 'Nicaragua'),
        'NE' => Yii::t('country', 'Niger'),
        'NG' => Yii::t('country', 'Nigeria'),
        'NU' => Yii::t('country', 'Niue'),
        'NF' => Yii::t('country', 'Norfolk Island'),
        'MK' => Yii::t('country', 'North Macedonia'),
        'MP' => Yii::t('country', 'Northern Mariana Islands'),
        'NO' => Yii::t('country', 'Norway'),
        'OM' => Yii::t('country', 'Oman'),
        'PK' => Yii::t('country', 'Pakistan'),
        'PW' => Yii::t('country', 'Palau'),
        'PS' => Yii::t('country', 'Palestine, State of'),
        'PA' => Yii::t('country', 'Panama'),
        'PG' => Yii::t('country', 'Papua New Guinea'),
        'PY' => Yii::t('country', 'Paraguay'),
        'PE' => Yii::t('country', 'Peru'),
        'PH' => Yii::t('country', 'Philippines'),
        'PN' => Yii::t('country', 'Pitcairn'),
        'PL' => Yii::t('country', 'Poland'),
        'PT' => Yii::t('country', 'Portugal'),
        'PR' => Yii::t('country', 'Puerto Rico'),
        'QA' => Yii::t('country', 'Qatar'),
        'RE' => Yii::t('country', 'Réunion'),
        'RO' => Yii::t('country', 'Romania'),
        'RU' => Yii::t('country', 'Russian Federation'),
        'RW' => Yii::t('country', 'Rwanda'),
        'BL' => Yii::t('country', 'Saint Barthélemy'),
        'SH' => Yii::t('country', 'Saint Helena, Ascension and Tristan da Cunha'),
        'KN' => Yii::t('country', 'Saint Kitts and Nevis'),
        'LC' => Yii::t('country', 'Saint Lucia'),
        'MF' => Yii::t('country', 'Saint Martin (French part)'),
        'PM' => Yii::t('country', 'Saint Pierre and Miquelon'),
        'VC' => Yii::t('country', 'Saint Vincent and the Grenadines'),
        'WS' => Yii::t('country', 'Samoa'),
        'SM' => Yii::t('country', 'San Marino'),
        'ST' => Yii::t('country', 'Sao Tome and Principe'),
        'SA' => Yii::t('country', 'Saudi Arabia'),
        'SN' => Yii::t('country', 'Senegal'),
        'RS' => Yii::t('country', 'Serbia'),
        'SC' => Yii::t('country', 'Seychelles'),
        'SL' => Yii::t('country', 'Sierra Leone'),
        'SG' => Yii::t('country', 'Singapore'),
        'SX' => Yii::t('country', 'Sint Maarten (Dutch part)'),
        'SK' => Yii::t('country', 'Slovakia'),
        'SI' => Yii::t('country', 'Slovenia'),
        'SB' => Yii::t('country', 'Solomon Islands'),
        'SO' => Yii::t('country', 'Somalia'),
        'ZA' => Yii::t('country', 'South Africa'),
        'GS' => Yii::t('country', 'South Georgia and the South Sandwich Islands'),
        'SS' => Yii::t('country', 'South Sudan'),
        'ES' => Yii::t('country', 'Spain'),
        'LK' => Yii::t('country', 'Sri Lanka'),
        'SD' => Yii::t('country', 'Sudan'),
        'SR' => Yii::t('country', 'Suriname'),
        'SJ' => Yii::t('country', 'Svalbard and Jan Mayen'),
        'SE' => Yii::t('country', 'Sweden'),
        'CH' => Yii::t('country', 'Switzerland'),
        'SY' => Yii::t('country', 'Syrian Arab Republic'),
        'TW' => Yii::t('country', 'Taiwan, Province of China'),
        'TJ' => Yii::t('country', 'Tajikistan'),
        'TZ' => Yii::t('country', 'Tanzania, United Republic of'),
        'TH' => Yii::t('country', 'Thailand'),
        'TL' => Yii::t('country', 'Timor-Leste'),
        'TG' => Yii::t('country', 'Togo'),
        'TK' => Yii::t('country', 'Tokelau'),
        'TO' => Yii::t('country', 'Tonga'),
        'TT' => Yii::t('country', 'Trinidad and Tobago'),
        'TN' => Yii::t('country', 'Tunisia'),
        'TR' => Yii::t('country', 'Turkey'),
        'TM' => Yii::t('country', 'Turkmenistan'),
        'TC' => Yii::t('country', 'Turks and Caicos Islands'),
        'TV' => Yii::t('country', 'Tuvalu'),
        'UG' => Yii::t('country', 'Uganda'),
        'UA' => Yii::t('country', 'Ukraine'),
        'AE' => Yii::t('country', 'United Arab Emirates'),
        'GB' => Yii::t('country', 'United Kingdom of Great Britain and Northern Ireland'),
        'UM' => Yii::t('country', 'United States Minor Outlying Islands'),
        'US' => Yii::t('country', 'United States of America'),
        'UY' => Yii::t('country', 'Uruguay'),
        'UZ' => Yii::t('country', 'Uzbekistan'),
        'VU' => Yii::t('country', 'Vanuatu'),
        'VE' => Yii::t('country', 'Venezuela, Bolivarian Republic of'),
        'VN' => Yii::t('country', 'Viet Nam'),
        'VG' => Yii::t('country', 'Virgin Islands, British'),
        'VI' => Yii::t('country', 'Virgin Islands, U.S.'),
        'WF' => Yii::t('country', 'Wallis and Futuna'),
        'EH' => Yii::t('country', 'Western Sahara'),
        'YE' => Yii::t('country', 'Yemen'),
        'ZM' => Yii::t('country', 'Zambia'),
        'ZW' => Yii::t('country', 'Zimbabwe'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    //auth role
    public static function getRole($index = false, $min_role = 0) {
      $array = [
          User::ROLE_MEMBER => Yii::t('definitions','Member'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_role)
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getUser($index = false) {
      $array = [];
      $models = \common\models\User::find()->where(['status' => \common\models\User::STATUS_ACTIVE])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }
    public static function getUserStatus($index = false) {
      $array = [
          User::STATUS_ACTIVE => Yii::t('definitions','Active'),
          User::STATUS_WAITVERIFY => Yii::t('definitions','Waiting for email verification'),
          User::STATUS_DELETED => Yii::t('definitions','Deactivate'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    //auth role
    public static function getAdminRole($index = false, $min_role = 0) {
      $array = [
          AdminUser::ROLE_SUPERADMIN => Yii::t('definitions','Super Admin'),
          AdminUser::ROLE_ADMIN => Yii::t('definitions','Admin'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_role)
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getZodiac($index = false) {
      $array = [
          1 => Yii::t('zodiac', 'Rat'),
          2 => Yii::t('zodiac', 'Ox'),
          3 => Yii::t('zodiac', 'Tiger'),
          4 => Yii::t('zodiac', 'Rabbit'),
          5 => Yii::t('zodiac', 'Dragon'),
          6 => Yii::t('zodiac', 'Snake'),
          7 => Yii::t('zodiac', 'Horse'),
          8 => Yii::t('zodiac', 'Goat'),
          9 => Yii::t('zodiac', 'Monkey'),
          10 => Yii::t('zodiac', 'Rooster'),
          11 => Yii::t('zodiac', 'Dog'),
          12 => Yii::t('zodiac', 'Pig')
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getMemberCard($index = false) {
      $array = [
          1 => '藍',
          2 => '紅',
          3 => '金',
          4 => '黃',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getMemberCardImage($index = false) {
      $array = [
          1 => Html::img('@weburl'.User::MEMBERCARD_IMGPATH1, ['style' => ['max-width' => '100%']]),
          2 => Html::img('@weburl'.User::MEMBERCARD_IMGPATH2, ['style' => ['max-width' => '100%']]),
          3 => Html::img('@weburl'.User::MEMBERCARD_IMGPATH3, ['style' => ['max-width' => '100%']]),
          4 => Html::img('@weburl'.User::MEMBERCARD_IMGPATH4, ['style' => ['max-width' => '100%']]),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    //menu list
    public static function getMenuList($index=false, $extId=null) {
      $models = \common\models\Menu::find()->where(['type' => 1])->orderBy(['seq' => 'ASC'])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      $array = array_map(function($v) { return strip_tags($v); }, $array);
      if ($extId != null)
        unset($array[$extId]);
      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }


    //menu display
    public static function getMenuDisplay($index = false) {
      $array = [
          '1' => Yii::t('definitions','Yes'),
          '0' => Yii::t('definitions','No'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    //menu type
    public static function getMenuType($index = false) {
      $array = [
          1 => Yii::t('definitions','Menu Level1'),
          2 => Yii::t('definitions','Menu Level2'),
          //3 => Yii::t('definitions','Menu Level3'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    //page type
    public static function getPageType($index = false) {
      $array = [
          0 => Yii::t('definitions','Link'),
          // 1 => Yii::t('definitions','Page'),
          // 2 => Yii::t('definitions','Blog'),
          1 => '頁 (多圖)',
          7 => '頁 (職位1)',
          2 => '頁 (職位2)',
          3 => 'News',
//           3 => Yii::t('definitions','Gallery'),
//           2 => Yii::t('definitions','Video'),
          4 => '組織',
          5 => '成員',
          6 => '重要日子',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    //page type 2 category
    public static function getPageType2Category($index = false, $MID, $lang=NULL) {
      $array = [];
      $models = \common\models\PageType2Category::findAll(['MID' => $MID]);
      foreach($models as $model){
        if($lang=='zh-TW'){
          $array[$model->id] = $model->name_tw;
        }elseif($lang=='en'){
          $array[$model->id] = $model->name_en;
        }else{
          $array[$model->id] = $model->name_tw.' '.$model->name_en;
        }
      }
      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getPageType2PressDocType($index = false) {
      $array = [
          1 => Yii::t('app','Link'),
          2 => Yii::t('app','File'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    //page type 4 category
    public static function getPageType4Category($index = false, $MID, $lang=NULL) {
      $models = \common\models\PageType4Category::findAll(['MID' => $MID]);
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getPageType4DisplayAtAllYear($MID) {
      $max_display_at = \common\models\PageType4::find()->where(['MID' => $MID, 'status' => 1])->max('display_at');
      $min_display_at = \common\models\PageType4::find()->where(['MID' => $MID, 'status' => 1])->min('display_at');
      $max_year = date('Y', strtotime($max_display_at));
      $min_year = date('Y', strtotime($min_display_at));

      $array = [];
      for ($year = $max_year; $year >= $min_year; $year--)
        $array[$year] = $year;

      return $array;
    }

    public static function getPageType4Sorting($index = false) {
      $array = [
          1 => Yii::t('app', 'Sort by latest date'),
          2 => Yii::t('app', 'Sort by the most views'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    //page type 5 category
    public static function getPageType5Category($index = false, $MID, $lang=NULL) {
       $array = [];
      $models = \common\models\PageType5Category::findAll(['MID' => $MID, 'status' => 1]);
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getPageType5PressDocType($index = false) {
      $array = [
          1 => Yii::t('app','Link'),
          2 => Yii::t('app','File'),
      ];
      return $index !== false ? ($index==NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getCategoryStatus($index = false) {
      $array = [
          1 => Yii::t('definitions','Active'),
//           2 => Yii::t('definitions','Hidden'),
          0 => Yii::t('definitions','Deactivate'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getProductStatus($index = false, $forAdmin=false) {
        if ($forAdmin)
          $array = [
              Product::STATUS_OS => "即場購買 隨緣樂助",
              Product::STATUS_AVAILABLE => Yii::t('product_definitions','Normal'),
              Product::STATUS_DISABLE => Yii::t('product_definitions','Disable'),
          ];
        else
          $array = [
              Product::STATUS_OS => "即場購買 隨緣樂助",
              Product::STATUS_WOOS => "缺貨",
              Product::STATUS_OOS => Yii::t('product_definitions','Out Of Stock'),
              Product::STATUS_AVAILABLE => Yii::t('product_definitions','Normal'),
              Product::STATUS_DISABLE => Yii::t('product_definitions','Disable'),
          ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getProductCategories($index = false, $activeOnly = true, $asModel = false) {
      $model = Category::find()->where(['category_id' => null])->orderBy(['seq'=>SORT_ASC, 'id'=>SORT_ASC]);
      if ($activeOnly)
        $model->andWhere(['status' => 1]);
      $model = $model->all();

      $array = [];

      $category_oname = $activeOnly ? 'activeCategories' : 'categories';

      foreach ($model as $category) {
          if ($category->{$category_oname}) {
              foreach ($category->{$category_oname} as $sub_category) {

                  if ($sub_category->{$category_oname}) {
                      foreach ($sub_category->{$category_oname} as $sub_sub_category) {
                          $array[$sub_sub_category->id] = $asModel ? $sub_sub_category : $sub_sub_category->nameWithParentCategories;
                      }
                  } else {
                      $array[$sub_category->id] = $asModel ? $sub_category : $sub_category->nameWithParentCategories;
                  }
              }
          } else {
                  $array[$category->id] = $asModel ? $category : $category->nameWithParentCategories;
          }
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTopCategory($index=false, $activeOnly=true, $extId=null) {
      $model = Category::find()->where(['category_id' => null])->orderBy(['seq'=>SORT_ASC, 'id'=>SORT_ASC]);
      if ($activeOnly)
        $model->andWhere(['status' => 1]);
      $model = $model->all();

      $array = [];

      $category_oname = $activeOnly ? 'activeCategories' : 'categories';

      foreach ($model as $category) {
          if ($extId != $category->id) {
              $array[$category->id] = $category->name;
              if ($category->{$category_oname}) {
                  foreach ($category->{$category_oname} as $sub_category) {
                      if ($extId != $sub_category->id) {
                          $array[$sub_category->id] = $sub_category->nameWithParentCategories;
                      }
                  }
              }
          }
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getRankingList($index = false) {
      $array = [
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10'
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getOrderDeliveryMethod($index = false) {
      $array = [
          Order::DELIVERY_METHOD_PICKUP => Yii::t('app', 'Self Pick-up'), // 自取
          Order::DELIVERY_METHOD_DELIVERY => Yii::t('app', 'Delivery'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getOrderDeliverySelfpickupLocation($index = false) {
      $array = [];
      $models = \common\models\SelfpickupLocation::find()->where(['status' => 1])->orderBy(['seq' => SORT_ASC])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getOrderDeliverySelfpickupLocationDetail($index = false) {
      $array = [];
      $models = \common\models\SelfpickupLocation::find()->where(['status' => 1])->orderBy(['seq' => SORT_ASC])->all();
      $array = ArrayHelper::map($models, 'id', function($model) {
          return ['data-location' => $model->location];
        });
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getDeliveryAddressDistrict($index = false) {
      $array = [
/*
          1 => Yii::t('definitions', 'Hong Kong'),
          2 => Yii::t('definitions', 'Kowloon'),
          3 => Yii::t('definitions', 'New Territories'),
*/
          101 => Yii::t('district', 'Central and Western'), // 中西區
          102 => Yii::t('district', 'Eastern'), // 東區
          103 => Yii::t('district', 'Southern'), // 南區
          104 => Yii::t('district', 'Wan Chai'), // 灣仔區
          201 => Yii::t('district', 'Sham Shui Po'), // 深水埗區
          202 => Yii::t('district', 'Kowloon City'), // 九龍城區
          203 => Yii::t('district', 'Kwun Tong'), // 觀塘區
          204 => Yii::t('district', 'Wong Tai Sin'), // 黃大仙區
          205 => Yii::t('district', 'Yau Tsim Mong'), // 油尖旺區
          301 => Yii::t('district', 'Islands'), // 離島區
          302 => Yii::t('district', 'Kwai Tsing'), // 葵青區
          303 => Yii::t('district', 'North'), // 北區
          304 => Yii::t('district', 'Sai Kung'), // 西貢區
          305 => Yii::t('district', 'Sha Tin'), // 沙田區
          306 => Yii::t('district', 'Tai Po'), // 大埔區
          307 => Yii::t('district', 'Tsuen Wan'), // 荃灣區
          308 => Yii::t('district', 'Tuen Mun'), // 屯門區
          309 => Yii::t('district', 'Yuen Long') // 元朗區
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getDeliveryAddressDistrictWithGroup($index = false) {
      $array = [
          Yii::t('district', 'Hong Kong Island') => [
            101 => Yii::t('district', 'Central and Western'), // 中西區
            102 => Yii::t('district', 'Eastern'), // 東區
            103 => Yii::t('district', 'Southern'), // 南區
            104 => Yii::t('district', 'Wan Chai'), // 灣仔區
          ],
          Yii::t('district', 'Kowloon') => [
            201 => Yii::t('district', 'Sham Shui Po'), // 深水埗區
            202 => Yii::t('district', 'Kowloon City'), // 九龍城區
            203 => Yii::t('district', 'Kwun Tong'), // 觀塘區
            204 => Yii::t('district', 'Wong Tai Sin'), // 黃大仙區
            205 => Yii::t('district', 'Yau Tsim Mong'), // 油尖旺區
          ],
          Yii::t('district', 'New Territories') => [
            301 => Yii::t('district', 'Islands'), // 離島區
            302 => Yii::t('district', 'Kwai Tsing'), // 葵青區
            303 => Yii::t('district', 'North'), // 北區
            304 => Yii::t('district', 'Sai Kung'), // 西貢區
            305 => Yii::t('district', 'Sha Tin'), // 沙田區
            306 => Yii::t('district', 'Tai Po'), // 大埔區
            307 => Yii::t('district', 'Tsuen Wan'), // 荃灣區
            308 => Yii::t('district', 'Tuen Mun'), // 屯門區
            309 => Yii::t('district', 'Yuen Long') // 元朗區
          ]
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    /*
    public static function getPaymentMethod($index = false) {
      $array = [
//           Order::PAYMENT_CREDIT_CARD => Yii::t('app', 'Credit Card'),
          Order::PAYMENT_JETCO => Yii::t('app', 'Credit Card'),
          Order::PAYMENT_CASH => Yii::t('app', 'Cash'),
//           Order::PAYMENT_CHEQUE => Yii::t('app', 'Cheque'),
//           Order::PAYMENT_PAYPAL => Yii::t('app', 'PayPal'),
//           Order::PAYMENT_BANKIN => Yii::t('app', 'Direct Bank-in'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    */

    public static function getOrderStatus($index = false, $min_status = 0, array $includeStatus = []) {
      $array = [
        Order::STATUS_CANCELED => Yii::t('definitions', 'Canceled'),
        Order::STATUS_START => Yii::t('definitions', 'Shopping'),
        Order::STATUS_CHECKOUT => Yii::t('definitions', 'Checkout processing'),
        Order::STATUS_CHECKOUT_FORM_SUBMITED => Yii::t('definitions', 'Checkout form submitted'),
        Order::STATUS_CHECKOUT_SUBMITED => Yii::t('definitions', 'Checkout submitted'),
        Order::STATUS_CHECKOUT_DONE => Yii::t('definitions', 'Checkout done'),
        Order::STATUS_CHECKOUT_PAYMENT => Yii::t('definitions', 'Payment processing'),
        Order::STATUS_CREDIT_CARD_PAYMENT => Yii::t('definitions', 'Credit cart payment processing'),
        Order::STATUS_CREDIT_CARD_PAYMENT_FAILED => Yii::t('definitions', 'Credit cart payment failed'),
        Order::STATUS_ORDER_SUBMITED => Yii::t('definitions', 'Order submitted'),
        Order::STATUS_WAITING_FOR_BANKIN => Yii::t('definitions', 'Waiting for Direct Bank-in'),
        Order::STATUS_WAITING_FOR_CONFIRM_BANKIN => Yii::t('definitions', 'Waiting for Direct Bank-in confirmation'),
        Order::STATUS_WAITING_FOR_CONFIRM => Yii::t('definitions', 'Waiting for confirmation'),
        Order::STATUS_CONFIRMED => Yii::t('definitions', 'Confirmed'),
        Order::STATUS_TO_BE_SHIPPED => Yii::t('definitions', 'To be shipped'),
        Order::STATUS_SHIPPED => Yii::t('definitions', 'Shipped'),
        Order::STATUS_END => Yii::t('definitions', 'Finish'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_status && $array_index >= 0 && !in_array($array_index, $includeStatus))
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getJetcoPaymentStatus($index = false) {
      $array = [
          'NULL' => '(未設定)',
          'AP' => 'Transaction Approved',
          'RJ' => 'Rejected',
          'TO' => 'Timeout',
          'CC' => 'Transaction cancelled by user',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getOrderItemQty($index = false, $max = 50, $value = null) {
        $array = [];
        if ($max == null || $max > 50)
            $max = 50;

        for ($i=1; $i<=$max; $i++)
            $array[$i] = $i;

        if ($value > $max)
            $array[$value] = $value;

        return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTemple($index = false) {
      $array = [];
      $models = \common\models\Temple::find()->orderBy(['seq' => SORT_ASC])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getTempleServicesGroup($index = false) {
      $array = [];
      $models = \common\models\TempleServicesGroup::find()
                    ->joinWith('temple')
                    ->orderBy(['temple.seq' => SORT_ASC, 'temple_servicesGroup.seq' => SORT_ASC])
                    ->all();
      $array = ArrayHelper::map($models, 'id', 'nameWithTemple');
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getTempleServiceMessageTextOrientation($index = false) {
      $array = [
          OrderTempleService::TEXTORIENTATION_H => Yii::t('templeService','Horizontal'),
          OrderTempleService::TEXTORIENTATION_V => Yii::t('templeService','Vertical'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTempleServiceMessageFontSize($index = false) {
      $array = [
          OrderTempleService::FONTSIZE_S => Yii::t('templeService','Small'),
          OrderTempleService::FONTSIZE_M => Yii::t('templeService','Middle'),
          OrderTempleService::FONTSIZE_L => Yii::t('templeService','Large'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTempleServiceMessagePaperConfig($index = false) {
      $array = [
          0 => Yii::t('templeService', 'Undefined'),
          1 => '塔香卡（9.8cm x 16cm）',
          2 => '宮燈卡（7cm x 19.2cm）',
          3 => '謝大將軍／范大將軍',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTempleServicesGroupGroupByTemple() {
      $array = [];
      $models = \common\models\Temple::find()
                    ->orderBy(['seq' => SORT_ASC])
                    ->all();
      foreach ($models as $model) {
          $array[$model->name] = ArrayHelper::map($model->getServicesGroups()->orderBy(['seq' => SORT_ASC])->all(), 'id', 'name');
      }
      return $array;
    }

    public static function getOrderTempleServiceStatus($index = false, $min_status = 0) {
      $array = [
        OrderTempleService::STATUS_CANCELED => Yii::t('definitions', 'Canceled'),
        OrderTempleService::STATUS_START => Yii::t('definitions', 'Start'),
        OrderTempleService::STATUS_WAITING_FOR_CONFIRM => Yii::t('definitions', 'Waiting for confirmation'),
        OrderTempleService::STATUS_CONFIRMED => Yii::t('definitions', 'Confirmed'),
        OrderTempleService::STATUS_END => Yii::t('definitions', 'Finish'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_status && $array_index >= 0)
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getBooking($index = false) {
      $array = [];
      $models = \common\models\Booking::find()
                    ->orderBy(['name_tw' => SORT_ASC])
                    ->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getBookingLevelByBooking() {
      $array = [];
      $models = \common\models\Booking::find()
                    ->orderBy(['name_tw' => SORT_ASC])
                    ->all();
      foreach ($models as $model) {
          $array[$model->name] = ArrayHelper::map($model->getLevels()->orderBy(['seq' => SORT_ASC])->all(), 'id', 'name');
      }
      return $array;
    }

    public static function getBookingRecordStatus($index = false, $min_status = 0) {
      $array = [
        OrderBooking::STATUS_CANCELED => Yii::t('definitions', 'Canceled'),
//         OrderBooking::STATUS_CREDIT_CARD_PAYMENT_FAILED => Yii::t('definitions', 'Credit cart payment failed'),
//         OrderBooking::STATUS_CREDIT_CARD_PAYMENT => Yii::t('definitions', 'Credit cart payment processing'),
        OrderBooking::STATUS_WAITING_FOR_CONFIRM => Yii::t('definitions', 'Waiting for confirmation'),
        OrderBooking::STATUS_CONFIRMED => Yii::t('definitions', 'Confirmed'),
        OrderBooking::STATUS_END => Yii::t('definitions', 'Finish'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_status && $array_index >= 0)
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTempleTreasuryOpeningBorrowType($index = false) {
      $array = [
          TempleTreasuryOpening::BORROW_TYPE_1 => Yii::t('treasuryOpening','上環列聖宮'),
          TempleTreasuryOpening::BORROW_TYPE_2 => Yii::t('treasuryOpening','慈雲山觀音佛堂'),
          TempleTreasuryOpening::BORROW_TYPE_3 => Yii::t('treasuryOpening','山東街水月宮'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getTreasuryOpeningType($index = false) {
      $array = [
          OrderTreasuryOpening::TYPE_BORROW => Yii::t('treasuryOpening','代善信借庫'),
          OrderTreasuryOpening::TYPE_RETURN => Yii::t('treasuryOpening','代善信還庫'),
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getTreasuryOpeningRecordStatus($index = false, $min_status = 0) {
      $array = [
        OrderTreasuryOpening::STATUS_CANCELED => Yii::t('definitions', 'Canceled'),
//         OrderTreasuryOpening::STATUS_CREDIT_CARD_PAYMENT_FAILED => Yii::t('definitions', 'Credit cart payment failed'),
//         OrderTreasuryOpening::STATUS_CREDIT_CARD_PAYMENT => Yii::t('definitions', 'Credit cart payment processing'),
        OrderTreasuryOpening::STATUS_WAITING_FOR_CONFIRM => Yii::t('definitions', 'Waiting for confirmation'),
        OrderTreasuryOpening::STATUS_CONFIRMED => Yii::t('definitions', 'Confirmed'),
        OrderTreasuryOpening::STATUS_END => Yii::t('definitions', 'Finish'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_status && $array_index >= 0)
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getTreasuryOpeningByTemple() {
      $array = [];
      $models = \common\models\Temple::find()
                    ->orderBy(['seq' => SORT_ASC])
                    ->all();
      foreach ($models as $model) {
          $array[$model->name] = ArrayHelper::map($model->getTreasuryOpening()->orderBy(['name_tw' => SORT_ASC])->all(), 'id', 'name');
      }
      return $array;
    }

    public static function getEdmType($index = false) {
      $array = [
        Edm::TYPE_EMAIL => Yii::t('edm', 'Email'),
        Edm::TYPE_SMS => Yii::t('edm', 'SMS'),
      ];

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getEdmStatus($index = false) {
      $array = [
        Edm::STATUS_CANCELLED => Yii::t('edm', 'Cancelled'),
        Edm::STATUS_NORMAL => Yii::t('edm', 'Normal'),
        Edm::STATUS_SENDING => Yii::t('edm', 'Sending'),
        Edm::STATUS_DONE => Yii::t('edm', 'Done'),
      ];

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getEdmRecipientStatus($index = false) {
      $array = [
        EdmRecipient::STATUS_WAITING => Yii::t('edm', 'Waiting to send'),
        EdmRecipient::STATUS_SENDING => Yii::t('edm', 'Sending'),
        EdmRecipient::STATUS_SUCCESS => Yii::t('edm', 'Succeeded'),
        EdmRecipient::STATUS_FAIL => Yii::t('edm', 'Failed'),
      ];

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getHomeProductTypes($index = false) {
      $array = [
        HomeProduct::TYPE_TS => Yii::t('templeService', 'Template Services'),
      ];

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    
    public static function getFasCode($index = false) {
      $array = [];
      $models = \common\models\FasCode::find()->orderBy(['seq'=>SORT_ASC, 'id' => SORT_ASC])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index==NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getHomeMenuList($index=false) {
      $models = \common\models\Menu::find()->where(['page_type' => 3])->orwhere(['page_type' => 6])->orderBy(['seq' => 'ASC'])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      $array = array_map(function($v) { return strip_tags($v); }, $array);

      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getHomeMenuType1List($index=false) {
      $models = \common\models\Menu::find()->where(['page_type' => 1])->orderBy(['seq' => 'ASC'])->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      $array = array_map(function($v) { return strip_tags($v); }, $array);

      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }

    public static function getIsAttend($index = false) {
      $array = [
        0 => '未取掛牌',
        1 => '已取掛牌',
      ];

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getPrefix($index = false) {
      $array = [
        'Prof.' => 'Prof.',
        'Dr.'  => 'Dr.',
        'Mr.'  => 'Mr.',
        'Mrs.' => 'Mrs.',
        'Ms.'  => 'Ms.',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function setCode($prefix, $length, $id) {
      if ($length > strlen($id)) {
        $no_of_zero = $length - strlen($id);
      } else {
        $no_of_zero = 0;
      }
      return str_pad($prefix, $no_of_zero, '0').$id;
    }

    public static function getRegistrationStatus($index = false, $min_status = 0) {
      $array = [
        \common\models\Registration::STATUS_CANCELED => Yii::t('definitions', 'Canceled'),
        \common\models\Registration::STATUS_FORM_SUBMITTED => Yii::t('definitions', 'Form submitted'),
        \common\models\Registration::STATUS_ONLINE_PAYMENT_FAILED => Yii::t('definitions', 'Online payment failed'),
        \common\models\Registration::STATUS_ONLINE_PAYMENT => Yii::t('definitions', 'Online payment processing'),
        \common\models\Registration::STATUS_WAITING_FOR_CONFIRM => Yii::t('definitions', 'Waiting for confirmation'),
        \common\models\Registration::STATUS_CONFIRMED => 'Payment '.Yii::t('definitions', 'Confirmed'),
        // \common\models\Registration::STATUS_END => Yii::t('definitions', 'Finish'),
      ];

      foreach ($array as $array_index => $array_value) {
          if ($array_index < $min_status && $array_index >= 0)
            unset($array[$array_index]);
      }

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getPresentationType($index = false) {
      $array = [
        1 => 'Oral Presentation',
        2 => 'Poster Presentation',
        3 => 'No Preference',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getTheme($index = false) {
      $array = [
        1  => 'Stroke Epidemiology',
        2  => 'Heart & Brain',
        3  => 'Extracranial & Intracranial Atherosclerosis',
        4  => 'Small Vessel Disease And Vascular Cognitive Impairment',
        5  => 'Cerebral Hemorrhage',
        6  => 'Basic Neuroscience In Stroke & Translational Research',
        7  => 'Mechanical Thrombectomy & Neurointervention',
        8  => 'IV Thrombolysis',
        9  => 'Stroke Neuroimaging',
        10 => 'Vascular Sonology',
        11 => 'Stroke Genetics And Other Risk Factors (e.g Environmental)',
        12 => 'Antithrombotic Therapy',
        13 => 'Secondary Risk Factors Control',
        14 => 'Rehabilitation & Restorative Therapy In Stroke',
        15 => 'Stroke Services / Quality Improvement',
        16 => 'Clinical Trials (Including Late Breaking)',
        17 => 'Stroke Nursing',
        18 => 'Rare Causes Of Stroke',
        19 => 'Others',
      ];

      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getAbstractStatus($index = false) {
      $setting_model = \common\models\Setting::findOne(1);

      $current_timestamp = time();
      $ab_close_timestamp = strtotime($setting_model->ab_close);

      $icon = $current_timestamp < $ab_close_timestamp ? ' <i class=\'fa fa-exclamation-triangle\'></i>' : '';

      $array = [
        1 => 'Draft',
        2 => 'Submitted'.$icon,
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getAbstractStatusNoIcon($index = false) {
      $array = [
        1 => 'Draft',
        2 => 'Submitted',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getIsRegistered($index = false) {
      $array = [
        1 => 'I confirm that I have already registered for APSC 2023.',
        2 => 'I haven’t register for APSC 2023 and agree to register upon receiving the abstract acceptance notice from the Organizer.',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getProfessions($index = false) {
      $array = [
        1 => 'Doctor',
        2 => 'Nurse',
        3 => 'Trainee',
        4 => 'Allied Health Professional',
        5 => 'Dietitian',
        6 => 'Physiotherapist',
        7 => 'Exhibitor',
        8 => 'Intern / Student',
        9 => 'Other',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getSpecialty($index = false) {
      $array = [
        1  => 'Not Applicable',
        2  => 'Administrative Medicine',
        3  => 'Anaesthesiology',
        4  => 'Anatomical Pathology',
        5  => 'Cardiology',
        6  => 'Cardio-thoracic Surgery',
        7  => 'Chemical Pathology',
        8  => 'Clinical Microbiology and Infection',
        9  => 'Clinical Oncology',
        10 => 'Clinical Pharmacology & Therapeutics',
        11 => 'Clinical Toxicology',
        12 => 'Community Medicine',
        13 => 'Critical Care Medicine',
        14 => 'Dermatology & Venereology',
        15 => 'Developmental-Behavioural Paediatrics',
        16 => 'Emergency Medicine',
        17 => 'Endocrinology, Diabetes & Metabolism',
        18 => 'Family Medicine',
        19 => 'Forensic Pathology',
        20 => 'Gastroenterology & Hepatology',
        21 => 'General Surgery',
        22 => 'Genetic and Genomic Pathology',
        23 => 'Genetics and Genomics (Paediatrics)',
        24 => 'Geriatric Medicine',
        25 => 'Gynaecological Oncology',
        26 => 'Haematology',
        27 => 'Haematology & Haematological Oncology',
        28 => 'Immunology',
        29 => 'Immunology & Allergy',
        30 => 'Infectious Disease',
        31 => 'Intensive Care',
        32 => 'Internal Medicine',
        33 => 'Maternal & Fetal Medicine',
        34 => 'Medical Oncology',
        35 => 'Nephrology',
        36 => 'Neurology',
        37 => 'Neurosurgery',
        38 => 'Nuclear Medicine',
        39 => 'Obstetrics & Gynaecology',
        40 => 'Occupational and Environmental Medicine',
        41 => 'Ophthalmology',
        42 => 'Orthopaedics & Traumatology',
        43 => 'Otorhinolaryngology',
        44 => 'Paediatric Endocrinology',
        45 => 'Paediatric Immunology, Allergy and Infectious Diseases',
        46 => 'Paediatric Neurology',
        47 => 'Paediatric Respiratory Medicine',
        48 => 'Paediatric Surgery',
        49 => 'Paediatrics',
        50 => 'Pain Medicine',
        51 => 'Palliative Medicine',
        52 => 'Pathology',
        53 => 'Plastic Surgery',
        54 => 'Psychiatry',
        55 => 'Public Health Medicine',
        56 => 'Radiology',
        57 => 'Rehabilitation',
        58 => 'Reproductive Medicine',
        59 => 'Respiratory Medicine',
        60 => 'Rheumatology',
        61 => 'Urogynaecology',
        62 => 'Urology',
        63 => 'Vascular Surgery',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getDietary($index = false) {
      $array = [
        1 => 'Beef-free',
        2 => 'Pork-free',
        3 => 'Vegetarian',
        4 => 'No Specific Preference',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getStatement($index = false) {
      $array = [
        1 => 'I agree to forward my contact details to APSC and HKSS for future scientific activities.',
        2 => 'I do not agree to forward my contact details to APSC and HKSS for future scientific activities.',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getIsRefund($index = false) {
      $array = [
        // 1 => 'I wish to apply for Registration Fee Refund at the conference venue during the conference. I confirm that I am a student participant from Hong Kong SAR OR Lower Income (LIC) and Lower Middle Income (LMIC) who submitted an abstract to APSC 2023. I understand that only participants whose abstract is being accepted will be considered for a Registration Fee Refund, and the decision of the Organizers on the refund arrangements shall be final and conclusive. I confirm that I am 40 years old or below during the time when the conference take place. Documents for proof of student status issued by qualified institution (e.g. Student ID Card / confirmation letter) will be uploaded here.',
        1 => 'I wish to apply for Registration Fee Refund at the conference venue during the conference.',
        //  I confirm that I am a student participant from Hong Kong SAR OR Lower Income (LIC) and Lower Middle Income (LMIC) who submitted an abstract to APSC 2023. I understand that only participants whose abstract is being accepted will be considered for a Registration Fee Refund, and the decision of the Organizers on the refund arrangements shall be final and conclusive. I confirm that I am 40 years old or below during the time when the conference take place. Documents for proof of student status issued by qualified institution (e.g. Student ID Card / confirmation letter) will be uploaded here.',
        2 => 'I am NOT eligible for the Registration Fee Refund.',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getHotel($index = false) {
      $array = [
        1 => 'Hyatt Regency Hong Kong, Sha Tin (Official reservation link with special room rate will be sent to you by email)',
        // 2 => 'Courtyard by Marriott Hong Kong, Sha Tin (Official reservation link with special room rate will be sent to you by email)',
        // 3 => 'Alva Hotel by Royal (Official reservation link with special room rate will be sent to you by email)',
        4 => 'I will choose other hotels / accommodations during my stay',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getPaymentMethodDetail($index = false) {
      $array = [
        1 => 'Paypal',
        2 => 'Cheque (For Hong Kong participants only. Please make cheque payable to "The Hong Kong Stroke Society Limited" and send to APSC 2023 Congress Secretariat, Room C, 3/F, Worldwide Centre, 123 Tung Chau Street, Kowloon)',
        3 => 'Bank Transfer or Payme (For Hong Kong participants only. Information will be provided upon successful registration)',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getPaymentMethod($index = false) {
      $array = [
        1 => 'Paypal',
        2 => 'Cheque',
        3 => 'Bank Transfer',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getPaymentMethodDetailNoPaypal($index = false) {
      $array = [
        // 1 => 'Paypal',
        2 => 'Cheque (For Hong Kong participants only. Please make cheque payable to "The Hong Kong Stroke Society Limited" and send to APSC 2023 Congress Secretariat, Room C, 3/F, Worldwide Centre, 123 Tung Chau Street, Kowloon)',
        3 => 'Bank Transfer or Payme (For Hong Kong participants only. Information will be provided upon successful registration)',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getRegistrationFeeLabel($index = false) {
      $array = [
        1  => 'Early Bird - Low to Lower Middle Income Countries (Physician)',
        2  => 'Early Bird - Low to Lower Middle Income Countries (Non-physician)',
        3  => 'Early Bird - Upper Middle to High Income Countries (Physician)',
        4  => 'Early Bird - Upper Middle to High Income Countries (Non-physician)',
        5  => 'Early Bird - Local Participant HKSS Member (Physician)',
        6  => 'Early Bird - Local Participant HKSS Member (Non-hysician)',
        7  => 'Early Bird - Local Participant Non-HKSS Member (Physician)',
        8  => 'Early Bird - Local Participant Non-HKSS Member (Non-hysician)',
        9  => 'Regular - Low to Lower Middle Income Countries (Physician)',
        10 => 'Regular - Low to Lower Middle Income Countries (Non-physician)',
        11 => 'Regular - Upper Middle to High Income Countries (Physician)',
        12 => 'Regular - Upper Middle to High Income Countries (Non-physician)',
        13 => 'Regular - Local Participant HKSS Member (Physician)',
        14 => 'Regular - Local Participant HKSS Member (Non-hysician)',
        15 => 'Regular - Local Participant Non-HKSS Member (Physician)',
        16 => 'Regular - Local Participant Non-HKSS Member (Non-hysician)',
        17 => 'Late & Onsite - Low to Lower Middle Income Countries (Physician)',
        18 => 'Late & Onsite - Low to Lower Middle Income Countries (Non-physician)',
        19 => 'Late & Onsite - Upper Middle to High Income Countries (Physician)',
        20 => 'Late & Onsite - Upper Middle to High Income Countries (Non-physician)',
        21 => 'Late & Onsite - Local Participant HKSS Member (Physician)',
        22 => 'Late & Onsite - Local Participant HKSS Member (Non-hysician)',
        23 => 'Late & Onsite - Local Participant Non-HKSS Member (Physician)',
        24 => 'Late & Onsite - Local Participant Non-HKSS Member (Non-hysician)',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getRegistrationFeeAmount($index = false) {
      $array = [
        1  => 300,
        2  => 150,
        3  => 450,
        4  => 300,
        5  => 150,
        6  => 40,
        7  => 200,
        8  => 60,
        9  => 400,
        10 => 250,
        11 => 500,
        12 => 350,
        13 => 200,
        14 => 80,
        15 => 250,
        16 => 100,
        17 => 500,
        18 => 350,
        19 => 600,
        20 => 450,
        21 => 250,
        22 => 100,
        23 => 300,
        24 => 120,
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getPaymentStatus($index = false) {
      $array = [
        'start' => 'Start',
        'waiting' => 'Waiting',
        'done' => 'Done',
        'cancel' => 'Cancel',
        'fail' => 'Fail',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }

    public static function getIsAbstractEditable($index = false) {
      $setting_model = \common\models\Setting::findOne(1);

      $current_timestamp = time();
      $ab_close_timestamp = strtotime($setting_model->ab_close);

      return $current_timestamp < $ab_close_timestamp;
    }
    public static function getIsYoung($index = false) {
      $array = [
        1 => 'Eligible',
        2 => 'Not eligible',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getResult($index = false) {
      $array = [
        1 => 'Accept',
        2 => 'Reject',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getAcceptType($index = false) {
      $array = [
        1 => 'Poster',
        2 => 'Oral',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getCheckIsRegistered($index = false) {
      $array = [
        1 => 'Yes',
        0 => 'No',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getIsVip($index = false) {
      $array = [
        1 => 'Yes',
        2 => 'No',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getCheckIsAbstracted($index = false) {
      $array = [
        1 => 'Yes',
        0 => 'No',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getFacultyDinner($index = false) {
      $array = [
        1 => 'Yes',
        0 => 'No',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getPaymentEmailType($index = false) {
      $array = [
        1 => '提醒付款',
        2 => '確認註冊',
        3 => 'VIP 確認註冊',
      ];
      return $index !== false ? ($index===NULL || !isset($array[$index]))? NULL: $array[$index] : $array;
    }
    public static function getRegistration($index = false) {
      $array = [];
      $models = \common\models\Registration::find()->all();
      $array = ArrayHelper::map($models, 'id', 'name');
      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }
    public static function getSubmittedAbstract($index = false) {
      $array = [];
      $models = \common\models\CallForAbstract::find()->where(['abstract_status' => CallForAbstract::ABSTRACT_STATUS_SUBMITTED])->all();
      $array = ArrayHelper::map($models, 'id', 'abstractNoWithName');
      return $index !== false ? ($index===NULL || !isset($array[$index]))? '': $array[$index] : $array;
    }
}