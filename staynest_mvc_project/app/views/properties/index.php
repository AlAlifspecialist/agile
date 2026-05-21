<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management - StayNest</title>

    <style>

        body{
            margin:0;
            padding:0;
            font-family:Arial, sans-serif;
            background:#f1f5f9;
        }

        .header{
            background:#0f172a;
            color:white;
            padding:20px 40px;
        }

        .header h1{
            margin:0;
        }

        .container{
            width:90%;
            margin:auto;
            padding:40px 0;
        }

        .top-bar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .add-btn{
            background:#16a34a;
            color:white;
            padding:12px 20px;
            text-decoration:none;
            border-radius:6px;
        }

        .property-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
            gap:25px;
        }

        .card{
            background:white;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .card-body{
            padding:20px;
        }

        .card-body h2{
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
            background:#d1fae5;
            color:#065f46;
            padding:6px 12px;
            border-radius:20px;
            margin-top:10px;
            font-size:14px;
        }

        .actions{
            margin-top:20px;
        }

        .edit-btn{
            background:#2563eb;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
            margin-right:10px;
        }

        .delete-btn{
            background:#dc2626;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
        }

    </style>

</head>
<body>

<div class="header">
    <h1>Property Management</h1>
</div>

<div class="container">

    <div class="top-bar">
        <h2>All Properties</h2>

        <a href="#" class="add-btn">
            + Add New Property
        </a>
    </div>

    <div class="property-grid">

        <?php foreach($properties as $property): ?>

            <div class="card">

                <img src="/staynest_mvc_project/public/assets/images/property1.jpg">

                <div class="card-body">

                    <h2>
                        <?= $property['property_title']; ?>
                    </h2>

                    <p>
                        <strong>Type:</strong>
                        <?= $property['property_type']; ?>
                    </p>

                    <p>
                        <strong>Address:</strong>
                        <?= $property['address']; ?>
                    </p>

                    <p class="price">
                        DKK <?= $property['price_per_month']; ?>/month
                    </p>

                    <span class="status">
                        <?= $property['availability_status']; ?>
                    </span>

                    <div class="actions">

                        <a href="#" class="edit-btn">
                            Edit
                        </a>

                        <a href="#" class="delete-btn"
                           onclick="return confirm('Are you sure you want to delete this property?')">
                            Delete
                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>