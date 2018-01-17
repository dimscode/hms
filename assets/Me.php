<?php

namespace app;

use Yii;

class Me
{
    public static $session;
    public static function TokenSubmission(){
        return "<input id='form-token' type='hidden' name='".Yii::$app->request->csrfParam."'
           value='".Yii::$app->request->csrfToken."'/>";
    }

    public static function Request($name = null){
        if (!$name){
            return Yii::$app->request->post();
        }else{
            return Yii::$app->request->post($name);
        }
    }
    public static function Rupiah($value){
        return 'IDR '.number_format ($value, 0,  "" , "," );
    }

    public static function _setSession($key, $value){
        return Yii::$app->session->set($key, $value);
    }
    public static function _getSession($key){
        return Yii::$app->session->get($key);
    }

    public static function dd($args){
        (new \app\assets\Dumper())->dump($args);
        die(1);
    }
    public static function count($item){
        return count($item);
    }
}