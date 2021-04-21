<?php

namespace common\models;

use Yii;

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
            [['name', 'slug'], 'required'],
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
        return $this->hasMany(Good::className(), ['id' => 'good_id'])
            ->viaTable('good_category', ['category_id' => 'id']);
    }


    private function buildT2ree($model)
    {

        $oneLvl = [];
        $otherLvl = [];


        foreach ($model as $key => $value){
            if ($value->parent_id === 0){
                $oneLvl[] = $value;
            }else{
                $otherLvl[] = $value;
            }
        }


        foreach ($otherLvl as $key => $value){


            $value->parent_id;


        }








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
