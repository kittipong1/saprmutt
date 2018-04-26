<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\Studen;
use app\models\Information;
/**
 * CheckstudentbyteacherSearch represents the model behind the search form about `app\models\studen`.
 */
class CheckstudentbyteacherSearch extends studen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_information', 'teacher_id', 'major_id'], 'integer'],
            [['Stu_id', 'idtitle_id', 'Stu_name_th', 'Stu_lastname_th', 'Fac_id'], 'safe'],
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
        $teacherid = Information::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
        if(!empty($teacherid)){
             $query = Studen::find()->where(['teacher_id'=>$teacherid->information_id]);
         }else {
            echo '<script>
                alert("ไม่มีนักศึกษาในที่ปรึกษา");
    setTimeout(function(){  window.location.assign("'.Url::to(['site/profile']).'")}, 10);

            </script>';
             exit();
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
            'Id_information' => $this->Id_information,
            'teacher_id' => $this->teacher_id,
            'major_id' => $this->major_id,
        ]);

        $query->andFilterWhere(['like', 'Stu_id', $this->Stu_id])
            ->andFilterWhere(['like', 'idtitle_id', $this->idtitle_id])
            ->andFilterWhere(['like', 'Stu_name_th', $this->Stu_name_th])
            ->andFilterWhere(['like', 'Stu_lastname_th', $this->Stu_lastname_th])
            ->andFilterWhere(['like', 'Fac_id', $this->Fac_id]);

        return $dataProvider;
    }
}
