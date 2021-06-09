<?php

namespace frontend\models;

use common\models\OrderCheckout;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CartForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $delivery_method;
    public $delivery_address;
    public $comment;
    public $payment_method;
    public $telegram;
    public $agreement = false;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'delivery_method', 'payment_method', 'agreement'], 'required'],
            [['name', 'phone'], 'string', 'max' => 50],
            [['comment', 'delivery_address', 'telegram', 'email', 'delivery_method', 'payment_method'], 'string', 'max' => 254],
            ['email', 'email'],
            ['agreement', 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => 'Пользователь',
            'delivery_price' => "Цена доставки",
            'total_price' => "Стоимость",
            'phone' => "телефон",
            'email' => "email",
            'name' => "ФИО",
            'delivery_address' => "адрес доставки",
            'delivery_method' => "способ доставки",
            'payment_method' => "Спрособ оплаты",
            'comment' => "Комментарий",
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }


    public function checkTotalSumOnProvider()
    {
        $priceOnProvider = 2000;
        $cart = Yii::$app->cart;

        $providers = [];

        foreach ($cart->getItems() as $key => $item){
            $providers[$item->provider_id] += $item->getCost(true);
        }

        foreach ($providers as $provider){
            if ($provider < $priceOnProvider) return false;
        }

        return true;
    }


    public function createOrder()
    {
        $new_order = new OrderCheckout();


        $transaction = Yii::$app->db->beginTransaction();


        try {

            if (Yii::$app->user->isGuest){
                $user = User::find()->where(['email' => $this->email])->limit(1)->one();
                if (!empty($user)){
                    $new_order->user_id = $user->id;
                }else{
                    $new_order->user_id = $this->createUser();
                }
            }else{
                $new_order->user_id = Yii::$app->user->getId();
            }

            $new_order->create($this);



            $transaction->commit();

            return $new_order;

        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }

    }

    private function createUser()
    {
        $new_user = new User();

        $new_user->fio = htmlspecialchars($this->name);
        $new_user->username = htmlspecialchars($this->email) ;
        $new_user->email = htmlspecialchars($this->email) ;
        $new_user->status = 10;
        $new_user->phone = htmlspecialchars($this->phone) ;
        $new_user->telegram = htmlspecialchars($this->telegram) ;
        $new_user->address = htmlspecialchars( $this->delivery_address);
        $new_user->setPassword(Yii::$app->security->generateRandomString(6));
        $new_user->generateAuthKey();
        $new_user->save();

        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole('client'), $new_user->getId());

        return $new_user->id;
    }
}
