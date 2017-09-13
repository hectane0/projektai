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
        $duration = new Element\Numeric('duration');

        $name->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $duration->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $duration->addValidator(new Validator\Digit([
            "message" => "Wartość musi być liczbowa",
        ]));

        $duration->addValidator(new Validator\Between([
            "minimum" => 1,
            "maximum" => 90,
            "message" => "Wartość między 1 a 90",
        ]));

        $this->add($name);
        $this->add($type);
        $this->add($category);
        $this->add($duration);
    }
}
