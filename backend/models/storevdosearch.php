<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\storevdo;

/**
 * storevdosearch represents the model behind the search form about `app\models\storevdo`.
 */
class storevdosearch extends storevdo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'user_id'], 'integer'],
            [['store_name', 'create_date', 'modified_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = storevdo::find();

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
            'store_id' => $this->store_id,
            'user_id' => $this->user_id,
            'create_date' => $this->create_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'store_name', $this->store_name]);

        return $dataProvider;
    }
}
