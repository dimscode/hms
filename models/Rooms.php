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

    public static function tableName()
    {
        return "{{rooms}}";
    }



}