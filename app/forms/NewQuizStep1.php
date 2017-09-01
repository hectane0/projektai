<?php

namespace ASI\Forms;

use ASI\Validators\EmailUsedValidator;
use ASI\Validators\PasswordCorrectValidator;
use Phalcon\Forms\Element as Element;
use Phalcon\Validation\Validator as Validator;

class NewQuizStep1 extends FormBase
{
    public function initialize()
    {
        $name = new Element\Text('name');
        $type = new Element\Select('type', ['public' => 'Publiczny', 'closed' => 'Tylko zaproszeni']);
        $category = new Element\Select('category', ['SWD' => 'Sztuczna inteligencja i systemy wspomagania decyzji', 'AI' => 'Aplikacje internetowe']);

        $name->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $this->add($name);
        $this->add($type);
        $this->add($category);
    }
}
