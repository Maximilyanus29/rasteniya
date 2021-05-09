<?php


namespace common\components;


use SimpleXMLElement;

class XMLParser
{
    private function getHash($product)
    {
        return md5(serialize($product));
    }

    public function getPreparedData($filePath)
    {
        return $this->prepare($filePath);
    }


    public function prepare($filePath)
    {
        $data = $this->parseXml($filePath);

        $products = [];

        foreach ($data as $product){

            $products[$this->getHash($product)] = $product;

        }

        return $products;

    }

    private function parseXml($data)
    {
        $file = file_get_contents($data);

        $xml = new SimpleXMLElement($file);

        $rows = $xml->Worksheet->Table->Row;

        $products = [];

        for ($i=0; $i < count($rows);$i++){
            //гуд $rows[$i]
            for ($j=0; $j < count($rows[$i]->Cell);$j++){
                //параметры $rows[$i]->Cell[$j]->Data
                $products[$i][] = trim(strval($rows[$i]->Cell[$j]->Data));
            }
        }

        $data = [];

        unset($products[0]);

        foreach ($products as $key => $product){
            $data[$key]['provider'] = $product[0];
            $data[$key]['region'] = $product[1];
            $data[$key]['category'] = $product[2];
            $data[$key]['subcategory'] = $product[3];
            $data[$key]['sku'] = $product[4];
            $data[$key]['name'] = $product[5];
            $data[$key]['description'] = $product[6];
            $data[$key]['size'] = $product[7];
            $data[$key]['root_system'] = $product[8];
            $data[$key]['quantity'] = $product[9];
            $data[$key]['price'] = $product[10];
            $data[$key]['photo1'] = $product[11];
            $data[$key]['photo2'] = $product[12];
            $data[$key]['photo3'] = $product[13];
            $data[$key]['minPriceForOrderCheckout'] = $product[14];
        }

        return $data;
    }
}