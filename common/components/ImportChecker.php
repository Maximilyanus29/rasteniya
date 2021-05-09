<?php

namespace common\components;

use common\models\Good;
use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ImportChecker
{

    public static  function checkInDb($products)
    {

        $hashesOfImportFile = self::getHashes($products);

        $goods = Good::find()
            ->where(['hash' => $hashesOfImportFile])
            ->all();

        //тру если количетво товаров соответсвует количеству хешей из импорта
        return count($goods) === count($hashesOfImportFile);

    }




    public static  function getHashes($products)
    {
        $data = [];

        foreach ($products as $key => $value){
            $data[] = $key;
        }

        return $data;
    }









}
