<?php

namespace common\components\Import;

use common\models\Category;
use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CategoryRepository
{
    private $checker;

    public function __construct($checker)
    {
        $this->checker = $checker;

        $this->run();

    }


    public function run()
    {
        $to_create = $this->checker->to_create;

        foreach ($to_create as $category => $sub_category){
            if (!is_int($category)){
                $new_category = new Category();
                $new_category->name = $category;
                $new_category->parent_id = 0;
                $new_category->save();

                foreach ($sub_category as  $sub){

                    $new_sub_category = new Category();
                    $new_sub_category->name = $sub;
                    $new_sub_category->parent_id = $new_category->id;
                    $new_sub_category->save();

                }
            }else{
                foreach ($sub_category as  $sub){

                    $new_sub_category = new Category();
                    $new_sub_category->name = $sub;
                    $new_sub_category->parent_id = $category;
                    $new_sub_category->save();

                }
            }
        }
        return true;
    }





}
