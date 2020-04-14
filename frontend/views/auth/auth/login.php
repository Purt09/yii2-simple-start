<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\forms\auth\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="login-logo">
    <a href="#">Авторизация</a>
</div>
<div class="login-box-body">

    <div class="row">
        <?= yii\authclient\widgets\AuthChoice::widget([
            'baseAuthUrl' => ['auth/network/auth']
        ]); ?>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            Вы забыли пароль? <?= Html::a('сбросить', ['auth/reset/request']) ?>.
        </div>
        <div style="color:#999;margin:1em 0">
            Нет аккаунта? <?= Html::a('Зарегистрироватья', ['/signup']) ?>.
        </div>

        <div class="form-group">
            <?= Html::submitButton('Авторизация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

