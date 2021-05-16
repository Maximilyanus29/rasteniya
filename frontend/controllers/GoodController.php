<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\Good;
use common\models\GoodType;
use frontend\models\GoodSearch;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\HttpException;

/**
 * Site controller
 */
class GoodController extends Controller
{

    /**
     * {@inheritdoc}
     */
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new GoodSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $goods = $dataProvider->query->all();

        return $this->render('search', [
            'goods' => $goods,
            'searchModel' => $searchModel,
        ]);
    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionView($provider, $slug)
    {
        $good = Good::find()->where(['slug'=> $slug])->limit(1)->one();

        if (empty($good)){
            throw new HttpException(404);
        }

        return $this->render('view', ['good' => $good]);
    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionSale()
    {
        $categories = Yii::$app->db->createCommand(
            'SELECT category.id, category.name, category.parent_id, category.slug, COUNT(good.id) as count FROM `category`
                    LEFT join good on category.id = good.category_id
                    GROUP by category.id
                    ORDER by category.id
'
        )

            ->queryAll();

        return $this->render('sale',['categories'=>$categories]);
    }

/*
 *
SELECT category.name, category.slug,  good.name, category.id , COUNT(good.id) as count FROM `good`
LEFT join good_category on good.id = good_category.good_id
LEFT join category on category.id = good_category.category_id
GROUP by category.id
WHERE  category.parent_id = :id or category.id = :id

*/




/*
SELECT category.name, count(*) as count FROM `good`
left join good_category ON good.id = good_category.good_id
left join category ON category.id = good_category.category_id
WHERE category.id = 1
*/




//        $categories = Category::find(['parent_id' => $category['id']])->asArray()->all();

//        $categories = Yii::$app->db->createCommand(
//        'SELECT category.name, category.slug, count(good.id) as count FROM `good`
//            left join good_category ON good.id = good_category.good_id
//            left join category ON category.id = good_category.category_id
//            WHERE  category.parent_id = :id
//            '
//        )

    /**
     * @return mixed
     * @throws Exception
     */
    public function actionCategory($slug)
    {
        $mainCategory = Category::findOne(['slug' => $slug]);
//
//        $categories = Yii::$app->db->createCommand(
//            'SELECT category.id, category.name, category.parent_id, category.slug, COUNT(good.id) as count FROM `category`
//            LEFT join good on category.id = good.category_id
//            GROUP by category.id
//            ORDER by category.id
//        ')->bindValue(':id', $mainCategory['id'])->queryAll();

                $categories = Yii::$app->db->createCommand(
                    'SELECT c0.id, c0.name, c0.parent_id, c0.slug, COUNT(good.id) as count 
FROM category c0 
LEFT JOIN good ON c0.id 
LEFT JOIN category c1 ON c1.id = good.category_id AND c1.id = c0.id 
LEFT JOIN category c2 ON c2.id = good.category_id AND c2.parent_id = c0.id 
WHERE c1.id IS NOT NULL OR c2.id IS NOT null 
GROUP by c0.id 
ORDER by c0.id
                ')->bindValue(':id', $mainCategory['id'])->queryAll();




        $searchModel = new GoodSearch();

        $searchModel->category_id = $mainCategory->id;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        $subcategories = $mainCategory->getGoods2();

//        var_dump($dataProvider->query->all());die;

        $goods = $dataProvider->query->all();


        return $this->render('category', [
            'goods' => $goods,
            'categories' => $categories,
            'mainCategory' => $mainCategory,
            'searchModel' => $searchModel,
        ]);
    }


}
