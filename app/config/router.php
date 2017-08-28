<?php

/* @var $router \Phalcon\Mvc\Router */
$router = $di->getShared('router', [false]);

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
    'controller' => 'admin',
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
    'controller' => 'admin',
    'action' => 'users',
])->setName("admin-users");

$router->add("/admin/user/([0-9]+)", [
    'controller' => 'admin',
    'action' => 'user',
    'id' => 1,
])->setName("admin-user");

$router->notFound[
    'controller' => 'error',
    'action' => 'error404',
]);

$router->handle();
