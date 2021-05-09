<?php

namespace frontend\modules\provider\controllers;


use common\components\GoodImport;
use common\components\Import;
use common\models\Good;
use common\models\OrderCheckout;
use common\models\User;
use frontend\modules\provider\models\ChangePasswordForm;
use frontend\modules\provider\models\ImportForm;
use frontend\modules\provider\models\LoginForm;
use frontend\modules\provider\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{

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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('layout', ['view' => Yii::$app->controller->action->id]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/user');
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionOrderList()
    {
        $model = OrderCheckout::find()->all();

        return $this->render('layout', [
            'view' => Yii::$app->controller->action->id,
            'model' => $model,
        ]);
    }


    public function actionGoodList()
    {
        $model = Good::find()->all();

        return $this->render('layout', [
            'view' => Yii::$app->controller->action->id,
            'model' => $model,
        ]);
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию');
            return $this->redirect('/user');
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionChangePassword()
    {

        $model = new ChangePasswordForm;

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()){

            Yii::$app->session->setFlash('info', 'Данные успешно сохранены');

            return $this->render('layout', [
                'view' => Yii::$app->controller->action->id,
                'model' => $model,
            ]);
        }


        return $this->render('layout', [
            'view' => Yii::$app->controller->action->id,
            'model' => $model,
        ]);


        return $this->render('layout', ['view' => Yii::$app->controller->action->id]);

    }

    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionChangeUserData()
    {
        $model = Yii::$app->user->identity;


        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                Yii::$app->session->setFlash('info', 'Данные успешно сохранены');

                return $this->render('layout', [
                    'view' => Yii::$app->controller->action->id,
                    'model' => $model,
                ]);

            }
        }

        return $this->render('layout', [
            'view' => Yii::$app->controller->action->id,
            'model' => $model,
        ]);
    }

    public function actionImport()
    {
        if (!Yii::$app->request->post())return false;
        $exploded = explode('.', $_FILES['goods']['name']);

        $extension = $exploded[count(explode('.', $_FILES['goods']['name']))-1];

        if ($extension !== "xml") return false;


        $uploaddir = '../../files/';
        $uploadfile = $uploaddir . Yii::$app->security->generateRandomString(32);

        $importer = new Import();
        $result = $importer->run("../../files/YgvzhNZOQWirrKRw50ae0zvhX-ck-a73");


        die;


        if (move_uploaded_file($_FILES['goods']['tmp_name'], $uploadfile)) {
            if (GoodImport::run($uploadfile)==true){
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            return false;
        }





    }
}
