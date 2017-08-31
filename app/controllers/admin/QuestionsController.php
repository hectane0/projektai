<?php

namespace ASI\Controllers\Admin;


use ASI\Forms\NewQuestion;
use ASI\Models\Question\Question;

class QuestionsController extends ControllerBaseAdmin
{
    public function indexAction()
    {
        $questions = Question::find();

        $this->view->setVar('questions', $questions);
        $this->view->pick('admin/questions/index');
    }

    public function addAction()
    {
        $form = new NewQuestion();
        $questions = Question::getLast();

        $this->view->setVar('questions', $questions);
        $this->view->setVar('form', $form);
        $this->view->pick('admin/questions/add');
    }

    public function editAction()
    {
        $id = $this->dispatcher->getParam('id');

        $question = Question::findFirst($id);
        $form = new NewQuestion();

        if ($form->isSubmittedAndValid()) {
            $question->updateFromData($this->request->getPost());
            $this->flashSession->success("Dane zaktualizowane");
        }

        $this->view->setVar('form', $form);
        $this->view->setVar('question', $question);

        $this->view->pick('admin/questions/edit');
    }
}