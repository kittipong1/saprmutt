<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property integer $Faculty_id
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
}
