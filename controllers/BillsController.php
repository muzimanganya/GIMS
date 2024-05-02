<?php

namespace app\controllers;

use app\models\Bills;
use app\models\BillsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BillsController implements the CRUD actions for Bills model.
 */
class BillsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Bills models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BillsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bills model.
     * @param string $bill_no Bill No
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($bill_no)
    {
        return $this->render('view', [
            'model' => $this->findModel($bill_no),
        ]);
    }

    /**
     * Creates a new Bills model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bills();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'bill_no' => $model->bill_no]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bills model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $bill_no Bill No
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($bill_no)
    {
        $model = $this->findModel($bill_no);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bill_no' => $model->bill_no]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bills model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $bill_no Bill No
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($bill_no)
    {
        $this->findModel($bill_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bills model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $bill_no Bill No
     * @return Bills the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bill_no)
    {
        if (($model = Bills::findOne(['bill_no' => $bill_no])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
