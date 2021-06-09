<?php
namespace console\controllers;

use common\models\MessegeOrder;
use Yii;
use yii\console\Controller;

class MessegeOrderController extends Controller
{
    public function actionSendMessege()
    {
        file_put_contents('log.txt', 'start action', FILE_APPEND);

        require_once "console/libs/madeline.php";

        $settings = [
            'app_info' => [ // Эти данные мы получили после регистрации приложения на https://my.telegram.org
                'api_id' => "4634551",
                'api_hash' => "3bd698178a6ea0e0a8626c42d4a6f02b",
            ],

            'serialization' => [
                'serialization_interval' => 300,
                //Очищать файл сессии от некритичных данных.
                //Значительно снижает потребление памяти при интенсивном использовании, но может вызывать проблемы
                'cleanup_before_serialization' => true,
            ],
        ];


        $messege = MessegeOrder::find()->where(['status' => 0])->one();
        file_put_contents('log.txt', 'getted messages order', FILE_APPEND );



        if (isset($messege)){
            $MadelineProto = new \danog\MadelineProto\API('session.madeline', $settings);

            $MadelineProto->start();


            try {
                $MadelineProto->messages->sendMessage(['peer' => $messege->telegram_user_id, 'message' => $messege->text]);
                $messege->status = 1;
                $messege->save();
                file_put_contents('log.txt', 'success', FILE_APPEND);
                echo "success";

            } catch (\Exception $e) {

                $messege->delete();
                file_put_contents('log.txt', 'delete', FILE_APPEND);

            }



        }
        die;
    }


    public function actionSendMessege2()
    {
        Yii::info('начало вычисления среднего дохода');
    }
}