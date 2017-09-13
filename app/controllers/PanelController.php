<?php

namespace ASI\Controllers;

use ASI\Models\QuizToUser\QuizToUser;
use ASI\Models\Result\Result;
use ASI\Models\User\Quiz;
use ASI\Models\User\User;
use Phalcon\Tag;

class PanelController extends ControllerBase
{
    public function beforeExecuteRoute()
    {
        $this->redirectIfNotLogged();
        $user = User::getCurrentUser();
        if ($user->hasRole(User::ROLE_ADMIN)) {
            $this->response->redirect($user->getDefaultPage());
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->assets->addJs('js/dashboard.js');
        $this->assets->addCss('css/dashboard.css');
        Tag::appendTitle(" - Panel");
    }


    public function indexAction()
    {
        $inProgress = Result::checkInProgressQuiz();
        $public = Quiz::getCountNewPublicQuizzes();
        $invited = Quiz::getCountNewInvitedQuizzes();

        $this->view->setVar('inProgress', $inProgress);
        $this->view->setVar('public', $public);
        $this->view->setVar('invited', $invited);
        $this->view->pick('panel/index');
    }

    public function availableAction()
    {
        $quizzesPublic = Quiz::getNewPublicQuizzes();
        $quizzesInvited = Quiz::getNewInvitedQuizzes();

        $this->view->setVar('quizzesPublic', $quizzesPublic);
        $this->view->setVar('quizzesInvited', $quizzesInvited);
        $this->view->pick('panel/available');
    }

    public function finishedAction()
    {
        $results = Result::getDoneQuizzesData();

        $this->view->setVar('results', $results);
        $this->view->pick('panel/finished');
    }

    public function confirmAction()
    {
        $this->view->setVar('id', $this->dispatcher->getParam('id'));
        $this->view->pick('panel/confirm');
    }

    public function quizAction()
    {
        $quiz = \ASI\Models\Quiz\Quiz::getById($this->request->getPost('id'));
        $userId = User::getCurrentUserId();
        if (empty($quiz)) {
            $this->show404();
        }
        $this->show404(empty($quiz) || !$quiz->canSolve($userId));

        $questions = $quiz->start($userId);
        $duration = $quiz->duration; //minutes

        $finishTime = $this->session->get('current_quiz')['start_time'] + $duration*60;

        $this->view->setVar('finishTime', $finishTime);
        $this->view->setVar('questions', $questions);
    }

    public function finishAction()
    {
        $currentQuiz = $this->session->get('current_quiz', null);
        $this->show404(empty($currentQuiz) || !$this->request->isPost());

        $quiz = \ASI\Models\Quiz\Quiz::findFirst($currentQuiz['id']);

        $post = array_map('intval',  $this->request->getPost());

        $score = count(array_intersect($post, $currentQuiz['correct_answers']));
        $scoreOn = count($this->session->get('current_quiz')['correct_answers']);

        $rawScore = $score . "/" . $scoreOn;

        $result = Result::get(User::getCurrentUserId(), $currentQuiz['id']);
        $this->show404(empty($result));

        $finishTime = $currentQuiz['start_time'] + $quiz->duration*60 + 3;
        $now = time();

        if ($now > $finishTime) {
            $rawScore = "0";
            $result->info = "Przekroczono limit czasu";
        }

        $result->status = Result::STATUS_DONE;
        $result->result = $rawScore;
        $result->finishedAt = date('Y-m-d H:i:s');
        $result->save();

        $quizToUser = QuizToUser::get(User::getCurrentUserId(), $currentQuiz['id']);
        if (!empty($quizToUser)) {
            $quizToUser->status = QuizToUser::STATUS_DONE;
            $quizToUser->save();
        }

        $this->session->remove('current_quiz');

        $this->view->setVar('score', $rawScore);
        $this->view->pick('panel/finish');
    }
}
