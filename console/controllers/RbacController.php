<?php

namespace console\controllers;

use common\helpers\RbacHelpers;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        RbacHelpers::init();
    }
}