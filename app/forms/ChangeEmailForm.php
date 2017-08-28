<?php

namespace ASI\Forms;

use ASI\Validators\EmailUsedValidator;
use ASI\Validators\PasswordCorrectValidator;
use Phalcon\Forms\Element as Element;
use Phalcon\Validation\Validator as Validator;

class ChangeEmailForm extends FormBase
{
    public function initialize()
    {
        $email = new Element\Email('email');
        $reEmail = new Element\Email('re-email');
        $password = new Element\Password('password');

        $password->addValidator(new PasswordCorrectValidator([
            "message" => "Niepoprawne hasło",
        ]));

        $email->addValidator(new Validator\Email([
            "message" => "To nie jest prawidłowy emial",
        ]));

        $email->addValidator(new EmailUsedValidator([
            "message" => "Adres jest już zajęty",
        ]));

        $reEmail->addValidator(new Validator\Confirmation([
            "message" => "Adresy nie zgadzają się",
            "with"    => "email",
        ]));

        $this->add($password);
        $this->add($email);
        $this->add($reEmail);
    }
}
