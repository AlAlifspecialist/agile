<?php
class Validation{public static function email($v){return filter_var($v,FILTER_VALIDATE_EMAIL);}public static function min($v,$l){return strlen(trim($v))>=$l;}public static function dateOrder($a,$b){return strtotime($a)<strtotime($b);}public static function notPast($d){return strtotime($d)>=strtotime(date('Y-m-d'));}}
