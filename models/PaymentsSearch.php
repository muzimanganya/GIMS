<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payments;

/**
 * PaymentsSearch represents the model behind the search form of `app\models\Payments`.
 */
class PaymentsSearch extends Payments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NO', 'created_at', 'updated_at', 'created_by', 'updated_by', 'payment_mode'], 'integer'],
            [['amount', 'outstanding'], 'number'],
            [['reference', 'date_of_payment', 'currency', 'bill_no', 'pay_from'], 'safe'],
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
        $query = Payments::find();

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
            'NO' => $this->NO,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'outstanding' => $this->outstanding,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'payment_mode' => $this->payment_mode,
        ]);

        $query->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'date_of_payment', $this->date_of_payment])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'bill_no', $this->bill_no])
            ->andFilterWhere(['like', 'pay_from', $this->pay_from]);

        return $dataProvider;
    }
}
