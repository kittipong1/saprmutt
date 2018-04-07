<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studen".
 *
 * @property integer $Id_information
 * @property string $Stu_id
 * @property string $Stu_id_card
 * @property string $idtitle_id
 * @property string $Stu_name_en
 * @property string $Stu_lastname_en
 * @property string $Stu_name_th
 * @property string $Stu_lastname_th
 * @property string $Stu_birht_day
 * @property string $Stu_Add
 * @property string $Stu_mail
 * @property string $Stu_phone
 * @property string $Fac_id
 * @property integer $teacher_id
 * @property resource $Stu_avatar
 * @property integer $major_id
 */
class Studen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Stu_birht_day'], 'safe'],
            [['Stu_Add', 'Stu_avatar'], 'string'],
            [['teacher_id', 'major_id'], 'integer'],
            [['Stu_id', 'Stu_id_card', 'idtitle_id', 'Stu_name_en', 'Stu_lastname_en', 'Stu_name_th', 'Stu_lastname_th', 'Stu_mail', 'Stu_phone', 'Fac_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_information' => 'Id Information',
            'Stu_id' => 'รหัสนักศึกษา',
            'Stu_id_card' => 'รหัสบัตรประชาชน',
            'idtitle_id' => 'คำนำหน้าชื่อ',
            'Stu_name_en' => 'ชื่อ (ภาษอังกฤษ)',
            'Stu_lastname_en' => 'นามสกุล (ภาษอังกฤษ)',
            'Stu_name_th' => 'ชื่อ (ภาษาไทย)',
            'Stu_lastname_th' => 'นามสกุล (ภาษาไทย)',
            'Stu_birht_day' => 'วัน/เดือน/ปี (พ.ศ.) เกิด',
            'Stu_Add' => 'ที่อยู่',
            'Stu_mail' => 'E-mail',
            'Stu_phone' => 'เบอร์โทร',
            'Fac_id' => 'คณะ',
            'teacher_id' => 'อาจารย์ที่ปรึกษา',
            'Stu_avatar' => 'Stu Avatar',
            'major_id' => 'สาขา',
        ];
    }
}
