<?php

namespace common\models;

use frontend\components\Helper;
use Yii;
use yii\behaviors\SluggableBehavior;

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
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                 'slugAttribute' => 'slug',
            ],
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


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
            [['name', 'provider_id',], 'required'],
            [['provider_id', 'quantity'], 'integer'],
            [['weight', 'height', 'width', 'volume'], 'number'],
            [['slug', 'name'], 'string', 'max' => 254],
            ['hash', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => 'Наименование',
            'provider' => "Поставщик",
            'weight' => "Вес",
            'height' => "Высота",
            'width' => "ширина",
            'volume' => "обьем",
            'root_system' => "Корневая система",
            'quantity' => "количество",
            'price' => "цена",
            'discount_price' => "цена по скидке",
            'vendor_code' => "артикул",
            'description' => "описание",
            'provider_id' => "Поставщик",

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

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'provider_id']);
    }

    public static function sortByCity($goods)
    {
        $currentCity = Helper::getCity();
        $currentCityCoordinats = Helper::getCity()->lat + Helper::getCity()->lng;

        $recommendedGoods = [];
        $resGoods = [];
        $mapCoordinatsSum = [];

        for ($i = 0; $i < count($goods)  ; $i++){
            $good = $goods[$i];
            if ($good->provider->city_id === $currentCity->id){
                $resGoods[] = $goods[$i];
            }else{
                $mapCoordinatsSum[$i] = abs(($good->provider->city->lat + $good->provider->city->lng) - $currentCityCoordinats);
            }
        }

        sort($mapCoordinatsSum);

        for ($i = 0; $i < count($goods)  ; $i++){
            $good = $goods[$i];
            $key = array_search (abs(($good->provider->city->lat + $good->provider->city->lng) - $currentCityCoordinats), $mapCoordinatsSum);
            if ($key !== false){
                $recommendedGoods[$key] = $good;
                unset($mapCoordinatsSum[$key]);
            }
        }

        return[
            'goods' => $resGoods,
            'recommended' => $recommendedGoods,
        ];
    }





}
