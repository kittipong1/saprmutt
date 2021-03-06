<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\joinactivity;

/**
 * JoinactivitySearch represents the model behind the search form about `app\models\joinactivity`.
 */
class JoinactivitySearch extends joinactivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_joinactivity', 'id_actitaty'], 'integer'],
            [['studennumber'], 'string'],
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
        $query = joinactivity::find()->with('student')->orderBy(['id_joinactivity'=>SORT_DESC]);

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
            'id_joinactivity' => $this->id_joinactivity,
            'studennumber' => $this->studennumber,
            'id_actitaty' => $this->id_actitaty,
            'student.Stu_name_th' => $this->student['Stu_name_th'],
        ]);

        return $dataProvider;
    }
}
