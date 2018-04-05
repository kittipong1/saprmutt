<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Banner;

/**
 * bannersearch represents the model behind the search form about `backend\models\Banner`.
 */
class bannersearch extends Banner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ban_id', 'user_id', 'view'], 'integer'],
            [['ban_name', 'ban_link', 'ban_image', 'create_date', 'modified_date', 'start_date', 'end_date', 'ban_detail'], 'safe'],
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
        $query = Banner::find();

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
            'ban_id' => $this->ban_id,
            'user_id' => $this->user_id,
            'create_date' => $this->create_date,
            'modified_date' => $this->modified_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'view' => $this->view,
        ]);

        $query->andFilterWhere(['like', 'ban_name', $this->ban_name])
            ->andFilterWhere(['like', 'ban_link', $this->ban_link])
            ->andFilterWhere(['like', 'ban_image', $this->ban_image])
            ->andFilterWhere(['like', 'ban_detail', $this->ban_detail]);

        return $dataProvider;
    }
}
