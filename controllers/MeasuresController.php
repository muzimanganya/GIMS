<?php

namespace app\controllers;

use app\models\Measures;
use app\models\MeasuresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MeasuresController implements the CRUD actions for Measures model.
 */
class MeasuresController extends Controller
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
     * Lists all Measures models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MeasuresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Measures model.
     * @param string $CODE Code
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CODE)
    {
        return $this->render('view', [
            'model' => $this->findModel($CODE),
        ]);
    }

    /**
     * Creates a new Measures model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Measures();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'CODE' => $model->CODE]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Measures model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CODE Code
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CODE)
    {
        $model = $this->findModel($CODE);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CODE' => $model->CODE]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Measures model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CODE Code
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CODE)
    {
        $this->findModel($CODE)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Measures model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CODE Code
     * @return Measures the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CODE)
    {
        if (($model = Measures::findOne(['CODE' => $CODE])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
