<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\news;

/**
 * newssearch represents the model behind the search form about `app\models\news`.
 */
class newssearch extends news
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'news_type_id', 'user_id', 'news_type_lang', 'news_view'], 'integer'],
            [['news_name', 'news_explain', 'news_image', 'create_date', 'modified_date', 'active'], 'safe'],
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
        $query = news::find();

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
            'news_id' => $this->news_id,
            'news_type_id' => $this->news_type_id,
            'user_id' => $this->user_id,
            'news_type_lang' => $this->news_type_lang,
            'create_date' => $this->create_date,
            'modified_date' => $this->modified_date,
            'news_view' => $this->news_view,
        ]);

        $query->andFilterWhere(['like', 'news_name', $this->news_name])
            ->andFilterWhere(['like', 'news_explain', $this->news_explain])
            ->andFilterWhere(['like', 'news_image', $this->news_image])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
