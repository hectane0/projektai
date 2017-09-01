<?php

namespace ASI\Controllers\Admin;


use ASI\Forms\NewQuizStep1;
use ASI\Models\Question\Question;
use ASI\Models\Quiz\Quiz;
use ASI\Models\User\User;

class QuizController extends ControllerBaseAdmin
{
    public function indexAction()
    {
    }

    public function addAction()
    {
        $form = new NewQuizStep1();

        if ($form->isSubmittedAndValid()) {
            $this->goToStep(2);
        }

        $this->view->setVar('form', $form);
        $this->view->pick('admin/quiz/add');
    }

    public function addStep2Action()
    {
        $this->show404(empty($step1 = $this->session->get('step1')));
        $category = $step1['category'];
        $questions = Question::find(["category = '$category'"]);

        if ($this->request->isPost() && !empty($this->request->getPost())) {
            $this->goToStep(3);
        }

        $this->view->setVar('questions', $questions);
        $this->view->pick('admin/quiz/add2');
    }

    public function addStep3Action()
    {
        $this->show404(empty($step1 = $this->session->get('step1')) || empty($step2 = $this->session->get('step2')));

        if ($step1['type'] == 'public') {
            $this->goToFinish();
        }

        if ($this->request->isPost() && !empty($this->request->getPost())) {
            $this->session->set('step3', $this->request->getPost());
            $this->goToFinish();
        }

        $users = User::find("roles = 'student'");

        $this->view->setVar('users', $users);
        $this->view->pick('admin/quiz/add3');
    }

    public function finishAction()
    {
        $this->view->pick('admin/quiz/add-finish');
    }

    private function goToStep($step)
    {
        $key = 'step' . ($step-1);
        $route = 'admin-quiz-add-' . $step;
        $this->session->set($key, $this->request->getPost());
        $this->response->redirect(['for' => $route]);
    }

    private function goToFinish()
    {
        Quiz::createFromSessionData();
        $this->session->remove('step1');
        $this->session->remove('step2');
        $this->session->remove('step3');
        $this->response->redirect(['for' => 'admin-quiz-add-finish']);
    }
}