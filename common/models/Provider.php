<?php

namespace common\models;

use common\components\Import\Import;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\SluggableBehavior;
use yii\helpers\Inflector;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "provider".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property float $profit_in_percent
 */
class Provider extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $importFile;

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'value' => function($event){
                    return Inflector::slug($this->name . "-" . $this->address);
                },
                'slugAttribute' => 'slug',
            ],
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'profit_in_percent', 'city_id'], 'required'],
            [['slug'], 'unique'],
            [['profit_in_percent', 'telegram_id'], 'number'],
            [['name', 'address', 'telegram'], 'string', 'max' => 254],
            [['password_hash'], 'string', 'min' => 6],
            [['importFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'xml'],
        ];
    }


    public function setCityId($val)
    {
        if (is_int($val)) return false;
        $this->city_id = City::findOne(['name' => $val])->id;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => "Наименование поставщика",
            'address' => "Адрес",
            'profit_in_percent' => "Процент от продажи",
            'telegram' => "Логин телеграм",
            'importFile' => "Загрузка файла импорта",
            'city_id' => "Город",
            'password_hash' => "Пароль",
        ];
    }

    public function upload()
    {
        $path = '../../files/import_files/' . $this->importFile->baseName . '.' . $this->importFile->extension;
        $this->importFile->saveAs($path);
        $this->import($path, $this->id);

        return true;
    }

    private function import($path, $provider_id)
    {
        $import = new Import($path, $provider_id);
        $import->run();
    }

    /**
     * {@inheritdoc}
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['provider_id' => 'id']);
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface|null the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * The returned key is used to validate session and auto-login (if [[User::enableAutoLogin]] is enabled).
     *
     * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
     * other scenarios, that require forceful access revocation for old sessions.
     *
     * @return string|null a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * @param string $authKey the given auth key
     * @return bool|null whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    public static function findByUsername($username)
    {
        return static::findOne(['name' => $username]);
    }
}
