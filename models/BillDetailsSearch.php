<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BillDetails;

/**
 * BillDetailsSearch represents the model behind the search form of `app\models\BillDetails`.
 */
class BillDetailsSearch extends BillDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'product'], 'integer'],
            [['unit_price', 'quantity', 'tax'], 'number'],
            [['ACCOUNT', 'bill_no'], 'safe'],
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
        $query = BillDetails::find();

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
            'unit_price' => $this->unit_price,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'product' => $this->product,
            'tax' => $this->tax,
        ]);

        $query->andFilterWhere(['like', 'ACCOUNT', $this->ACCOUNT])
            ->andFilterWhere(['like', 'bill_no', $this->bill_no]);

        return $dataProvider;
    }
}
