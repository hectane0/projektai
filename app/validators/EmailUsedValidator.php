<?php

namespace ASI\Validators;

use ASI\Models\User\Question;
use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;
use Phalcon\Validation\Message;

class EmailUsedValidator extends Validator implements ValidatorInterface
{
    public function validate(Validation $validation, $attribute)
    {
        $date = $validation->getValue($attribute);

        $user = Question::getByEmail($date);

        if (!$user) {
            return true;
        }

        $message = $this->getOption('message');
        if (!$message) {
            $message = "Email used!";
        }

        $validation->appendMessage(new Message($message, $attribute));
        return false;
    }
}