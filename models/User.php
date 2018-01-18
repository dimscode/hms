<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $_user = null;
    public $rememberMe;


    /**
     * This is the model class for table "users".
     *
     * @property int $id_user
     * @property string $name_user
     * @property string $username
     * @property string $password
     * @property string $authKey
     * @property string $accessToken
     * @property string $id_mng
     */

    public function getUser(){
        if ($this->_user === null){
            $this->_user = self::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function login(){
        if ($this->validate()){
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)){
                $this->addError('incorrect','Access Denied');
            }else{
                return \Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'name_user' => 'Full Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'id_mng' => 'Id Mng',
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id_user'=>$id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function tableName()
    {
        return "{{users}}";
    }

    public function behaviors()
    {
        return [
//            TimestampBehavior::className(),
        ];
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function getManagements(){
        return $this->hasOne(Managements::className(), ['id'=>'id_mng']);
    }
}
