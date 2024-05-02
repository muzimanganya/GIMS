<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\Bills;

/**
 * SearchBills represents the model behind the search form of `app\modules\api\modules\v1\models\Bills`.
 */
class SearchBills extends Bills
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'memo', 'bill_document', 'purchase_order'], 'safe'],
            [['created_at', 'updated_at', 'created_by','status', 'updated_by'], 'integer'],
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
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'bill_document', $this->bill_document])
            ->andFilterWhere(['like', 'purchase_order', $this->purchase_order]);

        return $dataProvider;
    }
}
