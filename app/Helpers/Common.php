<?php

    /**
    * find the % of a number
    *
    * @param $x
    * @param $total
    */

    function percentage($total, $x){

        if($total == 0){
            return 0;
        }else {
            $val = ($x * 100)/$total;
            return round( $val, 1, PHP_ROUND_HALF_UP);
        }
    }

    /**
    * find the commission amount
    *
    * @param $percentage
    * @param $total
    */
    function calculate_commission($total, $percentage)
    {
        if($total <= 0){
            return 0;
        }
        else {
            $val = ($percentage / 100) * $total;
            return floatval($val);
        }
    }

    /**
    * returns a 12 digit code based on timestamp
    *
    * @return int
    */
    function unique_code()
    {
        $milliseconds = (String) round(microtime(true) * 568);
        $shuffled = str_shuffle($milliseconds);
        $id = substr($shuffled, 0, 12);
        return $id;
    }


    /**
     * format number to ghana number with 233
     *
     * @param  $number
     * @return @string
     */
    function format_phone_number($phone_number)
    {
        $subcode = substr($phone_number, 0, 1);
        if($subcode == "0")
        {
            $phone_number = substr($phone_number, 1);
            return '233' . $phone_number;
        }

        if($subcode == "+")
        {
            $phone_number = substr($phone_number, 1);
            return $phone_number;
        }

        return $phone_number;

    }


