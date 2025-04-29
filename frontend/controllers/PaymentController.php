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
use common\models\Registration;
use common\models\Payment;
use common\models\Definitions;

/**
 * Checkout controller
 */
class PaymentController extends Controller
{
    /**
     * @inheritdoc
     */
    // const WEB_RETURN_STATUS_COMPLETED = 1;
    // const WEB_RETURN_STATUS_ABORTED = 2;
    // const WEB_RETURN_STATUS_EXPIRED = 3;
    // const WEB_RETURN_STATUS_EXPIRED_UNKNOW = 4;

    public function behaviors()
    {
        return [
//             'access' => [
//                 'class' => AccessControl::className(),
//                 'ruleConfig' => [
// 			            'class' => AccessRule::className(),
// 			        ],
//                 'rules' => [
//                     [
//                         'actions' => ['index', '1', '2', '3', 'payment', 'payment-payme-checker', 'payme'],
//                         'allow' => true,
//                         'roles' => ['$'],
//                     ],
//                     [
//                         'actions' => ['app-cashcoupon-code', 'remove-cashcoupon'],
//                         'allow' => true,
//                         'roles' => ['$'],
//                     ],
//                     [
//                         'actions' => ['return', 'donation', 'payme', 'payme-checking'],
//                         'allow' => true,
//                         'roles' => [],
//                     ],

//                 ],
//             ],
//             'verbs' => [
//                 'class' => VerbFilter::className(),
//                 'actions' => [
//                     'payment-payme-checker' => ['POST'],
//                     'jetco-payment' => ['POST'],
//                     // 'donation' => ['POST'],
//                     // 'payme' => ['POST'],
//                     'return' => ['POST'],
//                     'app-cashcoupon-code' => ['POST'],
// //                     'remove-cashcoupon' => ['POST'],
//                 ],
//             ],

            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'ruleConfig' => [
			//             // 'class' => AccessRule::className(),
			//         ],
            //     'rules' => [
            //         // [
            //         //     'actions' => ['fps', 'fps-checking'],
            //         //     'allow' => true,
            //         //     'roles' => [],
            //         // ],
            //         // [
            //         //     'actions' => ['alipayhk', 'alipayhk-checking'],
            //         //     'allow' => true,
            //         //     'roles' => [],
            //         // ],
            //         // [
            //         //     'actions' => ['donation', 'return', 'error'],
            //         //     'allow' => true,
            //         //     'roles' => [],
            //         // ],
            //         // [
            //         //     'actions' => ['order'],
            //         //     'allow' => true,
            //         //     'roles' => [],
            //         // ],

            //     ],
            // ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         // 'alipayhk-checking' => ['POST'],
            //     ],
            // ],
        ];
    }
/*
    function init()
    {
        parent::init();
        Config::RefreshSetting();
    }
*/
/*
    public function beforeAction($action)
    {
        if ($action->id == 'donation' || $action->id == 'payment') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }
*/
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function actionIndex() {
        $session = Yii::$app->session;
        $model = null;

        // $model = Registration::findOne(['id' => 1]);
        
        if (isset($session['registration_id--to_payment'])) {
            $model = Registration::findOne(['id' => $session['registration_id--to_payment']]);
            $session['registration_id--to_payment'] = null;
            unset($session['registration_id--to_payment']);
        }

        if ($model == null)
            throw new \yii\web\HttpException(403, 'The requested Item could not be found. (1001)');

        $payment_model = new Payment(['registration_id' => $model->id]);
            // $payment_model->generateInvoiceNumber();

        $model->status = Registration::STATUS_ONLINE_PAYMENT;
        $model->save(false);

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                Yii::$app->params['paypalClientID'],    // ClientID
                Yii::$app->params['paypalSecret']       // Secret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => Yii::$app->params['paypalMode'],
/*
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => true,
                'http.CURLOPT_CONNECTTIMEOUT' => 30
                'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
*/
            )
        );

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod("paypal");

