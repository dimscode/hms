<?php
/**
 * Created by PhpStorm.
 * User: dimscode
 * Date: 16/01/18
 * Time: 20:55
 */

namespace app\models;


use yii\db\ActiveRecord;

class Rooms extends ActiveRecord
{

    /**
     * This is the model class for table "rooms".
     *
     * @property int $id_room
     * @property string $room_no
     * @property string $type_room
     * @property string $guest
     * @property string $room
     * @property string $price_room
     * @property int $status
     */




    public static function tableName()
    {
        return "{{rooms}}";
    }

    public function attributeLabels()
    {
        return [
            'id_room' => 'Id Room',
            'room_no' => 'Room No',
            'type_room' => 'Type Room',
            'guest' => 'Guest',
            'room' => 'Room',
            'price_room' => 'Price Room',
            'status' => 'Status',
        ];
    }

}