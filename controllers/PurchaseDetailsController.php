<?php

namespace app\controllers;

use app\models\Products;
use app\models\PurchaseDetails;
use app\models\PurchaseDetailsSearch;
use app\models\PurchaseOrder;
use app\models\PurchaseOrders;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseDetailsController implements the CRUD actions for PurchaseDetails model.
 */
class PurchaseDetailsController extends Controller
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
     * Lists all PurchaseDetails models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseDetailsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PurchaseDetails model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PurchaseDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($purchase_number)
    {
        // Find the purchase order model
        $purchaseOrder = PurchaseOrders::findOne(['purchase_number' => $purchase_number]);

        if (!$purchaseOrder) {
            throw new NotFoundHttpException('The requested purchase order does not exist.');
        }

        $model = new PurchaseDetails();
        $model->purchase_number = $purchase_number;

        if ($model->load(Yii::$app->request->post())) {
           
            $model->ACCOUNT=Products::find()->where(['id'=>$model->product])->one()->purchase_account;
            $model->save();
            // Redirect to the purchase order view page after creating the purchase detail
            return $this->redirect(['purchase-orders/view', 'purchase_number' => $purchase_number]);
        }

        // Render the purchase detail creation form in the modal
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PurchaseDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PurchaseDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $detail=$this->findModel($id);
        $model=PurchaseOrders::find()->where(['purchase_number'=>$detail->purchase_number])->one();
        $this->findModel($id)->delete();

        return $this->redirect(['/purchase-orders/view','purchase_number'=>$model->purchase_number]);
    }

    /**
     * Finds the PurchaseDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PurchaseDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PurchaseDetails::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
