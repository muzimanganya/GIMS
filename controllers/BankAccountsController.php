<?php

namespace app\controllers;

use app\models\BankAccounts;
use app\models\BankAccountsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BankAccountsController implements the CRUD actions for BankAccounts model.
 */
class BankAccountsController extends Controller
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
     * Lists all BankAccounts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BankAccountsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BankAccounts model.
     * @param string $NAME Nom
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($NAME)
    {
        return $this->render('view', [
            'model' => $this->findModel($NAME),
        ]);
    }

    /**
     * Creates a new BankAccounts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BankAccounts();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'NAME' => $model->NAME]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BankAccounts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $NAME Nom
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($NAME)
    {
        $model = $this->findModel($NAME);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'NAME' => $model->NAME]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BankAccounts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $NAME Nom
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($NAME)
    {
        $this->findModel($NAME)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BankAccounts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $NAME Nom
     * @return BankAccounts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($NAME)
    {
        if (($model = BankAccounts::findOne(['NAME' => $NAME])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
