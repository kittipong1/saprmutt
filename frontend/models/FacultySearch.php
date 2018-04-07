<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\faculty;

/**
 * FacultySearch represents the model behind the search form about `app\models\faculty`.
 */
class FacultySearch extends faculty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Faculty_id'], 'integer'],
            [['Fac_key', 'Fac_name'], 'safe'],
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
        $query = faculty::find();

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
            'Faculty_id' => $this->Faculty_id,
        ]);

        $query->andFilterWhere(['like', 'Fac_key', $this->Fac_key])
            ->andFilterWhere(['like', 'Fac_name', $this->Fac_name]);

        return $dataProvider;
    }
}
