<?php

namespace app\controllers;

class FoodController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRequest()
    {
        return $this->render('request');
    }

}
