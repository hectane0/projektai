<?php

namespace ASI\Controllers;

use ASI\Models\User\Quiz;
use ASI\Models\User\User;
use Phalcon\Tag;

class PanelController extends ControllerBase
{
    public function beforeExecuteRoute()
    {
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
        $public = Quiz::getCountNewPublicQuizzes();
        $invited = Quiz::getCountNewInvitedQuizzes();

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

        $quiz->start($userId);

    }

}

