<?php

namespace ASI\Forms;

use ASI\Validators\EmailUsedValidator;
use Phalcon\Forms\Element as Element;
use Phalcon\Validation\Validator as Validator;

class RegisterForm extends FormBase
{
    public function initialize()
    {
        $firstName = new Element\Text('first-name');
        $lastName = new Element\Text('last-name');
        $email = new Element\Email('email');
        $password = new Element\Password('password');

        $firstName->addValidator(new Validator\StringLength([
            "max" => 45,
            "min" => 3,
            "messageMaximum" => "Za dużo znaków",
            "messageMinimum" => "Za mało znaków",
        ]));

        $lastName->addValidator(new Validator\StringLength([
            "max" => 45,
            "min" => 3,
            "messageMaximum" => "Za dużo znaków",
            "messageMinimum" => "Za mało znaków",
        ]));

        $email->addValidator(new Validator\Email([
            'message' => 'To nie jest poprawny email'
        ]));

        $email->addValidator(new EmailUsedValidator([
            'message' => 'Email jest już zajęty'
        ]));

        $email->addValidator(new Validator\StringLength([
            "max" => 100,
            "min" => 5,
            "messageMaximum" => "Za dużo znaków",
            "messageMinimum" => "Za mało znaków",
        ]));

        $password->addValidator(new Validator\StringLength([
            "min" => 6,
            "messageMinimum" => "Hasło musi mieć conajmniej 6 znaków",
        ]));

        $this->add($firstName);
        $this->add($lastName);
        $this->add($email);
        $this->add($password);
    }
}
