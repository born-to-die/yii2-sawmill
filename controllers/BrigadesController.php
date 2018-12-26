<?php

namespace app\controllers;

use Yii;
use app\models\Brigades;
use app\models\BrigadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

use app\models\Crew;
use app\models\CrewSearch;
use yii\data\ActiveDataProvider;

class Deepviewclass {
    public $sortvalue = '0';
}

/**
 * BrigadesController implements the CRUD actions for Brigades model.
 */
class BrigadesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Brigades models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (!\Yii::$app->user->can('manager')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $searchModel = new BrigadesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);	
		
        return $this->render('index', [			
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }	
    
    public function actionDeepview()
    {

        if (!\Yii::$app->user->can('manager')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $model = new Brigades();

        $searchModel = new CrewSearch();

        $dv = new Deepviewclass();
		
		$query = Crew::find()->where(['id' => $dv['sortvalue']])->all();   

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 20,
			],
		]);

        return $this->render('deepview', [
            'dv' => $dv,
            'model' => $model,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brigades model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if (!\Yii::$app->user->can('manager')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Brigades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if (!\Yii::$app->user->can('manager')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $model = new Brigades();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Brigades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if (!\Yii::$app->user->can('manager')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Brigades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        if (!\Yii::$app->user->can('manager')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Brigades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brigades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brigades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
