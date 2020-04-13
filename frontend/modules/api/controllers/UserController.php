<?php


namespace frontend\modules\api\controllers;


use frontend\modules\api\modules\User;
use frontend\modules\api\controllers\BasicController;

class UserController extends BasicController
{
    public $modelClass = User::class;
}