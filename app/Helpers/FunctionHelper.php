<?php

namespace App\Helpers;

use Carbon\Carbon;
use Exception;

use function Laravel\Prompts\pause;

class FunctionHelper
{
    public static function convertDate($dateString, $fromFormat = 'Y-m-d', $toFormat = 'd-m-Y')
    {
        if (!$dateString) {
            return '';
        }

        try {
            $date = Carbon::parse($dateString);
            return $date->format('d/m/Y');
        } catch (\Exception $e) {
            return $dateString;
        }
    }

    public static function formatFullDateTime($dateTimeString)
    {
        if (!$dateTimeString) {
            return '';
        }

        try {
            $dateTime = Carbon::parse($dateTimeString);
            return $dateTime->format('d/m/Y H:i:s');
        } catch (\Exception $e) {
            return $dateTimeString;
        }
    }

    public static function formatDateTimeInput($dateTimeString)
    {
        if (!$dateTimeString) {
            return '';
        }

        try {
            $dateTime = Carbon::parse($dateTimeString);
            return $dateTime->format('Y-m-d\TH:i');
        } catch (\Exception $e) {
            return $dateTimeString;
        }
    }

    public static function randString($length)
    {
        $chars = "abcdefghijklmopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVWXYZ0123456789";
        $str = '';
        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }
}
