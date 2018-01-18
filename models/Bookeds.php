<?php
/**
 * Created by PhpStorm.
 * User: dimscode
 * Date: 16/01/18
 * Time: 20:55
 */

namespace app\models;


use yii\db\ActiveRecord;

class Bookeds extends ActiveRecord
{

    /**
     * This is the model class for table "rooms".
     *
     * @property int $id_reservation
     * @property int $id_room
     */




    public static function tableName()
    {
        return "{{bookeds}}";
    }

    public function attributeLabels()
    {
        return [
            'id_reservation' => 'Id Reservation',
            'id_room' => 'Id Room',
        ];
    }

}