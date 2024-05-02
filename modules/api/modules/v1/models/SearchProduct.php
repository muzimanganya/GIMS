<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\Products;

/**
 * SearchProduct represents the model behind the search form of `app\modules\api\modules\v1\models\Product`.
 */
class SearchProduct extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'category', 'memo', 'unit'], 'safe'],
            [['type', 'tax', 'quantitt', 'buying_price', 'selling_price', 'created_at', 'updated_at', 'status', 'created_by', 'updated_by'], 'integer'],
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
        $query = Products::find();

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
            'type' => $this->type,
            'tax' => $this->tax,
            'quantitt' => $this->quantitt,
            'buying_price' => $this->buying_price,
            'selling_price' => $this->selling_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
