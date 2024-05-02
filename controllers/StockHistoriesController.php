<?php

namespace app\controllers;

use app\models\PurchaseDetails;
use app\models\StockHistories;
use app\models\StockHistoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockHistoriesController implements the CRUD actions for StockHistories model.
 */
class StockHistoriesController extends Controller
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
     * Lists all StockHistories models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StockHistoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StockHistories model.
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
     * Creates a new StockHistories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($product)
    {
        $model = new StockHistories();
        $item=PurchaseDetails::find()->where(['id'=>$product])->one();

        $pmodel = StockHistories::find()
            ->where(['product' => $item->product])
            ->orderBy(['id' => SORT_DESC])
            ->one();
      
        if(empty($pmodel))
        {
            $model->previous_balance=0;
            $model->previous_price=0;
        }
        else{
            $model->previous_balance=$pmodel->Balance;
            $model->previous_price=$pmodel->current_price;
        }
        

        $model->stock_out=0;
        $model->type='Good Receipt';
        $model->product=$item->product;
        $model->quantity=$item->quantity;
        $model->new_price=$item->price;
        $model->stock_in=$model->quantity;
        $model->reference=$item->purchase_number;
        $model->current_price=(($model->previous_price*$model->previous_balance)+($model->stock_in*$model->new_price))/($model->previous_balance+$model->stock_in);
        $model->Balance=$model->previous_balance+$model->stock_in;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()))
             {
                $model->current_price=(($model->previous_price*$model->previous_balance)+($model->stock_in*$model->new_price))/($model->previous_balance+$model->stock_in);
                $model->Balance=$model->previous_balance+$model->stock_in;
                if($model->save())
                {
                    $item->received=true;
                    $item->save(false);
                    return $this->redirect(['/purchase-orders/view', 'purchase_number' => $item->purchase_number]);
            }}
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StockHistories model.
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
     * Deletes an existing StockHistories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StockHistories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return StockHistories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StockHistories::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
