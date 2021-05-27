<?php
namespace frontend\controllers;

use common\models\Article;
use common\models\Category;
use common\models\Good;
use common\models\GoodType;
use common\models\Provider;
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
class ProviderController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $providers = Provider::find()->all();

        return $this->render('index',['providers'=>$providers]);

    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionView($slug)
    {
        $provider = Provider::find()->where(['slug'=> $slug])->limit(1)->one();


        if (empty($provider)){
            throw new HttpException(404);
        }

        $goods = $provider->goods;


        return $this->render('view', ['provider' => $provider, 'goods' => $goods]);
    }


}
