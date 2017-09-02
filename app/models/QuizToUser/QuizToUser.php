<?php

namespace ASI\Models\QuizToUser;

use Phalcon\Mvc\Model;

class QuizToUser extends Model
{

    public $quizId;
    public $userId;
    public $status;

    public function initialize()
    {
        $this->setSchema("asi");
    }

    public function getSource()
    {
        return 'quizToUser';
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * @return QuizToUser
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function add($quizId, $users)
    {
        foreach ($users as $user) {
            $entry = new QuizToUser();
            $entry->userId = $user;
            $entry->quizId = $quizId;

            $entry->save();
        }
    }

}
