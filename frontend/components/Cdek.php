<?php


namespace frontend\components;
use CdekSDK\Common;
use CdekSDK\Requests;
use common\models\Pvz;
use yii\helpers\ArrayHelper;

class Cdek
{
    private $login = "QlHw0L4LUF28CrdtydHeH4WL0HsSfHkO";
    private $password = "Nrykf2II94shGWeUgYUcRrwZCFJSdBGk";

    private $weight = 500;
    private $sizeA = 10;
    private $sizeB = 10;
    private $sizeC = 10;


    private $senderCityId = 506;



    private function getPackageSettings($orderId)
    {
        return array_merge([
            'Number'  => $orderId,
            'BarCode' => $orderId,
        ],
        $this->getPackageSettingsWithoutOrder()
        );
    }

    private function getPackageSettingsWithoutOrder()
    {
        return [
            'Weight'  => $this->weight, // Общий вес (в граммах)
            'SizeA'   => $this->sizeA, // Длина (в сантиметрах), в пределах от 1 до 1500
            'SizeB'   => $this->sizeB,
            'SizeC'   => $this->sizeC,
        ];
    }

    public function createOrder($orderIM, $cityFrom, $recipientPostCode, $tarif, $recipient, $resipientPhone, $resipientEmail, $resipientAddress = null)
    {
        $client = new \CdekSDK\CdekClient($this->login, $this->password);

        $order = new Common\Order([
            'Number'   => $orderIM->id,
            'SendCityCode'    => $cityFrom, // Москва
            'RecCityPostCode' => $recipientPostCode, // Новосибирск
            'RecipientName'  => $recipient,
            'RecipientEmail' => $resipientEmail,
            'Phone'          => $resipientPhone,
            'TariffTypeCode' => $tarif, // Посылка дверь-дверь от ИМ
        ]);

        $order->setAddress(Common\Address::create([
            'Street' => $resipientAddress,
        ]));


        //регистрируем пакет, скок весит и тд
        $package = Common\Package::create($this->getPackageSettings($orderIM->id));



        foreach ($orderIM->goods as $good){
            $package->addItem(new Common\Item([
                'WareKey' => $good->id, // Идентификатор/артикул товара/вложения
                'Cost'    => 0, // Объявленная стоимость товара (за единицу товара)
                'Payment' => 0, // Оплата за товар при получении (за единицу товара)
                'Weight'  => $good->weight, // Вес (за единицу товара, в граммах)
                'Amount'  => $good->quantity, // Количество единиц одноименного товара (в штуках)
                'Comment' => 'Test item',
            ]));
        }


        $order->addPackage($package);

        $request = new Requests\DeliveryRequest([
            'Number' => 'TESTING123',
        ]);

        $request->addOrder($order);

        $response = $client->sendDeliveryRequest($request);

        if ($response->hasErrors()) {
            // обработка ошибок

            foreach ($response->getErrors() as $order) {
                // заказы с ошибками
                $order->getMessage();
                $order->getErrorCode();
                $order->getNumber();
            }

            foreach ($response->getMessages() as $message) {
                // Сообщения об ошибках
            }
        }

        foreach ($response->getOrders() as $order) {
            // сверяем данные заказа, записываем номер
            $order->getNumber();
            $order->getDispatchNumber();
            break;
        }
    }


    public function createOrder2()
    {
        $client = new \CdekSDK\CdekClient($this->login, $this->password);

        $order = new Common\Order([
            'Number'   => '2134567',
            'SendCityCode'    => 44, // Москва
            'RecCityPostCode' => '630001', // Новосибирск
            'RecipientName'  => 'Иван Петров',
            'RecipientEmail' => 'petrov@test.ru',
            'Phone'          => '+7 (383) 202-22-50',
            'TariffTypeCode' => 139, // Посылка дверь-дверь от ИМ
        ]);

        $order->setAddress(Common\Address::create([
            'Street' => 'Холодильная улица',
            'House'  => '16',
            'Flat'   => '22',
        ]));

        $package = Common\Package::create([
            'Number'  => '2134567',
            'BarCode' => '2134567',
            'Weight'  => 500, // Общий вес (в граммах)
            'SizeA'   => 10, // Длина (в сантиметрах), в пределах от 1 до 1500
            'SizeB'   => 10,
            'SizeC'   => 10,
        ]);

        $package->addItem(new Common\Item([
            'WareKey' => 'NN0001', // Идентификатор/артикул товара/вложения
            'Cost'    => 500, // Объявленная стоимость товара (за единицу товара)
            'Payment' => 0, // Оплата за товар при получении (за единицу товара)
            'Weight'  => 120, // Вес (за единицу товара, в граммах)
            'Amount'  => 2, // Количество единиц одноименного товара (в штуках)
            'Comment' => 'Test item',
        ]));

        $order->addPackage($package);

        $request = new Requests\DeliveryRequest([
            'Number' => 'TESTING123',
        ]);
        $request->addOrder($order);

        $response = $client->sendDeliveryRequest($request);

        var_dump($response);die;

        if ($response->hasErrors()) {
            // обработка ошибок

            foreach ($response->getErrors() as $order) {
                // заказы с ошибками
                $order->getMessage();
                $order->getErrorCode();
                $order->getNumber();
            }

            foreach ($response->getMessages() as $message) {
                // Сообщения об ошибках
            }
        }

        foreach ($response->getOrders() as $order) {
            // сверяем данные заказа, записываем номер
            $order->getNumber();
            $order->getDispatchNumber();
            break;
        }
    }



