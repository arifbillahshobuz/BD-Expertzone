<?php



/** calculate human readable time */
if (!function_exists('timeAgo')) {
    function timeAgo($timestamp)
    {
        $timeDifference = time() - strtotime($timestamp);
        $seconds = $timeDifference;
        $minutes = round($timeDifference / 60);
        $hours = round($timeDifference / 3600);
        $days = round($timeDifference / 86400);

        if ($seconds <= 60) {
            if ($seconds <= 1) {
                return "an seconds ago";
            }
            return $seconds . "s ago";

        } elseif ($minutes <= 60) {
            return $minutes . "m ago";
        } elseif ($hours <= 24) {
            return $hours . "h ago";
        } else {
            return date('j M y', strtotime($timestamp));
        }
    }
}

/** truncate string */
if (!function_exists('truncate')) {
    function truncate($str, $limit = 18)
    {
        return \Str::limit($str, $limit, '...');
    }
}
