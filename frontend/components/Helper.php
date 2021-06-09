<?php


namespace frontend\components;


use common\models\City;
use Yii;

class Helper
{

    public static function generateBreadCrumps(array $categories)
    {
        $data = [];

        foreach ($categories as $category){
            $data[$category->id] = $category;
        }

        sort($data);

        return self::generateHtml($data);

    }


    private static  function generateHtml($data)
    {

        foreach ($data as $value){
            echo "<li><a href=\"/category/$value->slug\"> $value->name </a></li>";

        }

    }



    public static  function getCity()
    {
        /*
            ["id"]=>
            int(472045)
            ["lat"]=>
            float(51.67204)
            ["lon"]=>
            float(39.1843)
            ["name_ru"]=>
            string(14) "Воронеж"
            ["name_en"]=>
            string(8) "Voronezh"
        */


        return Yii::$app->sypexGeo->getCity("77.45.251.206")['city'];
    }

    public static  function hasIssetCity()
    {
        $cookies = Yii::$app->request->cookies;


        if (isset($_COOKIE['city'])){
            return htmlspecialchars($_COOKIE['city']);
        }else{
            return false;
        }
    }

    public static function setCity()
    {
        $cookies = Yii::$app->response->cookies;

    }


    public static function preparePhone($phone)
    {
        return str_replace(array('(', ')', ' ', '-'), '', $phone);
    }


    public static function sendTelegramMessege($text, $username) {

        $res = Yii::$app->telegram->getUpdates()['result'];

        $username = preg_replace('/@/', '', $username);

        try {

            $response = Yii::$app->telegram->sendMessage([
                'chat_id' => self::getTelegrammId($res, $username),
                'text' => $text,
            ]);

            if ($response->ok === true){
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }

    }



    public static function getTelegrammId($array,$searchString) {

        foreach ($array as $key => $value){
            if (is_array($value)){
                return self::getTelegrammId($value, $searchString);
            }else{
                if ($value == $searchString){
                    return $array['id'];
                }
            }
        }
        return false;
    }



//    public static  function getCity()
//    {
//        $domain = Yii::$app->request->serverName;
//
//        return City::findOne(['slug' => explode('.', $domain)[0]]);
//    }

}