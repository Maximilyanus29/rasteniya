<?php

namespace common\models;

use common\components\Import\Import;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\Inflector;

/**
 * This is the model class for table "provider".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property float $profit_in_percent
 */
class Provider extends \yii\db\ActiveRecord
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
            [['profit_in_percent'], 'number'],
            [['name', 'address'], 'string', 'max' => 254],
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
}
