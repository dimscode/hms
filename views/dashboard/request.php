<?php

$this->title = "Dashboard";

?>
<div class="row tile_count">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_reservation.jpg') ?>">
            <a href="<?= \yii\helpers\Url::toRoute('/reservation') ?>">
                <div class="sub-item">Reservation</div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_checkin.jpg') ?>">
            <a href="#">
                <div class="sub-item">Check In</div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_checkout.jpg') ?>">
            <a href="#">
                <div class="sub-item">Check Out & Payment</div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_late_checkout.jpg') ?>">
            <a href="#">
                <div class="sub-item">Late Check Out</div>
            </a>
        </div>
    </div>
</div>
<div class="row tile_count">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_maintenance.png') ?>">
            <a href="#">
                <div class="sub-item">Maintenance</div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_food.jpg') ?>">
            <a href="<?= \yii\helpers\Url::toRoute('/food') ?>">
                <div class="sub-item">Food & Beverage</div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_checkin.jpg') ?>">
            <a href="#">
                <div class="sub-item">Wake Up Call</div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_checkin.jpg') ?>">
            <a href="#">
                <div class="sub-item">Room Change</div>
            </a>
        </div>
    </div>
</div>
<div class="row tile_count">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-img">
            <img src="<?= \yii\helpers\Url::to('@web/assets/images/ico_reservation.jpg') ?>">
            <a href="#">
                <div class="sub-item">Extra Bed</div>
            </a>
        </div>
    </div>
</div>