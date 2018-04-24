<?php

namespace backend\models;

use Yii;
use app\models\Activity;
/**
 * This is the model class for table "faculty".
 *
 * @property string $Faculty_id
 * @property string $Fac_key
 * @property string $Fac_name
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fac_key', 'Fac_name'], 'required'],
            [['Fac_key'], 'string', 'max' => 2],
            [['Fac_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Faculty_id' => 'ลำดับสาขา ',
            'Fac_key' => 'รหัสคณะ',
            'Fac_name' => 'ชื่อคณะ',
        ];
    }

    public function getActivity()
    {
        return $this->hasMany(Activity::className(), ['fac_id' => 'Fac_key']);
    }
}
