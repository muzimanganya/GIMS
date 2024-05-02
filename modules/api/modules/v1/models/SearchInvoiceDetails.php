<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\InvoiceDetails;

/**
 * SearchInvoiceDetails represents the model behind the search form of `app\modules\api\modules\v1\models\InvoiceDetails`.
 */
class SearchInvoiceDetails extends InvoiceDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'price', 'currency', 'created_at', 'updated_at', 'reconciled', 'created_by', 'updated_by'], 'integer'],
            [['item', 'invoice'], 'safe'],
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
    public function search($params,$id=null)
    {
        $query = InvoiceDetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if(!is_null($id))
        $query->andWhere(['invoice'=>$id]);

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
            'currency' => $this->currency,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'reconciled' => $this->reconciled,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'item', $this->item])
            ->andFilterWhere(['like', 'invoice', $this->invoice]);

        return $dataProvider;
    }
}
