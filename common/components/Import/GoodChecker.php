<?php

namespace common\components\Import;

use common\models\Good;


/**
 * ContactForm is the model behind the contact form.
 */
class GoodChecker
{
    public $_import;

    private $_attributes_for_compare = [
        'price',
        'discount_price',
        'vendor_code',
        'category_id',
        'quantity',
        'description',
        'size',
        'minPriceForOrderCheckout'
    ];


    public function __construct(Import $import)
    {
        $this->_import = $import;

        $this->calculate();
    }


    private function calculate()
    {
        $data = $this->_import->getHashedData();

        $goods_in_db_on_import_hashes = Good::find()->where(['provider_id' => $this->_import->_provider_id])->asArray()->indexBy('hash')->all();

        $this->compareGoods($goods_in_db_on_import_hashes, $data);

        return true;

    }

    private function compareGoods($db, $import)
    {
        //Смотрим какие гуды отсутсвуют в БД и кидаим их в очередь создания
        foreach ($import as $hash => $item){

            if (empty($db[$hash])){
                $this->to_create[$hash] = $item;
            }else{
                $this->to_update[$hash] = $item;
            }
        }


        //Перебор бд данных и проверка если нет в импорте то удаляем
        foreach ($db as $hash => $item){

            if (empty($import[$hash])){
                $this->to_delete[$hash] = $this->_import->structurifyFromDbToImport($item);
            }
        }

        return true;
    }





}
