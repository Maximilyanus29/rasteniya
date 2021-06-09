<?php

namespace common\components\Import;

use common\models\Category;
use common\models\Good;
use SimpleXMLElement;
use Yii;
use yii\base\Model;
use yii\helpers\Inflector;

/**
 * ContactForm is the model behind the contact form.
 */
class GoodRepository
{
    private $checker;

    public $changedDataInDb = [];


    public function __construct($checker)
    {
        $this->checker = $checker;

        $this->run();
    }


    public function run()
    {

        $this->deleteGoods();
        $this->insertGoods();
        $this->updateGoods();

    }


    public function deleteGoods()
    {
        $data = $this->checker->to_delete;

        if (empty($data)) return false;

        Good::updateAll( ['is_delete' => 1] , ['in', 'hash', $this->checker->_import->getHashesInArrayImportGoods($data) ] );

        return true;
    }

    public function insertGoods()
    {
        $data = $this->prepare($this->checker->to_create);

        if (empty($data)) return false;

        Yii::$app->db->createCommand()->batchInsert(Good::tableName(),
            [
                'provider_id',
                'category_id',
                'vendor_code',
                'name',
                'slug',
                'hash',
                'size',
                'description',
                'root_system',
                'quantity',
                'price',
                'minPriceForOrderCheckout',
            ],
            $data)->execute();



        $hashes = $this->checker->_import->getHashesInArrayImportGoods($data);

        $inserted_data = Good::find()->where(['hash' => $hashes])->indexBy('hash')->all();

        $this->changedDataInDb = array_merge($this->changedDataInDb, $inserted_data);

        return true;

    }


    public function updateGoods()
    {
        $data = $this->prepare($this->checker->to_update);

        if (empty($data)) return false;

        $goods_in_db = Good::find()->where(['hash'=> $this->checker->_import->getHashesInArrayImportGoods($data) ])->indexBy('hash')->all();

        foreach ($data as $hash => $good){

            $goods_in_db[$hash]->category_id = $good[1];
            $goods_in_db[$hash]->vendor_code = $good[2];
            $goods_in_db[$hash]->size = $good[6];
            $goods_in_db[$hash]->description = $good[7];
            $goods_in_db[$hash]->root_system = $good[8];
            $goods_in_db[$hash]->quantity = $good[9];
            $goods_in_db[$hash]->price = $good[10];
            $goods_in_db[$hash]->minPriceForOrderCheckout = $good[11];
            $goods_in_db[$hash]->save();
        }

        $hashes = $this->checker->_import->getHashesInArrayImportGoods($data);

        $updated_data = Good::find()->where(['hash' => $hashes])->indexBy('hash')->all();

        $this->changedDataInDb = array_merge($this->changedDataInDb, $updated_data);

        return true;
    }


    /*
    ["ee6c6c81ce6c9027127e79e31afd6ede"]=>
    array(15) {
    ["provider"]=>
    int(1)
    ["region"]=>
    string(39) "Белгородская область"
    ["category"]=>
    string(35) "Лиственные деревья"
    ["sub_category"]=>
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
    ["photo"]=>
    string(76) "https://voodland.club/images/stories/virtuemart/product/barkhat-amurskij.jpg"
    ["photo2"]=>
    string(77) "https://voodland.club/images/stories/virtuemart/product/barkhat-amurskij2.jpg"
    ["photo3"]=>
    string(77) "https://voodland.club/images/stories/virtuemart/product/barkhat-amurskij1.jpg"
    ["minQuantityForOrder"]=>
    string(0) ""
        */

    public function prepare($data)
    {
        if (empty($data)) return [];
        $categoryNames = array_map(function ($el){
            return $el['sub_category'];
        },$data);

        $categories = Category::find()->where(['name' => $categoryNames])->asArray()->indexBy('name')->all();

        $importPreparedForStructDb = [];

        foreach ($data as $hash => $good){

            if (empty($categories[$good['sub_category']]['id'])) continue;

            $importPreparedForStructDb[$hash] = [
                $good['provider'],
                $categories[$good['sub_category']]['id'],
                $good['sku'],
                $good['name'],
                Inflector::slug($good['name']),//slug
                $hash,
                $good['size'],
                $good['description'],
                $good['root_system'],
                $good['quantity'],
                $good['price'],
                $good['minQuantityForOrder'],
            ];
        }

        return $importPreparedForStructDb;
    }



    public function getGoodsFromDb()
    {
        return $this->changedDataInDb;


    }





}
