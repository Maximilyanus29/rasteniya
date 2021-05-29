<?php

namespace frontend\models;

use frontend\components\Helper;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Good as GoodModel;

/**
 * Good represents the model behind the search form of `common\models\Good`.
 */
class GoodSearch extends GoodModel
{
    public $sort;
    public $order;
    public $limit;
    public $search;
    public $with_sub_category;
    public $with_description;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provider_id', 'category_id', 'root_system', 'quantity', 'price', 'discount_price', 'limit'], 'integer'],
            [['name', 'slug', 'vendor_code', 'description', 'sort', 'order', 'search'], 'safe'],
            [['weight', 'height', 'width', 'volume'], 'number'],
            [['with_sub_category', 'with_description'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GoodModel::find()->joinWith('category');




        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'price' => SORT_DESC,
                ],
            ],
        ]);


        $this->load($params);

        if (!empty($params['search'])){
            $this->search = $params['search'];
        }


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }




        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'provider_id' => $this->provider_id,
            'weight' => $this->weight,
            'height' => $this->height,
            'width' => $this->width,
            'volume' => $this->volume,
            'have_wrap' => $this->root_system,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
        ]);

        $query->andFilterWhere(['like', 'good.name', $this->name])
            ->andFilterWhere(['like', 'good.slug', $this->slug])
            ->andFilterWhere(['like', 'vendor_code', $this->vendor_code])
            ->andFilterWhere(['or',
                ['=','category.id', $this->category_id],
                ['=','category.parent_id', $this->category_id],
            ])
            ->andFilterWhere(['like', 'description', $this->description]);



        if (!empty($this->sort)){

            $sort = str_replace('-','',$this->sort);

            if (in_array($sort, ['price','rating','name','vendor_code'])){

                if (substr($this->sort,0,1)=='-'){
                    $query->orderBy([$sort =>  SORT_DESC]);
                }else{
                    $query->orderBy([$sort =>  SORT_ASC]);
                }


            }
        }



        if (!empty($this->limit)){

            $query->limit($this->limit);

        }


        /*for main Search*/



        if (!empty($this->with_description)){
            $query->andFilterWhere(['like', 'good.description', $this->search]);
        }else{
            $query->andFilterWhere(['like', 'good.name', $this->search]);

        }
//        if (!empty($this->with_sub_category)){
//            $query->andFilterWhere(['like', 'good.description', $this->search]);
//        }


        return $dataProvider;
    }

    public function mainSearch($params)
    {

        $query = GoodModel::find()->joinWith('category');


        $dataProvider = $this->searchParams($query, $params);

        $query->andFilterWhere(['=', 'category_id', $this->category_id]);
        $query->andFilterWhere(['like', 'name', $this->search]);

        return $dataProvider;
    }


    private function searchParams($query, $params)
    {

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'price' => SORT_DESC,
                ],
            ],
        ]);


        $this->load($params);


        if (!empty($params['search'])){
            $this->search = $params['search'];
        }

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }




        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'provider_id' => $this->provider_id,
            'weight' => $this->weight,
            'height' => $this->height,
            'width' => $this->width,
            'volume' => $this->volume,
            'have_wrap' => $this->root_system,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'vendor_code', $this->vendor_code])
            ->andFilterWhere(['like', 'description', $this->description]);


//        var_dump($this->order);die;



        if (!empty($this->sort)){

            $sort = str_replace('-','',$this->sort);

            if (in_array($sort, ['price','rating','name','vendor_code'])){

                if (substr($this->sort,0,1)=='-'){
                    $query->orderBy([$sort =>  SORT_DESC]);
                }else{
                    $query->orderBy([$sort =>  SORT_ASC]);
                }


            }
        }



        if (!empty($this->limit)){

            $query->limit($this->limit);

        }
        return $dataProvider;
    }
}
