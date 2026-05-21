<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>StayNest Register</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f1f5f9;
}

.navbar{
    background:#16233b;
    padding:25px 70px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    color:white;
    font-size:58px;
    font-weight:bold;
}

.nav-links a{
    color:white;
    text-decoration:none;
    margin-left:40px;
    font-size:28px;
    font-weight:bold;
}

.hero{
    width:90%;
    margin:60px auto;
    background:#041133;
    border-radius:35px;
    min-height:850px;
    display:flex;
    overflow:hidden;
}

.left{
    width:50%;
    background:url('/staynest_mvc_project/public/assets/images/property2.jpg');
    background-size:cover;
    background-position:center;
    position:relative;
}

.overlay{
    position:absolute;
    width:100%;
    height:100%;
    background:rgba(4,17,51,0.82);
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    color:white;
    text-align:center;
    padding:50px;
}

.overlay h1{
    font-size:80px;
    margin-bottom:25px;
}

.overlay p{
    font-size:28px;
    line-height:1.8;
}

.right{
    width:50%;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
}

.register-box{
    width:75%;
}

.register-box h2{
    font-size:70px;
    margin-bottom:15px;
    color:#16233b;
}

.register-box p{
    font-size:24px;
    margin-bottom:40px;
    color:#64748b;
}

label{
    display:block;
    margin-top:22px;
    margin-bottom:10px;
    font-size:24px;
    font-weight:bold;
}

input,
select{
    width:100%;
    padding:22px;
    border:1px solid #cbd5e1;
    border-radius:12px;
    font-size:22px;
}

button{
    width:100%;
    padding:22px;
    background:#2563eb;
    border:none;
    color:white;
    font-size:26px;
    border-radius:12px;
    margin-top:40px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.bottom-link{
    margin-top:35px;
    text-align:center;
    font-size:22px;
}

.bottom-link a{
    color:#2563eb;
    text-decoration:none;
    font-weight:bold;
}

</style>
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

            <h1>Join StayNest</h1>

            <p>
                Create your account,
                manage bookings,
                host properties,
                and explore premium housing.
            </p>

        </div>

    </div>

    <div class="right">

        <div class="register-box">

            <h2>Register</h2>

            <p>Create your StayNest account</p>

            <form method="POST" action="/staynest_mvc_project/public/register/store">

                <label>Full Name</label>
                <input type="text" name="full_name" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Phone Number</label>
                <input type="text" name="phone_number" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <label>Select Role</label>

                <select name="user_role" required>

                    <option value="Customer">Customer</option>
                    <option value="Host">Host</option>
                    <option value="Staff">Staff</option>
                    <option value="Admin">Admin</option>

                </select>

                <button type="submit">
                    Register Account
                </button>

            </form>

            <div class="bottom-link">

                Already have an account?

                <a href="/staynest_mvc_project/public/login">
                    Login Here
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>