<?php
class formSanitizer {
    function sanitizeFormStr($str){
        $str = strip_tags($str);
        $str = str_replace(" ", "", $str);
        $str = strtolower($str);
        $str = ucfirst($str);
        return $str;
    }

    function sanitizeFormUsername($str){
        $str = strip_tags($str);
        $str = str_replace(" ", "", $str);
        return $str;
    }

    function sanitizeFormEmail($str){
        $str = strip_tags($str);
        $str = str_replace(" ", "", $str);
        return $str;
    }

    function sanitizeFormPassword($str){
        $str = strip_tags($str);
        return $str;
    }

}
?>