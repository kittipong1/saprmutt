<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $ban_id
 * @property integer $user_id
 * @property string $ban_name
 * @property string $ban_link
 * @property resource $ban_image
 * @property string $create_date
 * @property string $modified_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $view
 * @property string $ban_detail
 */
class Banner extends \yii\db\ActiveRecord
{
    public $banner;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ban_name', 'ban_image', 'create_date', 'modified_date', 'view'], 'required'],
            [['user_id', 'view'], 'integer'],
            [['ban_link', 'ban_image', 'ban_detail'], 'string'],
            [['banner'],'file','skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
            [['create_date', 'modified_date', 'start_date', 'end_date'], 'safe'],
            [['ban_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ban_id' => 'ลำดับ',
            'user_id' => 'id admin',
            'ban_name' => 'ชื่อป้ายประชาสัมพันธ์',
            'ban_link' => 'ลิงค์ป้ายประชาสัมพันธ์',
            'ban_image' => 'ภาพประชาสัมพันธ์',
            'banner' => 'แนบรูปภาพป้ายประชาสัมพันธ์',
            'create_date' => 'วันที่สร้าง',
            'modified_date' => 'วันที่แก้ไขล่าสุด',
            'start_date' => 'วันที่เริ่มใช้',
            'end_date' => 'วันที่สิ้นสุดการใช้งาน',
            'view' => 'View',
            'ban_detail' => 'รายละเอียด',
        ];
    }
}
