<?php
/**
 * Created by PhpStorm.
 * User: Daffascript
 * Date: 04/18/20
 * Time: 11.49
 */

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Class Globals
 * @package App\Helpers
 */
class Globals
{
    /**
     * @var array
     */

    public static function main_url()
    {
        if (Auth::check()) {
            switch (Auth::user()->role) {
                case "admin":
                    return '/admin';
                    break;
                case "user":
                    return url()->previous();
                    break;
                case "super_admin":
                    return '/super_admin';
                    break;
                default:
                    return '/';
            }
        } else {
            return '/';
        }
    }

    /**
     *
     * @create a roman numeral from a number
     * @param int $num
     * @return string
     *
     */
    public static function number_to_roman($num)
    {
        $n = intval($num);
        $res = '';
        /*** roman_numerals array  ***/
        $roman_numerals = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1);
        foreach ($roman_numerals as $roman => $number) {
            /*** divide to get  matches ***/
            $matches = intval($n / $number);

            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);

            /*** substract from the number ***/
            $n = $n % $number;
        }
        /*** return the res ***/
        return $res;
    }
}
