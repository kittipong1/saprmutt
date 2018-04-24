<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $auth_status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $new_password ;
    public $confirm_password ;
    public $old_password ;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at','banned'], 'required'],
            [['status', 'created_at', 'updated_at','banned'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'auth_status','confirm_password','new_password','old_password'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'ชื่อผู้ใช้',
            'auth_key' => 'Auth Key',
            'password_hash' => 'รหัสผ่าน',
            'password_reset_token' => 'Password Reset Token',

            'status' => 'Status',
            'created_at' => 'วันที่าสร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'auth_status' => 'ระดับของผู้ใช้งาน',
            'old_password' => 'รหัสผ่านเก่า',
            'new_password' => 'รหัสผ่านใหม่',
            'confirm_password' => 'ยืนยันรหัสผ่าน',
            'banned'=>'สถานะการงดใช้งาน',
        ];
    }
}
