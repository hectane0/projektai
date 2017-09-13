<?php

namespace ASI\Models\User;

use Phalcon\Di;

class Quiz
{
    public static function getNewPublicQuizzes($userId = null)
    {
        if ($userId == null) {
            $userId = User::getCurrentUserId();
        }

        $sql = "SELECT id FROM quiz WHERE type = 'public'";
        $ids = Di::getDefault()->getShared('db')->fetchAll($sql);
        $ids = array_map('current', $ids);

        $sql = "SELECT quizId FROM result WHERE userId = $userId AND status = 'done'";
        $quizzesId = Di::getDefault()->getShared('db')->fetchAll($sql);
        $quizzesId = array_map('current', $quizzesId);

        $ids = array_diff($ids, $quizzesId);

        if (!$ids) {
            return null;
        }

        return \ASI\Models\Quiz\Quiz::findByIds($ids);
    }

    public static function getNewInvitedQuizzes($userId = null)
    {
        if ($userId == null) {
            $userId = User::getCurrentUserId();
        }

        $sql = "SELECT quizId FROM quizToUser WHERE userId = $userId AND status = 'new'";
        $ids = Di::getDefault()->getShared('db')->fetchAll($sql);

        if (!$ids) {
            return null;
        }

        $ids = array_map('current', $ids);

        return \ASI\Models\Quiz\Quiz::findByIds($ids);
    }

    public static function getCountNewPublicQuizzes($userId = null)
    {
        $number = self::getNewPublicQuizzes($userId);
        return count($number);

    }

    public static function getCountNewInvitedQuizzes($userId = null)
    {
        $number = self::getNewInvitedQuizzes($userId);
        return count($number);
    }
}
