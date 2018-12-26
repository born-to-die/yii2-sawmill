<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use app\models\SignupForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (!\Yii::$app->user->can('admin')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if (!\Yii::$app->user->can('admin')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if (!\Yii::$app->user->can('admin')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if (!\Yii::$app->user->can('admin')) {
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        if (!\Yii::$app->user->can('admin')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSignup(){

        if (!\Yii::$app->user->can('admin')) {
            throw new ForbiddenHttpException('К сожалению для Вас, и к счастью для нас, доступ к этой странице для вас недоступен.');
        }

        if (!\Yii::$app->user->can('createUser')) {
            //throw new ForbiddenHttpException();
        }
        
        $model = new SignupForm();

        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            
            $user = new User();

            $user->username = $model->username;
            $user->password = \Yii::$app->security->
                generatePasswordHash($model->password);

            if($user->save()){
                
                echo "
                    <script>
                        alert('Пользователь добавлен');
                    </script>
                ";

                return $this->render('view', [
            'model' => $this->findModel($user->id),
        ]);

            }
        }

        return $this->render('signup', compact('model'));
    }
}
