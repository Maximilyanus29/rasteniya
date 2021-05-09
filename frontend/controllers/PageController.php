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
class PageController extends Controller
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

    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionPolicy()
    {
        return $this->render('policy');
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


    /**
     * @return mixed
     * @throws Exception
     */
    public function actionCategory($slug)
    {

        $mainCategory = Category::findOne(['slug' => $slug]);


//        $categories = Category::find(['parent_id' => $category['id']])->asArray()->all();

//        $categories = Yii::$app->db->createCommand(
//        'SELECT category.name, category.slug, count(good.id) as count FROM `good`
//            left join good_category ON good.id = good_category.good_id
//            left join category ON category.id = good_category.category_id
//            WHERE  category.parent_id = :id
//            '
//        )
        $categories = Yii::$app->db->createCommand(
            'SELECT category.id, category.name, category.parent_id, category.slug, COUNT(good.id) as count FROM `category`
LEFT join good on category.id = good.category_id
GROUP by category.id
ORDER by category.id
'
        )
            ->bindValue(':id', $mainCategory['id'])
            ->queryAll();


        $goods = $mainCategory->goods;





        return $this->render('category', ['goods' => $goods, 'categories' => $categories, 'mainCategory' => $mainCategory]);
    }


}
