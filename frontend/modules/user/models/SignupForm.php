<?php
namespace frontend\modules\user\models;


use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $fio;
    public $address;

    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',

            'email' => 'Email',
            'password' => 'Пароль',

        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['fio', 'string', 'min' => 2, 'max' => 255],
            ['address', 'string', 'min' => 2, 'max' => 255],


            ['email', 'trim'],
            ['email', 'string', 'min' => 2, 'max' => 255],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();

        $user->fio = $this->email;
        $user->address = $this->address;
        $user->username = $this->email;
        $user->status = User::STATUS_USER;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();



        return $user->save() && $this->sendEmail($user) && LoginForm::loginStatic($user);

    }



    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
