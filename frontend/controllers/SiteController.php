<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
// use frontend\models\SignupForm;
use frontend\models\ContactForm;

use common\models\Menu;
use frontend\models\LoginForm;
use frontend\models\UserRegistrationForm;

/**
 * Site controller
 */
class SiteController extends \common\components\BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => [],
                    ],
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                // 'class' => 'yii\captcha\CaptchaAction',
                // 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'class' => 'common\components\NumberCaptcha',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'foreColor' => 0xD35A4E,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProgramme()
    {
        return $this->render('programme');
    }

    public function actionPage()
    {
      $basename = basename(\yii\helpers\Url::current());
      $basename_temp = explode("?", $basename);
      $url_name = $basename_temp[0];

      $model = Menu::find()->where(['url' => $url_name])->one();
      if($model==NULL)throw new \yii\web\NotFoundHttpException('#404 Page Not Found');

      return $this->render('page',['model'=>$model]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin($rd=null)
    {
        // $return_url = Yii::$app->request->referrer;

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/my/home']);
        }

        $login_model = new \frontend\models\LoginForm();

        try {
            if ($login_model->load(Yii::$app->request->post()) && $login_model->login()) {
                // if ($rd != null)
                //     return $this->redirect($rd);
                return $rd != null ? $this->redirect($rd) : $this->redirect(['/my/home']);
            }
        } catch (UserException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        $login_model->password = null;
        $login_model->verifyCode = null;

        return $this->render('login', [
            'login_model' => $login_model,
        ]);
    }

    public function actionStaffLogin($rd=null)
    {
        if ($rd == null) {
            return $this->redirect(['/']);
        }
        // $return_url = Yii::$app->request->referrer;

        if (!Yii::$app->staff->isGuest) {
            return $this->redirect($rd);
        }

        $login_model = new \frontend\models\StaffLoginForm();

        try {
            if ($login_model->load(Yii::$app->request->post()) && $login_model->login()) {
                // if ($rd != null)
                return $this->redirect($rd);
            }
        } catch (UserException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        $login_model->password = null;
        $login_model->verifyCode = null;

        return $this->render('staff-login', [
            'login_model' => $login_model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        if (!Yii::$app->staff->isGuest) {
            Yii::$app->staff->logout();

            return $this->goHome();
        }

        Yii::$app->user->logout();
        
        return $this->redirect('login');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        // $model = new ContactForm();
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
        //         Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
        //     } else {
        //         Yii::$app->session->setFlash('error', 'There was an error sending your message.');
        //     }

        //     return $this->refresh();
        // }

        return $this->render('contact', [
            // 'model' => $model,
        ]);
    }

    public function actionThankYou()
    {
        return $this->render('thank-you');
    }
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        // $model = new SignupForm();
        // if ($model->load(Yii::$app->request->post()) && $model->signup()) {
        //     Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
        //     return $this->goHome();
        // }

        // return $this->render('signup', [
        //     'model' => $model,
        // ]);

        $return_url = Yii::$app->request->referrer;

        if (!Yii::$app->user->isGuest) {
            return $this->goBack();
        }

        // $registration_model = new UserRegistrationForm(['scenario' => UserRegistrationForm::SCENARIO_WEB]);
        $registration_model = new UserRegistrationForm();

        if ($registration_model->load(Yii::$app->request->post()) && $registration_model->submit()) {
            return $this->redirect(['login']);
        }

        $registration_model->new_password = null;
        $registration_model->re_new_password = null;
        // $registration_model->verifyCode = null;

        return $this->render('signup', [
            'registration_model' => $registration_model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
