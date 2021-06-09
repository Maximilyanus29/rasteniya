<?php

namespace common\models;

use frontend\components\Helper;
use frontend\components\telegramApi\TelegramApi;
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
            [['user_id'], 'integer'],
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

            Helper::sendTelegramMessege($this->getMessege(), $this->telegram);

            return true;
        }
        var_dump($this);die;
        return false;
    }


    public function getMessege()
    {
        $items = $this->getItems()->joinWith('good')->all();

        $text = "Здравствуйте, вы оформили заказ на сайте " . Yii::$app->name;
        $text .= "\nСостав заказа : \n";

        foreach ($items as $item){
            $text .= $item->good->name . " " . $item->quantity . "шт. " . $item->price . "р.\n";
        }

        return $text;
    }


    public function getItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }
}
