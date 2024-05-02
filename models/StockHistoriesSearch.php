<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StockHistories;

/**
 * StockHistoriesSearch represents the model behind the search form of `app\models\StockHistories`.
 */
class StockHistoriesSearch extends StockHistories
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_in', 'stock_out', 'previous_balance', 'Balance', 'previous_price', 'new_price', 'current_price', 'quantity'], 'number'],
            [['id', 'product', 'store'], 'integer'],
            [['type', 'reference'], 'safe'],
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
        $query = StockHistories::find();

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
            'stock_in' => $this->stock_in,
            'stock_out' => $this->stock_out,
            'previous_balance' => $this->previous_balance,
            'Balance' => $this->Balance,
            'id' => $this->id,
            'previous_price' => $this->previous_price,
            'new_price' => $this->new_price,
            'current_price' => $this->current_price,
            'quantity' => $this->quantity,
            'product' => $this->product,
            'store' => $this->store,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'reference', $this->reference]);

        return $dataProvider;
    }
}
