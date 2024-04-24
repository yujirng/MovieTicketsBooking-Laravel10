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
}
