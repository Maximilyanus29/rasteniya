<?php

namespace frontend\models;

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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provider_id', 'root_system', 'quantity', 'price', 'discount_price', 'limit'], 'integer'],
            [['name', 'slug', 'vendor_code', 'description', 'sort', 'order'], 'safe'],
            [['weight', 'height', 'width', 'volume'], 'number'],
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
        $query = GoodModel::find()->joinWith('category')->where(['or',
            ['=','category.id', $this->category_id],
            ['=','category.parent_id', $this->category_id],
        ]);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'price' => SORT_DESC,
                ],
//                'attributes' => [
//                    'pd.name'=>[
//                        'asc' => ['name' => SORT_ASC],
//                        'desc' => ['name' => SORT_DESC],
//                        'default' => SORT_DESC,
//                        'label' => 'Name',
//                    ],
//                    'p.price'=>[
//                        'asc' => ['price' => SORT_ASC],
//                        'desc' => ['price' => SORT_DESC,],
//                        'default' => SORT_DESC,
//                        'label' => 'Name',
//                    ],
////                    'rating'=>[
////                        'asc' => ['rating' => SORT_ASC, ],
////                        'desc' => ['rating' => SORT_DESC, ],
////                        'default' => SORT_DESC,
////                        'label' => 'Name',
////                    ],
//                    'p.model'=>[
//                        'asc' => ['vendor_code' => SORT_ASC, ],
//                        'desc' => ['vendor_code' => SORT_DESC, ],
//                        'default' => SORT_DESC,
//                        'label' => 'Name',
//                    ],
//                ],
            ],
        ]);


        $this->load($params);

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
