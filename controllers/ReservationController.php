<?php

namespace app\controllers;

use app\Me;
use app\models\Reservation;
use app\models\Rooms;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ReservationController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'find' => ['post','get'],
                ],
            ],
        ];
    }

    private function getSession()
    {
        return new Reservation( Me::_getSession('app') );
    }

    private function search_available_room($query = [])
    {
        if ($this->getSession()){
            return Rooms::find()->where(['guest'=>$query['guest'],'room' =>$query['room'],'status'=> 1])
                ->andWhere(['not in','id_room', array_keys($this->getSession()->rooms) ])->orderBy('price_room')->all();
        }else{
            return Room::find()->where(['guest'=>$query['guest'],'room' =>$query['room'],'status'=> 1])->orderBy('price_room')->all();
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFind()
    {
        if (\Yii::$app->request->isGet){
            return $this->redirect('/reservation');
        }
        $room    = Me::Request('room');
        $guest   = Me::Request('guest');
        $check_in = Me::Request('check_in');

        $reserve = $this->getSession();
        $reserve->setDate($check_in);
        $reserve->save();

        $available = $this->search_available_room(['guest'=>$guest, 'room'=>$room]);
        return $this->render('index',['rooms'=>$available]);
    }

    public function actionSelect($id)
    {
        $selected = Rooms::findOne(['id_room'=>$id]);
        $reserve = $this->getSession();
        $reserve->addRooms($selected);
        $reserve->save();
        return $this->render('index');
    }


}
