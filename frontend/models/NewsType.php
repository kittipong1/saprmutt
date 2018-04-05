<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_type".
 *
 * @property integer $news_type_id
 * @property string $news_type_name
 * @property string $create_date
 * @property string $create_by
 * @property string $modified_date
 *
 * @property News[] $news
 */
class NewsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'modified_date'], 'safe'],
            [['news_type_name'], 'string', 'max' => 255],
            [['create_by'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_type_id' => 'News Type ID',
            'news_type_name' => 'News Type Name',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'modified_date' => 'Modified Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['news_type_id' => 'news_type_id']);
    }
}
