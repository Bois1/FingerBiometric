<?php
/*
 * Author: Babatunde Odunaiya
 * Date: 1-August-2023 5:07 AM
 * About: I am boring
 */


namespace fingerprint;


class UrlEncode{

    function createValidBase64FMD($url_safe_string){
        $len_param = strlen($url_safe_string);
        if ($len_param % 4 === 2){
            $url_safe_string = $url_safe_string . "==";
        }

        if ($len_param % 4 === 3){
            $url_safe_string = $url_safe_string . "=";
        }

        $url_safe_string = str_replace("-", "+", $url_safe_string);
        $url_safe_string = str_replace("_", "/", $url_safe_string);
        return $url_safe_string;
    }

    function base64UrlEncode($base64_string){
        $base64_string = str_replace("+", "-", $base64_string);
        $base64_string = str_replace("/", "_", $base64_string);
        $base64_string = str_replace("=", "", $base64_string);
        return $base64_string;
    }
}
