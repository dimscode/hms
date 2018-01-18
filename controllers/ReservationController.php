<?php

namespace app\controllers;

use app\Me;
use app\models\Bookeds;
use app\models\Customers;
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
                    'find' => ['get'],
                    'remove' => ['get'],
                    'save-reservation' => ['post'],
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

    public function actionFind()
    {
        $room    = \Yii::$app->request->get('room');
        $guest   = \Yii::$app->request->get('guest');
        $available = $this->search_available_room(['guest'=>$guest, 'room'=>$room]);
        return $this->render('index',['rooms'=>$available]);
    }

    public function actionSelect($id)
    {
        $selected = Rooms::findOne(['id_room'=>$id]);
        $reserve = $this->getSession();
        $reserve->addRoom($selected);
        $reserve->_save();
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionRemove($id)
    {
        $reserve = $this->getSession();
        $reserve->removeRoom($id);
        $reserve->_save();
        return $this->redirect('/reservation');
    }

    public function actionIndex()
    {
        if (\Yii::$app->request->post()){
            $post = \Yii::$app->request->post();

            $customer = new Customers();
            $reservation = $this->getSession();
            $rooms = Rooms::findAll($reservation->rooms);

            $reservation->setDate($post['tgl']);

            Customers::getDb()->transaction(function($db) use ($customer,$reservation, $rooms, $post) {
                $customer->attributes = $post['Customers'];
                $customer->save();

                $reservation->id = 2;
                $reservation->date    = date('Y-m-d');
                $reservation->check_in = Me::convertDateSQL($reservation->_check_in);
                $reservation->check_out = Me::convertDateSQL($reservation->_check_out);
                $reservation->source = $post['Reservation']['source'];
                $reservation->purpose = $post['Reservation']['purpose'];
                $reservation->sob = $post['Reservation']['sob'];
                $reservation->vcode = $post['Reservation']['vcode'];
                $reservation->referral = $post['Reservation']['referral'];
                $reservation->arrival_info = $post['Reservation']['arrival_info'];
                $reservation->reservation_status = $post['Reservation']['reservation_status'];
                $reservation->id_customer = $post['Customers']['id_number'];
                $reservation->save();



                foreach ($rooms as $room) {
                    $room->status = 0;
                    $room->update(false);
                    $booked = new Bookeds();
                    $booked->id_reservation = 2;
                    $booked->id_room = $room->id_room;
                    $booked->save();
                    unset($booked);
                }

            });

//            Remove Session
            \Yii::$app->session->remove('app');
            return $this->render('index',['alert'=>'Transaksi Berhasil Disimpan']);

        }else{
            return $this->render('index');
        }

    }

    public function actionFillData()
    {
        return $this->render('fill_data');
    }
}
