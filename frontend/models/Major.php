<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "major".
 *
 * @property integer $major_id
 * @property string $major_name
 * @property integer $Faculty_id
 */
class Major extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['major_name', 'Faculty_id'], 'required'],
            [['Faculty_id'], 'integer'],
            [['major_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'major_id' => 'รหัสสาขา ',
            'major_name' => 'ชื่อสาขา',
            'Faculty_id' => 'ชื่อคณะ',
        ];
    }
}
