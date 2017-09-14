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
        $this->assets->addCss('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css');
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js');
    }

    public function show404($condition = true)
    {
        if ($condition) {
            $this->response->setStatusCode(404, 'Not Found');
            $this->view->pick('error/error404');
            $this->view->render('error', 'error404');
            $this->response->send();
            die;
        }
    }

    public function redirectIfLogged()
    {
        if ($user = User::getCurrentUser()) {
            $this->response->redirect($user->getDefaultPage())->send();
        }
    }

    public function redirectIfNotLogged()
    {
        if (!User::isLogged()) {
            $this->response->redirect(['for' => 'homepage'])->send();
        }
    }
}
