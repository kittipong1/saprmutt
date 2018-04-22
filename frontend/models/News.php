<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $news_id
 * @property integer $news_type_id
 * @property integer $user_id
 * @property integer $news_type_lang
 * @property string $news_name
 * @property string $news_explain
 * @property string $news_image
 * @property string $create_date
 * @property string $modified_date
 * @property integer $news_view
 * @property string $active
 * @property string $news_description
 * @property integer $fac_id
 *
 * @property NewsType $newsType
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $news_imagepath;
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_type_id', 'user_id', 'news_type_lang', 'news_view', 'fac_id'], 'integer'],
            [['user_id', 'create_date', 'fac_id'], 'required'],
            [['news_image', 'news_description'], 'string'],
            [['create_date', 'modified_date'], 'safe'],
            [['news_name'], 'string', 'max' => 200],
            [['news_explain', 'active'], 'string', 'max' => 255],
            [['news_imagepath'],'file','skipOnEmpty'=>true,'on' => 'update','extensions'=>'jpg,png,gif'],
            [['news_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsType::className(), 'targetAttribute' => ['news_type_id' => 'news_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'รหัสข่าวสาร',
            'news_type_id' => 'ประเภทข่าวสาร',
            'user_id' => 'ผู้สร้างข่าว',
            'news_type_lang' => 'ข่าวภาษา',
            'news_name' => 'ชื่อข่าว',
            'news_explain' => 'คำอธิบายข่าว',
            'news_image' => 'ภาพข่าว',
            'create_date' => 'วันที่สร้าง',
            'modified_date' => 'วันที่แก้ไขล่าสุด',
            'news_view' => 'จำนวนผู้ชม',
            'active' => 'สถานะ',
            'news_description' => 'รายละเอียดข่าวสาร',
            'fac_id' => 'หน่วยงานผู้ดูแล',
            'news_imagepath'=>'รูปข่าว'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsType()
    {
        return $this->hasOne(NewsType::className(), ['news_type_id' => 'news_type_id']);
    }
}
