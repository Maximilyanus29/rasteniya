<?php

namespace frontend\models;

use common\models\OrderCheckout;
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
    public $agreement = false;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'delivery_method', 'payment_method', 'agreement'], 'required'],
            [['name', 'email', 'phone'], 'string', 'max' => 50],
            [['comment', 'delivery_address'], 'string', 'max' => 254],
            [['delivery_method', 'payment_method'], 'string'],
            // email has to be a valid email address
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
            'verifyCode' => 'Verification Code',
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

    public function createOrder()
    {
        $order = new OrderCheckout();




    }
}
