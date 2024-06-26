<?php

// create custome helper function to use this function everywere where you want in the another page.

if (!function_exists("get_formated_date")) {
    function get_formated_date($date, $format = "d-M-Y")
    {
        $formatedData = date($format, strtotime($date));
        return $formatedData;
    }
}

if (!function_exists("p")) {
    function p($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
