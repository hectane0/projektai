<?php

namespace ASI\Controllers\Admin;

use ASI\Controllers\ControllerBase;
use ASI\Models\User\User;
use Phalcon\Tag;

class ControllerBaseAdmin extends ControllerBase
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
}