        if (!isset(Yii::$app->params['paypalExperienceProfileId']) || Yii::$app->params['paypalExperienceProfileId'] == "") {
            $flowConfig = new \PayPal\Api\FlowConfig();
            // Type of PayPal page to be displayed when a user lands on the PayPal site for checkout. Allowed values: Billing or Login. When set to Billing, the Non-PayPal account landing page is used. When set to Login, the PayPal account login landing page is used.
            $flowConfig->setLandingPageType("Login");
            // The URL on the merchant site for transferring to after a bank transfer payment.
            // $flowConfig->setBankTxnPendingUrl("https://loksintong.org/");
            // When set to "commit", the buyer is shown an amount, and the button text will read "Pay Now" on the checkout page.
            $flowConfig->setUserAction("commit");
            // Defines the HTTP method to use to redirect the user to a return URL. A valid value is `GET` or `POST`.
            $flowConfig->setReturnUriHttpMethod("GET");
            // Parameters for style and presentation.
            $presentation = new \PayPal\Api\Presentation();
            // A URL to logo image. Allowed vaues: .gif, .jpg, or .png.
            // $presentation->setLogoImage(Url::to("images/logo-for-paypal.png", true))
            $presentation->setLogoImage(Url::to("images/paypal.jpg", true))
            //	A label that overrides the business name in the PayPal account on the PayPal pages.
                ->setBrandName('APSC')
            //  Locale of pages displayed by PayPal payment experience.
                ->setLocaleCode('zh_HK');
            // A label to use as hypertext for the return to merchant link.
            //     ->setReturnUrlLabel("Return")
            // A label to use as the title for the note to seller field. Used only when `allow_note` is `1`.
            //     ->setNoteToSellerLabel("Thanks!");
            // Parameters for input fields customization.
            $inputFields = new \PayPal\Api\InputFields();
            // Enables the buyer to enter a note to the merchant on the PayPal page during checkout.
            $inputFields->setAllowNote(false)
            // Determines whether or not PayPal displays shipping address fields on the experience pages. Allowed values: 0, 1, or 2. When set to 0, PayPal displays the shipping address on the PayPal pages. When set to 1, PayPal does not display shipping address fields whatsoever. When set to 2, if you do not pass the shipping address, PayPal obtains it from the buyer’s account profile. For digital goods, this field is required, and you must set it to 1.
                ->setNoShipping(1)
            // Determines whether or not the PayPal pages should display the shipping address and not the shipping address on file with PayPal for this buyer. Displaying the PayPal street address on file does not allow the buyer to edit that address. Allowed values: 0 or 1. When set to 0, the PayPal pages should not display the shipping address. When set to 1, the PayPal pages should display the shipping address.
                ->setAddressOverride(0);
            // #### Payment Web experience profile resource
            $webProfile = new \PayPal\Api\WebProfile();
            // Name of the web experience profile. Required. Must be unique
            $webProfile->setName("APSC " . uniqid())
            // Parameters for flow configuration.
            ->setFlowConfig($flowConfig)
            // Parameters for style and presentation.
            ->setPresentation($presentation)
            // Parameters for input field customization.
            ->setInputFields($inputFields)
            // Indicates whether the profile persists for three hours or permanently. Set to `false` to persist the profile permanently. Set to `true` to persist the profile for three hours.
            ->setTemporary(true);

            try {
            // Use this call to create a profile.
                $createdProfileResponse = $webProfile->create($apiContext);
                Yii::$app->params['paypalExperienceProfileId'] = $createdProfileResponse->getId();
            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            //     ResultPrinter::printError("Created Web Profile", "Web Profile", null, $request, $ex);
                echo '<pre>';
                var_dump($ex);
                echo '</pre>';
                exit(1);
            }
        }

        $returnUrl = null;
        $returnToken = null;

        // $payment_model->method = Payment::METHOD_PAYPAL_PAYMENT;

        $payment_total = 0;
        $itemList = new \PayPal\Api\ItemList();

        $paypalItem = new \PayPal\Api\Item();
        // $paypalItem->setName($model->titleForPayment)


        $item_name = Definitions::getRegistrationFeeLabel($model->payment_type);

        $registration_fee = Definitions::getRegistrationFeeAmount($model->payment_type);
        // $registration_fee = 0.1;

        $paypalItem->setName($item_name)
            ->setCurrency(Yii::$app->params['paypalCurrency'])
            ->setQuantity(1)
            ->setPrice($registration_fee);

        // if ($model->eventName != "")
            // $paypalItem->setDescription('APSC - Registration Fee');
            // $paypalItem->setDescription($model->eventName);

        $itemList->addItem($paypalItem);

        $payment_total += $registration_fee;

        if ($model->dinner > 0) {
            $gala_dinner_price = 80;
            // $gala_dinner_price = 0.05;
            $total_gala_dinner_price = $model->dinner * $gala_dinner_price;

            $paypalItem = new \PayPal\Api\Item();
            // $paypalItem->setName($model->titleForPayment)
    
            // $item_name = 'Gala Dinner * '.$model->dinner; 
            $item_name = 'Gala Dinner'; 
            $paypalItem->setName($item_name)
                ->setCurrency(Yii::$app->params['paypalCurrency'])
                ->setQuantity($model->dinner)
                ->setPrice($gala_dinner_price);
        
            $itemList->addItem($paypalItem);

            $payment_total += $total_gala_dinner_price;
        }

        $details = new \PayPal\Api\Details();
        $details->setSubtotal($payment_total);

        $amount = new \PayPal\Api\Amount();
        $amount->setCurrency(Yii::$app->params['paypalCurrency'])
            ->setTotal($payment_total)
            ->setDetails($details);

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList);
            // ->setInvoiceNumber($payment_model->invoiceNumber);

        // $_description = $item_name;
        // $_description = $model->titleForPayment;
        // if ($model->eventName != "")
            // $_description .= " - ".$model->eventName;
        // $transaction->setDescription(mb_substr($_description, 0, 127));

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(Url::to(["/payment/return", 'method' => 'paypal', 'action' => 'success'], true))
            ->setCancelUrl(Url::to(["/payment/return", 'method' => 'paypal', 'action' => 'cancel'], true));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent("sale")
