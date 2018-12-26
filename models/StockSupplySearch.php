<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StockSupply;

/**
 * StockSupplySearch represents the model behind the search form of `app\models\StockSupply`.
 */
class StockSupplySearch extends StockSupply
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'wood_id', 'price', 'length', 'diameter', 'count', 'volume'], 'integer'],
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
        $query = StockSupply::find();

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
            'wood_id' => $this->wood_id,
            'price' => $this->price,
            'length' => $this->length,
            'diameter' => $this->diameter,
            'count' => $this->count,
            'volume' => $this->volume,
        ]);

        return $dataProvider;
    }
}
