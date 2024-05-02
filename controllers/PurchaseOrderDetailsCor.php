<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\PurchaseOrderDetails;
use app\modules\api\modules\v1\models\SearchPurchaseOrderDetails;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseOrderDetailsController implements the CRUD actions for PurchaseOrderDetails model.
 */
class PurchaseOrderDetailsController extends Controller
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
     * Lists all PurchaseOrderDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPurchaseOrderDetails();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PurchaseOrderDetails model.
     * @param string $no No
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($no)
    {
        return $this->render('view', [
            'model' => $this->findModel($no),
        ]);
    }

    /**
     * Creates a new PurchaseOrderDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PurchaseOrderDetails();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'no' => $model->no]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PurchaseOrderDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $no No
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no)
    {
        $model = $this->findModel($no);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'no' => $model->no]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PurchaseOrderDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $no No
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no)
    {
        $this->findModel($no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PurchaseOrderDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $no No
     * @return PurchaseOrderDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no)
    {
        if (($model = PurchaseOrderDetails::findOne($no)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
