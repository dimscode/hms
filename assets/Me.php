<?php

namespace app;

use Yii;

class Me
{
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
}