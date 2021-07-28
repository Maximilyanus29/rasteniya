<?php
namespace common\components\Notificator\MessageGenerators\Interfaces;


use common\models\OrderCheckout;

interface MessageGeneratorOrder
{
    public function getAdminOrderMessage(OrderCheckout $order);
    public function getProviderOrderMessage(array $items);
    public function getClientOrderMessage(OrderCheckout $order);
}