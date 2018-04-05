<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $album_id
 * @property integer $user_id
 * @property string $album_name
 * @property string $create_date
 * @property string $modified_date
 * @property integer $album_view
 * @property string $album_agencies
 *
 * @property Image[] $images
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $album_imagepath ;
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'album_name', 'create_date', 'modified_date', 'album_agencies','album_content'], 'required'],
            [['user_id', 'album_view'], 'integer'],
            [['album_name', 'album_agencies','album_img'], 'string'],
            [['album_image'],'file','skipOnEmpty'=>true,'on' => 'update','extensions'=>'jpg,png,gif'],
            [['create_date', 'modified_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'album_id' => 'Album ID',
            'user_id' => 'ผู้สร้าง',
            'album_name' => 'ชื่ออัลบัม',
            'create_date' => 'Create Date',
            'modified_date' => 'Modified Date',
            'album_view' => 'Album View',
            'album_agencies' => 'ชื่อหน่วยงาน',
            'album_content'=> 'อัลบั้มเนื้อหาบทความ',
            'album_img'=> 'รูปภาพอัลบั้ม',
            'album_imagepath'=>'รูปภาพอัลบั้ม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['ref_id' => 'album_id']);
    }
}
