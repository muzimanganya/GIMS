<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_sold', 'is_purchase', 'reorder_level', 'created_at', 'updated_at', 'created_by', 'updated_by', 'product_model', 'product_category', 'product_type', 'product_brand'], 'integer'],
            [['NAME', 'description', 'sales_account', 'purchase_account', 'discount_account', 'measure'], 'safe'],
            [['purchase_price', 'sales_price', 'sales_tax', 'purchase_tax'], 'number'],
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
            'id' => $this->id,
            'purchase_price' => $this->purchase_price,
            'sales_price' => $this->sales_price,
            'is_sold' => $this->is_sold,
            'is_purchase' => $this->is_purchase,
            'reorder_level' => $this->reorder_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'product_model' => $this->product_model,
            'product_category' => $this->product_category,
            'product_type' => $this->product_type,
            'sales_tax' => $this->sales_tax,
            'purchase_tax' => $this->purchase_tax,
            'product_brand' => $this->product_brand,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'sales_account', $this->sales_account])
            ->andFilterWhere(['like', 'purchase_account', $this->purchase_account])
            ->andFilterWhere(['like', 'discount_account', $this->discount_account])
            ->andFilterWhere(['like', 'measure', $this->measure]);

        return $dataProvider;
    }
}
