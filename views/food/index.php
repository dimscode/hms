<?php

    $categories = [
      'beverages',
      'burgers',
        'nanas'
    ];

?>


<div class="col-md-2">
    <ul class="list-group">
        <li class="list-group-item">
            <?php foreach ($categories as $category): ?>
                <a class="btn btn-default btn-block text-capitalize"><?= $category ?></a>
            <?php endforeach; ?>
        </li>
    </ul>
</div>
<div class="col-md-4">
    <ul class="list-group">
        <li class="list-group-item">
            <?php foreach ($categories as $category): ?>
                <a class="btn btn-default btn-block text-capitalize">
                    <p>Orange Juice
                    <p>IDR 23.000</p>
                </a>
            <?php endforeach; ?>
        </li>
    </ul>
</div>
<div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item"><a class="btn btn-default btn-block text-capitalize">Order From</a></li>
        <li class="list-group-item">
            <ul class="list-group">
                <li class="list-group-item list-unstyled">asxas</li>
            </ul>
        </li>
    </ul>
</div>