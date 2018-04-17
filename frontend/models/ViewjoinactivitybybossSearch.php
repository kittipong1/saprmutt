<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\joinactivity;
use app\models\Information;
/**
 * ViewjoinactivitybybossSearch represents the model behind the search form about `app\models\joinactivity`.
 */
class ViewjoinactivitybybossSearch extends joinactivity
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
        $Information = Information::find()->with('faculty')->where(['user_id'=>Yii::$app->user->identity->id])->one();
        if(!empty($Information)){
            $fac_id = $Information->faculty['Fac_key'];
             $query = Joinactivity::find()->joinWith('activity','joinactivity.id_actitaty=activity.act_id')->where(['activity.fac_id'=>$fac_id]);
        }else{
            $query = Joinactivity::find()->joinWith('activity','joinactivity.id_actitaty=activity.act_id')->where(['activity.fac_id'=>-1]);

        }
        
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
