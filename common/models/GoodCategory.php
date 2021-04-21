<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good_category".
 *
 * @property int $category_id
 * @property int $good_id
 */
class GoodCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'good_id'], 'required'],
            [['category_id', 'good_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'good_id' => Yii::t('app', 'Good ID'),
        ];
    }
}
