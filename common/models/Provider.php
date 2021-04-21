<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "provider".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property float $profit_in_percent
 */
class Provider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'profit_in_percent'], 'required'],
            [['profit_in_percent'], 'number'],
            [['name', 'address'], 'string', 'max' => 254],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'profit_in_percent' => Yii::t('app', 'Profit In Percent'),
        ];
    }
}
