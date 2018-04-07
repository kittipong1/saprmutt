<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titlename".
 *
 * @property integer $id_titlename
 * @property string $titlename_en
 * @property string $titlename_th
 */
class Titlename extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titlename';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titlename_en', 'titlename_th'], 'required'],
            [['titlename_en', 'titlename_th'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_titlename' => 'Id Titlename',
            'titlename_en' => 'คำนำหน้าชื่อภาษาอังกฤษ',
            'titlename_th' => 'คำนำหน้าชื่อภาษาไทย',
        ];
    }
}
