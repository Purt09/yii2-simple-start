<?php

namespace frontend\controllers\auth;

use common\entities\Order\Order;
use common\helpers\RbacHelpers;
use common\services\auth\AuthService;
use common\services\order\OrderService;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\forms\auth\LoginForm;

class AuthController extends Controller
{
    private $service;

    public function __construct($id, $module, AuthService $service,$config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $form = new LoginForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $user = $this->service->auth($form);
                Yii::$app->user->login($user, $form->rememberMe ? Yii::$app->params['user.rememberMeDuration'] : 0);
                if(RbacHelpers::getRoleUser($user) == RbacHelpers::$ADMIN)
                    return $this->redirect('/admin');
                return $this->redirect(Url::to('/'));
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('login', [
            'model' => $form,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}