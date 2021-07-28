<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\Good;
use common\models\GoodType;
use common\models\Provider;
use common\models\User;
use frontend\components\Helper;
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

        $goods = Good::sortByCity($goods);

        return $this->render('search', [
            'goods' => $goods['goods'],
            'searchModel' => $searchModel,
            'recommendedGoods' => $goods['recommended'],
        ]);
    }


        /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCompare()
    {
        
		$databases = [];

		try{ 
		    $pdo = new \PDO("mysql:host=localhost", "root", ""); 
		    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
		} catch(PDOException $e){ 
		    die("ERROR: Could not connect. " . $e->getMessage()); 
		} 



		  
		try{ 
		    $sql = "SHOW DATABASES"; 
		    $res = $pdo->query($sql); 


			$databases = $res->fetchAll();


			foreach ($databases as $key => $value) {

				$pdo = new \PDO("mysql:host=localhost;dbname=" . $value[0] , "root", ""); 

				$value = $value[0];

			
		    	var_dump($pdo->exec("DROP DATABASE testt"));
				
			}

			

		    echo "Database DEMO deleted successfully."; 
		} catch(PDOException $e){ 
		    die("ERROR: Could not able to execute $sql. " 
		                                . $e->getMessage()); 
		} 
		unset($pdo); 
    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionView($provider, $slug)
    {


        $provider = User::findOne(['slug' => $provider]);


        $good = Good::find()->where(['slug'=> $slug, 'provider_id' => $provider->id])->limit(1)->one();

        if (empty($provider) || empty($good)){
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


    /**
     * @return mixed
     * @throws Exception
     */
    public function actionCategory($slug)
    {
        $mainCategory = Category::findOne(['slug' => $slug]);

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

        $goods = $dataProvider->query->all();

        return $this->render('category', [
            'goods' => $goods,
            'categories' => $categories,
            'mainCategory' => $mainCategory,
            'searchModel' => $searchModel,
        ]);
    }


}
