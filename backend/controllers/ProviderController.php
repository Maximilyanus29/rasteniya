<?php

namespace backend\controllers;

use backend\models\forms\CreateProviderForm;
use common\components\Import\Import;
use common\models\City;
use common\models\Good;
use common\models\User;
use common\models\UserSearch;
use Yii;
use common\models\Provider;
use backend\models\search\Provider as ProviderSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProviderController implements the CRUD actions for Provider model.
 */
class ProviderController extends AppController
{
    public function getDomain()
    {
        return explode('/', Yii::$app->request->hostInfo)[count(explode('/', Yii::$app->request->hostInfo)) - 1] ;
    }

    /**
     * Lists all Provider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchProvider(Yii::$app->request->queryParams);

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
        $model = new User();
        $password = $model->password_hash;
        $model->password_hash = '';

        if (($model->load(Yii::$app->request->post()) && $model->validate()) ) {
            $auth = Yii::$app->authManager;
            $providerRole = $auth->getRole('provider');

            if (empty($model->password_hash)){
                $model->password_hash = $password;
            }else{
                $model->setPassword($model->password_hash);
            }

            if (empty($model->email)){
                $model->email = $model->username . "@" . $this->getDomain();
            }

            $model->generateAuthKey();
            $model->status = User::STATUS_PROVIDER;
            $model->save();

            $auth->assign($providerRole, $model->getId());


            $model->importFile = UploadedFile::getInstance($model, 'importFile');

            if (!empty($model->importFile)){
                $model->upload();
            }


            return $this->redirect(['update', 'id' => $model->id]);
        }

//        var_dump($model->errors);die;

        $citites = ArrayHelper::getColumn(City::find()->asArray()->indexBy('id')->all(), 'name');

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
        $model = User::findOne($id);
        $password = $model->password_hash;
        $model->password_hash = '';

        if (($model->load(Yii::$app->request->post()) && $model->validate()) ) {

            if (empty($model->password_hash)){
                $model->password_hash = $password;
            }else{
                $model->setPassword($model->password_hash);
            }

            if (empty($model->email)){
                $model->email = $model->username . "@" . $this->getDomain();
            }

            $model->save();

            $model->importFile = UploadedFile::getInstance($model, 'importFile');



            if (!empty($model->importFile)){
                $model->upload();
            }


            return $this->redirect(['update', 'id' => $model->id]);
        }

//        var_dump($model->errors);die;

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
        $goods = Good::find()->where(['provider_id' => $id ])->select('id')->all();

        foreach ($goods as $good){
            $pathStr = $good->id;
            FileHelper::removeDirectory("../../files/images/store/Goods/Good$pathStr");
        }

        /*По хорошему еще прикрутить удалениие из таблицы images, но это уже совем другая история*/

        $this->findModel($id)->delete();

        Good::deleteAll(['provider_id' => $id]);

        $auth = Yii::$app->authManager;
        $auth->revokeAll($id);



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
