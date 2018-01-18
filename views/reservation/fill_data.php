<?php
$this->title = "Reservation";
$session = \app\Me::_getSession('app');
?>
<a href="<?= \yii\helpers\Url::toRoute('/reservation') ?>" class="btn btn-default btn-lg"><span class="fa fa-backward"></span> Go Back</a>
<div class="x_panel">
    <?php if(!empty($session)): ?>

    <div class="row">
        <div class="col-md-12">
            <div class="wizard-card" data-color="blue" id="wizard-reservation">
                <form action="<?= \yii\helpers\Url::toRoute('/reservation') ?>" method="post">
                    <div class="wizard-navigation">
                        <ul>
                            <li><a href="#personal-info" data-toggle="tab">Personal Info</a></li>
                            <li><a href="#arrangement" data-toggle="tab">Arrangements</a></li>
                            <li><a href="#rates" data-toggle="tab">Rates</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane" id="personal-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Check In - Check Out</label>
                                        <div class="input-group form-group-sm">
                                            <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" id="tgl-reservation" name="tgl" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Customer Data</h4>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control" name="Customers[full_name]" type="text" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="Customers[phone]" type="text" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>E-Mail</label>
                                        <input class="form-control" name="Customers[email]" type="email" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Number</label>
                                        <input class="form-control" name="Customers[id_number]" type="number" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="Customers[address]" type="text" required autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Marketing Data</h4>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <datalist id="nations">
                                            <option value="Indonesia">
                                            <option value="England">
                                            <option value="Malaysia">
                                            <option value="Brunei">
                                            <option value="Thailand">
                                        </datalist>
                                        <input class="form-control" name="Customers[nation]" list="nations" type="text" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Source</label>
                                        <datalist id="sources">
                                            <option value="Returning Guest">
                                        </datalist>
                                        <input class="form-control" name="Reservation[source]" list="sources" type="text" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Purpose</label>
                                        <datalist id="purposes">
                                            <option value="Vocation">
                                        </datalist>
                                        <input class="form-control" name="Reservation[purpose]" list="purposes" type="text" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Source Of Business</label>
                                        <datalist id="sob">
                                            <option value="Travel Agent">
                                        </datalist>
                                        <input class="form-control" list="sob" name="Reservation[sob]" type="text" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Voucher Code</label>
                                        <input class="form-control" name="Reservation[vcode]" type="text" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Referral</label>
                                        <input class="form-control" name="Reservation[referral]" type="text" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="arrangement">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Info</h4>
                                    <div class="form-group">
                                        <label>Arrival Info</label>
                                        <datalist id="arrival_info">
                                            <option>Pagi</option>
                                            <option>Siang</option>
                                            <option>Malam</option>
                                        </datalist>
                                        <input class="form-control" list="arrival_info" name="Reservation[arrival_info]" type="text" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Reservation Status</label>
                                        <datalist id="status">
                                            <option>GUARANTEED</option>
                                        </datalist>
                                        <input class="form-control" list="status" name="Reservation[reservation_status]" type="text" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Room Arrangement</h4>
                                    <?php foreach ($session->rooms as $room): ?>
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-2 room-list">
                                                    <p class="room-no"><?= $room->room_no ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p><?= $room->type_room ?></p>
                                                    <p>2 Guest / Room</p>
                                                </div>
                                                <div class="col-md-3 pull-right">
                                                    <div class="btn-toolbar room-list" role="toolbar">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-success"><span class="fa fa-plus"></span> </button>
                                                            <a href="<?=\yii\helpers\Url::toRoute(['/reservation/remove/','id'=>$room->id_room])?>" class="btn btn-danger"><span class="fa fa-minus"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="rates">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                    <div class="wizard-footer height-wizard">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                            <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                        </div>
                        <?= \app\Me::TokenSubmission() ?>

                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php endif; ?>


</div>
