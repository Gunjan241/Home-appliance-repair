<?php

include '../includes/auth.php';
include '../config/db.php';

/*
ASCENDING ORDER
Oldest request first
*/

$sql = "SELECT * FROM service_requests ORDER BY id ASC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Manage Requests</title>

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

            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;

        }

        .title h1{

            color:#0d6efd;
            font-size:42px;

        }

        .back-btn{

            background:#0d6efd;
            color:white;
            padding:12px 20px;
            text-decoration:none;
            border-radius:10px;
            transition:0.3s;

        }

        .back-btn:hover{

            background:#0056d2;

        }

        .table-box{

            overflow-x:auto;
            background:white;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);

        }

        table{

            width:100%;
            border-collapse:collapse;

        }

        table th{

            background:#0d6efd;
            color:white;
            padding:20px;
            text-align:left;
            font-size:17px;

        }

        table td{

            padding:20px;
            border-bottom:1px solid #eee;
            vertical-align:middle;
            font-size:16px;

        }

        tr:hover{

            background:#f8f9ff;

        }

        .appliance-img{

            width:100px;
            height:100px;
            object-fit:cover;
            border-radius:15px;
            border:2px solid #ddd;

        }

        .status{

            padding:8px 18px;
            border-radius:30px;
            color:white;
            font-size:14px;
            font-weight:600;
            display:inline-block;

        }

        .pending{

            background:#f59e0b;

        }

        .completed{

            background:#198754;

        }

        .inprogress{

            background:#0d6efd;

        }

        .id-box{

            font-weight:700;
            color:#0d6efd;

        }

        .problem{

            max-width:350px;
            line-height:28px;

        }

        .address{

            max-width:300px;
            line-height:28px;

        }

        .mobile{

            font-weight:600;

        }

        @media(max-width:768px){

            .title{

                flex-direction:column;
                gap:15px;

            }

            .title h1{

                font-size:30px;

            }

        }

    </style>

</head>

<body>

<div class="title">

    <h1>
        <i class="fa-solid fa-list-check"></i>
        Manage Service Requests
    </h1>

    <a href="../dashboard.php" class="back-btn">

        <i class="fa-solid fa-arrow-left"></i>
        Back Dashboard

    </a>

</div>

<div class="table-box">

<table>

    <tr>

        <th>ID</th>
        <th>Appliance</th>
        <th>Brand</th>
        <th>Problem</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Image</th>
        <th>Status</th>

    </tr>

    <?php

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

            $statusClass = "pending";

            if($row['status'] == 'Completed'){
                $statusClass = "completed";
            }

            if($row['status'] == 'In Progress'){
                $statusClass = "inprogress";
            }

    ?>

    <tr>

        <td class="id-box">
            <?php echo $row['id']; ?>
        </td>

        <td>
            <?php echo $row['appliance']; ?>
        </td>

        <td>
            <?php echo $row['brand']; ?>
        </td>

        <td class="problem">
            <?php echo $row['problem']; ?>
        </td>

        <td class="address">
            <?php echo $row['address']; ?>
        </td>

        <td class="mobile">
            <?php echo $row['mobile']; ?>
        </td>

        <td>

            <img
            src="../uploads/appliance_images/<?php echo $row['image']; ?>"
            class="appliance-img">

        </td>

        <td>

            <span class="status <?php echo $statusClass; ?>">

                <?php echo $row['status']; ?>

            </span>

        </td>

    </tr>

    <?php

        }

    }else{

        echo "
        <tr>
            <td colspan='8'
            style='text-align:center;padding:40px;font-size:20px;color:red;'>
                No Service Requests Found
            </td>
        </tr>
        ";

    }

    ?>

</table>

</div>

</body>
</html>