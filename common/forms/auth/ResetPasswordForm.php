<?php
namespace common\forms\auth;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use core\entities\User\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

}
