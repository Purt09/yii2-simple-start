<?php

namespace common\fixtures;

use common\entities\User\User;
use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
    public $modelClass = User::class;
}