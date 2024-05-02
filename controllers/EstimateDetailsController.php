<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\EstmateDetails;
use app\modules\api\modules\v1\models\SearchEstmateDetails;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstimateDetailsController implements the CRUD actions for EstmateDetails model.
 */
class EstimateDetailsController extends Controller
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
     * Lists all EstmateDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchEstmateDetails();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstmateDetails model.
     * @param string $item Item
     * @param string $estimate Estimate
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item, $estimate)
    {
        return $this->render('view', [
            'model' => $this->findModel($item, $estimate),
        ]);
    }

    /**
     * Creates a new EstmateDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstmateDetails();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'item' => $model->item, 'estimate' => $model->estimate]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EstmateDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item Item
     * @param string $estimate Estimate
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item, $estimate)
    {
        $model = $this->findModel($item, $estimate);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item' => $model->item, 'estimate' => $model->estimate]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EstmateDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item Item
     * @param string $estimate Estimate
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item, $estimate)
    {
        $this->findModel($item, $estimate)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstmateDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item Item
     * @param string $estimate Estimate
     * @return EstmateDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item, $estimate)
    {
        if (($model = EstmateDetails::findOne(['item' => $item, 'estimate' => $estimate])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
