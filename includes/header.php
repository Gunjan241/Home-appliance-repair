<!DOCTYPE html>
<html>
<head>

    <title>Home Appliance Repair System</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f4f7fc;
        }

        header{

            width:100%;
            background:linear-gradient(135deg,#0d6efd,#0056d2);
            padding:20px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);

        }

        .logo{

            color:white;
            font-size:32px;
            font-weight:700;

        }

        nav a{

            color:white;
            text-decoration:none;
            margin-left:25px;
            font-size:18px;
            transition:0.3s;

        }

        nav a:hover{

            color:#ffd43b;

        }

        .container{

            width:90%;
            margin:40px auto;

        }

        .cards{

            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:25px;

        }

        .card{

            background:white;
            padding:30px;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
            transition:0.3s;
            position:relative;
            overflow:hidden;

        }

        .card:hover{

            transform:translateY(-8px);

        }

        .card i{

            font-size:40px;
            margin-bottom:20px;

        }

        .card h2{

            font-size:38px;
            margin-bottom:10px;

        }

        .card p{

            color:#666;
            font-size:18px;

        }

        .blue{
            border-left:6px solid #0d6efd;
        }

        .green{
            border-left:6px solid #198754;
        }

        .orange{
            border-left:6px solid #fd7e14;
        }

        .red{
            border-left:6px solid #dc3545;
        }

        footer{

            background:#111827;
            color:white;
            text-align:center;
            padding:18px;
            margin-top:50px;

        }

        .welcome{

            margin-bottom:30px;

        }

        .welcome h1{

            font-size:42px;
            margin-bottom:10px;

        }

        .welcome p{

            font-size:20px;
            color:#666;

        }

        .btn{

            display:inline-block;
            margin-top:20px;
            padding:12px 25px;
            background:#0d6efd;
            color:white;
            text-decoration:none;
            border-radius:10px;
            transition:0.3s;

        }

        .btn:hover{

            background:#0056d2;

        }

    </style>

</head>

<body>

<header>

    <div class="logo">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        Home Appliance Repair
    </div>

    <nav>

        <a href="dashboard.php">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </nav>

</header>