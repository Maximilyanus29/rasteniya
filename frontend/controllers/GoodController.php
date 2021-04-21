<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\Good;
use common\models\GoodType;
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
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionView($slug)
    {
        $good = Good::find()->where(['slug'=> $slug])->limit(1)->one();

        if (empty($good)){
            throw new HttpException(404);
        }

        return $this->render('view', ['good' => $good]);
    }







/*
SELECT category.name, count(*) as count FROM `good`
left join good_category ON good.id = good_category.good_id
left join category ON category.id = good_category.category_id
WHERE category.id = 1
*/


    /**
     * @return mixed
     * @throws Exception
     */
    public function actionCategory($slug)
    {
        $mainCategory = Category::find(['slug' => $slug])->one();
//        $categories = Category::find(['parent_id' => $category['id']])->asArray()->all();

//        $categories = Yii::$app->db->createCommand(
//        'SELECT category.name, category.slug, count(good.id) as count FROM `good`
//            left join good_category ON good.id = good_category.good_id
//            left join category ON category.id = good_category.category_id
//            WHERE  category.parent_id = :id
//            '
//        )
        $categories = Yii::$app->db->createCommand(
            'SELECT category.name, category.slug FROM `category`
            WHERE  category.parent_id = :id or category.id = :id
            '
        )
            ->bindValue(':id', $mainCategory['id'])
            ->queryAll();

//        var_dump($categories);die;


        $goods = $mainCategory->goods;

//        var_dump($goods);die;

        return $this->render('category', ['goods' => $goods, 'categories' => $categories, 'mainCategory' => $mainCategory]);
    }


}
