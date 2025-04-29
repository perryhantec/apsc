<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Security;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use common\components\StaffAccessRule;
// use common\models\Config;
use frontend\models\RegistrationForm;

/**
 * Checkout controller
 */
class RegistrationController extends \common\components\BaseController
{
//     public $layout = 'blank';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
			            'class' => StaffAccessRule::className(),
			        ],
                'rules' => [
                    [
                        // 'actions' => ['index', 'form', 'thank-you', 'confirm', 'attend'],
                        'actions' => ['index', 'form', 'check-form', 'thank-you', 'attend'],
                        'allow' => true,
                        // 'roles' => ['$'],
                        'roles' => [],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                     'payment' => ['POST'],
                ],
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            // 'model' => $model
        ]);
    }

    public function actionForm()
    {
        $model = new RegistrationForm;

        $test = 1;

        if ($test) {
            $model->title = 'Mr.';
            $model->last_name = 'Wong';
            $model->first_name = 'Hong';
            $model->institution = 'efaith';
            $model->email = 'hong.wong@efaith.com.hk';
            $model->re_email = 'hong.wong@efaith.com.hk';
            $model->country_code = '852';
            $model->mobile = '60171951';
            $model->professions = 9;
            $model->specialty = 1;
            $model->statement = 1;
            $model->is_refund = 2;
        }


        if ($model == null)
            throw new \yii\web\HttpException(400, Yii::t('app', 'Error! Please try again.'));

        $session = Yii::$app->session;

        if ($model->load(Yii::$app->request->post())) {
            // $model->file_name = \yii\web\UploadedFile::getInstance($model, 'file_name');
            $uploaded_file_name = \yii\web\UploadedFile::getInstance($model, 'file_name');

            if ($model->saveContent()) {
                if ($model->payment_method == $model::PAYMENT_METHOD_PAYPAL) {
                    $session['registration_id--to_payment'] = $model->id;

                    return $this->redirect(['/payment']);    
                } else {
                    $model->sendSubmittedEmail();
                    // $donation_model->afterConfirmed();
                    // $session['paid'] = true;
                    // $session['paid_registration_id'] = $registration_model->id;

                    return $this->redirect(['thank-you']);
                }
            } else {
                // $model->current = 4;
            }

            /*
            if ($model->current < 4) {
                if ($model->is_check) {
                    if ($model->checkContent()) {
                        if ($model->return_to_summary) {
                            $model->current = 3;
                        } else {
                            $model->current++;
                        }
                    }
                }
            } else {
                if ($model->saveContent()) {
                    if ($model->payment_method == $model::PAYMENT_METHOD_PAYPAL) {
                        $session['registration_id--to_payment'] = $model->id;
    
                        return $this->redirect(['/payment']);    
                    } else {
                        $model->sendSubmittedEmail();
                        // $donation_model->afterConfirmed();
                        // $session['paid'] = true;
                        // $session['paid_registration_id'] = $registration_model->id;
    
                        return $this->redirect(['thank-you']);
                    }
                } else {
                    $model->current = 4;
                }
            }
            */

            // Yii::$app->session->setFlash('success', Yii::t('app', 'Successfully save changes.'));
            // return $this->redirect(['/thank-you']);
        }

        $model->current = 1;
        if ($model->country == '') $model->country = $model::COUNTRY_HK;
        if ($model->dinner == '') $model->dinner = 0;

        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionCheckForm()
    {
        // $data = json_encode(Yii::$app->request->post('data'));
        // return $data;

        $rslt = [];

        if (Yii::$app->request->post()) {
            $datum = Yii::$app->request->post('data');

            $statement = $is_refund = $payment_type = $terms = null;

            foreach ($datum as $data) {
                $pos = strrpos($data['name'], '[') + 1;
                $name = substr($data['name'], $pos, -1);

                if ($name == 'current')            $current            = $data['value'];
                if ($name == 'title')              $title              = $data['value'];
                if ($name == 'last_name')          $last_name          = $data['value'];
                if ($name == 'first_name')         $first_name         = $data['value'];
                if ($name == 'institution')        $institution        = $data['value'];
                if ($name == 'country')            $country            = $data['value'];
                if ($name == 'email')              $email              = $data['value'];
                if ($name == 're_email')           $re_email           = $data['value'];
                if ($name == 'mobile')             $mobile             = $data['value'];
                if ($name == 'professions')        $professions        = $data['value'];
                if ($name == 'specialty')          $specialty          = $data['value'];
                if ($name == 'statement')          $statement          = $data['value'];
                if ($name == 'is_refund')          $is_refund          = $data['value'];
                if ($name == 'file_name')          $file_name          = $data['value'];
                if ($name == 'payment_type')       $payment_type       = $data['value'];
                if ($name == 'terms')              $terms              = $data['value'];
                if ($name == 'payment_method')     $payment_method     = $data['value'];
            }

            /**** Error case ****/
            $errors = [];
    
            if ($current == 1) {
                if (!$title)              $errors['title']              = 'Title required.';
                if (!$last_name)          $errors['last_name']          = 'Last Name required.';
                if (!$first_name)         $errors['first_name']         = 'First Name required.';
                if (!$institution)        $errors['institution']        = 'Institution / Hospital required.';
                if (!$country)            $errors['country']            = 'Country required.';

                if ($email != $re_email)  $errors['email']              = 'Email Address and Verify Email Address are not the same.';
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Invalid Email Address.';
                }

                if (!filter_var($re_email, FILTER_VALIDATE_EMAIL)) {
                    $errors['re_email'] = 'Invalid Verify Email Address.';
                }

                if (!$email)              $errors['email']              = 'Email Address required.';
                if (!$re_email)           $errors['re_email']           = 'Verify Email Address required.';
                if (!$mobile)             $errors['mobile']             = 'Mobile Phone No. required.';
                if (!$professions)        $errors['professions']        = 'List Of Professions required.';
                if (!$specialty)          $errors['specialty']          = 'List Of Specialty required.';
                if (!$statement)          $errors['statement']          = 'Personal Statement required.';
                if (!$is_refund)          $errors['is_refund']          = 'Application for Registration Fee Refund required.';
                if ($file_name == 'invalid') {
                    $errors['file_name'] = true;
                }
            } else if ($current == 2) {
                if (!$payment_type)       $errors['payment_type']       = 'Registration Category required.';
            } else if ($current == 3) {
                if (!$terms)              $errors['terms']              = 'Terms And Conditions required.';
            } else if ($current == 4) {
                if (!$payment_method)     $errors['payment_method']     = 'Payment Method required.';
            }

            if (count($errors) > 0) {
                $rslt['code'] = -1;
                $rslt['errors'] = $errors;
            } else {
                $rslt['code'] = 1;
            }
        } else {
            $rslt['code'] = 0;
        }
          
        return \Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'data' => [
                'rslt' => $rslt,
            ],
        ]);
    }

    public function actionThankYou()
    {
        return $this->render('thank-you', [
            // 'model' => $model
        ]);
    }

    /*
    public function actionConfirm()
    {
        $session = Yii::$app->session;

        // Definitions::dd($session['registration'], 1);
        if (!isset($session['registration'])) {
            return $this->redirect(['index']);
        }

        $model = new RegistrationForm;

        $model->prefix = $session['registration']['prefix'];
        $model->firstname = $session['registration']['firstname'];
        $model->lastname = $session['registration']['lastname'];
        $model->email = $session['registration']['email'];
        $model->phone = $session['registration']['phone'];


        if ($model->load(Yii::$app->request->post())) {
            if ($model->saveContent()) {
                // Yii::$app->session->setFlash('success', Yii::t('app', 'Registration Submitted.'));
                unset($session['registration']);

                $session['registration_id--to_payment'] = $model->id;

                return $this->redirect(['/payment']);
            }
        }

        return $this->render('confirm', [
            'model' => $model
        ]);
    }
    */

    public function actionAttend($id = false)
    {
        if ($id == null) {
            return $this->redirect(['/']);
        }

        if (Yii::$app->staff->isGuest) {
            return $this->redirect(['/staff-login', 'rd' => Url::to(["/registration/attend", 'id' => $id])]);
        }

        $model = RegistrationForm::findOne($id);

        if (!$model) {
            return $this->redirect(['/logout']);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            return $this->refresh();
        }

        return $this->render('attend', [
            'model' => $model
        ]);
    }
}
