<?php

namespace ASI\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{
    public function initialize()
    {
        Tag::setTitle("ASII QUIZ");
        $this->assets->addCss('css/main.css');
        $this->assets->addJs('js/main.js');
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
}
