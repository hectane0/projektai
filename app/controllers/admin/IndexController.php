<?php

namespace ASI\Controllers\Admin;

use ASI\Models\User\User;

class IndexController extends ControllerBaseAdmin
{

    public function indexAction()
    {
        $this->view->pick('admin/index');
    }

    public function usersAction()
    {
        $users = User::find();

        $this->view->setVar('users', $users);
        $this->view->pick('admin/users');
    }

    public function userAction()
    {
        $id = $this->dispatcher->getParam('id');

        var_dump($id);die;
    }
}

