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
 * @property resource $news_image
 * @property string $create_date
 * @property string $modified_date
 * @property integer $news_view
 * @property string $active
 * @property string $news_description
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
            [['news_type_id', 'user_id', 'news_type_lang', 'news_view'], 'integer'],
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
            'news_id' => 'News ID',
            'news_type_id' => 'News Type ID',
            'user_id' => 'id admin',
            'news_type_lang' => 'News Type Lang',
            'news_name' => 'ชื่อข่าว',
            'news_explain' => 'รายละเอียดข่าวสารย่อย (intro)',
            'news_image' => 'รูปข่าวหน้าปก',
            'create_date' => 'Create Date',
            'modified_date' => 'Modified Date',
            'news_view' => 'News View',
            'active' => 'Active',
            'news_description' => 'รายละเอียดข่าวสาร',
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
