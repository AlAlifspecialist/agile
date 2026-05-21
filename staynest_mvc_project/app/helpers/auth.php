<?php

function is_logged_in()
{
    return isset($_SESSION['user']);
}

function user()
{
    return $_SESSION['user'] ?? null;
}

function require_login()
{

    if(!is_logged_in())
    {

        header("Location: /staynest_mvc_project/public/login");
        exit;

    }

}

function require_role($role)
{

    require_login();

    if($_SESSION['user']['role'] != $role)
    {

        die("Access Denied");

    }

}
?>