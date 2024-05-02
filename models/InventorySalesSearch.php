<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventorySales;

/**
 * InventorySalesSearch represents the model behind the search form of `app\models\InventorySales`.
 */
class InventorySalesSearch extends InventorySales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'store', 'cerated_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['customer', 'sale_date', 'bank_account'], 'safe'],
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
        $query = InventorySales::find();

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
            'store' => $this->store,
            'cerated_at' => $this->cerated_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'sale_date', $this->sale_date])
            ->andFilterWhere(['like', 'bank_account', $this->bank_account]);

        return $dataProvider;
    }
}
