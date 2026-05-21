<?php
function app_config($k){static $c=null;if($c===null)$c=require __DIR__.'/../../config/app.php';return $c[$k]??null;}function url($p=''){return rtrim(app_config('base_url'),'/').'/'.ltrim($p,'/');}function asset($p=''){return url('assets/'.ltrim($p,'/'));}function e($v){return htmlspecialchars($v??'',ENT_QUOTES,'UTF-8');}
