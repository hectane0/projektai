<?php

/* @var $router \Phalcon\Mvc\Router */
$router = $di->getShared('router', [false]);

$router->setDefaultNamespace('ASI\Controllers');

$router->add("/", [
    'controller' => 'index',
    'action' => 'index',
])->setName("homepage");

$router->add("/rejestracja", [
    'controller' => 'index',
    'action' => 'register',
])->setName("register");

$router->add("/ajax/login", [
    'controller' => 'ajax',
    'action' => 'checkLogin',
])->setName("ajax-login");

$router->add("/logout", [
    'controller' => 'index',
    'action' => 'logout',
])->setName("logout");

$router->add("/admin/dashboard", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'index',
    'action' => 'index',
])->setName("admin-dashboard");

$router->add("/panel", [
    'controller' => 'panel',
    'action' => 'index',
])->setName("panel");

$router->add("/profile", [
    'controller' => 'profile',
    'action' => 'index',
])->setName("profile");

$router->add("/profile/email", [
    'controller' => 'profile',
    'action' => 'email',
])->setName("profile-email");

$router->add("/profile/password", [
    'controller' => 'profile',
    'action' => 'password',
])->setName("profile-password");

$router->add("/profile/password", [
    'controller' => 'profile',
    'action' => 'password',
])->setName("profile-password");

$router->add("/admin/users", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'index',
    'action' => 'users',
])->setName("admin-users");

$router->add("/admin/questions", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'questions',
    'action' => 'index',
])->setName("admin-questions");

$router->add("/admin/questions/add", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'questions',
    'action' => 'add',
])->setName("admin-questions-add");

$router->add("/admin/questions/edit/([0-9]+)", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'questions',
    'action' => 'edit',
    'id' => 1,
])->setName("admin-questions-edit");

$router->add("/admin/user/([0-9]+)", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'index',
    'action' => 'user',
    'id' => 1,
])->setName("admin-user");

$router->add("/admin/quiz/add", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'quiz',
    'action' => 'add',
])->setName("admin-quiz-add-1");

$router->add("/admin/quiz/add/step2", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'quiz',
    'action' => 'addStep2',
])->setName("admin-quiz-add-2");

$router->add("/admin/quiz/add/step3", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'quiz',
    'action' => 'addStep3',
])->setName("admin-quiz-add-3");

$router->add("/admin/quiz/add/finish", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'quiz',
    'action' => 'finish',
])->setName("admin-quiz-add-finish");

$router->add("/admin/user/([0-9]+)", [
    'namespace'  => 'ASI\Controllers\Admin',
    'controller' => 'index',
    'action' => 'user',
    'id' => 1,
])->setName("admin-user");

$router->add("/ajax/add-question", [
    'controller' => 'ajax',
    'action' => 'addQuestion',
])->setName("ajax-questions-add");

$router->add("/ajax/last-questions", [
    'controller' => 'ajax',
    'action' => 'lastQuestions',
])->setName("ajax-last-questions");

$router->notFound([
    'controller' => 'error',
    'action' => 'error404',
]);

$router->handle();
