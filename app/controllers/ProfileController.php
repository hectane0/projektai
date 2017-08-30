<?php

namespace ASI\Controllers;

use ASI\Forms\ChangeEmailForm;
use ASI\Forms\ChangePasswordForm;
use ASI\Models\User\User;
use Phalcon\Tag;

class ProfileController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->addJs('js/dashboard.js');
        $this->assets->addCss('css/dashboard.css');
        Tag::appendTitle(" - Ustawienia");
    }


    public function indexAction()
    {
        $this->view->setVar('user', User::getCurrentUser());
    }

    public function passwordAction()
    {
        $form = new ChangePasswordForm();

        if ($form->isSubmittedAndValid()) {
            $user = User::getCurrentUser();
            $user->changePassword($this->request->getPost('new-password'));
            $this->flashSession->success("Hasło zostało zmienione");
            $form->clear();
        }

        $this->view->setVar('form', $form);
    }

    public function emailAction()
    {
        $form = new ChangeEmailForm();

        if ($form->isSubmittedAndValid()) {
            $user = User::getCurrentUser();
            $user->changeEmail($this->request->getPost('e-mail'));
            $this->flashSession->success("Email zostało zmienione");
            $form->clear();
        }

        $this->view->setVar('form', $form);
    }
}
