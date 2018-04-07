<?php

namespace app\models;

use Yii;

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
            [['studennumber', 'id_actitaty'], 'integer'],
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
        ];
    }
}
