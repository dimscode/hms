<?php

$this->title = "Dashboard";

?>

<div class="col-md-12">
    <h1 class="today">Today<span><?= date('d M Y'); ?></span></h1>
</div>
<div class="row tile_count">

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Total Reservation</span>
        <div class="count"><?= $status['total_reservation'] ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Guest In House</span>
        <div class="count">54</div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Room Sold</span>
        <div class="count green"><?= $status['total_room_sould'] ?></div>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top">Checkout Today</span>
        <div class="count">4</div>
    </div>
</div>