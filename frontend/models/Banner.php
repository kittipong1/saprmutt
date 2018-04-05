<?php

namespace app\models;

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
    public $banner_img;
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
            [['user_id', 'ban_name', 'ban_link', 'ban_image', 'create_date', 'modified_date', 'start_date', 'end_date', 'view', 'ban_detail'], 'required'],
            [['user_id', 'view'], 'integer'],
            [['ban_link', 'ban_image', 'ban_detail'], 'string'],
            [['banner_img'],'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'jpg,png,gif'],
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
            'ban_id' => 'Ban ID',
            'user_id' => 'id admin',
            'ban_name' => 'Ban Name',
            'ban_link' => 'Ban Link',
            'ban_image' => 'Ban Image',
            'banner_img' => 'แนบรูปภาพป้ายประชาสัมพันธ์',
            'create_date' => 'Create Date',
            'modified_date' => 'Modified Date',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'view' => 'View',
            'ban_detail' => 'รายละเอียด',
        ];
    }
}
