<?php

namespace common\components;

use common\models\Good;
use common\models\Provider;
use common\models\Regions;
use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProviderImport
{
    public $to_add;
    public $to_update;

    public function __construct($data)
    {

        $exist_in_db = $this->checkInDb($data);


        foreach ($data as $product){

        }


    }


    public  function checkInDb($products)
    {
        foreach ( $products as $product){
            if (Provider::find()->where(['name'=> $products['provider']])){


                if (Regions::find()->where(['name'=>$product['regions']])->exists()){


                }else{



                }




            }
        }
    }



    public  function checkInDb($products)
    {
        $names = array_map(function ($el){
            return $el['provider'];
        },$products);

        $goods = Provider::find()
            ->where(['name' => $names])
            ->all();


        //тру если количетво товаров соответсвует количеству хешей из импорта
        return count($goods) === count($products);

    }


}
