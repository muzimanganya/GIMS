<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\BranchService;
use app\models\BranchServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BranchServiceController implements the CRUD actions for BranchService model.
 */
class BranchServiceController extends Controller
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
     * Lists all BranchService models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BranchServiceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BranchService model.
     * @param int $branch Branch
     * @param string $service Service
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($branch, $service)
    {
        return $this->render('view', [
            'model' => $this->findModel($branch, $service),
        ]);
    }

    /**
     * Creates a new BranchService model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BranchService();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'branch' => $model->branch, 'service' => $model->service]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BranchService model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $branch Branch
     * @param string $service Service
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($branch, $service)
    {
        $model = $this->findModel($branch, $service);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'branch' => $model->branch, 'service' => $model->service]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BranchService model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $branch Branch
     * @param string $service Service
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($branch, $service)
    {
        $this->findModel($branch, $service)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BranchService model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $branch Branch
     * @param string $service Service
     * @return BranchService the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($branch, $service)
    {
        if (($model = BranchService::findOne(['branch' => $branch, 'service' => $service])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
