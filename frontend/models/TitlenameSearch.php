<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Titlename;

/**
 * TitlenameSearch represents the model behind the search form about `app\models\Titlename`.
 */
class TitlenameSearch extends Titlename
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_titlename'], 'integer'],
            [['titlename_en', 'titlename_th'], 'safe'],
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
        $query = Titlename::find();

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
            'id_titlename' => $this->id_titlename,
        ]);

        $query->andFilterWhere(['like', 'titlename_en', $this->titlename_en])
            ->andFilterWhere(['like', 'titlename_th', $this->titlename_th]);

        return $dataProvider;
    }
}
