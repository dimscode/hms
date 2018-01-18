<?php
/**
 * Created by PhpStorm.
 * User: dimscode
 * Date: 16/01/18
 * Time: 23:39
 */

namespace app\models;


use app\Me;
use yii\web\Request;

class Reservation extends \yii\db\ActiveRecord
{
    public $_check_in;
    public $_check_out;
    public $rooms = array();
    public $total;

    /**
     * This is the model class for table "reservations".
     *
     * @property int $id
     * @property string $date
     * @property string $check_in
     * @property string $check_out
     * @property string $source
     * @property string $purpose
     * @property string $sob
     * @property string $vcode
     * @property string $referral
     * @property string $arrival_info
     * @property string $reservation_status
     * @property int $id_customer
     */


    public function __construct($session = null)
    {
        if ($session){
            $this->_check_in = $session->_check_in;
            $this->_check_out = $session->_check_out;
            $this->rooms = $session->rooms;
            $this->total = $session->total;
        }
    }
    public function setDate($date){
        $this->_check_in = substr($date,0,10);
        $this->_check_out = substr($date,13,10);
    }
    public function addRoom($room){
        $this->rooms[$room->id_room] = $room;
        $this->total += $room->price_room;
    }
    public function removeRoom($id){
        $this->total -= $this->rooms[$id]->price_room;
        unset($this->rooms[$id]);
        if ($this->total == 0) {
            unset($this);
        }
    }
    public function _save(){
        return \app\Me::_setSession('app',$this);
    }


    public static function tableName()
    {
        return 'reservations';
    }
    public static function primaryKey()
    {
        return 'id';
    }

}