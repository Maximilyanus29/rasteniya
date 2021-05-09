<?php
namespace frontend\controllers;

use common\models\City;
use common\models\Good;
use frontend\models\CartForm;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{
    private $_cart ;

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

        return [
            'status' => true,
            'count' => $this->_cart->getTotalCount(),
            'quantity' => $item->getQuantity(),
            'totalPrice' => $this->_cart->getTotalCost(),
            'goodtotalPrice' => $item->getCost(),
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




}