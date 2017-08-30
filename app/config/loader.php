<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    [
        'ASI\Controllers' => APP_PATH . "/controllers",
        'ASI\Controllers\Admin' => APP_PATH . "/controllers/admin",
        'ASI\Models' => APP_PATH . "/models",
        'ASI\Forms' => APP_PATH . "/forms",
        'ASI\Validators' => APP_PATH . "/validators",
        'ASI\Services' => APP_PATH . "/services",
    ]
)->register();