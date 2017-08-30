<?php

namespace ASI\Validators;

use ASI\Models\User\Question;
use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;
use Phalcon\Validation\Message;

class PasswordCorrectValidator extends Validator implements ValidatorInterface
{
    public function validate(Validation $validation, $attribute)
    {
        $password = $validation->getValue($attribute);

        $user = Question::getCurrentUser();

        if ($user->isPasswordCorrect($password)) {
            return true;
        }

        $message = $this->getOption('message');
        if (!$message) {
            $message = "Wrong password!";
        }

        $validation->appendMessage(new Message($message, $attribute));
        return false;
    }
}