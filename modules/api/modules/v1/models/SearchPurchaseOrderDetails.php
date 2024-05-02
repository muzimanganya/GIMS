<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\PurchaseOrderDetails;

/**
 * SearchPurchaseOrderDetails represents the model behind the search form of `app\modules\api\modules\v1\models\PurchaseOrderDetails`.
 */
class SearchPurchaseOrderDetails extends PurchaseOrderDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'memo', 'product', 'order_no'], 'safe'],
            [['created_at', 'updated_at', 'quantity', 'price', 'tax', 'created_by', 'updated_by'], 'integer'],
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
        $query = PurchaseOrderDetails::find();

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
            'quantity' => $this->quantity,
            'price' => $this->price,
            'tax' => $this->tax,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'order_no', $this->order_no]);

        return $dataProvider;
    }
}
