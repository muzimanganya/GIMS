<?php

namespace app\controllers;

use app\models\Taxes;
use app\models\TaxesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaxesController implements the CRUD actions for Taxes model.
 */
class TaxesController extends Controller
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
     * Lists all Taxes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TaxesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Taxes model.
     * @param float $percent Percent
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($percent)
    {
        return $this->render('view', [
            'model' => $this->findModel($percent),
        ]);
    }

    /**
     * Creates a new Taxes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Taxes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Taxes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param float $percent Percent
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($percent)
    {
        $model = $this->findModel($percent);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'percent' => $model->percent]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Taxes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param float $percent Percent
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($percent)
    {
        $this->findModel($percent)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Taxes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param float $percent Percent
     * @return Taxes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($percent)
    {
        if (($model = Taxes::findOne(['percent' => $percent])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
