<?php

namespace app\controllers;

use app\models\AccountCategories;
use app\models\Accounts;
use app\models\AccountsSearch;
use app\models\AccountTypes;
use app\modules\api\modules\v1\models\AccountCategory;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AccountsController implements the CRUD actions for Accounts model.
 */
class AccountsController extends Controller
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
     * Lists all Accounts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $types = AccountTypes::find()->all();
        $accountsByType = [];
        // Include an "All Accounts" tab
        
        $types[] = (object)['code' => 0, 'name' => 'All Accounts'];

        // Fetch accounts based on types
        $accountsByType = [];
        foreach ($types as $type) {
            $accountsByType[$type->name] = ($type->code == 0) ?
                Accounts::find()->all() :
                Accounts::find()->where(['TYPE' => $type->code])->all();
        }



        
        return $this->render('index', [
            'types' => $types,
            'accountsByType' => $accountsByType,
        ]);
    }

    /**
     * Displays a single Accounts model.
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
     * Creates a new Accounts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Accounts();

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
     * Updates an existing Accounts model.
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
     * Deletes an existing Accounts model.
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

    public function actionGetCategories($typeId)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Replace 'type_id' and 'category_name' with the actual column names in your database
        $categories = AccountCategories::find()
            ->where(['type' => $typeId])
            ->select(['code', 'name'])
            ->asArray()
            ->all();

        

        return ['categories' => $categories];
    }


    /**
     * Finds the Accounts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CODE Code
     * @return Accounts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CODE)
    {
        if (($model = Accounts::findOne(['CODE' => $CODE])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
