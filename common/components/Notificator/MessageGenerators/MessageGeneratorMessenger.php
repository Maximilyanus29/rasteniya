<?php
namespace common\components\Notificator\MessageGenerators;


use CdekSDK\Common\Order;
use common\components\Notificator\MessageGenerators\Interfaces\MessageGeneratorOrder;
use common\models\OrderCheckout;


class MessageGeneratorMessenger implements MessageGeneratorOrder
{


    public function getAdminOrderMessage(OrderCheckout $order)
    {
        $orderItems = $order->getItems()->joinWith('good')->all();

        $text = "Внимание! На сайте был создан и оплачен заказ №{$order->id} на следующие позиции:";

        foreach ($orderItems as $item){
            $text .= $this->printGoodParams($item);
        }
        return $text;
    }

    public function getProviderOrderMessage(array $items)
    {
        $text = "Здравствуйте! На нашем сайте был сделан заказ на ваши товары:";

        foreach ($items as $item){
            $text .= $this->printGoodParams($item);
        }
        return $text;
    }

    public function getClientOrderMessage(OrderCheckout $order)
    {
        $text = "Благодарим вас за доверие к нашей компании и за ваш заказ №{$order->id}! Ваш заказ принят, оплачен и передан в работу! После готовности заказа в течение 1-3 рабочих дней вам также поступит уведомление в Телеграмм с нашего аккаунта: Voodland_com_bot. После получения уведомления вы можете самостоятельно забрать заказ, если выбрали Самовывоз при оформлении заказа, а также  можете изменить свой выбор и заказать доставку нашим курьером, отправив  запрос в нашу группу: Voodland easy logistika в Телеграмм или отправить запрос на почту: voodland.easy.log@yandex.ru и мы свяжемся с вами для уточнения адреса и контактных данных получателя!";
        return $text;
    }


    private function printGoodParams($item)
    {
        return "
{$item->good->name}: 
\t цена за 1 шт: " . $item->price / $item->quantity . "
\t количество: {$item->quantity}
\t цена за все: {$item->price}
\t корневая система: {$item->good->root_system}
\t артикул: {$item->good->vendor_code}
\t описание: {$item->good->description}
\t размеры: {$item->good->size}
";
    }



    public function getChangeStatusMessageAdmin(OrderCheckout $order)
    {
        return "Статус заказа {$order->id} изменен на: " . OrderCheckout::getOrderStatuses()[$order->status];
    }

    public function getChangeStatusMessageProvider(OrderCheckout $order)
    {
        return "Статус заказа {$order->id} изменен на: " . OrderCheckout::getOrderStatuses()[$order->status];
    }

    public function getChangeStatusMessageClient(OrderCheckout $order)
    {
        return "Статус заказа {$order->id} изменен на: " . OrderCheckout::getOrderStatuses()[$order->status];
    }
}