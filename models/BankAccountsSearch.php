<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankAccounts;

/**
 * BankAccountsSearch represents the model behind the search form of `app\models\BankAccounts`.
 */
class BankAccountsSearch extends BankAccounts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'account_number', 'currency'], 'safe'],
            [['on_dashboard', 'restricted', 'created_by', 'updated_by'], 'integer'],
            [['balance'], 'number'],
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
        $query = BankAccounts::find();

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
            'on_dashboard' => $this->on_dashboard,
            'restricted' => $this->restricted,
            'balance' => $this->balance,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'account_number', $this->account_number])
            ->andFilterWhere(['like', 'currency', $this->currency]);

        return $dataProvider;
    }
}
