<?php

namespace common\helpers;

use common\entities\User\User;
use yii\helpers\ArrayHelper;

class RbacHelpers
{
    static public $ADMIN = 'admin';
    static public $USER = 'user';

    public static function init()
    {
        $admin = \Yii::$app->authManager->createRole(self::$ADMIN);
        $admin->description = 'Администратор';
        \Yii::$app->authManager->add($admin);

        $cadet = \Yii::$app->authManager->createRole(self::$USER);
        $cadet->description = 'Пользователь';
        \Yii::$app->authManager->add($cadet);


        // Привязываем пользователей
        $user = User::findOne(1);
        self::setRoleUser(1, $user);
        $user = User::findOne(2);
        self::setRoleUser(2, $user);
    }

    /**
     *  1 - Администратор
     *  2 - Пользователь
     * @param int $role_id
     * @param User $user
     * @throws \Exception
     */
    public static function setRoleUser(int $role_id, User $user)
    {
        switch ($role_id) {
            case 1:
                $userRole = \Yii::$app->authManager->getRole(self::$ADMIN);
                break;
            case 2:
                $userRole = \Yii::$app->authManager->getRole(self::$USER);
                break;
        }
        \Yii::$app->authManager->assign($userRole, $user->id);
    }


    public static function getRoleUser(User $user, string $attribute = 'name'){
        return current(ArrayHelper::getColumn(\Yii::$app->authManager->getRolesByUser($user->id), $attribute));
    }

    public static function getRoles():array {
        $roles = \Yii::$app->getAuthManager()->getRoles();
        $i = 0;
        $result = [];
        foreach ($roles as $role){
            $i++;
            $result += [$i => $role->description];
        }
        return $result;
    }
}