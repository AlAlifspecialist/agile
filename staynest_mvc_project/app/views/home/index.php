<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayNest - Home</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family:Arial, sans-serif;
            background:#f4f6f9;
        }

        .navbar{
            background:#1e293b;
            color:white;
            padding:15px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .navbar h1{
            margin:0;
        }

        .navbar a{
            color:white;
            text-decoration:none;
            margin-left:20px;
        }

        .hero{
            background:#0f172a;
            color:white;
            text-align:center;
            padding:60px 20px;
        }

        .hero h2{
            font-size:40px;
            margin-bottom:10px;
        }

        .container{
            width:90%;
            margin:auto;
            padding:40px 0;
        }

        .property-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
            gap:25px;
        }

        .card{
            background:white;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .card-content{
            padding:20px;
        }

        .card-content h3{
            margin-top:0;
            color:#0f172a;
        }

        .price{
            color:#16a34a;
            font-size:22px;
            font-weight:bold;
        }

        .status{
            display:inline-block;
            padding:6px 12px;
            border-radius:20px;
            background:#d1fae5;
            color:#065f46;
            font-size:14px;
            margin-top:10px;
        }

        .btn{
            display:inline-block;
            margin-top:15px;
            background:#2563eb;
            color:white;
            padding:10px 18px;
            text-decoration:none;
            border-radius:6px;
        }

        .btn:hover{
            background:#1d4ed8;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1>StayNest</h1>

    <div>
        <a href="/staynest_mvc_project/public/login">Login</a>
        <a href="/staynest_mvc_project/public/register">Register</a>
    </div>
</div>

<div class="hero">
    <h2>Find Your Perfect Stay</h2>
    <p>Modern student and housing management platform</p>
</div>

<div class="container">

    <div class="property-grid">

        <?php foreach($properties as $property): ?>

            <div class="card">

                <img src="/staynest_mvc_project/public/assets/images/property1.jpg">

                <div class="card-content">

                    <h3>
                        <?= $property['property_title']; ?>
                    </h3>

                    <p>
                        <?= $property['property_type']; ?>
                    </p>

                    <p>
                        <?= $property['address']; ?>
                    </p>

                    <p class="price">
                        DKK <?= $property['price_per_month']; ?>/month
                    </p>

                    <span class="status">
                        <?= $property['availability_status']; ?>
                    </span>

                    <br>

                    <a href="#" class="btn">
                        View Property
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>