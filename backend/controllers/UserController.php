<?php

namespace backend\controllers;

use backend\forms\user\UserAddForm;
use backend\services\user\UserServices;
use common\helpers\RbacHelpers;
use Yii;
use common\entities\User\User;
use common\entities\User\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    private $service;

    public function __construct($id, $module, $config = [])
    {
        $this->service = new UserServices();
        parent::__construct($id, $module, $config);
    }

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
        $form = new UserAddForm();
        $roles = RbacHelpers::getRoles();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $user = $this->service->signup($form);
            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('create', [
            'models' => $form,
            'roles' => $roles
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
        $model = $this->findModel($id);
        $form = new UserAddForm(
            $model->username,
            $model->email,
            $model->status,
            RbacHelpers::getRoleUser($model)
        );
        $roles = RbacHelpers::getRoles();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $this->service->update($model, $form);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'models' => $form,
            'roles' => $roles
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
}
