<?php

include '../includes/auth.php';
include '../config/db.php';

$message = "";

if(isset($_POST['update'])){

    $request_id = $_POST['request_id'];
    $status = $_POST['status'];

    $sql = "UPDATE service_requests
            SET status='$status'
            WHERE id='$request_id'";

    if($conn->query($sql)){

        $message = "Status Updated Successfully";

    }

}

$requests =
$conn->query("SELECT * FROM service_requests
WHERE technician_id='".$_SESSION['user_id']."'");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Update Status</title>

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
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;

        }

        .container{

            width:100%;
            max-width:550px;
            background:white;
            padding:40px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
            border-top:6px solid #0d6efd;

        }

        .icon{

            text-align:center;
            font-size:60px;
            color:#0d6efd;
            margin-bottom:15px;

        }

        h1{

            text-align:center;
            color:#0d6efd;
            margin-bottom:30px;
            font-size:38px;

        }

        .success{

            background:#d1e7dd;
            color:#0f5132;
            padding:14px;
            margin-bottom:25px;
            border-left:5px solid green;
            border-radius:4px;
            text-align:center;

        }

        .input-box{

            margin-bottom:25px;

        }

        .input-box label{

            display:block;
            margin-bottom:10px;
            font-weight:600;
            color:#333;

        }

        .input-box select{

            width:100%;
            padding:15px;
            border:1px solid #ccc;
            border-radius:5px;
            outline:none;
            font-size:16px;

        }

        .btn{

            width:100%;
            padding:15px;
            background:#0d6efd;
            color:white;
            border:none;
            border-radius:5px;
            font-size:18px;
            cursor:pointer;
            transition:0.3s;

        }

        .btn:hover{

            background:#0056d2;

        }

    </style>

</head>

<body>

<div class="container">

    <div class="icon">

        <i class="fa-solid fa-pen"></i>

    </div>

    <h1>Update Status</h1>

    <?php

    if($message != ""){

        echo "<div class='success'>$message</div>";

    }

    ?>

    <form method="POST">

        <div class="input-box">

            <label>Select Request</label>

            <select name="request_id">

                <?php while($row = $requests->fetch_assoc()){ ?>

                <option value="<?php echo $row['id']; ?>">

                    Request ID :
                    <?php echo $row['id']; ?>

                    -

                    <?php echo $row['appliance']; ?>

                </option>

                <?php } ?>

            </select>

        </div>

        <div class="input-box">

            <label>Update Status</label>

            <select name="status">

                <option value="Pending">
                    Pending
                </option>

                <option value="In Progress">
                    In Progress
                </option>

                <option value="Completed">
                    Completed
                </option>

            </select>

        </div>

        <button type="submit"
                name="update"
                class="btn">

            <i class="fa-solid fa-check"></i>
            Update Status

        </button>

    </form>

</div>

</body>
</html>