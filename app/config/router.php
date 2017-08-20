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

$router->add("/pomoc", [
    'controller' => 'index',
    'action' => 'help',
])->setName("help");

$router->add("/ajax/login", [
    'controller' => 'ajax',
    'action' => 'checkLogin',
])->setName("ajax-login");


$router->handle();
