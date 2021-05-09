<?php

namespace common\components;

use common\models\Category;
use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CategoryImport
{

    public function __construct($data)
    {

        $exist_in_db = $this->createCategories($data);

        return ;


    }

/*
["category"]=>
string(35) "Лиственные деревья"
["subcategory"]=>
string(12) "бархат"
*/

    public  function createCategories($products)
    {

        $categories = array_map(function ($el){
            return $el['category'];
        },$products);

        $subCategories = array_map(function ($el){
            return $el['subcategory'];
        },$products);

        $categoriesInDb = Category::find()
            ->where(['name' => $categories])
            ->asArray()
            ->all();

        $subCategoriesInDb = Category::find()
            ->where(['name' => $subCategories])
            ->asArray()
            ->all();
        ;

        $categoriesInDB = array_merge($categoriesInDb, $subCategoriesInDb);


        $categoriesInDBNames = array_map(function ($el){
            return $el['name'];
        },$categoriesInDB);




        for ($i=0; $i<count($products);$i++){

            $product = array_values($products);


            $category = $product[$i]['category'];
            $subCategory = $product[$i]['subcategory'];


            if (in_array($category, $categoriesInDBNames)==false){


                $catt = new Category;
                $catt->name = $category;
                $catt->parent_id = 0;
                $catt->save();

//                var_dump($catt->errors);die;


                if (in_array($subCategory, $categoriesInDBNames)==false){

                    $waf = Category::findOne(['name'=>$category]);

                    $cattt = new Category;
                    $cattt->name = $subCategory;
                    $cattt->parent_id = $waf->id;
                    $cattt->save();

                }

            }


        }

        return true;

    }





}
