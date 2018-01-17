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

class Reservation
{
    public $check_in;
    public $check_out;
    public $rooms = array();

    public function __construct($session)
    {
        if ($session){
            $this->check_in = $session->check_in;
            $this->check_out = $session->check_out;
            $this->rooms = $session->rooms;
        }
    }
    

    public function setDate($date){
        $this->check_in = substr($date,0,10);
        $this->check_out = substr($date,13,10);
    }
    public function addRooms($rooms){
        $this->rooms[$rooms->id_room] = $rooms;
    }
    public function save(){
        \app\Me::_setSession('app',$this);
    }
}