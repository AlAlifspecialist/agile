<?php

class HomeController extends Controller
{

    public function index()
    {

        echo "

        <html>

        <head>

        <title>StayNest Home</title>

        <style>

        body{
            font-family:Arial;
            background:#f4f4f4;
            padding:40px;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:20px;
            margin-bottom:20px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        a{
            display:inline-block;
            margin-top:10px;
            padding:12px 20px;
            background:#08142c;
            color:white;
            text-decoration:none;
            border-radius:8px;
        }

        </style>

        </head>

        <body>

        <h1>Welcome to StayNest MVC Project</h1>

        <div class='card'>
            <h2>User Account Management</h2>
            <a href='/staynest_mvc_project/public/users'>Open</a>
        </div>

        <div class='card'>
            <h2>Booking Management</h2>
            <a href='/staynest_mvc_project/public/bookings'>Open</a>
        </div>

        <div class='card'>
            <h2>Property Management</h2>
            <a href='/staynest_mvc_project/public/properties'>Open</a>
        </div>

        <div class='card'>
            <h2>Host Management</h2>
            <a href='/staynest_mvc_project/public/hosts'>Open</a>
        </div>

        <div class='card'>
            <h2>Location Management</h2>
            <a href='/staynest_mvc_project/public/locations'>Open</a>
        </div>

        </body>

        </html>

        ";

    }

}
?>