<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $models \core\entities\User\User*/
/* @var $roles array все роли, которые существуют */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($models, 'username')->textInput() ?>

    <?= $form->field($models, 'email')->textInput() ?>

    <?= $form->field($models, 'status')->dropDownList([
            '0' => 'Активен',
            '10' => 'Не активен',
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
