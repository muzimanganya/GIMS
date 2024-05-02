<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PurchaseOrders;

/**
 * PurchaseOrdersSearch represents the model behind the search form of `app\models\PurchaseOrders`.
 */
class PurchaseOrdersSearch extends PurchaseOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_number', 'tax_calculation', 'created_at', 'updated_at', 'id', 'created_by', 'updated_by', 'supplier'], 'integer'],
            [['po_date', 'reference', 'due_date', 'STATUS', 'note'], 'safe'],
            [['amount'], 'number'],
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
        $query = PurchaseOrders::find();

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
            'purchase_number' => $this->purchase_number,
            'tax_calculation' => $this->tax_calculation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'amount' => $this->amount,
            'id' => $this->id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'supplier' => $this->supplier,
        ]);

        $query->andFilterWhere(['like', 'po_date', $this->po_date])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'due_date', $this->due_date])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
