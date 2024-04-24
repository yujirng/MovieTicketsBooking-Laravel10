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

    public static function formatDateAndTimeFull($dateTimeString)
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
}
