<?php

namespace ASI\Models\Result;

use ASI\Models\ModelBase;
use ASI\Models\User\User;
use Phalcon\Di;

class Result extends ModelBase
{

    public $userId;
    public $quizId;
    public $startAt;
    public $status;
    public $result;
    public $finishedAt;
    public $info;

    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';


    public function getSource()
    {
        return 'result';
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * @return Result
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function isDone($quizId, $userId)
    {
        $result = self::findFirst("quizId = '$quizId' AND userId = '$userId' AND status = 'done'");
        return (empty($result) ? false : true);
    }

    public static function start($quizId, $userId)
    {
        $result = new Result();

        $result->userId = $userId;
        $result->quizId = $quizId;
        $result->startAt = date('Y-m-d H:i:s');
        $result->status = 'in_progress';

        $result->save();

        return $result;
    }

    public static function get($userId, $quizId)
    {
        return self::findFirst("quizId = '$quizId' AND userId = '$userId'");
    }

    public static function getDoneQuizzesData($userId = null)
    {
        if ($userId == null) {
            $userId = User::getCurrentUserId();
        }

        $sql = "SELECT * FROM result AS result INNER JOIN quiz AS quiz ON result.quizId = quiz.id WHERE result.status = 'done' AND result.userId = $userId";
        $results = Di::getDefault()->getShared('db')->fetchAll($sql);

        return $results;
    }

    public static function checkInProgressQuiz()
    {
        $userId = User::getCurrentUserId();
        return self::findFirst("userId = '$userId' AND status = 'in_progress'");
    }

    public static function getFullResults()
    {
        $sql = "SELECT user.firstName, user.lastName, quiz.name, result.result, result.status, result.finishedAt, result.info FROM result 
                INNER JOIN user ON result.userId = user.id 
                INNER JOIN quiz ON result.quizId = quiz.id;";
        $result = Di::getDefault()->getShared('db')->fetchAll($sql);

        return $result;
    }
}
