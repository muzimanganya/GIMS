<?php

namespace app\controllers;

use app\modules\api\modules\v1\models\Estmates;
use app\modules\api\modules\v1\models\EstmateDetails;
use app\modules\api\modules\v1\models\SearchEstmates;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
 use Yii;

/**
 * EstimatesController implements the CRUD actions for Estmates model.
 */
class EstimatesController extends Controller
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
     * Lists all Estmates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchEstmates();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estmates model.
     * @param string $no No
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
     * Creates a new Estmates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new Estmates();
		
        $modelDetails = [];

        $formDetails = Yii::$app->request->post('EstmateDetails', []);
		
        foreach ($formDetails as $i => $formDetail) {
            $modelDetail = new EstmateDetails(['scenario' => EstmateDetails::SCENARIO_BATCH_UPDATE]);
            $modelDetail->setAttributes($formDetail);
            $modelDetails[] = $modelDetail;
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new EstmateDetails(['scenario' => EstmateDetails::SCENARIO_BATCH_UPDATE]);
            return $this->render('create', [
                'model' => $model,
                'modelDetails' => $modelDetails
            ]);
        }
       
        if ($model->load(Yii::$app->request->post())) {
			//var_dump(Model::validateMultiple($modelDetails));
			//die;
			 $model->save(false);
			foreach($modelDetails as $modelDetail) {
                    $modelDetail->estimate = $model->no;
					$modelDetail->save(false);
					
                }
				 return $this->redirect(['view', 'no' => $model->no]);
         /*  if (Model::validateMultiple($modelDetails)&& $model->validate()) {
                $model->save();
                foreach($modelDetails as $modelDetail) {
                    $modelDetail->save();
                }
                return $this->redirect(['view', 'no' => $model->no,'purchase_order'=>$model->purchase_order]);
		   }*/
        }

        return $this->render('create', [
            'model' => $model,
            'modelDetails' => $modelDetails
        ]);
    }

    /**
     * Updates an existing Estmates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $no No
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
     * Deletes an existing Estmates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $no No
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no)
    {
        $this->findModel($no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estmates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $no No
     * @return Estmates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estmates::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
