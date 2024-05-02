<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\Invoices;

/**
 * SearchInvoices represents the model behind the search form of `app\modules\api\modules\v1\models\Invoices`.
 */
class SearchInvoices extends Invoices
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'memo', 'status', 'payment_due', 'customer', 'idate', 'currency'], 'safe'],
            [['discount', 'created_at', 'updated_at', 'created_by', 'updated_by', 'branch'], 'integer'],
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
        $query = Invoices::find();

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
            'discount' => $this->discount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'branch' => $this->branch,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'payment_due', $this->payment_due])
            ->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'idate', $this->idate])
            ->andFilterWhere(['like', 'currency', $this->currency]);

        return $dataProvider;
    }
}
