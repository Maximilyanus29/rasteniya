<?php

namespace common\components;

use SimpleXMLElement;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Import
{
    private $_data;

    private $xmlParser;

//    private $providerImport;
//    private $categoryImport;
//    private $goodImport;



    public function run($filePath)
    {


        $providerId = Yii::$app->user->identity->provider->id;




        $this->xmlParser = new XMLParser();

        $this->_data = $this->xmlParser->getPreparedData($filePath);



        $existInDb = ImportChecker::checkInDb($this->_data);




        if ($existInDb){
             Yii::$app->session->setFlash('info', 'Похоже вы повторно загружаете файл');return false;
        }



        $categoryImport = new CategoryImport($this->_data);



        $goodImport = new GoodImport($this->_data, $providerId);



        return true;

    }





}
