<?php

namespace common\components\Import;

use SimpleXMLElement;
use Yii;
use yii\base\Model;
use yii\helpers\Inflector;
use yii\httpclient\XmlParser;

/**
 * ContactForm is the model behind the contact form.
 */
class Import
{
    public $data = [];
    public $hashed_data = [];
    public $_path;
    public $_provider_id;

    private $basePathFiles = "";


    public function __construct($path, $provider_id)
    {
        $this->_provider_id = $provider_id;
        $this->_path = Yii::getAlias('@importStore') . "/" . $path;
    }

    public function getHashesInArrayImportGoods($goods)
    {
        $hashes = [];
        foreach ($goods as $hash => $good){
            $hashes[] = $hash;
        }
        return $hashes;
    }

    public function structurifyFromDbToImportArray($dbData)
    {
        $data = [];
        foreach ($dbData as $hash => $good){

            $data[$hash] = [
                $good['provider_id'],
                $good['vendor_code'],
                $good['name'],
                Inflector::slug($good['name']),//slug
                $hash,
                $good['size'],
                $good['description'],
                $good['root_system'],
                $good['quantity'],
                $good['price'],
                $good['minPriceForOrderCheckout'],
            ];
        }



        return $data;
    }


    public function structurifyFromDbToImport($dbData)
    {

            return [
                $dbData['provider_id'],
                $dbData['sub_category'],
                $dbData['vendor_code'],
                $dbData['name'],
                Inflector::slug($dbData['name']),//slug
                $dbData['hash'],
                $dbData['size'],
                $dbData['description'],
                $dbData['root_system'],
                $dbData['quantity'],
                $dbData['price'],
                $dbData['minPriceForOrderCheckout'],
            ];

    }

    private function parseFile()
    {
        //Поидее надо бы сделать отдельный класс с интерфейсом для следования solid , может появится возможность заргрузки xml не только из загруженного файла

        $file = file_get_contents($this->_path);

        $xml = new SimpleXMLElement($file);



        foreach ($xml->Worksheet->Table->Row as $row){

            $row = $row->Cell;

            if (empty(mb_strtolower(trim(strval($row[5]->Data))))) continue;

            $res['provider'] = $this->_provider_id;
            $res['region'] = strval($row[1]->Data);

            $res['category'] = mb_strtolower(trim(strval($row[2]->Data)));

            $res['sub_category'] = mb_strtolower(trim(strval($row[3]->Data)));

            $res['sku'] = strval($row[4]->Data);

            $res['name'] = mb_strtolower(trim(strval($row[5]->Data)));

            $res['description'] = strval($row[6]->Data);
            $res['size'] = strval($row[7]->Data);
            $res['root_system'] = strval($row[8]->Data);
            $res['quantity'] = strval($row[9]->Data);
            $res['price'] = strval($row[10]->Data);
            $res['photo'] = strval($row[11]->Data);
            $res['photo2'] = strval($row[12]->Data);
            $res['photo3'] = strval($row[13]->Data);
            $res['minQuantityForOrder'] = intval($row[14]->Data);

            $this->data[] = $res;


        }

        unset($this->data[0]);


        return $this->data;
    }

    public function getHashedData()
    {
        if (empty($this->hashed_data)){
            foreach ($this->data as $row){
                $this->hashed_data[md5(implode([$row['name'], $row['provider']]))] = $row;
            }
        }
        return $this->hashed_data;
    }


    public function run()
    {
        $this->parseFile();

        $CategoryChecker = new CategoryChecker($this);



        $CategoryRepository = new CategoryRepository($CategoryChecker);



        $GoodChecker = new GoodChecker($this);
        $GoodRepository = new GoodRepository($GoodChecker);

        $dbData = $GoodRepository->getGoodsFromDb();

        $this->attachImg($dbData);

        return true;
    }


    private function attachImg($dbData)
    {
        $import = $this->getHashedData();

        foreach ($import as $hash => $item){

            $dbData[$hash]->removeImages();

            foreach ($item as $key => $value){
                if (mb_strpos($key, 'photo')!==false){

                    if (empty($value)) continue;

                    $fileName = $this->getAndLoadImage($value);

                    $this->attachToModel($dbData[$hash], $fileName);
                }
            }

        }

        return true;
    }

    private function getAndLoadImage($url)
    {
        $fileName = time() . "_" . explode('/', $url)[count(explode('/', $url))-1];

        file_put_contents( Yii::getAlias('@imageBuffer') . $fileName, file_get_contents($url));

        return $fileName;
    }

    private function attachToModel($model, $fileName)
    {
        $model->attachImage(Yii::getAlias('@imageBuffer') . $fileName);

        unlink(Yii::getAlias('@imageBuffer') . $fileName);
    }







}
