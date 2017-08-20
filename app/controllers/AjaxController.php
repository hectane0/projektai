<?php

namespace ASI\Controllers;

use ASI\Models\User\User;

class AjaxController extends ControllerBase
{

    public function beforeExecuteRoute()
    {
        if (!$this->request->isAjax()) {
            die();
        }
    }

    public function checkLoginAction()
    {

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = User::getByEmail($email);


        if ($user) {
            if ($user->isPasswordCorrect($password)) {
                return json_encode(["success" => true]);
            }
        }
        return json_encode(["success" => false, "message" => "Nieprawidłowy login lub hasło"]);
    }
}

