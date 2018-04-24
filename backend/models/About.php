<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $about_id
 * @property integer $user_id
 * @property string $about_description
 * @property string $create_date
 * @property string $midified_date
 * @property integer $about_view
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['about_id', 'user_id', 'create_date', 'midified_date', 'about_view'], 'required'],
            [['about_id', 'user_id', 'about_view'], 'integer'],
            [['about_description'], 'string'],
            [['create_date', 'midified_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'about_id' => 'About ID',
            'user_id' => 'id ของคนที่สร้าง (admin)',
            'about_description' => 'รายละเอียด',
            'create_date' => 'วันที่สร้าง',
            'midified_date' => 'วันที่แก้ไขล่าสุด',
            'about_view' => 'About View',
        ];
    }
}
