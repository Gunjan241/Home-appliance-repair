<?php

include '../includes/auth.php';
include '../config/db.php';

/*
ASCENDING ORDER
Oldest request first
*/

$total_requests =
$conn->query("SELECT * FROM service_requests")->num_rows;

$latest_requests =
$conn->query("SELECT * FROM service_requests ORDER BY id ASC");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Admin Dashboard</title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

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
            padding:30px;
        }

        .title{

            margin-bottom:30px;

        }

        .title h1{

            color:#0d6efd;
            font-size:42px;

        }

        .card{

            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
            margin-bottom:40px;
            display:flex;
            align-items:center;
            justify-content:space-between;

        }

        .card-left h2{

            font-size:45px;
            color:#0d6efd;

        }

        .card-left p{

            color:#666;
            margin-top:10px;
            font-size:18px;

        }

        .card i{

            font-size:70px;
            color:#0d6efd;

        }

        .btn{

            display:inline-block;
            margin-top:20px;
            background:#0d6efd;
            color:white;
            padding:12px 22px;
            text-decoration:none;
            border-radius:10px;
            transition:0.3s;

        }

        .btn:hover{

            background:#0056d2;

        }

        .table-box{

            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);

        }

        table{

            width:100%;
            border-collapse:collapse;

        }

        table th{

            background:#0d6efd;
            color:white;
            padding:18px;
            text-align:left;

        }

        table td{

            padding:18px;
            border-bottom:1px solid #eee;

        }

        tr:hover{

            background:#f8f9ff;

        }

        .status{

            background:orange;
            color:white;
            padding:6px 14px;
            border-radius:20px;
            font-size:14px;

        }

        .completed{

            background:#198754;

        }

        .progress{

            background:#0d6efd;

        }

        @media(max-width:768px){

            .card{

                flex-direction:column;
                gap:20px;
                text-align:center;

            }

        }

    </style>

</head>

<body>

<div class="title">

    <h1>
        <i class="fa-solid fa-user-shield"></i>
        Admin Dashboard
    </h1>

</div>

<div class="card">

    <div class="card-left">

        <h2>
            <?php echo $total_requests; ?>
        </h2>

        <p>Total Service Requests</p>

        <a href="manage_requests.php" class="btn">

            Manage Requests

        </a>

    </div>

    <i class="fa-solid fa-screwdriver-wrench"></i>

</div>

<div class="table-box">

<table>

    <tr>

        <th>ID</th>
        <th>Appliance</th>
        <th>Brand</th>
        <th>Mobile</th>
        <th>Status</th>

    </tr>

    <?php

    while($row = $latest_requests->fetch_assoc()){

        $statusClass = "status";

        if($row['status'] == 'Completed'){
            $statusClass = "status completed";
        }

        if($row['status'] == 'In Progress'){
            $statusClass = "status progress";
        }

    ?>

    <tr>

        <td>
            <?php echo $row['id']; ?>
        </td>

        <td>
            <?php echo $row['appliance']; ?>
        </td>

        <td>
            <?php echo $row['brand']; ?>
        </td>

        <td>
            <?php echo $row['mobile']; ?>
        </td>

        <td>

            <span class="<?php echo $statusClass; ?>">

                <?php echo $row['status']; ?>

            </span>

        </td>

    </tr>

    <?php } ?>

</table>

</div>

</body>
</html>