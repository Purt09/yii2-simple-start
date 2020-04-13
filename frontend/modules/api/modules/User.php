<?php


namespace frontend\modules\api\modules;


class User extends \common\entities\User\User
{
    public function fields()
    {
        return ['id'];
    }
}