<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\BillDetails;

/**
 * SearchBillDetails represents the model behind the search form of `app\modules\api\modules\v1\models\BillDetails`.
 */
class SearchBillDetails extends BillDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'price', 'tax', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['bill', 'purchase_order', 'item'], 'safe'],
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
            'quantity' => $this->quantity,
            'price' => $this->price,
            'tax' => $this->tax,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'bill', $this->bill])
            ->andFilterWhere(['like', 'purchase_order', $this->purchase_order])
            ->andFilterWhere(['like', 'item', $this->item]);

        return $dataProvider;
    }
}
