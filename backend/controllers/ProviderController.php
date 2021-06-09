<?php

namespace backend\controllers;

use common\models\City;
use Yii;
use common\models\Provider;
use backend\models\search\Provider as ProviderSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProviderController implements the CRUD actions for Provider model.
 */
class ProviderController extends AppController
{

    /**
     * Lists all Provider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProviderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Provider model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Provider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Provider();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();


            $model->importFile = UploadedFile::getInstance($model, 'importFile');

            if (!empty($model->importFile)){
                $model->upload();
            }


            return $this->redirect(['update', 'id' => $model->id]);
        }



        $citites = array_map(function ($el){
            return $el['name'];
        },City::find()->asArray()->all());

//
//        var_dump($citites);die;


        return $this->render('create', [
            'model' => $model,
            'citites' => $citites,
        ]);
    }

    /**
     * Updates an existing Provider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {

            $model->save();

            $model->importFile = UploadedFile::getInstance($model, 'importFile');

            if (!empty($model->importFile)){
                $model->upload();
            }

            return $this->redirect(['update', 'id' => $model->id]);
        }


        $citites = ArrayHelper::getColumn(City::find()->asArray()->indexBy('id')->all(), 'name');


        return $this->render('update', [
            'model' => $model,
            'citites' => $citites,
        ]);
    }

    /**
     * Deletes an existing Provider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Provider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Provider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Provider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
