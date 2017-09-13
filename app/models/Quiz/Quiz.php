<?php

namespace ASI\Models\Quiz;

use ASI\Models\Question\Question;
use ASI\Models\QuizToUser\QuizToUser;
use ASI\Models\Result\Result;
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
    public $duration;
    public $createdAt;
    public $userId;

    const STATUS_PUBLIC = 'public';
    const STATUS_INVITED = 'closed';


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

    public static function getById($id)
    {
        return self::findFirst($id);
    }

    public static function findByIds($ids)
    {
        $ids = "(".implode(",", $ids).")";

        return self::find("id IN $ids");
    }

    public function isUserInvited($userId)
    {
        $quizToUser = QuizToUser::findFirst("quizId = '$this->id' AND userId = '$userId'");
        return (empty($quizToUser) ? false : true);
    }

    public function canSolve($userId)
    {
        if ($this->type == self::STATUS_PUBLIC) {
            if (Result::isDone($this->id, $userId)) {
                return false;
            }
        }

        if ($this->type == self::STATUS_INVITED) {
            if (!$this->isUserInvited($userId)) {
                return false;
            }

            if (Result::isDone($this->id, $userId)) {
                return false;
            }
        }
        return true;
    }

    public function start($userId) {

        if ($questions = $this->restoreFromSession()) {
            return $questions;
        }

        Result::start($this->id, $userId);

        $ids = json_decode($this->questions);
        $questions = Question::findByIds($ids);

        $preparedQuestions = [];
        $correctAnswers = [];

        foreach ($questions as $question) {
            $answers = [$question->rightAnswer, $question->wrongAnswer1, $question->wrongAnswer2, $question->wrongAnswer3];
            shuffle($answers);
            $preparedQuestions[] = ['id' => $question->id, 'question' => $question->question, 'answers' => $answers];
            $correctAnswers[$question->id] = array_search($question->rightAnswer, $answers);
        }

        $sessionData = [
            'id' => $this->id,
            'start_time' => time(),
            'correct_answers' => $correctAnswers,
            'questions' => $preparedQuestions
        ];

        Di::getDefault()->getShared('session')->set('current_quiz', $sessionData);

        return $preparedQuestions;
    }

    private function restoreFromSession()
    {
        $data = Di::getDefault()->getShared('session')->get('current_quiz');

        if (empty($data)) {
            return false;
        }

        return $data['questions'];
    }
}
