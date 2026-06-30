<?php

include '../includes/auth.php';
include '../config/db.php';
include '../includes/header.php';

/*
=====================================
ASSIGN TECHNICIAN
=====================================
*/

if(isset($_POST['assign'])){

    $request_id = $_POST['request_id'];

    $technician_id = $_POST['technician_id'];

    $update = mysqli_query($conn,
    "UPDATE service_requests
    SET technician_id='$technician_id',
    status='In Progress'
    WHERE id='$request_id'");

    if($update){

        $success = "Technician Assigned Successfully";

    }else{

        $error = "Assignment Failed";

    }

}

/*
=====================================
GET ALL REQUESTS
=====================================
*/

$requests = mysqli_query($conn,
"SELECT * FROM service_requests
ORDER BY id DESC");

/*
=====================================
GET ALL TECHNICIANS
=====================================
*/

$technicians = mysqli_query($conn,
"SELECT * FROM users
WHERE role='technician'
ORDER BY id DESC");

?>

<style>

body{

    background:#f4f6f9;
    font-family:Poppins,sans-serif;

}

.container{

    width:700px;
    margin:50px auto;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);

}

.title{

    text-align:center;
    font-size:50px;
    color:#0d6efd;
    margin-bottom:30px;
    font-weight:700;

}

.success{

    background:#d1e7dd;
    color:#0f5132;
    padding:15px;
    border-left:6px solid green;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
    font-size:18px;

}

.error{

    background:#f8d7da;
    color:#842029;
    padding:15px;
    border-left:6px solid red;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
    font-size:18px;

}

label{

    display:block;
    margin-bottom:10px;
    margin-top:20px;
    font-size:20px;
    font-weight:600;

}

select{

    width:100%;
    padding:16px;
    border:1px solid #ccc;
    border-radius:12px;
    font-size:18px;
    outline:none;

}

button{

    width:100%;
    background:#0d6efd;
    color:white;
    border:none;
    padding:18px;
    border-radius:12px;
    font-size:20px;
    margin-top:30px;
    cursor:pointer;
    font-weight:600;

}

button:hover{

    background:#0b5ed7;

}

</style>

<div class="container">

<h1 class="title">

Assign Technician

</h1>

<?php

if(isset($success)){

echo "<div class='success'>$success</div>";

}

if(isset($error)){

echo "<div class='error'>$error</div>";

}

?>

<form method="POST">

<label>

Select Service Request

</label>

<select name="request_id" required>

<option value="">

Select Request

</option>

<?php

while($row = mysqli_fetch_assoc($requests)){

?>

<option value="<?php echo $row['id']; ?>">

Request ID :
<?php echo $row['id']; ?>
-
<?php echo $row['appliance']; ?>

</option>

<?php } ?>

</select>

<label>

Select Technician

</label>

<select name="technician_id" required>

<option value="">

Select Technician

</option>

<?php

while($tech = mysqli_fetch_assoc($technicians)){

?>

<option value="<?php echo $tech['id']; ?>">

<?php echo $tech['name']; ?>

</option>

<?php } ?>

</select>

<button type="submit" name="assign">

Assign Technician

</button>

</form>

</div>

<?php include '../includes/footer.php'; ?>