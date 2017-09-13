<?php

namespace ASI\Models;

use Phalcon\Mvc\Model;

abstract class ModelBase extends Model
{
    public function initialize()
    {
        if ($_SERVER['HTTP_HOST'] === 'projektai.dev:8080') {
            $this->setSchema("asi");
        } else {
            $this->setSchema("patryk0_ai");
        }
    }
}