<?php 
namespace DTApi\Http\Traits;

trait TagStringFromArray {
    
    /**
     * making user_tags string from users array for creating onesignal notifications
     * @param $users
     * @return string
     */
    public function getUserTagsStringFromArray($users)
    {
        $user_tags = "[";
        $first = true;
        foreach ($users as $oneUser) {
            if ($first) {
                $first = false;
            } else {
                $user_tags .= ',{"operator": "OR"},';
            }
            $user_tags .= '{"key": "email", "relation": "=", "value": "' . strtolower($oneUser->email) . '"}';
        }
        $user_tags .= ']';
        return $user_tags;
    }
}