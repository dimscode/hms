<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id_number
 * @property string $full_name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $nation
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    public static function primaryKey()
    {
        return 'id_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_number','full_name', 'phone', 'email', 'address', 'nation'], 'required'],
            [['address'], 'string'],
            [['full_name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['email', 'nation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_number' => 'Id Number',
            'full_name' => 'Full Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'nation' => 'Nation',
        ];
    }

    public function getReservation()
    {
        return $this->hasMany(Reservation::className(), ['id_customer' => 'id_number']);
    }

}
