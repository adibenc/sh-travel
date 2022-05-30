<?php

class Constants{
    const TEST = "TEST";
    const MSG_MAINTENANCE = "Maintenance";
    const MSG_FIELD_NOT_MATCH = "salah";
    
    static function years($start = 2019, $end = 2022){
        $y = [];
        $n = abs(abs($end) - abs($start));
        $i = 0;
        $y[]=$start;

        while($i < $n){
            $y[] = ++$start;
            $i++;
        }

        return $y;
    }

    static function arrToOpt($arr){
        $opt = "";
        foreach($arr as $a){
            $opt .= "<option value=\"$a\">$a</option>";
        }
        return $opt;
    }

    // randString(4)
    static function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
    {
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count-1)];
        }
        return $str;
    }

    static function randStr($str){
        $ret = $str."-".self::randString(5);
        
        return $ret;
    }
}