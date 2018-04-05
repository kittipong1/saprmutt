<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $lan_id
 * @property string $lan_code
 * @property string $lan_flag
 * @property string $lan_name
 * @property boolean $active
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'boolean'],
            [['lan_code'], 'string', 'max' => 10],
            [['lan_flag', 'lan_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lan_id' => 'รหัสภาษา',
            'lan_code' => 'Lan Code',
            'lan_flag' => 'Lan Flag',
            'lan_name' => 'ชื่อภาษา',
            'active' => 'Active',
        ];
    }
}