//                     ->setExperienceProfileId($createdProfileResponse->getId())
            ->setExperienceProfileId(Yii::$app->params['paypalExperienceProfileId'])
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);
        try {
            $payment->create($apiContext);

            $returnUrl = $payment->getApprovalLink();
            $returnToken = $payment->getToken();

        } catch (Exception $ex) {
            print($ex);
            exit(1);
        }

        if ($returnUrl == null)
            throw new \yii\web\HttpException(400, 'Error! Please try again. (paypal1002)');

        $payment_model->status = Payment::STATUS_WAITING;
        $payment_model->token = $returnToken;
        $payment_model->save();

        return $this->redirect($returnUrl);
    }

    public function actionReturn($method, $action) {
        // print_r(Yii::$app->request->rawBody);
        $success = false;
        $returnNull = false;

        $action = strtolower($action);
        $session = Yii::$app->session;

        $model = null;

        if ($method == 'paypal') {
            $model = Payment::findOne(['token' => $_GET['token'], 'status' => Payment::STATUS_WAITING]);

            if ($model == null)
                throw new \yii\web\HttpException(400, 'Error! Please try again (paypal1003).');
                // throw new \yii\web\HttpException(400, Yii::t('error_messages', 'Error! Please try again.'));

            if ($action == 'success') {
                $apiContext = new \PayPal\Rest\ApiContext(
                    new \PayPal\Auth\OAuthTokenCredential(
                        Yii::$app->params['paypalClientID'],    // ClientID
                        Yii::$app->params['paypalSecret']       // Secret
                    )
                );
                $apiContext->setConfig(
                    array(
                        'mode' => Yii::$app->params['paypalMode'],
/*
                        'log.LogEnabled' => true,
                        'log.FileName' => '../PayPal.log',
                        'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                        'cache.enabled' => true,
                        'http.CURLOPT_CONNECTTIMEOUT' => 30
                        'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
                        'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
*/
                    )
                );

                $paymentId = $_GET['paymentId'];
                $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
                $payerId = $_GET['PayerID'];

                $execution = new \PayPal\Api\PaymentExecution();
                $execution->setPayerId($payerId);

                try {
                    $result = $payment->execute($execution, $apiContext);

                } catch (\PayPal\Exception\PayPalConnectionException $ex) {
//                         echo $ex->getCode();
                    echo $ex->getData();
                    die($ex);
                } catch (Exception $ex) {
                    die($ex);
                }

                if ($result->getState() == "approved") {
                    $transactions = $result->getTransactions();
                    $transaction = null;
                    $transaction_id = null;

                    if (sizeof($transactions) > 0)
                        $transaction = $transactions[0];

                    if ($transaction != null) {
                        $resources = $transaction->getRelatedResources();

                        if (sizeof($resources) > 0) {
                            $resource = $resources[0];
                            $sale = $resource->getSale();
                            $transaction_id = $sale->getId();
                        }
                    }

                    // if ($model->invoiceNumber != $transaction->getInvoiceNumber())
                    //     throw new \yii\web\HttpException(400, Yii::t('error_messages', 'Error! Payment not found. Please contact us.'));

                    $model->status = Payment::STATUS_DONE;
                    $model->refCode = $transaction_id;
                    // $model->addPaymentNote($result->toArray());
                    $model->addNote($result->toArray());
                    $model->save();

                    $success = true;

                } else {
                    $model->status = Payment::STATUS_FAIL;
                    $model->save();

                    Yii::$app->session->setFlash('error', 'Payment Failed! Please try again! (1001)');

                    $success = false;
                }
            } else {
                $model->status = Payment::STATUS_CANCEL;
                $model->save();

                Yii::$app->session->setFlash('error', 'Payment Failed! Please try again! (1003)');
            }

        }

        $returnValue = function ($url) use ($method, $action, $returnNull) {
            /*
            if ($method == 'fps' && $action == 'notify') {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                return FPSPayment::encodeOutgoingMessage([
                    'status' => "SUCCESS"
                ]);
            }
            */

            return $returnNull ? null : $this->redirect($url);
        };

        if ($model != null && (($registration_model = $model->registration) != null)) {
            if ($success) {
                $registration_model->status = Registration::STATUS_CONFIRMED;
                $registration_model->save(false);
                $registration_model->sendSubmittedEmail();
                // $donation_model->afterConfirmed();
                // $session['paid'] = true;
                // $session['paid_registration_id'] = $registration_model->id;

                return $returnValue(['/registration/thank-you']);

            } else {
                $registration_model->status = Registration::STATUS_ONLINE_PAYMENT_FAILED;
                $registration_model->save();

                // $session['registration_id'] = $registration_model->id;

                Yii::$app->session->setFlash('error', 'Payment canceled.');

                return $returnValue(['/registration/form']);
            }
        // } else if ($model != null && $model->type == Payment::TYPE_ORDER && (($order_model = $model->order) != null)) {
        }
    }
}
