<?php

namespace app\models;

use Yii;
use app\models\Activity;
use app\models\Studen;
/**
 * This is the model class for table "joinactivity".
 *
 * @property integer $id_joinactivity
 * @property integer $studennumber
 * @property integer $id_actitaty
 */
class joinactivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $csv_path;
    public static function tableName()
    {
        return 'joinactivity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studennumber', 'id_actitaty'], 'required'],
            [['studennumber'], 'string', 'max' => 255],
            [['id_actitaty'], 'string', 'max' => 9],
            [['csv_path'],'file','skipOnEmpty'=>true,'on' => 'update','extensions'=>'csv'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_joinactivity' => 'Id Joinactivity',
            'studennumber' => 'รหัสนักศึกษา',
            'id_actitaty' => 'รหัสกิจกรรม',
            'csv_path'=>'file *.csv',
        ];
    }
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['act_id' => 'id_actitaty']);
    }
}
