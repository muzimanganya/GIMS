<?php

namespace app\controllers;

use app\models\PurchaseDetailsSearch;
use app\models\PurchaseOrder;
use app\models\PurchaseOrders;
use app\models\PurchaseDetails;
use app\models\PurchaseOrdersSearch;
use app\models\Suppliers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use Mpdf\Mpdf;

/**
 * PurchaseOrdersController implements the CRUD actions for PurchaseOrders model.
 */
class PurchaseOrdersController extends Controller
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
     * Lists all PurchaseOrders models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseOrdersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PurchaseOrders model.
     * @param int $purchase_number Purchase Number
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($purchase_number)
    {
        $model = $this->findModel($purchase_number);
        $searchModel = new PurchaseDetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
       
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'subtotal' => 0,
            'tax' => 0,
            'total' => 0,
        ]);
       
    }

    public function actionDownloadPdf($po)
    {
        $items = PurchaseDetails::getItems($po);
        $model = PurchaseOrders::findOne($po);
        $supplier=Suppliers::find(['id'=>$model->supplier])->one();
       
        // Replace this with your actual data retrieval logic for the purchase order
        
        // Create a new mPDF object
        $mpdf = new Mpdf();

        // Customize the PDF content here
        $html = $this->renderPartial('_purchaseOrderTemplate', ['items'=>$items,'model'=>$model,'supplier'=>$supplier,'po' => $po]);

        // Add content to mPDF
        $mpdf->WriteHTML($html);

        // Set PDF properties (optional)
        $mpdf->SetTitle('Purchase Order - ' . $po);
        $mpdf->SetAuthor('Your Company Name');

        // Output the PDF as a download
        $mpdf->Output('PurchaseOrder_' . $po . '.pdf', 'D');
        exit;
    }

    /**
     * Creates a new PurchaseOrders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PurchaseOrders();
        $model->purchase_number=$this->generatePurchaseNumber();
        $model->STATUS="Draft";
        $model->amount=0;
        
        if ($this->request->isPost) {
            $model->purchase_number=$this->generatePurchaseNumber();
        
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'purchase_number' => $model->purchase_number]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function generatePurchaseNumber()
    {
        // Logic to generate the purchase number (e.g., fetching the latest number from the database and incrementing)
        $latestPurchase = PurchaseOrders::find()->orderBy(['id' => SORT_DESC])->one();

        if ($latestPurchase) {
            $currentNumber = (int) substr($latestPurchase->purchase_number, 3);
            $newNumber = $currentNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format the purchase number
        return 'PO-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
    /**
     * Updates an existing PurchaseOrders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $purchase_number Purchase Number
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($purchase_number)
    {
        $model = $this->findModel($purchase_number);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'purchase_number' => $model->purchase_number]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PurchaseOrders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $purchase_number Purchase Number
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($purchase_number)
    {
        $this->findModel($purchase_number)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PurchaseOrders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $purchase_number Purchase Number
     * @return PurchaseOrders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($purchase_number)
    {
        if (($model = PurchaseOrders::findOne(['purchase_number' => $purchase_number])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

   

private function calculateSubtotal($model)
{
    $subtotal = 0;

    foreach ($model->purchaseDetails as $purchaseDetail) {
        $subtotal += $purchaseDetail->price * $purchaseDetail->quantity;
    }

    return $subtotal;
}

private function calculateTax($model)
{
    // Assuming 'tax_calculation' is a percentage
    $taxRate = $model->tax_calculation;
    $subtotal = $this->calculateSubtotal($model);

    $tax = ($taxRate / 100) * $subtotal;

    return $tax;
}

private function calculateTotal($model)
{
    $subtotal = $this->calculateSubtotal($model);
    $tax = $this->calculateTax($model);

    $total = $subtotal + $tax;

    return $total;
}

}
