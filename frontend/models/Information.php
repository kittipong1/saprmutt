<?php

namespace app\models;

use Yii;
use app\models\Faculty;
/**
 * This is the model class for table "information".
 *
 * @property integer $information_id
 * @property string $idtitle_id
 * @property string $name_en
 * @property string $lastname_en
 * @property string $name_th
 * @property string $lastname_th
 * @property string $birht_day
 * @property string $Add
 * @property string $mail
 * @property string $phone
 * @property integer $Fac_id
 * @property string $avatar
 * @property integer $major_id
 * @property integer $user_id
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $avatar_path;
    public static function tableName()
    {
        return 'information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtitle_id', 'name_en', 'lastname_en', 'name_th', 'lastname_th', 'birht_day', 'Add', 'mail', 'phone', 'Fac_id', 'major_id', 'user_id'], 'required'],
            [['birht_day'], 'safe'],
            [['Fac_id', 'major_id', 'user_id'], 'integer'],
            [['Add'], 'string'],
            [['avatar_path'],'file','skipOnEmpty'=>true,'on' => 'update','extensions'=>'jpg,png,gif'],
            [['idtitle_id', 'name_en', 'lastname_en', 'name_th', 'lastname_th', 'mail', 'phone', 'avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'information_id' => 'Information ID',
            'idtitle_id' => 'คำนำหน้าชื่อ',
            'name_en' => 'ชื่อ (ภาษอังกฤษ)',
            'lastname_en' => 'นามสกุล (ภาษอังกฤษ)',
            'name_th' => 'ชื่อ (ภาษาไทย)',
            'lastname_th' => 'นามสกุล (ภาษาไทย)',
            'birht_day' => 'วัน/เดือน/ปี (พ.ศ.) เกิด',
            'Add' => 'ที่อยู่',
            'mail' => 'mail',
            'phone' => 'เบอร์โทร',
            'Fac_id' => 'คณะ',
            'avatar' => 'รูปภาพ *.Jpg',
            'major_id' => 'สาขา',
            'user_id' => 'User ID',
            'avatar_path' => 'รูปภาพ *.Jpg'
        ];
    }
     public function getFaculty()
    {
        return $this->hasone(Faculty::className(), ['Faculty_id' => 'Fac_id']);
    }
}
