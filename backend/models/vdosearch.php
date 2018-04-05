<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\vdo;

/**
 * vdosearch represents the model behind the search form about `app\models\vdo`.
 */
class vdosearch extends vdo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vdo_id', 'ref_id', 'vdo_view'], 'integer'],
            [['path', 'vdo_name', 'status', 'vdo_description', 'create_date', 'create_by', 'modified_date'], 'safe'],
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
        $query = vdo::find();

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
            'vdo_id' => $this->vdo_id,
            'ref_id' => $this->ref_id,
            'create_date' => $this->create_date,
            'modified_date' => $this->modified_date,
            'vdo_view' => $this->vdo_view,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'vdo_name', $this->vdo_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'vdo_description', $this->vdo_description])
            ->andFilterWhere(['like', 'create_by', $this->create_by]);
        
        return $dataProvider;
    }
}
