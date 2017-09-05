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
        if ($userId == null) {
            $userId = User::getCurrentUserId();
        }

        $sql = "SELECT COUNT(*) AS count FROM quiz WHERE type = 'public'";
        $result = Di::getDefault()->getShared('db')->fetchOne($sql);

        return intval($result['count']);

    }

    public static function getCountNewInvitedQuizzes($userId = null)
    {
        if ($userId == null) {
            $userId = User::getCurrentUserId();
        }

        $sql = "SELECT COUNT(*) AS count FROM quizToUser WHERE userId = $userId AND status = 'new'";
        $result = Di::getDefault()->getShared('db')->fetchOne($sql);

        return intval($result['count']);
    }
}