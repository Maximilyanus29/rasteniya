<?php
namespace frontend\controllers;

use common\models\City;
use common\models\Good;
use common\models\MessegeOrder;
use common\models\User;
use frontend\components\Helper;
use frontend\components\telegramApi\TelegramApi;
use frontend\models\CartForm;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{
    private $_cart ;

    const NOTICE_MESSEGE = "Минимальная сумма для заказа на нашем сайте, у каждого из поставщиков товаров, всего 2000 рублей это позволяет нам сократить ваши издержки на логистику и значительно ускорить её!";

    private function addTo($id, $quantity = null, $setQuantity = false)
    {
        \Yii::$app->response->format = 'json';

        $quantity = abs ($quantity);

        $good = Good::find()->where(['id'=>$id])->limit(1)->one();


        if ($setQuantity == true){
            $this->_cart->change($good->id, $quantity);
        }else{
            $this->_cart->add($good, $quantity);
        }

        $item = $this->_cart->getItem($good->id);


        if ($this->checkMinPriceOnOneProvider()){
            return [
                'status' => true,
                'count' => $this->_cart->getTotalCount(),
                'quantity' => $item->getQuantity(),
                'totalPrice' => $this->_cart->getTotalCost(true),
                'goodtotalPrice' => $item->getCost(true),
            ];
        }

        return [
            'status' => true,
            'notice' => self::NOTICE_MESSEGE,
            'count' => $this->_cart->getTotalCount(),
            'quantity' => $item->getQuantity(),
            'totalPrice' => $this->_cart->getTotalCost(true),
            'goodtotalPrice' => $item->getCost(true),
        ];


    }

    public function actionCheckCartForMinPriceOrder()
    {
        \Yii::$app->response->format = 'json';

        if ($this->checkMinPriceOnOneProvider()){
            return [
                'status' => true,
            ];
        }

        return [
            'status' => true,
            'notice' => self::NOTICE_MESSEGE,
        ];


    }


    public function actionSetQuantityToCart($id, $quantity)
    {
        $this->_cart = \Yii::$app->cart;

        return $this->addTo($id, $quantity, true);
    }

    public function actionAddToCart($id, $quantity)
    {
        $this->_cart = \Yii::$app->cart;

        return $this->addTo($id, $quantity);

    }

    private function checkMinPriceOnOneProvider()
    {
        if (!isset($this->_cart)){
            $this->_cart = \Yii::$app->cart;
        }

        $itemsCart = $this->_cart->getItems();

        $itemsCostCartSortByProvider = [];

        foreach ($itemsCart as $item) {
            $itemsCostCartSortByProvider[intval($item->getProduct()->provider_id)] += intval($item->getCost());
        }


        $needByMore = array_filter($itemsCostCartSortByProvider, function($el){
            return $el < \Yii::$app->params['minPriceForOrderCheckoutOnOneProvider'];

        });


        if (empty($needByMore)){
            return true;
        }

        return false;
    }


    public function actionAddToFavorite($id, $quantity)
    {
        $this->_cart = \Yii::$app->favorite;

        return $this->addTo($id, $quantity);
    }


    public function actionAddToCompare($id, $quantity)
    {
        $this->_cart = \Yii::$app->compare;

        return $this->addTo($id, $quantity);
    }




    private function removeFrom($id)
    {
        \Yii::$app->response->format = 'json';

        $this->_cart->remove($id);

        return [
            'status' => true,
            'count' => $this->_cart->getTotalCount(),
            'totalPrice' => $this->_cart->getTotalCost(),
        ];
    }

    public function actionRemoveFromCart($id)
    {
        $this->_cart = \Yii::$app->cart;

        return $this->removeFrom($id);
    }

    public function actionRemoveFromFavorite($id)
    {
        $this->_cart = \Yii::$app->favorite;

        return $this->removeFrom($id);
    }

    public function actionRemoveFromCompare($id)
    {
        $this->_cart = \Yii::$app->compare;

        return $this->removeFrom($id);
    }


    public function actionIndex()
    {
        $cart = \Yii::$app->cart;

        $model = new CartForm();

        return $this->render('index', [
            'cart' => $cart,
            'model' => $model,
        ]);
    }


    public function actionCheckout()
    {
        $cart = \Yii::$app->cart;

        $model = new CartForm();

        $post = \Yii::$app->request->post();

        if ($model->load($post) && $model->validate()){

            if ($model->checkTotalSumOnProvider() !== true){
                return "Для заказа необходимо набрать товаров у каждого заказчика на сумму 2000 шекелей";

            }

            $model->createOrder();


        }

        return $this->render('index', [
            'cart' => $cart,
            'model' => $model,
        ]);
    }


/*
    // Компонент корзины
$cart = \Yii::$app->cart;

// Создает элемент корзины из переданного товара и его кол-ва
$cart->add($product, $quantity);

// Добавляет кол-во существующего элемента корзины
$cart->plus($product->id, $quantity);

// Изменяет кол-во существующего элемента корзины
$cart->change($product->id, $quantity);

// Удаляет конкретный элемент из корзины, объект `devanych\cart\CartItem`
$cart->remove($product->id);

// Удаляет все элемент из корзины
$cart->clear();

// Получает все элемент из корзины
$cart->getItems();

// Получает конкретный элемент из корзины
$cart->getItem($product->id);

// Получает идентификаторы всех элементов
$cart->getItemIds();

// Получает общую стоимость всех элементов
$cart->getTotalCost();

// Получает общее количество всех элементов
$cart->getTotalCount();


    */




    public function addMessegeToOrder($text, $phone, $telegram_user_id = null)
    {


        require_once "../libs/madeline.php";

        $settings = [
            'app_info' => [ // Эти данные мы получили после регистрации приложения на https://my.telegram.org
                'api_id' => "4634551",
                'api_hash' => "3bd698178a6ea0e0a8626c42d4a6f02b",
            ],

            'serialization' => [
                'serialization_interval' => 300,
                //Очищать файл сессии от некритичных данных.
                //Значительно снижает потребление памяти при интенсивном использовании, но может вызывать проблемы
                'cleanup_before_serialization' => true,
            ],
        ];


        if ($telegram_user_id !== false){
            MessegeOrder::create($text, $telegram_user_id);

        }else{
            $MadelineProto = new \danog\MadelineProto\API('session.madeline', $settings);

            $MadelineProto->start();

            $user = User::findOne(['phone' => $phone]);

            $contact = ['_' => 'inputPhoneContact', 'client_id' => 0, 'phone' => Helper::preparePhone($user->phone), 'first_name' => $user->phone, 'last_name' => $user->phone];
            $import = $MadelineProto->contacts->importContacts(['contacts' => [$contact]]);

            $user->telegram = $import['imported'][0]['user_id'];

            $user->save();

            MessegeOrder::create($text, $import['imported'][0]['user_id']);
        }

        return true;
    }




}