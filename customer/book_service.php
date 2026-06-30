<?php

include '../includes/auth.php';
include '../config/db.php';

$message = "";

if(isset($_POST['submit'])){

    $customer_id = $_SESSION['user_id'];

    $appliance = $_POST['appliance'];
    $brand = $_POST['brand'];
    $problem = $_POST['problem'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $folder = "../uploads/appliance_images/".$image_name;

    move_uploaded_file($tmp_name,$folder);

    $sql = "INSERT INTO service_requests
    (customer_id,appliance,brand,problem,address,mobile,image,status)

    VALUES(

    '$customer_id',
    '$appliance',
    '$brand',
    '$problem',
    '$address',
    '$mobile',
    '$image_name',
    'Pending'

    )";

    if($conn->query($sql)){

        $message = "Service Request Submitted Successfully";

    }else{

        $message = "Something Went Wrong";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Book Service</title>

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

        }

        .container{

            width:100%;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;

        }

        .form-box{

            width:100%;
            max-width:700px;
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);

        }

        .form-box h1{

            text-align:center;
            margin-bottom:30px;
            color:#0d6efd;

        }

        .input-group{

            margin-bottom:20px;

        }

        .input-group label{

            display:block;
            margin-bottom:8px;
            font-weight:500;

        }

        .input-group input,
        .input-group textarea{

            width:100%;
            padding:14px;
            border:1px solid #ccc;
            border-radius:10px;
            font-size:16px;

        }

        textarea{
            resize:none;
            height:120px;
        }

        .btn{

            width:100%;
            background:#0d6efd;
            color:white;
            padding:15px;
            border:none;
            border-radius:12px;
            font-size:18px;
            cursor:pointer;
            transition:0.3s;

        }

        .btn:hover{

            background:#0056d2;

        }

        .success{

            background:#d1e7dd;
            color:#0f5132;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;

        }

    </style>

</head>

<body>

<div class="container">

    <div class="form-box">

        <h1>
            <i class="fa-solid fa-screwdriver-wrench"></i>
            Book Appliance Service
        </h1>

        <?php

        if($message != ""){

            echo "<div class='success'>$message</div>";

        }

        ?>

        <form method="POST"
              enctype="multipart/form-data">

            <div class="input-group">

                <label>Appliance Name</label>

                <input type="text"
                       name="appliance"
                       placeholder="Enter Appliance Name"
                       required>

            </div>

            <div class="input-group">

                <label>Brand Name</label>

                <input type="text"
                       name="brand"
                       placeholder="Enter Brand Name"
                       required>

            </div>

            <div class="input-group">

                <label>Problem Description</label>

                <textarea name="problem"
                placeholder="Describe Appliance Problem"
                required></textarea>

            </div>

            <div class="input-group">

                <label>Address</label>

                <textarea name="address"
                placeholder="Enter Full Address"
                required></textarea>

            </div>

            <div class="input-group">

                <label>Mobile Number</label>

                <input type="text"
                       name="mobile"
                       placeholder="Enter Mobile Number"
                       required>

            </div>

            <div class="input-group">

                <label>Upload Appliance Image</label>

                <input type="file"
                       name="image"
                       required>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn">

                Submit Service Request

            </button>

        </form>

    </div>

</div>

</body>
</html>