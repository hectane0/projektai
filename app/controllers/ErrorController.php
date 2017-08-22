<?php

namespace ASI\Controllers;

use Phalcon\Tag;

class ErrorController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        Tag::appendTitle(" - Błąd");
    }

    public function error404Action()
    {
        $this->response->setStatusCode(404, 'Not Found');
    }
}

