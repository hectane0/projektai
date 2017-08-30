<?php

namespace ASI\Controllers\Admin;


use ASI\Forms\NewQuestion;

class QuestionsController extends ControllerBaseAdmin
{
    public function indexAction()
    {
        $this->view->pick('admin/questions/index');
    }

    public function addAction()
    {
        $form = new NewQuestion();

        $this->view->setVar('form', $form);
        $this->view->pick('admin/questions/add');
    }

    public function editAction()
    {
        $id = $this->dispatcher->getParam('id');

        $this->view->pick('admin/questions/edit');
    }
}