<?php

namespace ASI\Models\Result;

use Phalcon\Mvc\Model;

class Result extends Model
{

    public $userId;
    public $quizId;
    public $startAt;
    public $status;
    public $result;

    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';

    public function initialize()
    {
        $this->setSchema("asi");
    }

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
        $result = self::findFirst("quizId = '$quizId' AND userId = '$userId'");
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

}
