<?php

if (!function_exists('mDebug')) {

    function mDebug($var) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        die;
    }

}

if (!function_exists('isLogado')) {

    function isLogado($id) {
        if ($id != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

if (!function_exists('mask')) {

    function mask($mask,$str) {
        $str = str_replace(" ","",$str);

        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }

        return $mask;
    }
}


if (!function_exists('tinyintToNormal')) {

    function tinyintToNormal($tiny) {
        if ($tiny == 0) {
            return 'Não';
        } else {
            return 'Sim';
        }
    }
}
