<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $parent_id
 */
class Category extends \yii\db\ActiveRecord
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
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['parent_id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 254],
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
            'slug' => Yii::t('app', 'Slug'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getGoods2()
    {
        return self::find()->where(['or',
            ['=','parent_id', $this->id],
            ['=','id', $this->id],
        ])->with('goods')->all();
    }


    private static function buildTree($data)
    {

        $childs = array();

        foreach($data as &$item) {
            $childs[$item['parent_id']][] = &$item;
            unset($item);
        }

        foreach($data as &$item) {
            if (isset($childs[$item['id']])) {
                $item['childs'] = $childs[$item['id']];
            }
        }

        return $childs[0];
    }


    public static function getStructCategories()
    {
        $categories = self::find()->asArray()->all();

        return self::buildTree($categories);
    }

    public function getStructCategoriesById($id)
    {
        $categories = self::findOne($id);

        return self::buildTree($categories);
    }

}
