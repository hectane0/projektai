<?php

namespace ASI\Models\Question;

use ASI\Models\User\User;
use Phalcon\Mvc\Model;

class Question extends Model
{

    public $id;
    public $question;
    public $rightAnswer;
    public $wrongAnswer1;
    public $wrongAnswer2;
    public $wrongAnswer3;
    public $category;
    public $userId;
    public $createdAt;


    public function initialize()
    {
        $this->setSchema("asi");
    }

    public function getSource()
    {
        return 'question';
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * @return Question
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function createFromData($data)
    {
        $question = new Question();

        $question->question = $data['question'];
        $question->rightAnswer = $data['right-answer'];
        $question->wrongAnswer1 = $data['wrong-answer1'];
        $question->wrongAnswer2 = $data['wrong-answer2'];
        $question->wrongAnswer3 = $data['wrong-answer3'];
        $question->category = $data['category'];
        $question->userId = User::getCurrentUserId();
        $question->createdAt = date('Y-m-d H:i:s');

        $question->save();

        return $question->id;
    }

}
