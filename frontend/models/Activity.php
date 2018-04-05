<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $actitaty_id
 * @property string $act_id
 * @property string $act_name
 * @property integer $fac_id
 * @property integer $typefac_id
 * @property string $act_term
 * @property string $act_sday
 * @property string $act_eday
 * @property string $act_comment
 * @property string $status
 * @property string $id_username
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id', 'act_name', 'fac_id', 'typefac_id', 'act_term', 'act_sday', 'act_eday', 'status', 'id_username'], 'required'],
            [['fac_id', 'typefac_id'], 'integer'],
            [['act_sday', 'act_eday'], 'safe'],
            [['act_comment'], 'string'],
            [['act_id'], 'string', 'max' => 9],
            [['act_name', 'act_term', 'status', 'id_username'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actitaty_id' => 'Actitaty ID',
            'act_id' => 'รหัสกิจกรรม',
            'act_name' => 'ชื่อกิจกรรม',
            'fac_id' => 'หน่วยงานผู้จัด',
            'typefac_id' => 'ประเภทกิจกรรม',
            'act_term' => 'ปีการศึกษา',
            'act_sday' => 'วันที่เริ่มจัดกิจกรรม',
            'act_eday' => 'วันที่สิ้นสุดกิจกรรม',
            'act_comment' => 'เพิ่มเติม #เป็นกล่องข้อความให้คอมเม้นเพิ่มเติม',
            'status' => 'สถานะกิจกรรม',
            'id_username' => 'สร้างโดย',
        ];
    }
}
