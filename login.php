<?php

session_start();
include 'config/db.php';

$error = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];

        header("Location: dashboard.php");

    }else{

        $error = "Invalid Email or Password";

    }

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

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

    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0d6efd,#6610f2);

}

.container{

    width:100%;
    max-width:420px;
    background:white;
    padding:40px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);

}

.logo{

    text-align:center;
    margin-bottom:20px;

}

.logo i{

    font-size:70px;
    color:#0d6efd;

}

h1{

    text-align:center;
    margin-bottom:30px;
    color:#0d6efd;
    font-size:40px;

}

.error{

    background:#fee2e2;
    color:#dc2626;
    padding:14px;
    border-radius:8px;
    margin-bottom:20px;
    text-align:center;
    border-left:5px solid red;

}

.input-box{

    margin-bottom:20px;
    position:relative;

}

.input-box i{

    position:absolute;
    left:15px;
    top:18px;
    color:#666;

}

.input-box input{

    width:100%;
    padding:15px 15px 15px 45px;
    border:2px solid #dbeafe;
    border-radius:10px;
    outline:none;
    font-size:16px;
    transition:0.3s;

}

.input-box input:focus{

    border-color:#0d6efd;
    box-shadow:0 0 10px rgba(13,110,253,0.15);

}

button{

    width:100%;
    padding:15px;
    background:linear-gradient(135deg,#0d6efd,#6610f2);
    color:white;
    border:none;
    border-radius:10px;
    font-size:18px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;

}

button:hover{

    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(0,0,0,0.2);

}

.bottom{

    text-align:center;
    margin-top:20px;
    color:#666;

}

.bottom a{

    color:#0d6efd;
    text-decoration:none;
    font-weight:600;

}

.bottom a:hover{

    text-decoration:underline;

}

</style>

</head>

<body>

<div class="container">

<div class="logo">

<i class="fa-solid fa-screwdriver-wrench"></i>

</div>

<h1>Login</h1>

<?php

if($error != ""){

echo "<div class='error'>$error</div>";

}

?>

<form method="POST">

<div class="input-box">

<i class="fa-solid fa-envelope"></i>

<input type="email"
name="email"
placeholder="Enter Email Address"
required>

</div>

<div class="input-box">

<i class="fa-solid fa-lock"></i>

<input type="password"
name="password"
placeholder="Enter Password"
required>

</div>

<button type="submit" name="login">

<i class="fa-solid fa-right-to-bracket"></i>
Login Now

</button>

</form>

<div class="bottom">

Don't have an account?

<a href="register.php">

Register

</a>

</div>

</div>

</body>
</html>