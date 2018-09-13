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


if (!function_exists('dataFilter')) {

    function dataFilter($data, $firstData) {
        if ($firstData) {
            $gData = substr($data, 0, 11);
        } else {
            $gData = substr($data, 13, 23);
        }

        return $gData;
    }
}

if (!function_exists('formatData')) {

    function formatData($data)
    {
        $dataNew = '';
        for ($i = 0; $i <= (strlen($data) - 1); $i++) {
            if ($data[$i] == '/') {
                $dataNew = $dataNew . '-';
            } else {
                $dataNew = $dataNew . $data[$i];
            }
        }

        return $dataNew;
    }
}

if (!function_exists('dateToMYSQL')) {

    function dateToMYSQL($data)
    {
        $ano= substr($data, 6, 4);
        $mes= substr($data, 0,2);
        $dia= substr($data, 3,2);
        $dateFinal =  $ano."-".$mes."-".$dia;

        return $dateFinal;

    }
}

if (!function_exists('valueMask')) {

    function valueMask($value)
    {

        $getMask = '00:00:00';
        if ($value != "0") {
            if (strlen($value) == 5) {
                $value = 0 . $value;
                $getMask = mask("##:##:##", $value);
            } elseif (strlen($value) == 6) {
                $getMask = mask("##:##:##", $value);
            } elseif (strlen($value) == 7 ) {
                $getMask = mask("###:##:##", $value);
            } elseif (strlen($value) == 8 ) {
                $getMask = mask("####:##:##", $value);
            } elseif (strlen($value) == 9 ) {
                $getMask = mask("#####:##:##", $value);
            } elseif (strlen($value) == 10 ) {
                $getMask = mask("######:##:##", $value);
            }
        }

        return $getMask;

    }
}