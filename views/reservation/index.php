<?php
$this->title = "Reservation";
$session = \app\Me::_getSession('app');
?>
<div class="x_panel">
    <div class="x_title">
        <h2>Reservation</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <form role="form" action="<?= yii\helpers\Url::toRoute('/reservation/find')?>" method="post">
                <?= \app\Me::TokenSubmission() ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Guest
                            </div>
                            <input type="number" class="form-control pull-right" min="1" max="4" name="guest" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Room
                            </div>
                            <input type="number" class="form-control pull-right" min="1" max="3" name="room" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Check In - Check Out</label>
                        <div class="input-group form-group-sm">
                            <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                            <?php if (!$session): ?>
                                <input type="text" name="check_in" class="form-control">
                            <?php else: ?>
                                <input type="text" name="check_in" class="form-control" value="<?= $session->check_in.' - '.$session->check_out?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="search">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type Room</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!isset($rooms)): ?>
                        <tr class="text-center">
                            <td colspan="4">Your room will appear in here.</td>
                        </tr>
                    <?php else: ?>
                        <?php if(empty($rooms)): ?>
                            <tr class="text-center">
                                <td colspan="4">Room Not Available For This Time.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($rooms as $room): ?>
                                <tr>
                                    <td><?= $room->room_no ?></td>
                                    <td><?= $room->type_room ?></td>
                                    <td><?= \app\Me::Rupiah($room->price_room) ?></td>
                                    <td><a href="<?= \yii\helpers\Url::toRoute('/reservation/select/'.$room->id_room)?>" class="btn btn-danger btn-xs">Select</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif; ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12 line">

            </div>
        </div>
    </div>
</div>
