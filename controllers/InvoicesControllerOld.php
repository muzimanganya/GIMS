<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\Invoices;
use app\modules\api\modules\v1\models\InvoiceDetails;
use app\modules\api\modules\v1\models\SearchInvoiceDetails;
use app\modules\api\modules\v1\models\SearchInvoices;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * InvoicesController implements the CRUD actions for Invoices model.
 */
class InvoicesController extends Controller
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
     * Lists all Invoices models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchInvoices();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	 public function actionInvoice()
    {
        $searchModel = new SearchInvoices();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('invoice', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Invoices model.
     * @param string $no No
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
       
        $searchModel = new SearchInvoiceDetails();
        $dataProvider = $searchModel->search($this->request->queryParams,$id);
     
        return $this->render('view', [
            'model' => $this->findModel($id),
            'items'=>$dataProvider
        ]);
    }

    /**
     * Creates a new Invoices model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Invoices();
		
        $modelDetails = [];

        $formDetails = Yii::$app->request->post('InvoiceDetails', []);
		
        foreach ($formDetails as $i => $formDetail) {
            $modelDetail = new InvoiceDetails(['scenario' => InvoiceDetails::SCENARIO_BATCH_UPDATE]);
            $modelDetail->setAttributes($formDetail);
            $modelDetails[] = $modelDetail;
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new InvoiceDetails(['scenario' => InvoiceDetails::SCENARIO_BATCH_UPDATE]);
            return $this->render('create', [
                'model' => $model,
                'modelDetails' => $modelDetails
            ]);
        }
       
        if ($model->load(Yii::$app->request->post())) {
			//var_dump(Model::validateMultiple($modelDetails));
			//die;
			 $model->save(false);
			foreach($modelDetails as $modelDetail) {
                    $modelDetail->invoice = $model->no;
					$modelDetail->save(false);
					
                }
				 return $this->redirect(['view', 'no' => $model->no]);
         /*  if (Model::validateMultiple($modelDetails)&& $model->validate()) {
                $model->save();
                foreach($modelDetails as $modelDetail) {
                    $modelDetail->save();
                }
                return $this->redirect(['view', 'no' => $model->no,'purchase_order'=>$model->purchase_order]);
		   }*/
        }

        return $this->render('create', [
            'model' => $model,
            'modelDetails' => $modelDetails
        ]);
    }

    /**
     * Updates an existing Invoices model.
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
     * Deletes an existing Invoices model.
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
     * Finds the Invoices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $no No
     * @return Invoices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoices::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
