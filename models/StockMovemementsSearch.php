<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StockMovemements;

/**
 * StockMovemementsSearch represents the model behind the search form of `app\models\StockMovemements`.
 */
class StockMovemementsSearch extends StockMovemements
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'store_from', 'store_to', 'product'], 'integer'],
            [['mouvement_date', 'TYPE', 'reference'], 'safe'],
            [['quantitty'], 'number'],
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
        $query = StockMovemements::find();

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
            'quantitty' => $this->quantitty,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'store_from' => $this->store_from,
            'store_to' => $this->store_to,
            'product' => $this->product,
        ]);

        $query->andFilterWhere(['like', 'mouvement_date', $this->mouvement_date])
            ->andFilterWhere(['like', 'TYPE', $this->TYPE])
            ->andFilterWhere(['like', 'reference', $this->reference]);

        return $dataProvider;
    }
}
