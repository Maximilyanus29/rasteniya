<?php


namespace frontend\controllers;


use common\models\Good;
use common\models\GoodType;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;

class CategoryController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($slug)
    {
        var_dump($slug);die;

        return $this->render('index');
    }


    /**
     * Logs in a user.
     *
     * @return mixed
     * @throws HttpException
     */
    public function actionCategory($categories)
    {
        $categories = explode('/', $categories);

        $sql = "
            WITH RECURSIVE r AS 
            (
                SELECT id, parent_id, name
                FROM good_type
                WHERE slug = :slug
                
                UNION
                
                SELECT good_type.id, good_type.parent_id, good_type.name
                FROM good_type
                JOIN r
                ON good_type.parent_id = r.id
            )
            SELECT * FROM r
        ";

        $categories = Yii::$app->db->createCommand($sql)
            ->bindValue(':slug', $categories[count($categories)-1])
            ->queryAll();


//        var_dump($categories);die;


        $good_type_ids = array_map(function ($category){
            return intval($category['id']);
        },$categories);

        $goods = Good::findAll(['type_id'=>$good_type_ids]);



        return $this->render('category', ['goods'=>$goods, 'category'=>$categories, 'category'=>$categories[count($categories)-1]]);
    }



}