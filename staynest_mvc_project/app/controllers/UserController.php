<?php

class UserController extends Controller
{

    public function index()
    {

        if(!isset($_SESSION['user']))
        {

            header("Location: /staynest_mvc_project/public/login");
            exit;

        }

        echo "

        <html>

        <head>

        <title>User Management</title>

        <style>

        body{
            font-family:Arial;
            background:#f4f4f4;
            padding:40px;
        }

        h1{
            color:#08142c;
            margin-bottom:30px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:15px;
            text-align:left;
        }

        table th{
            background:#08142c;
            color:white;
        }

        a{
            display:inline-block;
            margin-top:20px;
            text-decoration:none;
            background:#08142c;
            color:white;
            padding:12px 20px;
            border-radius:8px;
        }

        </style>

        </head>

        <body>

        <h1>User Management</h1>

        <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Admin User</td>
            <td>Admin</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Host User</td>
            <td>Host</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Customer User</td>
            <td>Customer</td>
        </tr>

        </table>

        <a href='/staynest_mvc_project/public/admin/dashboard'>Back Dashboard</a>

        </body>

        </html>

        ";

    }

}
?>