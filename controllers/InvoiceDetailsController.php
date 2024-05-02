<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\InvoiceDetails;
use app\modules\api\modules\v1\models\SearchInvoiceDetails;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvoiceDetailsController implements the CRUD actions for InvoiceDetails model.
 */
class InvoiceDetailsController extends Controller
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
     * Lists all InvoiceDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchInvoiceDetails();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvoiceDetails model.
     * @param string $item Item
     * @param string $invoice Invoice
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item, $invoice)
    {
        return $this->render('view', [
            'model' => $this->findModel($item, $invoice),
        ]);
    }

    /**
     * Creates a new InvoiceDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($no)
    {
        $model = new InvoiceDetails();
        $model->invoice=$no;
        //$model->

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/invoices/view', 'id' => $model->invoice, 'invoice' => $model->invoice]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InvoiceDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item Item
     * @param string $invoice Invoice
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item, $invoice)
    {
        $model = $this->findModel($item, $invoice);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item' => $model->item, 'invoice' => $model->invoice]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InvoiceDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item Item
     * @param string $invoice Invoice
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item, $invoice)
    {
        $this->findModel($item, $invoice)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InvoiceDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item Item
     * @param string $invoice Invoice
     * @return InvoiceDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item, $invoice)
    {
        if (($model = InvoiceDetails::findOne(['item' => $item, 'invoice' => $invoice])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
