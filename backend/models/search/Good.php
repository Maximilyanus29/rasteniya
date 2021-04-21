<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Good as GoodModel;

/**
 * Good represents the model behind the search form of `common\models\Good`.
 */
class Good extends GoodModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provider_id', 'have_wrap', 'quantity', 'price', 'discount_price'], 'integer'],
            [['name', 'slug', 'vendor_code', 'description'], 'safe'],
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
        $query = GoodModel::find();

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
            'provider_id' => $this->provider_id,
            'weight' => $this->weight,
            'height' => $this->height,
            'width' => $this->width,
            'volume' => $this->volume,
            'have_wrap' => $this->have_wrap,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'vendor_code', $this->vendor_code])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
