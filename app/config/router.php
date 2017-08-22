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

$router->add("/admin/dashboard", [
    'controller' => 'admin',
    'action' => 'index',
])->setName("admin-dashboard");

$router->notFound([
    'controller' => 'error',
    'action' => 'error404',
]);

$router->handle();
