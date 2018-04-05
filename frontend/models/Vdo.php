<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vdo".
 *
 * @property integer $vdo_id
 * @property integer $ref_id
 * @property string $path
 * @property string $vdo_name
 * @property string $status
 * @property string $vdo_description
 * @property string $create_date
 * @property string $create_by
 * @property string $modified_date
 * @property integer $vdo_view
 *
 * @property StoreVdo $ref
 */
class Vdo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $vdo_path;
    public static function tableName()
    {
        return 'vdo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_id', 'path', 'vdo_name', 'status', 'create_date', 'create_by', 'modified_date'], 'required'],
            [['ref_id', 'vdo_view'], 'integer'],
            [['path', 'vdo_description'], 'string'],
            [['create_date', 'modified_date'], 'safe'],
            [['vdo_name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 255],
            [['create_by'], 'string', 'max' => 20],
            [['vdo_path'],'file','skipOnEmpty'=>true,'on' => 'update','extensions'=>'mp4,flv'],
            [['ref_id'], 'exist', 'skipOnError' => true, 'targetClass' => StoreVdo::className(), 'targetAttribute' => ['ref_id' => 'store_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vdo_id' => 'Vdo ID',
            'ref_id' => 'ประเภทคลังVDO',
            'path' => 'Path',
            'vdo_name' => 'Vdo Name',
            'status' => 'Status',
            'vdo_description' => 'Vdo Description',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'modified_date' => 'Modified Date',
            'vdo_view' => 'Vdo View',
            'vdo_path' => 'VDO *.mp4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRef()
    {
        return $this->hasOne(StoreVdo::className(), ['store_id' => 'ref_id']);
    }
}
