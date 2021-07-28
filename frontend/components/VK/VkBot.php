<?php
namespace frontend\components\VK;


use yii\httpclient\Client;

class VkBot
{
    const VK_API_VERSION = 5.67;
    const VK_API_ENDPOINT = 'https://api.vk.com/method/';
//    const VK_API_ENDPOINT = 'https://api.vk.com/method/messages.getDialogs?v=5.41&access_token=ACCESS_TOKEN&count=10&offset=0';
    const TOKEN = 'cd0f48c2875d0aa4105359e03e1597a78dbc0bfa339e667f0015ddf34388dac879085eb94db47683e29d1';

    public static function sendMessege(){

        $userId = self::getMesseges();


        $params = [

        ];
        self::sendRequest("messages.getConversations", $params);
    }


    public static function getMesseges(){


        $params = [];
        $res = self::sendRequest("messages.getConversations", $params);

        foreach ($res['response']['items'] as $item){

        }


    }




    private static function sendRequest($method, $params){
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl(self::VK_API_ENDPOINT . $method)
            ->setData(
                array_merge($params, [
                    'access_token' => self::TOKEN,
                    'v' => 5.41,
                ]))
            ->send();

        if ($response->isOk) {
            return $response->data;
        }

        return false;
    }




}


