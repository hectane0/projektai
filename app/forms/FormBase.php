<?php

namespace ASI\Forms;

use Phalcon\Forms\Form;

abstract class FormBase extends Form
{
    public function addMessageToField($field, $message)
    {
        $messages = $this->getMessagesFor($field);
        $messages->appendMessage($message);
    }


    public function validateFile()
    {
        return true;
    }

    public function isSubmittedAndValid()
    {
        if ($this->request->isPost()) {
            $isPostValid = $this->isValid($this->request->getPost());
            $isFileValid = true;

            if ($this->request->hasFiles(true)) {
                $isFileValid = $this->validateFile();
            }

            return $isPostValid && $isFileValid;
        }
        return false;
    }
}
