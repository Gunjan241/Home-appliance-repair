<?php

include 'config/db.php';

$message = "";

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $sql = "INSERT INTO users(name,email,password,role)
            VALUES('$name','$email','$password','$role')";

    if($conn->query($sql)){

        $message = "Registration Successful";

    }else{

        $message = "Something Went Wrong";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

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

            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0d6efd,#6610f2);

        }

        .register-box{

            width:400px;
            background:rgba(255,255,255,0.15);
            backdrop-filter:blur(15px);
            border:1px solid rgba(255,255,255,0.2);
            padding:40px;
            border-radius:8px;
            box-shadow:0 8px 32px rgba(0,0,0,0.2);

        }

        .register-box h1{

            text-align:center;
            color:white;
            margin-bottom:30px;
            font-size:38px;

        }

        .input-box{

            margin-bottom:20px;

        }

        .input-box label{

            display:block;
            color:white;
            margin-bottom:8px;
            font-size:15px;

        }

        .input-box input,
        .input-box select{

            width:100%;
            padding:14px;
            border:none;
            outline:none;
            border-radius:5px;
            font-size:16px;

        }

        .btn{

            width:100%;
            padding:14px;
            border:none;
            border-radius:5px;
            background:white;
            color:#0d6efd;
            font-size:18px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;

        }

        .btn:hover{

            background:#0d6efd;
            color:white;

        }

        .success{

            background:#d1e7dd;
            color:#0f5132;
            padding:12px;
            border-radius:4px;
            text-align:center;
            margin-bottom:20px;

        }

        .login-link{

            text-align:center;
            margin-top:20px;
            color:white;

        }

        .login-link a{

            color:#ffd43b;
            text-decoration:none;
            font-weight:600;

        }

    </style>

</head>

<body>

<div class="register-box">

    <h1>
        <i class="fa-solid fa-user-plus"></i>
        Register
    </h1>

    <?php

    if($message != ""){

        echo "<div class='success'>$message</div>";

    }

    ?>

    <form method="POST">

        <div class="input-box">

            <label>Full Name</label>

            <input type="text"
                   name="name"
                   placeholder="Enter Full Name"
                   required>

        </div>

        <div class="input-box">

            <label>Email Address</label>

            <input type="email"
                   name="email"
                   placeholder="Enter Email Address"
                   required>

        </div>

        <div class="input-box">

            <label>Password</label>

            <input type="password"
                   name="password"
                   placeholder="Enter Password"
                   required>

        </div>

        <div class="input-box">

            <label>Select Role</label>

            <select name="role">

                <option value="customer">
                    Customer
                </option>

                <option value="technician">
                    Technician
                </option>

            </select>

        </div>

        <button type="submit"
                name="register"
                class="btn">

            Register Now

        </button>

    </form>

    <div class="login-link">

        Already have account?

        <a href="login.php">

            Login

        </a>

    </div>

</div>

</body>
</html>