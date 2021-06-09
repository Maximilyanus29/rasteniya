<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderCheckout;

/**
 * OrderCheckoutSearch represents the model behind the search form of `common\models\OrderCheckout`.
 */
class OrderCheckoutSearch extends OrderCheckout
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'payment_hash'], 'integer'],
            [['name', 'email', 'phone', 'delivery_address', 'delivery_method', 'payment_method', 'comment'], 'safe'],
            [['total_price', 'delivery_price', 'discount_price'], 'number'],
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
        $query = OrderCheckout::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'total_price' => $this->total_price,
            'delivery_price' => $this->delivery_price,
            'discount_price' => $this->discount_price,
            'user_id' => $this->user_id,
            'payment_hash' => $this->payment_hash,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'delivery_address', $this->delivery_address])
            ->andFilterWhere(['like', 'delivery_method', $this->delivery_method])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
