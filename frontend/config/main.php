<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'language' => \common\models\Config::GetLanguage(),
    'sourceLanguage' => 'en-US',
    'timeZone' => 'Asia/Hong_Kong',

    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            // 'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web'=> '/frontend/web',    
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
          ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend_apsc_user', 'httpOnly' => true],
        ],
        'staff' => [
            'class'=>'yii\web\User',
            'identityClass' => 'common\models\Staff',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend_apsc_staff', 'httpOnly' => true],
            'idParam' => '__id_staff',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend_apsc',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''                          => 'site/index',
                'home'                      => 'site/index',
                'contact'                   => 'site/contact',
                'staff-login'               => 'site/staff-login',
                'login'                     => 'site/login',
                'logout'                    => 'site/logout',
                'forget-password'           => 'site/forget-password',
                'reset-password'            => 'site/reset-password',
                'verify-email'              => 'site/verify-email',
                'resend-verification-email' => 'site/resend-verification-email',
                'call-for-abstract'         => 'call-for-abstract/index',
                'signup'                    => 'site/signup',
                'my'                        => 'my/index',
                'my/<action:\w+>'           => 'my/<action>',
                'registration'              => 'registration/index',
                'registration/<action:\w+>' => 'registration/<action>',
                'payment'                   => 'payment/index',
                'programme'                => 'site/programme',
                'thank-you'                 => 'site/thank-you',
                '<page:[a-zA-Z0-9-]+>'      => 'site/page',
            ],
        ],
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV3' => '6LczjKUkAAAAAKxHEpiiYd1QWFrg7VA5hjmukHBM',
            'secretV3' => '6LczjKUkAAAAAACJLXf7W4N7fOeuXpnOnJJmdlU7',
        ],
    ],
    'params' => $params,
];
