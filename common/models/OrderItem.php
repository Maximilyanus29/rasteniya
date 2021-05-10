<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $order_id
 * @property int $good_id
 * @property int $quantity
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'good_id', 'quantity'], 'required'],
            [['order_id', 'good_id', 'quantity'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'good_id' => Yii::t('app', 'Good ID'),
            'quantity' => Yii::t('app', 'Quantity'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function attach($orderId)
    {
        $cart = Yii::$app->cart;

        foreach ($cart->getItems() as $item){
            $new_order_item = new self();
            $new_order_item->order_id = $orderId;
            $new_order_item->good_id = $item->getProduct()->id;
            $new_order_item->quantity = $item->getQuantity();
            $new_order_item->price = $item->getCost(true);

            if (!$new_order_item->save()){

                return false;
            }
        }

        $cart->clear();

        return true;

    }



}
