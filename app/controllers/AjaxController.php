<?php

namespace ASI\Controllers;

use ASI\Models\User\User;

class AjaxController extends ControllerBase
{

    public function beforeExecuteRoute()
    {
        if (!$this->request->isAjax()) {
            $this->show404();
        }
    }

    public function checkLoginAction()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        sleep(1);
        $user = User::getByEmail($email);

        if ($user) {
            if ($user->isPasswordCorrect($password)) {
                $user->login();
                return json_encode(["success" => true, "redirect" => $user->getDefaultPage()]);
            }
        }
        return json_encode(["success" => false, "message" => "Nieprawidłowy login lub hasło"]);
    }
}

