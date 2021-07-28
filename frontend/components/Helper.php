<?php


namespace frontend\components;


use common\models\City;
use common\models\User;
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




}