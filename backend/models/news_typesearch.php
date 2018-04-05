<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\newstype;

/**
 * news_typesearch represents the model behind the search form about `app\models\newstype`.
 */
class news_typesearch extends newstype
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_type_id'], 'integer'],
            [['news_type_name', 'create_date', 'create_by', 'modified_date'], 'safe'],
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
        $query = newstype::find();

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
            'news_type_id' => $this->news_type_id,
            'create_date' => $this->create_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'news_type_name', $this->news_type_name])
            ->andFilterWhere(['like', 'create_by', $this->create_by]);

        return $dataProvider;
    }
}
