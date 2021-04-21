<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good".
 *
 * @property int $id
 * @property string $name
 * @property int $provider
 * @property float|null $weight
 * @property float|null $height
 * @property float|null $width
 * @property float|null $volume
 * @property int $have_wrap
 * @property int $quantity
 * @property string $slug
 */
class Good extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'provider', 'have_wrap', 'slug'], 'required'],
            [['provider', 'have_wrap', 'quantity'], 'integer'],
            [['weight', 'height', 'width', 'volume'], 'number'],
            [['slug', 'name'], 'string', 'max' => 254],
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
            'provider' => Yii::t('app', 'Provider'),
            'weight' => Yii::t('app', 'Weight'),
            'height' => Yii::t('app', 'Height'),
            'width' => Yii::t('app', 'Width'),
            'volume' => Yii::t('app', 'Volume'),
            'have_wrap' => Yii::t('app', 'Have Wrap'),
            'quantity' => Yii::t('app', 'Quantity'),
            'slug' => Yii::t('app', 'Slug'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('good_category', ['good_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }

}
