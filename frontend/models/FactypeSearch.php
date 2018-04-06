<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FacType;

/**
 * FactypeSearch represents the model behind the search form about `app\models\FacType`.
 */
class FactypeSearch extends FacType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_type'], 'integer'],
            [['type_name'], 'safe'],
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
        $query = FacType::find();

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
            'id_type' => $this->id_type,
        ]);

        $query->andFilterWhere(['like', 'type_name', $this->type_name]);

        return $dataProvider;
    }
}
