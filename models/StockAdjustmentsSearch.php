<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StockAdjustments;

/**
 * StockAdjustmentsSearch represents the model behind the search form of `app\models\StockAdjustments`.
 */
class StockAdjustmentsSearch extends StockAdjustments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'TYPE', 'created_at', 'updated_at', 'created_by', 'updated_by', 'product', 'store'], 'integer'],
            [['adjustement_date', 'reference', 'observation', 'ACCOUNT'], 'safe'],
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
        $query = StockAdjustments::find();

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
            'TYPE' => $this->TYPE,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'product' => $this->product,
            'store' => $this->store,
        ]);

        $query->andFilterWhere(['like', 'adjustement_date', $this->adjustement_date])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'ACCOUNT', $this->ACCOUNT]);

        return $dataProvider;
    }
}
