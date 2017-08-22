<?php

namespace ASI\Controllers;

use ASI\Forms\RegisterForm;
use ASI\Models\User\User;
use Phalcon\Tag;

class AdminController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->addJs('js/dashboard.js');
        $this->assets->addCss('css/dashboard.css');
        Tag::appendTitle(" - Admin");
    }


    public function indexAction()
    {

    }

}

