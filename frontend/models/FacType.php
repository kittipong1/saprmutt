<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fac_type".
 *
 * @property integer $id_type
 * @property string $type_name
 */
class FacType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fac_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_type' => 'Id Type',
            'type_name' => 'ประเภทของกิจกรรม',
        ];
    }
}
