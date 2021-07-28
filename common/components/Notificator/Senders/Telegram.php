<?php
namespace common\components\Notificator\Senders;



use common\components\Notificator\MessageGenerators\Interfaces\MessageGeneratorOrder;
use common\models\OrderCheckout;
use common\models\User;
use Yii;


class Telegram
{

    private $_order;
    private $_telegramNewMesseges;

    public function __construct(OrderCheckout $order)
    {
        $this->_order = $order;
        $this->_telegramNewMesseges = Yii::$app->telegram->getUpdates()['result'];
    }


    public function sendTelegramMessageClient($text)
    {
        $telegram_id = $this->_refreshTelegramId($this->_order->user);


        return $this->_sendTelegramMessege($text, $telegram_id);
    }


    public function sendTelegramMessageAdmin($text)
    {
        return $this->_sendTelegramMessege($text, Yii::$app->params['adminTelegramId']);
    }


    public function sendTelegramMessageProvider($text, User $provider)
    {
        return $this->_sendTelegramMessege($text, $provider->telegram_id);
    }


    private function _sendTelegramMessege($text, $telegram_id)
    {
        try {
            $response = Yii::$app->telegram->sendMessage([
                'chat_id' => $telegram_id,
                'text' => $text,
            ]);

            if ($response->ok === true){
                return true;
            }

        } catch (\Exception $e) {
            Yii::$app->session->setFlash('info', "Надо написать боту что бы получать уведомления");
            return false;
        }
    }


    private function _getTelegrammId($searchString)
    {
        foreach ($this->_telegramNewMesseges as $key => $value){
            if ($value['message']['chat']['username'] == $searchString) {
                return $value['message']['chat']['id'];
            }
        }
        return false;
    }


    private function _getNormilizeUsername($username)
    {
        return preg_replace('/@/', '', htmlspecialchars(trim($username)));
    }


    private function _refreshTelegramId($user)
    {

        if (!empty($user->telegram)){



            if (!empty($user->telegram_id)){
                /*Если это пользователь проверять сходится его телеграм с телеграмом в заказе*/
                if ($user->telegram == $this->_order->telegram){
                    return $user->telegram_id;
                }else{
                    return $this->_updateTelegramId($user);
                }

            }else{


                return $this->_updateTelegramId($user);
            }
        }else{
            $this->_updateTelegram($user);
            return $this->_updateTelegramId($user);
        }
    }


    private function _updateTelegramId($user)
    {
        $username = $this->_getNormilizeUsername($user->telegram);

        $telegram_id = $this->_getTelegrammId($username);

        $user->telegram_id = $telegram_id;

        $user->save();


        return $telegram_id;
    }


    private function _updateTelegram($user)
    {
        $user->telegram = $this->_getNormilizeUsername($this->_order->telegram);
        return $user->save();
    }

}