    public function importPvz()
    {
        $client = new \CdekSDK\CdekClient($this->login, $this->password);


        $request = new Requests\PvzListRequest();
//        $request->setCityId(250);
        $request->setType(Requests\PvzListRequest::TYPE_ALL);
        $request->setCashless(true);
        $request->setCash(true);
        $request->setCodAllowed(true);
        $request->setDressingRoom(true);

        $response = $client->sendPvzListRequest($request);

        if ($response->hasErrors()) {
            // обработка ошибок
        }

        $pvzInDb = Pvz::find()->indexBy('Hash')->all();


        $listRelationImportPvz = [];

        foreach ($response as $pvz){

            $hash = md5(implode(',', [
                $pvz->Code,
                $pvz->Name,
                $pvz->Address,
                $pvz->FullAddress,
                $pvz->PostalCode,
                $pvz->Phone,
                $pvz->Email,
                $pvz->City,
            ]));


            if (isset($pvzInDb[$hash]))
            {
                $listRelationImportPvz[$hash] = $pvzInDb[$hash];
                continue;
            }

            $newPVZ = new Pvz();
            $newPVZ->Code = $pvz->Code;
            $newPVZ->Name = $pvz->Name;
            $newPVZ->Address = $pvz->Address;
            $newPVZ->FullAddress = $pvz->FullAddress;
            $newPVZ->PostalCode = $pvz->PostalCode;
            $newPVZ->Phone = $pvz->Phone;
            $newPVZ->Email = $pvz->Email;
            $newPVZ->CountryCode = $pvz->CountryCode;
            $newPVZ->CountryName = $pvz->CountryName;
            $newPVZ->RegionCode = $pvz->RegionCode;
            $newPVZ->RegionName = $pvz->RegionName;
            $newPVZ->City = $pvz->City;
            $newPVZ->CityCode = $pvz->CityCode;
            $newPVZ->WorkTime = $pvz->WorkTime;
            $newPVZ->Hash = $hash;


            if ($newPVZ->save()){
                $listRelationImportPvz[$hash] = $newPVZ;
            }
        }


        $for_delete = array_diff_key($pvzInDb, $listRelationImportPvz);

        $hashes_for_delete = ArrayHelper::getColumn($for_delete, 'hash');

        Pvz::deleteAll(['hash'=>$hashes_for_delete]);

        return true;
    }


    public function getPrice($pvz, $tariff)
    {
        $client = new \CdekSDK\CdekClient($this->login, $this->password);


        // для выполнения запроса без авторизации используется
// $request = new Requests\CalculationRequest();
// $request->set...() и так далее

        $request = new Requests\CalculationAuthorizedRequest();
        $request
            ->setSenderCityId($this->senderCityId)
            ->setReceiverCityPostCode('652632')
            ->setTariffId($tariff)
            ->addPackage([
                'weight'  => $this->weight /100, // Общий вес (в граммах)
                'length'   => $this->sizeA, // Длина (в сантиметрах), в пределах от 1 до 1500
                'width'   => $this->sizeB,
                'height'   => $this->sizeC,
            ]);

        $response = $client->sendCalculationRequest($request);

        if ($response->hasErrors()) {
            var_dump($response->getErrors());die;
            return false;
        }


        /** @var \CdekSDK\Responses\CalculationResponse $response */
        return $response->getPrice();
// double(1250)
    }




}