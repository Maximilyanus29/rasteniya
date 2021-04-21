<?php

namespace common\models;

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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'discount_price' => Yii::t('app', 'Discount Price'),
            'delivery_price' => Yii::t('app', 'Delivery Price'),
            'total_price' => Yii::t('app', 'Total Price'),
        ];
    }
}
