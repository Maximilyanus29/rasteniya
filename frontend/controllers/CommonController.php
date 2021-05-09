<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\City;
use common\models\Good;
use common\models\GoodType;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Exception;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\HttpException;
use yii\web\Response;

/**
 * Site controller
 */
class CommonController extends Controller
{


    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
//                    'application/xml' => Response::FORMAT_XML,
                ],
//                'languages' => [
//                    'ru-RU',
//                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'city-autocomplete'  => ['get'],
                    'good-autocomplete'  => ['get'],
                ],
            ],
        ];
    }



    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCityAutocomplete($name)
    {
        return City::find()->where(['like','name',$name])->all();
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionGoodAutocomplete($name)
    {
        return (new \yii\db\Query())
            ->select(['good.name', 'good.slug', 'good.price', 'provider.slug provider_slug'])
            ->from('good')
            ->where(['like','good.name',$name])
            ->join('LEFT JOIN', 'provider', 'provider.id = good.provider_id')
            ->limit(6)
            ->all();

    }



}
