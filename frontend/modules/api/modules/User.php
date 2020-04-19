<?php


namespace frontend\modules\api\modules;


class User extends \core\entities\User\User
{
    public function fields()
    {
        return ['id'];
    }
}