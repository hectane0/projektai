<?php

namespace ASI\Models\Quiz;

use ASI\Models\QuizToUser\QuizToUser;
use ASI\Models\User\User;
use Phalcon\Di;
use Phalcon\Mvc\Model;

class Quiz extends Model
{

    public $id;
    public $name;
    public $type;
    public $category;
    public $questions;
    public $users;
    public $createdAt;
    public $userId;


    public function initialize()
    {
        $this->setSchema("asi");
    }

    public function getSource()
    {
        return 'quiz';
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * @return Quiz
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function createFromSessionData()
    {
        $step1 = Di::getDefault()->getShared('session')->get('step1');
        $step2 = Di::getDefault()->getShared('session')->get('step2');
        $step3 = Di::getDefault()->getShared('session')->get('step3');

        $quiz = new Quiz();
        $quiz->name = $step1['name'];
        $quiz->type = $step1['type'];
        $quiz->category = $step1['category'];
        $quiz->questions = json_encode($step2['questions']);
        $quiz->users = $quiz->type == 'closed' ? json_encode($step3['users']) : null;
        $quiz->createdAt = date('Y-m-d H:i:s');
        $quiz->userId = User::getCurrentUserId();

        $quiz->save();

        if ($quiz->users) {
            QuizToUser::add($quiz->id, $step3['users']);
        }

        return $quiz;

    }
}
