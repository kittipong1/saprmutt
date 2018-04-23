<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password_hash;
    public $auth_status;
    public $banned;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

          
            ['auth_status', 'required'],
            ['auth_status', 'string', 'max' => 255],
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            ['banned','integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->auth_status = $this->auth_status;
        $user->setPassword($this->password_hash);
        $user->banned = $this->banned;
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
     public function attributeLabels()
    {
        return [
            'username' => 'ชื่อผู้ใช้',
            'password_hash'=>'รหัสผ่าน',
            'auth_status' => 'ระดับของผู้ใช้',
            'banned'=>'สถานนะการงดใช้งาน',
        ];
    }
}
