<?php

namespace ASI\Forms;

use ASI\Validators\EmailUsedValidator;
use ASI\Validators\PasswordCorrectValidator;
use Phalcon\Forms\Element as Element;
use Phalcon\Validation\Validator as Validator;

class NewQuestion extends FormBase
{
    public function initialize()
    {
        $question = new Element\Text('question');
        $rightAnswer = new Element\Text('right-answer');
        $wrongAnswer1 = new Element\Text('wrong-answer1');
        $wrongAnswer2 = new Element\Text('wrong-answer2');
        $wrongAnswer3 = new Element\Text('wrong-answer3');
        $category = new Element\Select('category', ['SWD' => 'Sztuczna inteligencja i systemy wspomagania decyzji', 'AI' => 'Aplikacje internetowe']);

        $question->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $rightAnswer->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $wrongAnswer1->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $wrongAnswer2->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $wrongAnswer3->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));

        $category->addValidator(new Validator\PresenceOf([
            "message" => "Pole nie może być puste",
        ]));


        $this->add($question);
        $this->add($rightAnswer);
        $this->add($wrongAnswer1);
        $this->add($wrongAnswer2);
        $this->add($wrongAnswer3);
        $this->add($category);
    }
}
