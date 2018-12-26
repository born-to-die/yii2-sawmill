<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supply;

/**
 * SupplySearch represents the model behind the search form of `app\models\Supply`.
 */
class SupplySearch extends Supply
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vendor_id', 'wood_id', 'price', 'length', 'diameter', 'count', 'volume', 'arrived'], 'integer'],
            [['date'], 'safe'],
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
        $query = Supply::find();

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
            'date' => $this->date,
            'vendor_id' => $this->vendor_id,
            'wood_id' => $this->wood_id,
            'price' => $this->price,
            'length' => $this->length,
            'diameter' => $this->diameter,
            'count' => $this->count,
            'volume' => $this->volume,
            'arrived' => $this->arrived,
        ]);

        return $dataProvider;
    }
}
