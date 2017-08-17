<?php

namespace ASI\Controllers;

use ASI\Forms\RegisterForm;
use ASI\Models\User\User;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->addCss('css/landing.css');
        $this->assets->addJs('js/landing.js');
    }


    public function indexAction()
    {

    }

    public function registerAction()
    {
        $registerForm = new RegisterForm();

        if ($registerForm->isSubmittedAndValid()) {
            $result = User::register($this->request->getPost());

            if ($result) {
                $registerForm->clear();
                $this->flashSession->success("Rejestracja udana! Możesz się zalogować");
            } else {
                $this->flashSession->error("Wystąpił błąd. Skontaktuj się z administratorem");
            }
        }
        $this->view->setVar('registerForm', $registerForm);
    }

}

