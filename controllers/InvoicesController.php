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
     *
     * @return string
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

    public function actionReconcile()
    {
        $searchModel = new SearchInvoices();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('reconcile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMark()
    {
        $id = Yii::$app->request->post('id');
        $isChecked = Yii::$app->request->post('checked');
        $model = Invoices::find()->where(['no'=>$id])->one();
        //check status
        $success = ['success'=>false, 'msg'=>$model->no];
        if ($model) {
            $model->reconcile = $isChecked ;

            if ($model->save(false)) {
                $success['success'] = true;
                $success['msg'] = 'Status Changed';
            } else {
                $success['msg'] = $model->errors;
            }
        }
        return json_encode($success);
    }

    /**
     * Displays a single Invoices model.
     * @param string $no No
     * @return string
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
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Invoices();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->no]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Invoices model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $no No
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no)
    {
        $model = $this->findModel($no);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->no]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionConfirm($no)
    {
        $model = Invoices::find()->where(['no'=>$no])->one();
        $model->status=1;
        
        $model->save(false);
            return $this->redirect(['view', 'id' => $model->no]);
        

       
    }

    public function actionCancel($no)
    {
        $model = Invoices::find()->where(['no'=>$no])->one();
        $model->status=-1;
        
        $model->save(false);
            return $this->redirect(['view', 'id' => $model->no]);
        

       
    }
    /**
     * Deletes an existing Invoices model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $no No
     * @return \yii\web\Response
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
    protected function findModel($no)
    {
        if (($model = Invoices::findOne(['no' => $no])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
