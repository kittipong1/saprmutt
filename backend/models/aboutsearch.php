<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\About;

/**
 * aboutsearch represents the model behind the search form about `backend\models\About`.
 */
class aboutsearch extends About
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['about_id', 'user_id', 'about_view'], 'integer'],
            [['about_description', 'create_date', 'midified_date'], 'safe'],
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
        $query = About::find();

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
            'about_id' => $this->about_id,
            'user_id' => $this->user_id,
            'create_date' => $this->create_date,
            'midified_date' => $this->midified_date,
            'about_view' => $this->about_view,
        ]);

        $query->andFilterWhere(['like', 'about_description', $this->about_description]);

        return $dataProvider;
    }
}
