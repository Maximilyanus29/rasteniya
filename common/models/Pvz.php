<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pvz".
 *
 * @property int $id
 * @property string $Code
 * @property string|null $Name
 * @property string|null $Address
 * @property string|null $FullAddress
 * @property string|null $PostalCode
 * @property string|null $Phone
 * @property string|null $Email
 * @property int|null $CountryCode
 * @property string|null $CountryName
 * @property int|null $RegionCode
 * @property string|null $RegionName
 * @property int|null $CityCode
 * @property string|null $City
 * @property string|null $WorkTime
 */
class Pvz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pvz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'Code'], 'required'],
            [[ 'CountryCode', 'RegionCode', 'CityCode'], 'integer'],
            [['Code', 'Name', 'Address', 'FullAddress', 'PostalCode', 'Phone', 'Email', 'CountryName', 'RegionName', 'City', 'WorkTime'], 'string', 'max' => 254],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Code' => 'Code',
            'Name' => 'Name',
            'Address' => 'Address',
            'FullAddress' => 'Full Address',
            'PostalCode' => 'Postal Code',
            'Phone' => 'Phone',
            'Email' => 'Email',
            'CountryCode' => 'Country Code',
            'CountryName' => 'Country Name',
            'RegionCode' => 'Region Code',
            'RegionName' => 'Region Name',
            'CityCode' => 'City Code',
            'City' => 'City',
            'WorkTime' => 'Work Time',
        ];
    }
}
