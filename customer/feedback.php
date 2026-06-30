<?php

$message = "";

if(isset($_POST['submit'])){

    $message = "Thank You For Your Valuable Feedback ";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Customer Feedback</title>

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
    background:#eef2ff;
    padding:20px;

}

.container{

    width:100%;
    max-width:700px;
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.12);

}

.top{

    background:linear-gradient(135deg,#0d6efd,#6610f2);
    padding:40px;
    text-align:center;
    color:white;

}

.top i{

    font-size:70px;
    margin-bottom:15px;

}

.top h1{

    font-size:42px;
    margin-bottom:10px;

}

.top p{

    opacity:0.9;
    font-size:16px;

}

.content{

    padding:40px;

}

.success{

    background:#dcfce7;
    color:#166534;
    padding:15px;
    border-radius:10px;
    margin-bottom:25px;
    border-left:5px solid #22c55e;
    text-align:center;
    font-weight:500;

}

label{

    display:block;
    margin-bottom:10px;
    font-size:17px;
    font-weight:600;
    color:#333;

}

textarea{

    width:100%;
    height:220px;
    padding:18px;
    border:2px solid #dbeafe;
    border-radius:12px;
    outline:none;
    resize:none;
    font-size:16px;
    transition:0.3s;

}

textarea:focus{

    border-color:#0d6efd;
    box-shadow:0 0 10px rgba(13,110,253,0.15);

}

button{

    width:100%;
    margin-top:25px;
    padding:16px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#0d6efd,#6610f2);
    color:white;
    font-size:18px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;

}

button:hover{

    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(0,0,0,0.15);

}

.bottom{

    margin-top:20px;
    text-align:center;
    color:#666;
    font-size:14px;

}

@media(max-width:768px){

    .top h1{

        font-size:32px;

    }

    .content{

        padding:25px;

    }

}

</style>

</head>

<body>

<div class="container">

<div class="top">

<i class="fa-solid fa-comments"></i>

<h1>Customer Feedback</h1>

<p>
Share your experience with our repair service
</p>

</div>

<div class="content">

<?php

if($message != ""){

echo "<div class='success'>$message</div>";

}

?>

<form method="POST">

<label>

Write Your Feedback

</label>

<textarea
name="feedback"
placeholder="Tell us about your experience..."
required></textarea>

<button type="submit" name="submit">

<i class="fa-solid fa-paper-plane"></i>
Submit Feedback

</button>

</form>

<div class="bottom">

Your feedback helps us improve our services 🚀

</div>

</div>

</div>

</body>
</html>