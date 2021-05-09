<?php
namespace frontend\modules\user\models;


use yii\base\InvalidArgumentException;
use yii\base\Model;
use Yii;
use common\models\User;

/**
 * Password reset form
 */
class ChangePasswordForm extends Model
{
    public $password;
    public $passwordRepeat;


    public function attributeLabels()
    {
        return [

            'password' => 'Пароль',
            'passwordRepeat' => 'Повторите пароль',

        ];
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'password' ], 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function changePassword()
    {
        $user = Yii::$app->user->identity;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save();
    }
}
