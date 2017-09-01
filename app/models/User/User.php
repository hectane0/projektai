<?php

namespace ASI\Models\User;

use Phalcon\Mvc\Model;
use Phalcon\Di;

class User extends Model
{

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $createdAt;
    public $roles;

    const ROLE_ADMIN = 'admin';

    public function initialize()
    {
        $this->setSchema("asi");
    }

    public function getSource()
    {
        return 'user';
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function register($data)
    {
        $user = new User();
        $user->firstName = $data['first-name'];
        $user->lastName = $data['last-name'];
        $user->email = $data['email'];
        $user->roles = 'student';
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $user->createdAt = date('Y-m-d H:i:s');

        $user->save();
        return boolval($user->id);
    }

    public static function getByEmail($email) {
        return self::findFirst(["email = '$email'"]);
    }

    public function isPasswordCorrect($password)
    {
        if (password_verify($password, $this->password)) {
            return true;
        }
        return false;
    }

    public function login()
    {
        $user = $this->toArray($this);
        $this->getDI()->getShared('session')->set('user', $user);
    }

    public function logout()
    {
        $this->getDI()->getShared('session')->destroy('user');
    }

    public static function isLogged()
    {
        $user = Di::getDefault()->getShared('session')->get('user');
        if ($user) {
            return true;
        }
        return false;
    }

    public static function getCurrentUserId()
    {
        if (self::isLogged()) {
            $user = Di::getDefault()->getShared('session')->get('user');
            return $user['id'];
        }

        return false;
    }

    public static function getCurrentUser()
    {
        if (self::isLogged()) {
            return self::findFirst(self::getCurrentUserId());
        }

        return false;
    }

    public function changePassword($newPassword)
    {
        $this->password = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->update();

        return $this;
    }

    public function changeEmail($newEmail)
    {
        $this->email = $newEmail;
        $this->update();

        return $this;
    }

    public function getDefaultPage()
    {
        if ($this->hasRole(self::ROLE_ADMIN)) {
            return $this->getDI()->getShared('url')->get(['for' => 'admin-dashboard']);
        }
        return $this->getDI()->getShared('url')->get(['for' => 'panel']);
    }

    public function hasRole($role)
    {
        $roles = explode(',', $this->roles);
        return in_array($role, $roles);
    }
}
