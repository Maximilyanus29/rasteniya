<?php

namespace common\components;

use common\models\Category;
use common\models\Good;
use common\models\GoodCategory;
use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class GoodImport
{
    private $_data;

    private $to_add;
    private $to_update;
    private $provider_id;

    public function __construct($data, $providerId)
    {
        $this->provider_id = $providerId;




        $this->createGoods($data);


    }


    public  function createGoods($products)
    {



        $goodsHashes = array_map(function ($el){
            return $el['sku'];
        },$products);



        $goodsHashes = array_flip($goodsHashes);

        $goodsHashes = array_values($goodsHashes);

//        var_dump();die;

        $categoriesInDb = Good::find()
            ->where(['hash' => $goodsHashes])
            ->asArray()
            ->all();


//        array_map(function ($el){
//
//        }, $categoriesInDb);
//
//

/*
        array(15) {
        ["provider"]=>
  string(12) "Voodland.sto"
        ["region"]=>
  string(39) "Белгородская область"
        ["category"]=>
  string(35) "Лиственные деревья"
        ["subcategory"]=>
  string(12) "бархат"
        ["sku"]=>
  string(12) "Voodland.1-1"
        ["name"]=>
  string(29) "Бархат амурский"
        ["description"]=>
  string(57) "https://voodland.club/barkhat-amurskij/nez-proizvoditelyf"
        ["size"]=>
  string(12) "120-140 см"
        ["root_system"]=>
  string(6) "ЗКС"
        ["quantity"]=>
  string(1) "1"
        ["price"]=>
  string(4) "1900"
        ["photo1"]=>
  string(76) "https://voodland.club/images/stories/virtuemart/product/barkhat-amurskij.jpg"
        ["photo2"]=>
  string(77) "https://voodland.club/images/stories/virtuemart/product/barkhat-amurskij2.jpg"
        ["photo3"]=>
  string(77) "https://voodland.club/images/stories/virtuemart/product/barkhat-amurskij1.jpg"
        ["minPriceForOrderCheckout"]=>
  string(1) "1"
}
        */






        for ($i=0; $i<count($products);$i++){

            $product = $products[$goodsHashes[$i]];


            $category = Category::findOne(['name' => $product['subcategory']]);
            $good = new Good;
            $good->name = $product['name'];
            $good->size = $product['size'];
            $good->provider_id = $this->provider_id;
            $good->description = $product['description'];
            $good->root_system = $product['root_system'];
            $good->price = $product['price'];
            $good->quantity = $product['quantity'];
            $good->vendor_code = $product['sku'];
            $good->minPriceForOrderCheckout = $product['minPriceForOrderCheckout'];
            $good->hash = $goodsHashes[$i];
            $good->category_id = $category->id;
            $good->save();



        }


        return true;

    }



}
