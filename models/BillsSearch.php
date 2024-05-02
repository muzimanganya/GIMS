<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bills;

/**
 * BillsSearch represents the model behind the search form of `app\models\Bills`.
 */
class BillsSearch extends Bills
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bill_no', 'bill_date', 'reference', 'STATUS', 'tax_catculation', 'note', 'due_date'], 'safe'],
            [['created_at', 'updated_at', 'id', 'created_by', 'updated_by', 'vendor', 'purchase_number'], 'integer'],
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
        $query = Bills::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'amount' => $this->amount,
            'id' => $this->id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'vendor' => $this->vendor,
            'purchase_number' => $this->purchase_number,
        ]);

        $query->andFilterWhere(['like', 'bill_no', $this->bill_no])
            ->andFilterWhere(['like', 'bill_date', $this->bill_date])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'tax_catculation', $this->tax_catculation])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'due_date', $this->due_date]);

        return $dataProvider;
    }
}
