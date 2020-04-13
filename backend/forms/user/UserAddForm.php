<?php


namespace backend\forms\user;


use common\entities\User\User;
use yii\base\Model;

class UserAddForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $role;

    public function __construct( string $username = '', string $email = '', string $status = '0', $role = 2, $config = [])
    {
        $this->username = $username;
        $this->email = $email;
        $this->status = $status;
        $this->role = $role;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['username', 'email', 'status', 'role', 'password'], 'required'],
            [['username', 'email', 'password'], 'string'],
            ['email', 'email'],
            ['status', 'in', 'range' => [User::STATUS_ACTIVE, User::STATUS_WAIT]],
            [['role'], 'integer'],
        ];
    }
}