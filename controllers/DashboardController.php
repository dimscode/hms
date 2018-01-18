<?php

namespace app\controllers;

use app\Me;
use app\models\Reservation;
use app\models\Rooms;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class DashboardController extends \yii\web\Controller
{
    public function getStatus()
    {
        $reservation = count( Reservation::find()->all() );
        $room_sold   = count( Rooms::findAll(['status'=>0]) );
        return [
            'total_reservation' => $reservation,
            'total_room_sould'  => $room_sold];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [
                            'index','request',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index',['status'=>$this->getStatus()]);
    }

    public function actionRequest()
    {
        return $this->render('request');
    }

}
