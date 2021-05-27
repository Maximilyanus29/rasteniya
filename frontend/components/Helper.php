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

        $domain = Yii::$app->request->serverName;



        return City::findOne(['slug' => explode('.', $domain)[0]])->name;





    }

}