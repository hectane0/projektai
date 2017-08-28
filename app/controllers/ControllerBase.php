<?php

namespace ASI\Controllers;

use ASI\Models\User\User;
use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{
    public function initialize()
    {
        Tag::setTitle("ASII QUIZ");
        $this->assets->addCss('css/main.css');
        $this->assets->addJs('js/main.js');
        $this->assets->addCss('//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css');
        $this->assets->addJs('//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js');
    }

    public function show404($condition = true)
    {
        if ($condition) {
            $this->dispatcher->forward([
                'controller' => 'error',
                'action' => 'error404',
            ]);
        }
    }

    public function redirectIfLogged()
    {
        if ($user = User::getCurrentUser()) {
            $this->response->redirect($user->getDefaultPage());
        }
    }
}
