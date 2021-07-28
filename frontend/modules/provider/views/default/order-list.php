<?php

\frontend\modules\provider\assets\ProviderAsset::register($this);


?>

<div id="accordion">


    <?php foreach ($model as $orderId => $order) : ?>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#<?= $orderId ?>" aria-expanded="true" aria-controls="collapseOne">
                        Заказ № <?= $orderId ?>
                    </button>
                </h5>
            </div>

            <div id="<?= $orderId ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <select name="orderStatus[<?= $orderId ?>]" data-id="<?= $orderId ?>">
                        <?php foreach (\common\models\OrderCheckout::getOrderStatuses() as $statusId => $statusName) : ?>
                            <option
                                    value="<?= $statusId ?>"
                                <?= \common\models\OrderItem::getStatus($order) == $statusId ? 'selected' : null ?> ><?= $statusName ?></option>
                        <?php endforeach; ?>
                    </select>

                    <?php foreach ($order as $item) : ?>
                        <p>
                            <?= $item['name'] ?> <?= $item['quantity'] ?>шт <?= $item['price'] ?> <?= $item['slug'] ?> <br>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>



        </div>

    <?php endforeach; ?>

</div>



