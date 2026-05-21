<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#f4f4f4;
        }

        .sidebar{
            width:260px;
            height:100vh;
            background:#08142c;
            position:fixed;
            left:0;
            top:0;
            padding:30px 20px;
        }

        .logo{
            color:white;
            font-size:38px;
            font-weight:bold;
            margin-bottom:50px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px;
            margin-bottom:15px;
            border-radius:10px;
            transition:0.3s;
            font-size:18px;
        }

        .sidebar a:hover{
            background:#1e3a8a;
        }

        .main{
            margin-left:260px;
            padding:40px;
        }

        .title{
            font-size:42px;
            margin-bottom:30px;
            color:#08142c;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:25px;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .card h2{
            color:#08142c;
            margin-bottom:10px;
        }

        .card p{
            color:#666;
        }

    </style>

</head>
<body>

    <div class="sidebar">

        <div class="logo">StayNest</div>

        <a href="/staynest_mvc_project/public/users">User Management</a>

        <a href="/staynest_mvc_project/public/properties">Property Management</a>

        <a href="/staynest_mvc_project/public/bookings">Booking Management</a>

        <a href="/staynest_mvc_project/public/hosts">Host Management</a>

        <a href="/staynest_mvc_project/public/locations">Location Management</a>

        <a href="/staynest_mvc_project/public/logout">Logout</a>

    </div>

    <div class="main">

        <h1 class="title">Admin Dashboard</h1>

        <div class="cards">

            <div class="card">
                <h2>User Management</h2>
                <p>Manage customer, admin, host and staff accounts.</p>
            </div>

            <div class="card">
                <h2>Booking Management</h2>
                <p>View and manage all property bookings.</p>
            </div>

            <div class="card">
                <h2>Property Management</h2>
                <p>Add, edit and remove properties.</p>
            </div>

            <div class="card">
                <h2>Host Management</h2>
                <p>Manage hosts and hosting operations.</p>
            </div>

            <div class="card">
                <h2>Location Management</h2>
                <p>Control property locations and city data.</p>
            </div>

        </div>

    </div>

</body>
</html>