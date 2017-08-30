<?php

namespace ASI\Controllers;

use ASI\Forms\NewQuestion;
use ASI\Models\Question\Question;
use ASI\Models\User\User;

class AjaxController extends ControllerBase
{

    public function beforeExecuteRoute()
    {
        if (!$this->request->isAjax()) {
            $this->show404();
        }
    }

    public function checkLoginAction()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        sleep(1);
        $user = User::getByEmail($email);

        if ($user) {
            if ($user->isPasswordCorrect($password)) {
                $user->login();
                return json_encode(["success" => true, "redirect" => $user->getDefaultPage()]);
            }
        }
        return json_encode(["success" => false, "message" => "Nieprawidłowy login lub hasło"]);
    }

    public function addQuestionAction()
    {
        $form = new NewQuestion();
        $data = $this->request->getPost();

        if ($form->isValid($data)) {
            $id = Question::createFromData($data);
            return json_encode(['success' => true, 'id' => $id]);
        }
        else {
            return json_encode(['success' => false, 'messages' => $this->prepareErrors($form->getMessages())]);
        }
    }

    private function prepareErrors($messages)
    {
        $errors = [];

        /* @var $message \Phalcon\Validation\Message */
        foreach ($messages as $message) {
            $errors[$message->getField()] = $message->getMessage();
        }

        return $errors;
    }
}

