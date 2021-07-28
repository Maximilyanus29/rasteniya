<?php
namespace common\components\Notificator;


use common\components\Notificator\MessageGenerators\MessageGeneratorEmail;
use common\components\Notificator\MessageGenerators\MessageGeneratorMessenger;
use common\components\Notificator\Senders\Email;
use common\components\Notificator\Senders\Telegram;
use common\models\OrderCheckout;

class Notificator
{

    public function sendPostOrderCheckoutMessage(OrderCheckout $order)
    {
        $messegeGeneratorMessanger = new MessageGeneratorMessenger();
        $telegram = new Telegram($order);


        $messageGeneratorEmail = new MessageGeneratorEmail();
        $email = new Email($messageGeneratorEmail, $order);


        foreach ($order->getProviderStruct() as $items){
            $telegram->sendTelegramMessageProvider($messegeGeneratorMessanger->getProviderOrderMessage($items), $items[0]->good->provider);
            $email->sendEmailMessegeProvider($messageGeneratorEmail->getProviderOrderMessage($items), $items[0]->good->provider);
        }

        $telegram->sendTelegramMessageAdmin($messegeGeneratorMessanger->getAdminOrderMessage($order));
        $telegram->sendTelegramMessageClient($messegeGeneratorMessanger->getClientOrderMessage($order));
//
        $email->sendEmailMessegeAdmin($messageGeneratorEmail->getAdminOrderMessage($order));
        $email->sendEmailMessegeClient($messageGeneratorEmail->getClientOrderMessage($order));


        unset($telegram);
        unset($email);

        return true;
    }

    public function sendChangeStatus(OrderCheckout $order)
    {
        $messegeGeneratorMessanger = new MessageGeneratorMessenger();
        $telegram = new Telegram($order);
        $telegram->sendTelegramMessageAdmin($messegeGeneratorMessanger->getChangeStatusMessageAdmin($order));
        $telegram->sendTelegramMessageClient($messegeGeneratorMessanger->getChangeStatusMessageClient($order));


        $messegeGeneratorEmail = new MessageGeneratorEmail();
        $email = new Email($messegeGeneratorEmail, $order);
        $email->sendEmailMessegeClient($messegeGeneratorEmail->getChangeStatusMessageClient($order));
        $email->sendEmailMessegeAdmin($messegeGeneratorEmail->getChangeStatusMessageAdmin($order));


//        $email->sendEmailMessegeClient($messegeGeneratorEmail->getProviderOrderMessage($order));


        unset($email);

        return true;
    }


}