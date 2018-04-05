<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\album;

/**
 * albumsearch represents the model behind the search form about `app\models\album`.
 */
class albumsearch extends album
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id', 'user_id', 'album_view'], 'integer'],
            [['album_name', 'create_date', 'modified_date', 'album_agencies'], 'safe'],
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
        $query = album::find();

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
            'album_id' => $this->album_id,
            'user_id' => $this->user_id,
            'create_date' => $this->create_date,
            'modified_date' => $this->modified_date,
            'album_view' => $this->album_view,
        ]);

        $query->andFilterWhere(['like', 'album_name', $this->album_name])
            ->andFilterWhere(['like', 'album_agencies', $this->album_agencies]);

        return $dataProvider;
    }
}
