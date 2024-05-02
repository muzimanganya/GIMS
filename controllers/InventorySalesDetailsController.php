<?php

namespace app\controllers;

use app\models\InventorySalesDetails;
use app\models\InventorySalesDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventorySalesDetailsController implements the CRUD actions for InventorySalesDetails model.
 */
class InventorySalesDetailsController extends Controller
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
     * Lists all InventorySalesDetails models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InventorySalesDetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InventorySalesDetails model.
     * @param string $product Product
     * @param int $sale_id Sale ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product, $sale_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product, $sale_id),
        ]);
    }

    /**
     * Creates a new InventorySalesDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new InventorySalesDetails();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'product' => $model->product, 'sale_id' => $model->sale_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InventorySalesDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $product Product
     * @param int $sale_id Sale ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product, $sale_id)
    {
        $model = $this->findModel($product, $sale_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product' => $model->product, 'sale_id' => $model->sale_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InventorySalesDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $product Product
     * @param int $sale_id Sale ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product, $sale_id)
    {
        $this->findModel($product, $sale_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InventorySalesDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $product Product
     * @param int $sale_id Sale ID
     * @return InventorySalesDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product, $sale_id)
    {
        if (($model = InventorySalesDetails::findOne(['product' => $product, 'sale_id' => $sale_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
