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

/** Get Global Setting */
if (!function_exists('getSetting')) {
    function getSetting($key, $default = null)
    {
        return \Illuminate\Support\Facades\Cache::remember('setting_' . $key, 86400, function () use ($key, $default) {
            $setting = \App\Models\Setting::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }
}

/** Hex to RGB */
if (!function_exists('hexToRgb')) {
    function hexToRgb($hex)
    {
        $hex = str_replace("#", "", $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        return "$r, $g, $b";
    }
}
