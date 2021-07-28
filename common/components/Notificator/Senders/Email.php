<?php
namespace common\components\Notificator\Senders;



use common\components\Notificator\MessageGenerators\Interfaces\MessageGeneratorOrder;
use common\models\OrderCheckout;
use common\models\User;
use Yii;
use yii\db\Exception;
use yii\web\HttpException;


class Email
{
    private $_order ;
    private $_messageGenerator;

    public function __construct(MessageGeneratorOrder $messageGenerator, OrderCheckout $order)
    {
        $this->_order = $order;
    }


    public function sendEmailMessegeClient($text)
    {
        return $this->_sendEmailMessege($text, $this->_order->email);
    }


    public function sendEmailMessegeAdmin($text)
    {
        return $this->_sendEmailMessege($text, Yii::$app->params['adminEmail']);
    }


    public function sendEmailMessegeProvider($text, $provider)
    {
        return $this->_sendEmailMessege($text, $provider->email);
    }




    private function _sendEmailMessege($text, $email, $viewName=null)
    {
        try {
            $mailer = Yii::$app->mailer;

            if ($viewName){
                $mailer
                    ->compose($viewName, ['text' => $text])
                    ->setTextBody($text)
                    ->setFrom(Yii::$app->params['senderEmail'])
                    ->setTo($email)
                    ->setSubject('Оформление заказа на сайте' . Yii::$app->name)
                    ->send();
            }else{
                $mailer
                    ->compose()
                    ->setTextBody($text)
                    ->setFrom(Yii::$app->params['senderEmail'])
                    ->setTo($email)
                    ->setSubject('Оформление заказа на сайте' . Yii::$app->name)
                    ->send();
            }

            return true;


        } catch (\Exception $e) {
            throw new Exception(404);

            return false;

        }

    }
}