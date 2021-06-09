<?php

namespace common\components\Import;

use common\models\Category;
use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CategoryChecker extends Checker
{
/*
    protected $_import;

    public $to_update;

    public $to_delete;

    public $to_create;
*/


    public function __construct(Import $import)
    {
        $this->_import = $import;

        $this->calculate();

    }


    private function getStructCategoriesInDb()
    {
        $dataInDb = Category::find()->asArray()->all();



        $struct = [];
        foreach ($dataInDb as $key => $value){
            $struct[$value['name']];

            foreach ($dataInDb as $sub){

                if ($value['id'] == $sub['parent_id']){
                    $struct[$value['name']] [] = $sub['name'];
                }
            }
        }

        return $struct;

    }

    private function getStructCategoriesInImport()
    {
        $data = $this->_import->getHashedData();

        $struct = [];

        foreach ($data as $key => $row){

            if(empty($row['category'])) continue;

            $struct[mb_strtolower(trim($row['category']))][] = mb_strtolower(trim($row['sub_category']));

        }

        foreach ($struct as $key => $row){

            $struct[$key] = array_unique($row);
        }

        return $struct;

    }


    private function calculate()
    {
        $dataInDb = $this->getStructCategoriesInDb();

        $dataInDbForSearchId = Category::find()->asArray()->all();

        $dataInImport = $this->getStructCategoriesInImport();

        $to_create = array_intersect ( $dataInImport,$dataInDb);


        foreach ($to_create as $key => $value){


            if (array_key_exists($key, $dataInDb)){

                $categoryInDb = array_filter($dataInDbForSearchId, function ($el) use ($key){
                    return mb_strtolower(trim($el['name'])) === $key;
                }, ARRAY_FILTER_USE_BOTH );



                if (!empty($categoryInDb)){
                    $this->to_create[$categoryInDb[key($categoryInDb)]['id']] [] = $value[0];
                }else{
                    $this->to_create[$key] [] = $value[0];
                }


            }else{
                $this->to_create = $to_create;

            }

        }



        return true;
    }







}
