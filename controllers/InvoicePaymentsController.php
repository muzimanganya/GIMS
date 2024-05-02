<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\InvoicePayments;
use app\modules\api\modules\v1\models\InvoiceDetails;
use app\modules\api\modules\v1\models\SearchInvoicePayments;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * InvoicePaymentsController implements the CRUD actions for InvoicePayments model.
 */
class InvoicePaymentsController extends Controller
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
     * Lists all InvoicePayments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchInvoicePayments();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvoicePayments model.
     * @param int $no No
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
     * Creates a new InvoicePayments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($invoice)
    {
        $model = new InvoicePayments();
		$model->invoice=$invoice;
		$items=InvoiceDetails::find()->where(['invoice'=>$invoice])->all();
		
		if(!empty($items))
		{
			$sum=0;
			foreach($items as $item)
			{
				$sum=$sum+($item->price*$item->quantity);
			}
			$model->amount=$sum+$sum/100*18;
		}
        $payments=InvoicePayments::find()->where(['invoice'=>$model->invoice])->all();
                    $pamount=0;
                    if(!empty($payments))
                    {
                        foreach($payments as $item)
                        {
                            $pamount=$pamount+$item->amount;
                        }
                        
                        
                    }
                    $model->amount=$model->amount-$pamount;
                    $amount_to_pay=$model->amount;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                if($model->amount>$amount_to_pay)
                {
                    throw new NotFoundHttpException(Yii::t('app', 'The balance to pay exceded.'));
                }
                $model->save();
                return $this->redirect(['/invoices/view', 'id' => $model->invoice]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InvoicePayments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $no No
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
     * Deletes an existing InvoicePayments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $no No
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no)
    {
        $this->findModel($no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InvoicePayments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $no No
     * @return InvoicePayments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no)
    {
        if (($model = InvoicePayments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
