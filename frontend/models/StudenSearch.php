<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\studen;

/**
 * StudenSearch represents the model behind the search form about `app\models\studen`.
 */
class StudenSearch extends studen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_information', 'teacher_id'], 'integer'],
            [['Stu_id', 'Stu_id_card', 'idtitle_id', 'Stu_name_en', 'Stu_lastname_en', 'Stu_name_th', 'Stu_lastname_th', 'Stu_birht_day', 'Stu_Add', 'Stu_mail', 'Stu_phone', 'Fac_id', 'Stu_avatar'], 'safe'],
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
        $query = studen::find();

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
            'Id_information' => $this->Id_information,
            'Stu_birht_day' => $this->Stu_birht_day,
            'teacher_id' => $this->teacher_id,
        ]);

        $query->andFilterWhere(['like', 'Stu_id', $this->Stu_id])
            ->andFilterWhere(['like', 'Stu_id_card', $this->Stu_id_card])
            ->andFilterWhere(['like', 'idtitle_id', $this->idtitle_id])
            ->andFilterWhere(['like', 'Stu_name_en', $this->Stu_name_en])
            ->andFilterWhere(['like', 'Stu_lastname_en', $this->Stu_lastname_en])
            ->andFilterWhere(['like', 'Stu_name_th', $this->Stu_name_th])
            ->andFilterWhere(['like', 'Stu_lastname_th', $this->Stu_lastname_th])
            ->andFilterWhere(['like', 'Stu_Add', $this->Stu_Add])
            ->andFilterWhere(['like', 'Stu_mail', $this->Stu_mail])
            ->andFilterWhere(['like', 'Stu_phone', $this->Stu_phone])
            ->andFilterWhere(['like', 'Fac_id', $this->Fac_id])
            ->andFilterWhere(['like', 'Stu_avatar', $this->Stu_avatar]);

        return $dataProvider;
    }
}
