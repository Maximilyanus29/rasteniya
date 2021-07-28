<?php

namespace common\models;


use common\components\Notificator\Notificator;
use frontend\models\CartForm;
use Yii;

/**
 * This is the model class for table "order_checkout".
 *
 * @property int $id
 * @property int $user_id
 * @property float $discount_price
 * @property float $delivery_price
 * @property float $total_price
 */
class OrderCheckout extends \yii\db\ActiveRecord
{
    public static function getOrderStatuses()
    {
        return [
            'новый заказ',
            'собран',
            'Выдан',
        ];
    }

    public static function getSuccessStatus()
    {
        return self::getOrderStatuses()[1];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_checkout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'discount_price', 'delivery_price', 'total_price'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['discount_price', 'delivery_price', 'total_price'], 'number'],
        ];
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => Yii::t('app', 'ID'),
//            'user_id' => Yii::t('app', 'User ID'),
//            'discount_price' => Yii::t('app', 'Discount Price'),
//            'delivery_price' => Yii::t('app', 'Delivery Price'),
//            'total_price' => Yii::t('app', 'Total Price'),
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => 'Пользователь',
            'delivery_price' => "Цена доставки",
            'total_price' => "Стоимость",
            'phone' => "телефон",
            'email' => "email",
            'name' => "ФИО",
            'delivery_address' => "адрес доставки",
            'delivery_method' => "способ доставки",
            'payment_method' => "Спрособ оплаты",
            'comment' => "Комментарий",
            'status' => "Статус заказа",
        ];
    }



    public function create(CartForm $cartForm)
    {
        $cart = Yii::$app->cart;

        $this->name = $cartForm->name;
        $this->email = $cartForm->email;
        $this->phone = $cartForm->phone;
        $this->telegram = $cartForm->telegram;
        $this->delivery_method = $cartForm->delivery_method;
        $this->delivery_price = 0;
        $this->delivery_address = $cartForm->delivery_address;
        $this->payment_method = $cartForm->payment_method;
        $this->total_price = $cart->getTotalCost();
        $this->discount_price = $cart->getTotalCost() - $cart->getTotalCost(true);

        if ($this->save()){

            OrderItem::attach($this->id);

            $notificator = new Notificator();
            $notificator->sendPostOrderCheckoutMessage($this);

//            $cart->clear();


            return true;
        }
        var_dump($this);die;
        return false;
    }



    public function getItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }



    public function changeOrderStatus($status)
    {
        $goods = $this->items;

        $goodsStatuses = [];

        foreach ($goods as $good){
            if (empty($good->good)) continue;
            if ($good->good->provider_id == Yii::$app->user->getId()){
                $good->status = $status;
                $good->save();
            }
            $goodsStatuses[$good->id] = $good->status;
        }

        if ($this->status != min($goodsStatuses)){
            $this->status = min($goodsStatuses);
            $this->save();

            $notificator = new Notificator();
            $notificator->sendChangeStatus($this);
        }



        return true;
    }



    public function getProviderStruct()
    {
        $result = [];

        foreach ($this->items as $item){
            $result[$item->good->provider_id][] = $item;
        }

        return $result;
    }



}
