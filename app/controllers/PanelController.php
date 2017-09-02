<?php

namespace ASI\Controllers;

use ASI\Models\User\User;
use Phalcon\Tag;

class PanelController extends ControllerBase
{
    public function beforeExecuteRoute()
    {
        $user = User::getCurrentUser();
        if ($user->hasRole(User::ROLE_ADMIN)) {
            $this->response->redirect($user->getDefaultPage());
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->assets->addJs('js/dashboard.js');
        $this->assets->addCss('css/dashboard.css');
        Tag::appendTitle(" - Panel");
    }


    public function indexAction()
    {

    }

}

