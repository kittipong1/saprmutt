<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use app\models\studen;
use app\models\Information;
/**
 * CheckstudentbyfacultySearch represents the model behind the search form about `app\models\studen`.
 */
class CheckstudentbyfacultySearch extends studen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_information', 'teacher_id', 'major_id'], 'integer'],
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
   
        $faculty = Information::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
        
        if(!empty($faculty)){
             $query = studen::find()->where(['Fac_id'=>$faculty->Fac_id]);
         }else {
            echo '<script>
                alert("ไม่มีนักศึกษาในคณะนี้");
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
