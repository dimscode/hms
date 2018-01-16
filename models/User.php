<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['phone', 'email'], 'required'],
            [['notes'], 'string'],
            [['phone', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
        ];
    }
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

}
