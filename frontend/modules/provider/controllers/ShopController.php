<?php

namespace frontend\modules\provider\controllers;


use common\components\GoodImport;
use common\components\Import;
use common\models\Good;
use common\models\OrderCheckout;
use common\models\Provider;
use common\models\User;
use frontend\modules\user\models\ChangePasswordForm;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\RegShopForm;
use frontend\modules\user\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Default controller for the `user` module
 */
class ShopController extends Controller
{

    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegShop()
    {
        $model = new Provider();

        if (!empty(Yii::$app->user->identity->provider)){
            throw new HttpException(404, 'Страница не найдена');
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {




            $model->profit_in_percent = 10;
            $model->user_id = Yii::$app->user->getId();

            Yii::$app->session->setFlash('success', 'Вы зарегестрированы как поставщик');
            $model->save();
            return $this->redirect('/user');
        }

        return $this->render('reg-shop', [
            'view' => Yii::$app->controller->action->id,
            'model' => $model,
        ]);

    }


    public function actionGoodList()
    {
        $model = Good::find()->where(['provider_id'=>Yii::$app->user->identity->provider->id])->all();

        return $this->render(Yii::$app->controller->action->id, [
            'model' => $model,
        ]);
    }



    public function actionImport()
    {

        if (!Yii::$app->request->post())return false;


        $exploded = explode('.', $_FILES['goods']['name']);

        $extension = $exploded[count(explode('.', $_FILES['goods']['name']))-1];

        if ($extension !== "xml") return "Загрузите файл формата xml";


        $uploaddir = '../../files/';
        $uploadfile = $uploaddir . Yii::$app->security->generateRandomString(32);

        $importer = new Import();



        if (move_uploaded_file($_FILES['goods']['tmp_name'], $uploadfile)) {
            if ($importer->run($uploadfile)==true){
                unlink($uploadfile);
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            return "ne polushilos";
        }


    }


}
