<?php

namespace frontend\modules\provider\controllers;


use common\components\Notificator\Notificator;
use common\models\Good;
use common\models\OrderCheckout;
use common\models\User;
use frontend\modules\provider\models\ChangePasswordForm;
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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render(Yii::$app->controller->action->id);
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
        $model->password = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->login()) {
            if(Yii::$app->user->can('provider')){
                return $this->redirect('/provider');
            }
        }


        return $this->render('login', [
            'model' => $model,
        ]);
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
        $query = Yii::$app->db->createCommand(
            'SELECT order_item.status, order_item.id, order_item.order_id, order_item.good_id, order_item.quantity, order_item.price, good.name, good.slug from order_item
            LEFT JOIN good ON good.id = order_item.good_id
            LEFT JOIN order_checkout ON order_checkout.id = order_item.order_id
            where good.provider_id = :provider_id')
            ->bindValues(['provider_id' => Yii::$app->user->getId()])
            ->queryAll();


        $model = [];

        foreach ($query as $items){
            $model[$items['order_id']][] = $items;
        }


        return $this->render(Yii::$app->controller->action->id, [
            'model' => $model,
        ]);
    }


    public function actionChangeOrderStatus($id, $status)
    {
        Yii::$app->response->format = 'json';

        $order = OrderCheckout::findOne($id);

        $order->changeOrderStatus($status);

        $notificator = new Notificator();


        return [
            'status' => true,
        ];


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

            return $this->render(Yii::$app->controller->action->id, [

                'model' => $model,
            ]);
        }


        return $this->render(Yii::$app->controller->action->id, [

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

        return $this->render(Yii::$app->controller->action->id, [

            'model' => $model,
        ]);
    }




}
