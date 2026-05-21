<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>StayNest Login</title>


</head>
<body>

<div class="navbar">

    <div class="logo">
        StayNest
    </div>

    <div class="nav-links">
        <a href="/staynest_mvc_project/public">Home</a>
        <a href="/staynest_mvc_project/public/login">Login</a>
        <a href="/staynest_mvc_project/public/register">Register</a>
    </div>

</div>

<div class="hero">

    <div class="left">

        <div class="overlay">

            <h1>StayNest</h1>

            <p>
                Find your perfect stay,
                explore modern housing,
                and manage bookings easily.
            </p>

        </div>

    </div>

    <div class="right">

        <div class="login-box">

            <h2>Login</h2>

            <p>Welcome back to StayNest</p>

            <form method="POST" action="/staynest_mvc_project/public/login/authenticate">

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit">
                    Login
                </button>

            </form>

            <div class="bottom-link">

                Don't have an account?

                <a href="/staynest_mvc_project/public/register">
                    Register Here
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>