<?php


namespace backend\services\user;


use backend\forms\user\UserAddForm;
use core\entities\User\User;
use core\helpers\user\RbacHelpers;
use core\repositories\user\UserRepository;

class UserServices
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    /**
     * @param User $form
     * @return User
     * @throws \Exception
     */
    public function signup(User $form): User{
        $user = User::requestSignup(
            $form->username,
            $form->email,
            $form->password
        );
        $user->status = $form->status;
        $this->repository->save($user);
        return $user;
    }

    public function update(User $user, User $form): void{
        $user->username = $form->username;
        $user->email = $form->email;
        $user->status = $form->status;

        $user->requestPasswordReset();
        $user->resetPassword($form->password);

        $this->repository->save($user);
    }

}