<?php
namespace common\components;

use Yii;
// use SimpleXMLElement;
use yii\httpclient\Client;

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FasaHelper
{
    public function accessToken() {
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-TIMESTAMP: 2020-01-01T00:00:00+07:00";
        $headers[] = "X-CLIENT-KEY: ".Yii::$app->params['ClientId'];
        $headers[] = "X-SIGNATURE: ".Yii::$app->params['SignatureAuth'];
        
        $end_poin = '/snapv1/access-token';
        $body = array(
            "grant_type" => "client_credentials",
            "additionalInfo"=> array()
        );
        $data = $this->getResponse($end_poin, 'POST', $body, $headers);
        if($data['responseCode'] == '2000100'){
            return $data['accessToken'];
        }else{
            return $data;
        }
    }

    public function signatureService($body, $end_poin, $access_token) {
        
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-TIMESTAMP: 2020-01-01T00:00:00+07:00";
        $headers[] = "X-CLIENT-SECRET: ".Yii::$app->params['ClientSecret'];
        $headers[] = "HTTP-METHOD: POST";
        $headers[] = "ENDPOIN-URL: $end_poin";
        $headers[] = "ACCESS-TOKEN: $access_token";
        
        $end_poin = '/snapv1/signature-service';
        $data = $this->getResponse($end_poin, 'POST', $body, $headers); 
        return $data['signature'];
    }

    public function request($end_poin, $body, $signature, $access_token) {
        $header = array(
            "Content-Type: application/json",
            "Authorization : Bearer $access_token",
            "X-TIMESTAMP : 2020-01-01T00:00:00+07:00",
            "X-SIGNATURE: $signature",
            "X-PARTNER-ID: ".Yii::$app->params['ClientId'],
            "X-EXTERNAL-ID: 41807553358950093184162180797837",
            "CHANNEL-ID: 75"
        );
        $data = $this->getResponse($end_poin, 'POST', $body, $header);
        return $data;
    }

    public function getResponse($end_poin, $method, $body, $header) {
        $url = 'https://www.dev.fasapay.id/'.$end_poin;
        $client = new Client();
        $response = $client->createRequest()
            ->setHeaders($header)
            ->setMethod($method)
            ->setUrl($url)
            ->setData($body)
            ->send();

        return $response->data;
    }
}
