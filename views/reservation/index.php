<?php
$this->title = "Reservation";
$session = \app\Me::_getSession('app');
?>

<?php if(isset($alert)) : ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sukses!</strong> <?= $alert ?>.
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-3">
        <div class="x_panel">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form role="form" class="form-horizontal" action="<?= yii\helpers\Url::toRoute('/reservation/find')?>" method="get">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Guest
                                </div>
                                <input type="number" value="1" class="form-control pull-right" min="1" max="4" name="guest" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Room
                                </div>
                                <input type="number" value="1" class="form-control pull-right" min="1" max="3" name="room" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="SEARCH">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9" >
        <div class="x_panel" style="min-height: 176px;">
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
                        <td colspan="4">Room yang tersedia akan tampil disini.</td>
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
                                <td><a href="<?= \yii\helpers\Url::toRoute('/reservation/select/'.$room->id_room)?>" class="btn btn-primary btn-xs">Select</a></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php if(!empty($session->rooms)): ?>
    <div class="x_panel">
        <div class="x_title">
            <h4>Booked Room</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                        <?php foreach($session->rooms as $room): ?>
                            <tr>
                                <td><?= $room->room_no ?></td>
                                <td><?= $room->type_room ?></td>
                                <td><?= \app\Me::Rupiah($room->price_room) ?></td>
                                <td><a href="<?= \yii\helpers\Url::toRoute('/reservation/remove/'.$room->id_room)?>" class="btn btn-danger btn-xs">Remove</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="<?= \yii\helpers\Url::toRoute('/reservation/fill-data') ?>" class="btn btn-primary btn-lg pull-right">Next Step</a>
    </div>
<?php endif ?>