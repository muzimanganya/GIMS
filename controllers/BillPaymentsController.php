<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\BillPayments;
use app\modules\api\modules\v1\models\SearchBillPayments;
use app\modules\api\modules\v1\models\BillDetails;
use app\modules\api\modules\v1\models\Bills;
use app\modules\api\modules\v1\models\Accounts;
use app\modules\api\modules\v1\models\BankAccounts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BillPaymentsController implements the CRUD actions for BillPayments model.
 */
class BillPaymentsController extends Controller
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
     * Lists all BillPayments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchBillPayments();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BillPayments model.
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
     * Creates a new BillPayments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($bill,$order)
    {
        $model = new BillPayments();
		$model->bill=$bill;
		$model->purchase_order=$order;
        $model->amount=BillDetails::find()->where(['bill'=>$bill])->sum('price*quantity');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $cur_bill=Bills::find()->where(['no'=>$bill])->one();
                $cur_bill->status=1;
                $cur_bill->save();

                //===========Decrease our account=================
                $account=Accounts::find()->where(['id'=>$model->account])->one();
                $account->balance=$account->balance-$model->amount;
                $account->save();

                //===========Decrease the bank account============

                $baccont=BankAccounts::find()->where(['account'=>$model->bank_account])->one();
                $baccont->balance=$baccont->balance-$model->amount;
                $baccont->save();



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
     * Updates an existing BillPayments model.
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
     * Deletes an existing BillPayments model.
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
     * Finds the BillPayments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $no No
     * @return BillPayments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no)
    {
        if (($model = BillPayments::findOne($no)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
