<?php

namespace App\Http\Actions;

use DTApi\Helpers\TeHelper;
use DTApi\Helpers\DateTimeHelper;

class Push {

    /**
     * Function to delay the push
     * @param int $user_id
     * @return bool
     */
    public static function isNeedToDelayPush(int $user_id): bool {
        if (!DateTimeHelper::isNightTime()) return false;
        $not_get_nighttime = TeHelper::getUsermeta($user_id, 'not_get_nighttime');
        if ($not_get_nighttime == 'yes') return true;
        return false;
    }

    /**
     * Function to check if need to send the push
     * @param int $user_id
     * @return bool
     */
    public static function isNeedToSendPush(int $user_id): bool {
        $not_get_notification = TeHelper::getUsermeta($user_id, 'not_get_notification');
        if ($not_get_notification == 'yes') return false;
        return true;
    }
}