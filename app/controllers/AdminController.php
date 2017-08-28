<?php

namespace ASI\Controllers;

use ASI\Forms\RegisterForm;
use ASI\Models\User\User;
use Phalcon\Tag;

class AdminController extends ControllerBase
{
    public function beforeExecuteRoute()
    {
        $user = User::getCurrentUser();
        $this->show404(!$user->hasRole(User::ROLE_ADMIN));
    }

    public function initialize()
    {
        parent::initialize();
        $this->assets->addJs('js/dashboard.js');
        $this->assets->addCss('css/dashboard.css');
        $this->assets->addJs('js/admin.js');
        Tag::appendTitle(" - Admin");
    }


    public function indexAction()
    {

    }

    public function usersAction()
    {
        $users = User::find();

        $this->view->setVar('users', $users);
    }

    public function userAction()
    {
        $id = $this->dispatcher->getParam('id');

        var_dump($id);die;
    }

}

