<?php

namespace common\components;

use Yii;
use yii\helpers\Url;
use common\models\Config;

class BaseController extends \yii\web\Controller
{

/*
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action))
            return false;

        if ($action->id == 'to-payment' || $action->id == 'payment')
            return true;


        $eventConfig = new \QueueIT\KnownUserV3\SDK\QueueEventConfig();
        $eventConfig->eventId = "twghstrstesting"; // ID of the queue to use
        $eventConfig->queueDomain = "efaith.queue-it.net"; //Domain name of the queue.
        //$eventConfig->cookieDomain = ".my-shop.com"; //Optional - Domain name where the Queue-it session cookie should be saved.
        $eventConfig->cookieValidityMinute = 60; //Validity of the Queue-it session cookie should be positive number.
        $eventConfig->extendCookieValidity = true; //Should the Queue-it session cookie validity time be extended each time the validation runs?
        //$eventConfig->culture = "da-DK"; //Optional - Culture of the queue layout in the format specified here: https://msdn.microsoft.com/en-us/library/ee825488(v=cs.20).aspx. If unspecified then settings from Event will be used.
        $eventConfig->culture = "";
        switch (Config::refreshLanguageSetting()) {
            case 'zh-TW':
                $eventConfig->culture = 'zh-HK';
                break;
            case 'zh-CN':
                $eventConfig->culture = 'zh-CN';
                break;
            case 'en':
                $eventConfig->culture = 'en-US';
                break;
        }
        //$eventConfig->layoutName = "NameOfYourCustomLayout"; //Optional - Name of the queue layout. If unspecified then settings from Event will be used.

        $configText = '{"Description":"20210208_2","Integrations":[{"Name":"TWGHs TRS Testing Action","ActionType":"Queue","EventId":"twghstrstesting","CookieDomain":"","LayoutName":null,"Culture":"'.$eventConfig->culture.'","ExtendCookieValidity":true,"CookieValidityMinute":60,"Triggers":[{"TriggerParts":[{"Operator":"Contains","ValueToCompare":"*","ValuesToCompare":null,"UrlPart":"PageUrl","CookieName":null,"HttpHeaderName":null,"ValidatorType":"UrlValidator","IsNegative":false,"IsIgnoreCase":true}],"LogicalOperator":"And"}],"QueueDomain":"efaith.queue-it.net","RedirectLogic":"AllowTParameter","ForcedTargetUrl":""}],"CustomerId":"efaith","AccountId":"efaith","Version":3,"PublishDate":"2021-02-08T10:10:50.9953687Z","ConfigDataVersion":"1.0.0.3"}';

        $customerID = "efaith"; //Your Queue-it customer ID
        $secretKey = "f1f6697a-d7c7-4caa-8eb0-8d2cc32de2360975bf63-f562-435c-b909-e3df91a3f44c"; //Your 72 char secret key as specified in Go Queue-it self-service platform

        $queueittoken = Yii::$app->request->get('queueittoken');

        try
        {
            $currentUrlWithoutQueueitToken = Url::current(['queueittoken' => null]);

            //Verify if the user has been through the queue
//             $result = \QueueIT\KnownUserV3\SDK\KnownUser::resolveQueueRequestByLocalConfig(
//                 $currentUrlWithoutQueueitToken, $queueittoken, $eventConfig, $customerID, $secretKey);
            $result = \QueueIT\KnownUserV3\SDK\KnownUser::validateRequestByIntegrationConfig(
               $currentUrlWithoutQueueitToken, $queueittoken, $configText, $customerID, $secretKey);

            if($result->doRedirect())
            {
                //Adding no cache headers to prevent browsers to cache requests
                header("Expires:Fri, 01 Jan 1990 00:00:00 GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                header("Pragma: no-cache");
                //end

                if(!$result->isAjaxResult)
                {
                    //Send the user to the queue - either because hash was missing or because is was invalid
                    header('Location: ' . $result->redirectUrl);
//                     return $this->redirect($result->redirectUrl);
                }
                else
                {
                    header('HTTP/1.0: 200');
                    header($result->getAjaxQueueRedirectHeaderKey() . ': '. $result->getAjaxRedirectUrl());
                }

                die();

                return false;
            }
            if(!empty($queueittoken) && $result->actionType == "Queue")
            {
                return $this->redirect($currentUrlWithoutQueueitToken);
            }
        }
        catch(\Exception $e)
        {
            // There was an error validating the request
            // Use your own logging framework to log the error
            // This was a configuration error, so we let the user continue
            Yii::debug($e);
//             var_dump($e);
//             return false;
        }

        return true;
    }
*/

}
