<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $models \backend\forms\user\UserAddForm */
/* @var $roles array все роли, которые существуют */

$this->title = 'Изменение пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'models' => $models,
        'roles' => $roles
    ]) ?>

</div>
