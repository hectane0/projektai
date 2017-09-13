<?php

namespace ASI\Controllers\Admin;

use ASI\Models\Quiz\Quiz;
use ASI\Models\Result\Result;
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
        $user = User::findFirst($id);

        $this->view->setVar('user', $user);
        $this->view->pick('admin/user');
    }

    public function resultsAction()
    {
        $results = Result::getFullResults();

        $this->view->setVar('results', $results);
        $this->view->pick('admin/results');
    }

    public function quizAction()
    {
        $quizzes = Quiz::find();

        $this->view->setVar('quizzes', $quizzes);
        $this->view->pick('admin/quiz');
    }
}

