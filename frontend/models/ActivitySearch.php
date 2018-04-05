<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form about `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actitaty_id', 'fac_id', 'typefac_id'], 'integer'],
            [['act_id', 'act_name', 'act_term', 'act_sday', 'act_eday', 'act_comment', 'status', 'id_username'], 'safe'],
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
        $query = Activity::find();

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
            'actitaty_id' => $this->actitaty_id,
            'fac_id' => $this->fac_id,
            'typefac_id' => $this->typefac_id,
            'act_sday' => $this->act_sday,
            'act_eday' => $this->act_eday,
        ]);

        $query->andFilterWhere(['like', 'act_id', $this->act_id])
            ->andFilterWhere(['like', 'act_name', $this->act_name])
            ->andFilterWhere(['like', 'act_term', $this->act_term])
            ->andFilterWhere(['like', 'act_comment', $this->act_comment])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'id_username', $this->id_username]);

        return $dataProvider;
    }
}
