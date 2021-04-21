<?php


namespace frontend\components;


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

}