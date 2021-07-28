<?php
namespace backend\models\forms;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * Login form
 */
class CreateProviderForm extends ActiveRecord
{
/*    public $username;
    public $address;
    public $profit_in_percent;
    public $city_id;
    public $slug;
    public $telegram;
    public $password_hash;

*/
    public $importFile;







    public static function tableName()
    {
        return '{{%user}}';
    }



    public function rules()
    {
        return [
            [['username', 'address', 'profit_in_percent', 'city_id'], 'required'],
            [['slug'], 'unique'],
            [['profit_in_percent'], 'number'],
            [['username', 'address', 'telegram'], 'string', 'max' => 254],
            [['password_hash'], 'string', 'min' => 6],
            [['importFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'xml'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => "Наименование поставщика",
            'address' => "Адрес",
            'profit_in_percent' => "Процент от продажи",
            'telegram' => "Логин телеграм",
            'importFile' => "Загрузка файла импорта",
            'city_id' => "Город",
            'password_hash' => "Пароль",
        ];
    }


    public function beforeSave($insert)
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
/*заменить на 2*/
        $domain = explode('/', Yii::$app->request->hostInfo)[count(explode('/', Yii::$app->request->hostInfo)) - 1] ;

        if (empty($this->email)){
            $this->email = $this->username . "@" . $domain;
        }

        parent::beforeSave($insert);
        return true;
    }



}
