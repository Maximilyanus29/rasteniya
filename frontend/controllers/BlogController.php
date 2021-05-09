<?php
namespace frontend\controllers;

use common\models\Article;
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
class BlogController extends Controller
{

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $articles = Article::find()->all();

        return $this->render('index',['articles'=>$articles]);

    }


    /**
     * @return mixed
     * @throws HttpException
     */
    public function actionView($slug)
    {
        $article = Article::find()->where(['slug'=> $slug])->limit(1)->one();

        if (empty($article)){
            throw new HttpException(404);
        }

        return $this->render('view', ['article' => $article]);
    }


}
