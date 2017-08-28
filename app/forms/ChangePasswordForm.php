<?php

namespace ASI\Forms;

use ASI\Validators\PasswordCorrectValidator;
use Phalcon\Forms\Element as Element;
use Phalcon\Validation\Validator as Validator;

class ChangePasswordForm extends FormBase
{
    public function initialize()
    {
        $password = new Element\Password('password');
        $newPassword = new Element\Password('new-password');
        $reNewPassword = new Element\Password('re-new-password');

        $password->addValidator(new PasswordCorrectValidator([
            "message" => "Niepoprawne hasło",
        ]));

        $newPassword->addValidator(new Validator\StringLength([
            "min" => 6,
            "messageMinimum" => "Hasło musi mieć conajmniej 6 znaków",
        ]));

        $reNewPassword->addValidator(new Validator\Confirmation([
            "message" => "Hasła nie zgadzają się",
            "with"    => "new-password",
        ]));

        $this->add($password);
        $this->add($newPassword);
        $this->add($reNewPassword);
    }
}
