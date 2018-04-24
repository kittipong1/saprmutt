<?php

namespace app\models;

use Yii;
use app\models\Joinactivity;
use app\models\Titlename;
use app\models\Faculty;
use app\models\Major;
use app\models\Information;
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
            [['teacher_id', 'major_id'], 'integer'],
            [['Stu_id', 'idtitle_id','Stu_name_th', 'Stu_lastname_th', 'Fac_id'], 'string', 'max' => 255],
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
            'idtitle_id' => 'คำนำหน้าชื่อ', 
            'Stu_name_th' => 'ชื่อ (ภาษาไทย)',
            'Stu_lastname_th' => 'นามสกุล (ภาษาไทย)',
            'Fac_id' => 'คณะ',
            'teacher_id' => 'อาจารย์ที่ปรึกษา',
            'major_id' => 'สาขา',
            'Studen_name'=>'ชื่อนักศึกษา',
        ];
    }

    public function getJoinactivity()
    {
        return $this->hasMany(Joinactivity::className(), ['studennumber' => 'Stu_id']);
    }

    public function getTitle()
    {
        return $this->hasOne(Titlename::className(), ['id_titlename' => 'idtitle_id']);
    }
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['Faculty_id' => 'Fac_id']);
    }
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['major_id' => 'major_id']);
    }
    public function getTeacher()
    {
        return $this->hasOne(Information::className(), ['information_id' => 'teacher_id']);
    }
}
