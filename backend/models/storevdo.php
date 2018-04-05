<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store_vdo".
 *
 * @property integer $store_id
 * @property integer $user_id
 * @property string $store_name
 * @property string $create_date
 * @property string $modified_date
 *
 * @property Vdo[] $vdos
 */
class storevdo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_vdo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'store_name', 'create_date', 'modified_date'], 'required'],
            [['user_id'], 'integer'],
            [['create_date', 'modified_date'], 'safe'],
            [['store_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => 'Store ID',
            'user_id' => 'id admin',
            'store_name' => 'Store Name',
            'create_date' => 'Create Date',
            'modified_date' => 'Modified Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVdos()
    {
        return $this->hasMany(Vdo::className(), ['ref_id' => 'store_id']);
    }
}
