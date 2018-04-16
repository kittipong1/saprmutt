<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Joinactivity;

/**
 * ViewjoinbymeSearch represents the model behind the search form about `app\models\Joinactivity`.
 */
class ViewjoinbymeSearch extends Joinactivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_joinactivity'], 'integer'],
            [['studennumber', 'id_actitaty'], 'safe'],
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
        $query = Joinactivity::find()->joinWith('activity','joinactivity.id_actitaty=activity.act_id')->where(['activity.id_username'=>Yii::$app->user->identity->id]);
        // $query->and(['activity.id_username'=>1]);
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
        ]);

        $query->andFilterWhere(['like', 'studennumber', $this->studennumber])
            ->andFilterWhere(['like', 'id_actitaty', $this->id_actitaty]);

        return $dataProvider;
    }
}
