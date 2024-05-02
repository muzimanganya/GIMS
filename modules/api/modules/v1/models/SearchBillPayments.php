<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\BillPayments;

/**
 * SearchBillPayments represents the model behind the search form of `app\modules\api\modules\v1\models\BillPayments`.
 */
class SearchBillPayments extends BillPayments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'amount', 'created_at', 'updated_at', 'created_by', 'updated_by', 'account'], 'integer'],
            [['payment_mode', 'bill', 'purchase_order', 'bank_account'], 'safe'],
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
        $query = BillPayments::find();

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
            'no' => $this->no,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'account' => $this->account,
        ]);

        $query->andFilterWhere(['like', 'payment_mode', $this->payment_mode])
            ->andFilterWhere(['like', 'bill', $this->bill])
            ->andFilterWhere(['like', 'purchase_order', $this->purchase_order])
            ->andFilterWhere(['like', 'bank_account', $this->bank_account]);

        return $dataProvider;
    }
}
