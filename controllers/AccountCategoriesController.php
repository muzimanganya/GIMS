<?php

namespace app\controllers;

use app\models\AccountCategories;
use app\models\AccountCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccountCategoriesController implements the CRUD actions for AccountCategories model.
 */
class AccountCategoriesController extends Controller
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
     * Lists all AccountCategories models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AccountCategoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccountCategories model.
     * @param string $code Code
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($code)
    {
        return $this->render('view', [
            'model' => $this->findModel($code),
        ]);
    }

    /**
     * Creates a new AccountCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AccountCategories();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'code' => $model->code]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionGetCategories($type_id)
    {
        $categories = AccountCategories::find()->where(['code' => $type_id])->all();
        return $this->renderAjax('_categories_dropdown', ['categories' => $categories]);
    }


    /**
     * Updates an existing AccountCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $code Code
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($code)
    {
        $model = $this->findModel($code);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'code' => $model->code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AccountCategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $code Code
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($code)
    {
        $this->findModel($code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccountCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $code Code
     * @return AccountCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($code)
    {
        if (($model = AccountCategories::findOne(['code' => $code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
