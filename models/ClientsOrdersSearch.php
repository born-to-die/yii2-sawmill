<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientsOrders;

/**
 * ClientsOrdersSearch represents the model behind the search form of `app\models\ClientsOrders`.
 */
class ClientsOrdersSearch extends ClientsOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'material_id', 'wood_id', 'length', 'height', 'width', 'count', 'volume', 'price', 'completed'], 'integer'],
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
        $query = ClientsOrders::find();

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
            'client_id' => $this->client_id,
            'date' => $this->date,
            'material_id' => $this->material_id,
            'wood_id' => $this->wood_id,
            'length' => $this->length,
            'height' => $this->height,
            'width' => $this->width,
            'count' => $this->count,
            'volume' => $this->volume,
            'price' => $this->price,
            'completed' => $this->completed,
        ]);

        return $dataProvider;
    }
}
