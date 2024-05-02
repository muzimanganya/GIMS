<?php

namespace app\modules\api\modules\v1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\api\modules\v1\models\Estmates;

/**
 * SearchEstmates represents the model behind the search form of `app\modules\api\modules\v1\models\Estmates`.
 */
class SearchEstmates extends Estmates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'expiration_date', 'memo', 'customer'], 'safe'],
            [['status', 'discount', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
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
        $query = Estmates::find();

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
            'status' => $this->status,
            'discount' => $this->discount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'expiration_date', $this->expiration_date])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'customer', $this->customer]);

        return $dataProvider;
    }
}
