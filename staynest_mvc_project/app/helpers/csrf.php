<?php
function csrf_token(){Session::start();if(!isset($_SESSION['_csrf']))$_SESSION['_csrf']=bin2hex(random_bytes(16));return $_SESSION['_csrf'];}function csrf_field(){return '<input type="hidden" name="_csrf" value="'.e(csrf_token()).'">';}function verify_csrf(){if($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['_csrf']??'')!==($_SESSION['_csrf']??''))die('Invalid CSRF token.');}
